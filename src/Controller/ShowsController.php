<?php

namespace App\Controller;

// use Cake\Routing\Router;

class ShowsController extends AppController {
	public function initialize(): void {
		parent::initialize();

		$this->loadComponent('Paginator');
		$this->loadComponent('Flash');
	}

	public function index() {
    $shows = $this->Paginator->paginate($this->Shows->find());
    $this->set(compact('shows'));
  }

  public function add() {
    $show = $this->Shows->newEmptyEntity();
    if ($this->request->is(['post', 'put'])) {
      $show = $this->Shows->patchEntity($show, $this->request->getData());
      if ($this->Shows->save($show)) {
        $this->Flash->success(__('Show added'));
        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('Something went wrong adding show'));
    }
    return $this->redirect(['action' => 'index']);
  }
}