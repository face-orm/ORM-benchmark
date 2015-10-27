<?php

namespace Benchmark\Doctrine2;

use Doctrine\Common\Cache\RedisCache;
use Doctrine\ORM\EntityManager;

class Go implements \Benchmark\TestInterface{

    /**
     * @var EntityManager
     */
    protected $entityManager;

    public function getName(){
        return "DOCTRINE";
    }

    public function __construct($dbInfos){
        $dbParams = array(
            'driver' => 'pdo_mysql',
            'user' => $dbInfos["username"],
            'password' =>  $dbInfos["password"],
            'dbname' => $dbInfos["db-name"]
        );

        $redis = new \Redis();
        $redis->connect("127.0.0.1");

        $cache = new RedisCache();
        $cache->setRedis($redis);

        $path = __DIR__.'/Models';
        $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(array($path), false, null, $cache);
        $entityManager = \Doctrine\ORM\EntityManager::create($dbParams, $config);
        $this->entityManager = $entityManager;
    }


    
    public function launchSimple() {

        $entityManager = $this->entityManager;
        $trees = $entityManager->getRepository("Benchmark\Doctrine2\Models\Tree")->findAll();
        foreach($trees as $t){
            $t->getId();
        }

    }
    
    public function launchOneJoin() {

        $entityManager = $this->entityManager;
        $query = $entityManager->createQuery("SELECT t FROM Benchmark\Doctrine2\Models\Tree t JOIN t.lemons");
        $trees = $query->getResult();
        foreach($trees as $t){
            $lemons = $t->getLemons();
            foreach($lemons as $l){
                 $l->getId();
            }
        }

    }

    public function launchTwoJoin() {

        $entityManager = $this->entityManager;
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
    }


    
    
}
