<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class ChannelsTable extends Table
{
    public function initialize(array $config): void
    {
        $this->belongsToMany('Shows', [
          'joinTable' => 'channels_shows',
          'dependent' => true
        ]);
    }
}