<?php

namespace Benchmark\Face;

class Go implements \Benchmark\TestInterface{

    
    public function launchSimple($dbInfos,&$memoryUsage, &$time) {
        $pdo=new \PDO(
            "mysql:dbname=".$dbInfos["db-name"].";host=".$dbInfos["host"],
            $dbInfos["username"],
            $dbInfos["password"]
        );
        
        $timeBu = microtime(true);
        $memoryBu = memory_get_usage();
        
        $fq=Models\Tree::faceQueryBuilder();
        \Face\ORM::execute($fq, $pdo);


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
        $memoryBu = memory_get_usage();
        
        $fq=Models\Tree::faceQueryBuilder();
        $fq->join("lemons");
        \Face\ORM::execute($fq, $pdo);


        $memoryUsage = memory_get_usage() - $memoryBu;
        $time        = microtime(true) - $timeBu;
    }

    public function launchTwoJoin($dbInfos, &$memoryUsage, &$time) {
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
        \Face\ORM::execute($fq, $pdo);
        
        
        
        $memoryUsage = memory_get_usage() - $memoryBu;
        $time        = microtime(true) - $timeBu;
    }


    
    
}
