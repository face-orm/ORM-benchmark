<?php

namespace Benchmark\Phalcon\Models;


class Tree extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;
     
    /**
     *
     * @var integer
     */
    public $age;

    public function initialize(){
        $this->hasMany("id", "Benchmark\Phalcon\Models\Lemon", "tree_id", ["alias" => "lemons"]);
        $this->hasMany("id", "Benchmark\Phalcon\Models\Leaf", "tree_id");
    }
     
    public function getSource()
    {
        return 'tree';
    }

}
