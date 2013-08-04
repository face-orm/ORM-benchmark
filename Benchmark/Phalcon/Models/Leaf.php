<?php

namespace Benchmark\Phalcon\Models;


class Leaf extends \Phalcon\Mvc\Model
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
    public $length;
     
    /**
     *
     * @var integer
     */
    public $tree_id;
     
    public function getSource()
    {
        return 'leaf';
    }

}
