<?php

namespace Benchmark\Phalcon\Models;


class Seed extends \Phalcon\Mvc\Model
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
    public $lemon_id;
     
    /**
     *
     * @var string
     */
    public $fertil;

    public function initialize(){
        $this->belongsTo("lemon_id", "Benchmark\Phalcon\Models\Lemon", "id");
    }

    public function getSource()
    {
        return 'seed';
    }

}
