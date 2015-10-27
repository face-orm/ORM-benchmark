<?php

namespace Benchmark\Phalcon;

class Go implements \Benchmark\TestInterface{

    protected $di;

    public function getName(){
        return "Phalcon";
    }

    public function __construct($dbInfos){
        $di = new \Phalcon\DI();

        $di->setShared('db', new \Phalcon\Db\Adapter\Pdo\Mysql(array(
            "host" => $dbInfos["host"],
            "username" => $dbInfos["username"],
            "password" => $dbInfos["password"],
            "dbname" => $dbInfos["db-name"]
        )));
        $di->setShared('modelsManager', new \Phalcon\Mvc\Model\Manager());
        $di->setShared('modelsMetadata', new \Phalcon\Mvc\Model\Metadata\Memory());

        $this->di = $di;

    }
    
    public function launchSimple() {
        $trees = \Benchmark\Phalcon\Models\Tree::find();
        foreach($trees as $t){
            $t->id;
        }
    }


    public function launchOneJoin() {

        $di = $this->di;
        $manager = $di->get('modelsManager');

        $phql  = "SELECT * FROM Benchmark\Phalcon\Models\Tree LEFT JOIN Benchmark\Phalcon\Models\Lemon ON Benchmark\Phalcon\Models\Tree.id = Benchmark\Phalcon\Models\Lemon.tree_id";
        $trees = $manager->executeQuery($phql);

        foreach($trees as $t){
            foreach($t["benchmark\Phalcon\Models\Tree"]->lemons as $lemon){
                $lemon->id;
            }
        }

    }

    public function launchTwoJoin() {

        $di = $this->di;
        $manager=$di->get('modelsManager');

        $phql  = "SELECT * FROM Benchmark\Phalcon\Models\Tree
            LEFT JOIN Benchmark\Phalcon\Models\Lemon ON Benchmark\Phalcon\Models\Tree.id = Benchmark\Phalcon\Models\Lemon.tree_id
            LEFT JOIN Benchmark\Phalcon\Models\Seed ON Benchmark\Phalcon\Models\Lemon.id = Benchmark\Phalcon\Models\Seed.lemon_id";
        $trees = $manager->executeQuery($phql);

        foreach($trees as $t){
            foreach($t["benchmark\Phalcon\Models\Tree"]->lemons as $lemon){
                $lemon->id;
            }
        }

    }


    
    
}
