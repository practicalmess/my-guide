<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Channel extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}