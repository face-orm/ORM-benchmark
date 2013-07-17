<?php

namespace Benchmark\Doctrine2;

class Go implements \Benchmark\TestInterface{
    
    
    public function launch($dbInfos,&$memoryUsage, &$time) {

        $timeBu = microtime(true);
        $memoryBu = memory_get_usage(true);
       
        /*#################################
                PLACE FOR EXECUTION
         ##################################*/
        
        $dbParams = array(
            'driver' => 'pdo_mysql',
            'user' => $dbInfos["username"],
            'password' =>  $dbInfos["password"],
            'dbname' => $dbInfos["db-name"]
        );
        $path = __DIR__.'/Models';
        $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(array($path), true);
        $entityManager = \Doctrine\ORM\EntityManager::create($dbParams, $config);

        
        $entityManager->getRepository("Benchmark\Doctrine2\Models\Tree")->findAll();
        
        
        /*##                             ##*/
        /*#################################*/
       
        
        $memoryUsage = memory_get_usage(true) - $memoryBu;
        $time        = microtime(true) - $timeBu;
    }

    public function type() {
        return "tree";
    }

    
    
}
