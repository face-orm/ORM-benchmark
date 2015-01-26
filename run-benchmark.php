<?php

if(isset($argv[1])){
    include 'vendor/autoload.php';

    $subNameSpace=$argv[1];

    $className = "Benchmark\\".$subNameSpace."\Go";

    $a = new $className();

    $time;
    $memory;

    /* @var $a Benchmark\TestInterface */

    switch ($argv[2]){
        case "simple":
            $a->launchSimple(array(
                    "db-name"   =>"lemon-test",
                    "host"      =>"localhost",
                    "username"  =>"root",
                    "password"  =>""
                ),
                $memory,
                $time
            );
            break;

        case "1join":
            $a->launchOneJoin(array(
                    "db-name"   =>"lemon-test",
                    "host"      =>"localhost",
                    "username"  =>"root",
                    "password"  =>""
                ),
                $memory,
                $time
            );
            break;
        case "2join":
            $a->launchTwoJoin(array(
                    "db-name"   =>"lemon-test",
                    "host"      =>"localhost",
                    "username"  =>"root",
                    "password"  =>""
                ),
                $memory,
                $time
            );
            break;
    }
    echo sprintf("| %10s |%8s | %11.4f kB  | %10.5f ms  |\n",$subNameSpace,$argv[2],$memory/1000,$time*1000);




}