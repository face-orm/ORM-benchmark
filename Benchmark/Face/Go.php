<?php

namespace Benchmark\Face;

class Go implements \Benchmark\TestInterface{
    
    
    public function launch($dbInfos,&$memoryUsage, &$time) {
        $pdo=new \PDO(
            "mysql:dbname=".$dbInfos["db-name"].";host=".$dbInfos["host"],
            $dbInfos["username"],
            $dbInfos["password"]
        );
        
        $timeBu = microtime(true);
        $memoryBu = memory_get_usage(true);
        
        $fq=Models\Tree::faceQueryBuilder();
        $fq->execute($pdo);
        
        $memoryUsage = memory_get_usage(true) - $memoryBu;
        $time        = microtime(true) - $timeBu;
    }

    public function type() {
        return "tree";
    }

    
    
}
