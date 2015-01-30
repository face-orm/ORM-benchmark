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

    public function setUp($dbInfos){

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


    public function launchSimple($dbInfos,&$memoryUsage, &$time) {



        $timeBu = microtime(true);
        $memoryBu = memory_get_usage(true);

        /*#################################
                PLACE FOR EXECUTION
         ##################################*/

        $this->setUp($dbInfos);

        $q = new TreeQuery();
        $trees = $q->find();


        /*##                             ##*/
        /*#################################*/


        $memoryUsage = memory_get_usage(true) - $memoryBu;
        $time        = microtime(true) - $timeBu;


    }


    public function launchOneJoin($dbInfos, &$memoryUsage, &$time) {
        $timeBu = microtime(true);
        $memoryBu = memory_get_usage(true);

        /*#################################
                PLACE FOR EXECUTION
         ##################################*/

        $this->setUp($dbInfos);

        $q = new TreeQuery();
        $q->joinLemon();
        $trees = $q->find();



        /*##                             ##*/
        /*#################################*/


        $memoryUsage = memory_get_usage(true) - $memoryBu;
        $time        = microtime(true) - $timeBu;
    }

    public function launchTwoJoin($dbInfos, &$memoryUsage, &$time) {
        $timeBu = microtime(true);
        $memoryBu = memory_get_usage(true);

        /*#################################
                PLACE FOR EXECUTION
         ##################################*/

        $this->setUp($dbInfos);

        $q = new TreeQuery();
        $q->joinLemon();
        $q->useLemonQuery()->joinSeed();

        $trees = $q->find();



        /*##                             ##*/
        /*#################################*/


        $memoryUsage = memory_get_usage(true) - $memoryBu;
        $time        = microtime(true) - $timeBu;
    }


    
    
}
