<?php

namespace Benchmark\Falcon;

class Go implements \Benchmark\TestInterface{
    
    
    public function launchSimple($dbInfos,&$memoryUsage, &$time) {

        $timeBu = microtime(true);
        $memoryBu = memory_get_usage();
        
        $di = new \Phalcon\DI();
        
        $di->set('db', new \Phalcon\Db\Adapter\Pdo\Mysql(array(
            "host" => "localhost",
            "username" => "root",
            "password" => "root",
            "dbname" => $dbInfos["db-name"]
        )));
        $di->set('modelsManager', new \Phalcon\Mvc\Model\Manager());
        $di->set('modelsMetadata', new \Phalcon\Mvc\Model\Metadata\Memory());
       
        \Benchmark\Falcon\Models\Tree::find();
        
        $memoryUsage = memory_get_usage() - $memoryBu;
        $time        = microtime(true) - $timeBu;
        
        
    }


    public function launchOneJoin($dbInfos, &$memoryUsage, &$time) {
        $pdo=new \PDO(
            "mysql:dbname=".$dbInfos["db-name"].";host=".$dbInfos["host"],
            $dbInfos["username"],
            $dbInfos["password"]
        );
        
        $timeBu = microtime(true);
        $memoryBu = memory_get_usage(true);
        
        $fq=Models\Tree::faceQueryBuilder();
        $fq->join("lemons");
        \Face\ORM::execute($fq, $pdo);

        $memoryUsage = memory_get_usage(true) - $memoryBu;
        $time        = microtime(true) - $timeBu;
    }

    public function launchTwoJoin($dbInfos, &$memoryUsage, &$time) {
        $pdo=new \PDO(
            "mysql:dbname=".$dbInfos["db-name"].";host=".$dbInfos["host"],
            $dbInfos["username"],
            $dbInfos["password"]
        );
        
        $timeBu = microtime(true);
        $memoryBu = memory_get_usage(true);
        
        $fq=Models\Tree::faceQueryBuilder();
        $fq->join("lemons");
        $fq->join("lemons.seeds");
        \Face\ORM::execute($fq, $pdo);
        
        
        
        $memoryUsage = memory_get_usage(true) - $memoryBu;
        $time        = microtime(true) - $timeBu;
    }


    
    
}
