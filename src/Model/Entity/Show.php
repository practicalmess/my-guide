<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Show extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}