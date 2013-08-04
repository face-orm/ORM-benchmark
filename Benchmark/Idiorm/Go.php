<?php

namespace Benchmark\Idiorm;

class Go implements \Benchmark\TestInterface{

    public function setup($dbInfos){
        \ORM::configure("mysql:dbname=".$dbInfos["db-name"].";host=".$dbInfos["host"]);
        \ORM::configure('username', $dbInfos["username"]);
        \ORM::configure('password',  $dbInfos["password"]);
    }
    
    public function launchSimple($dbInfos,&$memoryUsage, &$time) {

        $timeBu = microtime(true);
        $memoryBu = memory_get_usage();

        $this->setup($dbInfos);

        \ORM::for_table('tree')->find_many();


        $memoryUsage = memory_get_usage() - $memoryBu;
        $time        = microtime(true) - $timeBu;
    }


    public function launchOneJoin($dbInfos, &$memoryUsage, &$time) {

        $timeBu = microtime(true);
        $memoryBu = memory_get_usage();

        $this->setup($dbInfos);

        $ts=\ORM::for_table('tree')->left_outer_join('lemon', 'tree.id = lemon.tree_id')->find_many();

        $memoryUsage = memory_get_usage() - $memoryBu;
        $time        = microtime(true) - $timeBu;

    }

    public function launchTwoJoin($dbInfos, &$memoryUsage, &$time) {
        $timeBu = microtime(true);
        $memoryBu = memory_get_usage();

        $this->setup($dbInfos);

        $ts=\ORM::for_table('tree')->left_outer_join('lemon', 'tree.id = lemon.tree_id')->left_outer_join('seed', 'lemon.id = seed.lemon_id')->find_many();


        $memoryUsage = memory_get_usage() - $memoryBu;
        $time        = microtime(true) - $timeBu;
    }


    
    
}
