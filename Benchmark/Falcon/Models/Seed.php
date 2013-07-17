<?php

namespace Benchmark\Falcon\Models;


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
     
    public function getSource()
    {
        return 'seed';
    }

}
