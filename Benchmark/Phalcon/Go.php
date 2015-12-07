<?php

namespace Benchmark\Phalcon;

use Benchmark\Phalcon\Models\Lemon;
use Benchmark\Phalcon\Models\Tree;

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

        $phql  = "SELECT t.*, l.* FROM Benchmark\Phalcon\Models\Tree t LEFT JOIN Benchmark\Phalcon\Models\Lemon l";
        $rows = $manager->executeQuery($phql);

        $trees=array();

        foreach($rows as $row){

            // The following code will mimic the entity hydration
//            if(!isset( $trees[$row["t"]->id])){
//                $t = new Tree();
//                $t->age = $row["t"]->age;
//                $t->id  = $row["t"]->id;
//                $trees[$row["t"]->id]=$t;
//            }
//            $l = new Lemon();
//            $l->id = $row["l"]->id;
//            $l->mature = $row["l"]->mature;
//            $l->tree = $trees[$row["t"]->id];
//            $trees[$row["t"]->id]->lemons[] = $l;
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
