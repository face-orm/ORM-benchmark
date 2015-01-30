<?php

namespace Benchmark\Doctrine2;

class Go implements \Benchmark\TestInterface{

    public function setUp($dbInfos){
        $dbParams = array(
            'driver' => 'pdo_mysql',
            'user' => $dbInfos["username"],
            'password' =>  $dbInfos["password"],
            'dbname' => $dbInfos["db-name"]
        );
        $path = __DIR__.'/Models';
        $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(array($path), false);
        $entityManager = \Doctrine\ORM\EntityManager::create($dbParams, $config);

        return $entityManager;
    }
    
    public function launchSimple($dbInfos,&$memoryUsage, &$time) {

        $timeBu = microtime(true);
        $memoryBu = memory_get_usage(true);

        /*#################################
                PLACE FOR EXECUTION
         ##################################*/

        $entityManager=$this->setUp($dbInfos);


        $entityManager->getRepository("Benchmark\Doctrine2\Models\Tree")->findAll();
        
        
        /*##                             ##*/
        /*#################################*/
       
        
        $memoryUsage = memory_get_usage(true) - $memoryBu;
        $time        = microtime(true) - $timeBu;
    }
    
    public function launchOneJoin($dbInfos,&$memoryUsage, &$time) {

        $timeBu = microtime(true);
        $memoryBu = memory_get_usage(true);
       
        /*#################################
                PLACE FOR EXECUTION
         ##################################*/

        $entityManager=$this->setUp($dbInfos);

        $query = $entityManager->createQuery("SELECT t FROM Benchmark\Doctrine2\Models\Tree t JOIN t.lemons");

        $r = $query->getResult();



        /*##                             ##*/
        /*#################################*/


        $memoryUsage = memory_get_usage(true) - $memoryBu;
        $time        = microtime(true) - $timeBu;

    }

    public function launchTwoJoin($dbInfos,&$memoryUsage, &$time) {

        $timeBu = microtime(true);
        $memoryBu = memory_get_usage(true);
       
        /*#################################
                PLACE FOR EXECUTION
         ##################################*/

        $entityManager=$this->setUp($dbInfos);

        $query = $entityManager->createQuery("SELECT t FROM Benchmark\Doctrine2\Models\Tree t JOIN t.lemons l JOIN l.seeds");

        $r = $query->getResult();
        
        
        /*##                             ##*/
        /*#################################*/
       
        
        $memoryUsage = memory_get_usage(true) - $memoryBu;
        $time        = microtime(true) - $timeBu;

    }


    
    
}
