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

        $entityManager=$this->setUp($dbInfos);

        $timeBu = microtime(true);
        $memoryBu = memory_get_usage(true);

        /*#################################
                PLACE FOR EXECUTION
         ##################################*/



        $trees = $entityManager->getRepository("Benchmark\Doctrine2\Models\Tree")->findAll();

        foreach($trees as $t){

            $t->getId();

        }



        /*##                             ##*/
        /*#################################*/
       
        
        $memoryUsage = memory_get_usage(true) - $memoryBu;
        $time        = microtime(true) - $timeBu;
    }
    
    public function launchOneJoin($dbInfos,&$memoryUsage, &$time) {

        $entityManager=$this->setUp($dbInfos);
        $timeBu = microtime(true);
        $memoryBu = memory_get_usage(true);

        /*#################################
                PLACE FOR EXECUTION
         ##################################*/


        $query = $entityManager->createQuery("SELECT t FROM Benchmark\Doctrine2\Models\Tree t JOIN t.lemons");

        $trees = $query->getResult();

        foreach($trees as $t){

            $lemons = $t->getLemons();

            foreach($lemons as $l){

                 $l->getId();

            }

        }


        /*##                             ##*/
        /*#################################*/


        $memoryUsage = memory_get_usage(true) - $memoryBu;
        $time        = microtime(true) - $timeBu;

    }

    public function launchTwoJoin($dbInfos,&$memoryUsage, &$time) {

        $entityManager=$this->setUp($dbInfos);
        $timeBu = microtime(true);
        $memoryBu = memory_get_usage(true);

        /*#################################
                PLACE FOR EXECUTION
         ##################################*/


        $query = $entityManager->createQuery("SELECT t FROM Benchmark\Doctrine2\Models\Tree t JOIN t.lemons l JOIN l.seeds");

        $trees = $query->getResult();


        foreach($trees as $t){

            $lemons = $t->getLemons();

            foreach($lemons as $l){
                $seeds = $l->getSeeds();

                foreach($seeds as $s){
                    $s->getId();
                }

            }

        }



        /*##                             ##*/
        /*#################################*/
       
        
        $memoryUsage = memory_get_usage(true) - $memoryBu;
        $time        = microtime(true) - $timeBu;

    }


    
    
}
