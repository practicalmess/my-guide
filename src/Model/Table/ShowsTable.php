<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class ShowsTable extends Table
{
    public function initialize(array $config): void
    {
        $this->belongsToMany('Channels');
    }
}