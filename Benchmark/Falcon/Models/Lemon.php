<?php

namespace Benchmark\Falcon\Models;


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
     
    public function getSource()
    {
        return 'lemon';
    }

}
