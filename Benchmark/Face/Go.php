<?php

namespace Benchmark\Face;

class Go implements \Benchmark\TestInterface{


    /**
     * @var \PDO
     */
    protected $pdo;

    public function getName(){
        return "FACE";
    }

    public function __construct($dbInfos){
        $config = new \Face\Config();


        $redis = new \Redis();
        $redis->connect("127.0.0.1");
        $cache = new \Face\Cache\RedisCache($redis,"obench");


        $cacheableLoader = new \Face\Core\FaceLoader\FileReader\PhpArrayReader(  __DIR__ . "/face_definitions" );
        //$cacheableLoader->setCache($cache);

        $config->setFaceLoader($cacheableLoader);


        $config::setDefault($config);


        $this->pdo = new \PDO(
            "mysql:dbname=".$dbInfos["db-name"].";host=".$dbInfos["host"],
            $dbInfos["username"],
            $dbInfos["password"]
        );
    }

    
    public function launchSimple() {
        $pdo = $this->pdo;


        $fq=Models\Tree::faceQueryBuilder();
        $trees = \Face\ORM::execute($fq, $pdo);

        foreach($trees as $t){
            $t->getId();
        }
    }


    public function launchOneJoin() {

        $pdo= $this->pdo;
        
        $fq=Models\Tree::faceQueryBuilder();
        $fq->join("lemons");
        $trees = \Face\ORM::execute($fq, $pdo);

        foreach($trees as $t){

            $lemons = $t->getLemons();

            foreach($lemons as $l){
                $l->getId();

            }

        }

    }

    public function launchTwoJoin() {


        $pdo= $this->pdo;

        
        $fq=Models\Tree::faceQueryBuilder();
        $fq->join("lemons");
        $fq->join("lemons.seeds");
        $trees = \Face\ORM::execute($fq, $pdo);


        foreach($trees as $t){

            $lemons = $t->getLemons();

            foreach($lemons as $l){
                $seeds = $l->getSeeds();

                foreach($seeds as $s){
                    $s->getId();
                }

            }

        }


    }


    
    
}
