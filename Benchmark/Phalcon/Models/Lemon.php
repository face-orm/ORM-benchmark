<?php

namespace Benchmark\Phalcon\Models;


class Lemon extends \Phalcon\Mvc\Model
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
    public $tree_id;
     
    /**
     *
     * @var string
     */
    public $mature;

    public function initialize(){
        $this->hasMany("id", "Benchmark\Phalcon\Models\Seed", "lemon_id", ["aliase" => "seeds"]);
        $this->belongsTo("tree_id", "Benchmark\Phalcon\Models\Tree", "id");
    }

    public function getSource()
    {
        return 'lemon';
    }

}
