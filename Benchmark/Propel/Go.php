<?php

namespace Benchmark\Propel;

use Benchmark\Propel\Models\LemonQuery;
use Benchmark\Propel\Models\TreeQuery;
use Doctrine\DBAL\Driver\PDOConnection;
use Propel\Runtime\Adapter\Pdo\MysqlAdapter;
use Propel\Runtime\Connection\ConnectionFactory;
use Propel\Runtime\Connection\ConnectionManagerSingle;
use Propel\Runtime\Connection\PropelPDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ServiceContainer\StandardServiceContainer;
use Symfony\Component\Yaml\Yaml;

class Go implements \Benchmark\TestInterface{

    public function __construct($dbInfos){

        $serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
        $serviceContainer->setAdapterClass('lemon-test', 'mysql');
        $manager = new \Propel\Runtime\Connection\ConnectionManagerSingle();
        $manager->setConfiguration(array (
            'classname' => 'Propel\\Runtime\\Connection\\DebugPDO',
            "dsn"  => "mysql:dbname=".$dbInfos["db-name"].";host=".$dbInfos["host"],
            "user" => $dbInfos["username"],
            "password" => $dbInfos["password"]
        ));
        $manager->setName('lemon-test');
        $serviceContainer->setConnectionManager('lemon-test', $manager);
        $serviceContainer->setDefaultDatasource('lemon-test');

    }

    public function getName(){
        return "PROPEL";
    }


    public function launchSimple() {
        $q = new TreeQuery();
        $trees = $q->find();

        foreach($trees as $t){
            $t->getId();
        }
    }


    public function launchOneJoin() {
        $q = new TreeQuery();
        $q->useLemonQuery();
        $trees = $q->find();

        foreach($trees as $t){

            $lemons = $t->getLemons();

            foreach($lemons as $l){
                $l->getId();

            }

        }
    }

    public function launchTwoJoin() {
        $q = new TreeQuery();
        $q->joinLemon();
        $q->useLemonQuery()->joinSeed();

        $trees = $q->find();

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
