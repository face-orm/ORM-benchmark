<?php

namespace Benchmark\Face;

class Go implements \Benchmark\TestInterface{

    public function setup(){


        $config = new \Face\Config();


        $redis = new \Redis();
        $redis->connect("127.0.0.1");
        $cache = new \Face\Cache\RedisCache($redis,"obench");


        $cacheableLoader = new \Face\Core\FaceLoader\FileReader\PhpArrayReader(  __DIR__ . "/face_definitions" );
        //$cacheableLoader->setCache($cache);

        $config->setFaceLoader($cacheableLoader);


        $config::setDefault($config);

    }
    
    public function launchSimple($dbInfos,&$memoryUsage, &$time) {


        $this->setup();

        $pdo=new \PDO(
            "mysql:dbname=".$dbInfos["db-name"].";host=".$dbInfos["host"],
            $dbInfos["username"],
            $dbInfos["password"]
        );
        
        $timeBu = microtime(true);
        $memoryBu = memory_get_usage();
        
        $fq=Models\Tree::faceQueryBuilder();
        var_dump(Models\Tree::getEntityFace());
        $trees = \Face\ORM::execute($fq, $pdo);

        foreach($trees as $t){

            $t->getId();

        }


        $memoryUsage = memory_get_usage() - $memoryBu;
        $time        = microtime(true) - $timeBu;

    }


    public function launchOneJoin($dbInfos, &$memoryUsage, &$time) {

        $this->setup();

        $pdo=new \PDO(
            "mysql:dbname=".$dbInfos["db-name"].";host=".$dbInfos["host"],
            $dbInfos["username"],
            $dbInfos["password"]
        );
        
        $timeBu = microtime(true);
        $memoryBu = memory_get_usage();
        
        $fq=Models\Tree::faceQueryBuilder();
        $fq->join("lemons");
        $trees = \Face\ORM::execute($fq, $pdo);

        foreach($trees as $t){

            $lemons = $t->getLemons();

            foreach($lemons as $l){
                $l->getId();

            }

        }


        $memoryUsage = memory_get_usage() - $memoryBu;
        $time        = microtime(true) - $timeBu;
    }

    public function launchTwoJoin($dbInfos, &$memoryUsage, &$time) {

        $this->setup();

        $pdo=new \PDO(
            "mysql:dbname=".$dbInfos["db-name"].";host=".$dbInfos["host"],
            $dbInfos["username"],
            $dbInfos["password"]
        );
        
        $timeBu = microtime(true);
        $memoryBu = memory_get_usage();
        
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

        
        
        $memoryUsage = memory_get_usage() - $memoryBu;
        $time        = microtime(true) - $timeBu;
    }


    
    
}
