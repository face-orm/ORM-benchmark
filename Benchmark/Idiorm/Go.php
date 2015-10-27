<?php

namespace Benchmark\Idiorm;

class Go implements \Benchmark\TestInterface{

    public function getName(){
        return "IDIORM";
    }

    public function __construct($dbInfos){
        \ORM::configure("mysql:dbname=".$dbInfos["db-name"].";host=".$dbInfos["host"]);
        \ORM::configure('username', $dbInfos["username"]);
        \ORM::configure('password',  $dbInfos["password"]);
    }
    
    public function launchSimple() {
        \ORM::for_table('tree')->find_many();
    }


    public function launchOneJoin() {
        $ts=\ORM::for_table('tree')->left_outer_join('lemon', 'tree.id = lemon.tree_id')->find_many();
    }

    public function launchTwoJoin() {
        $ts=\ORM::for_table('tree')->left_outer_join('lemon', 'tree.id = lemon.tree_id')->left_outer_join('seed', 'lemon.id = seed.lemon_id')->find_many();
    }

    
}
