<?php

namespace Benchmark\Falcon\Models;


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
     
    public function getSource()
    {
        return 'tree';
    }

}
