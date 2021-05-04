<?php

namespace App\Controller;

// use Cake\Routing\Router;

class ChannelsController extends AppController
{
  public function initialize(): void
  {
    parent::initialize();

    $this->loadComponent('Paginator');
    $this->loadComponent('Flash');
    $this->belongsToMany('Shows');
  }

  public function index()
  {
    $channels = $this->Paginator->paginate($this->Channels->find());
    $this->set(compact('channels'));
  }

  public function view($slug) {
    $channel = $this->Channels->findBySlug($slug)->firstOrFail();
    $this->set(compact('channel'));
  }

  public function edit($slug)
  {
      $channel = $this->Channels
          ->findBySlug($slug)
          ->contain('Shows') // load associated shows
          ->firstOrFail();
      if ($this->request->is(['post', 'put'])) {
          $this->Channels->patchEntity($channel, $this->request->getData());
          if ($this->Channels->save($channel)) {
              $this->Flash->success(__('Your channel has been updated.'));
              return $this->redirect(['action' => 'view', 'slug', $slug]);
          }
          $this->Flash->error(__('Unable to update your channel.'));
      }

      // Get a list of shows.
      $shows = $this->Channels->Shows->find('list')->all();

      // Set shows to the view context
      $this->set('shows', $shows);

      $this->set('channel', $channel);
  }

  public function add()
  {
    $show = $this->Channels->newEmptyEntity();
    if ($this->request->is(['post', 'put'])) {
      $show = $this->Channels->patchEntity($show, $this->request->getData());
      if ($this->Channels->save($show)) {
        $this->Flash->success(__('Channel added'));
        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('Something went wrong adding channel'));
    }
    return $this->redirect(['action' => 'index']);
  }
}