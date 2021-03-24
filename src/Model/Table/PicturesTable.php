<?php


namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PicturesTable extends Table
{
    public function initialize(array $config):void
    {
        parent::initialize($config);
        $this->addBehavior('Timestamp');
        $this->hasMany('comments');
    }

}
