<?php

if(isset($argv[1])){
    include 'vendor/autoload.php';

    $subNameSpace=$argv[1];

    $className = "Benchmark\\".$subNameSpace."\Go";

    $a = new $className();


    $repeat = 1;

    $run = function($numberOfTimes,$cb){




        $minTime = null;
        $maxTime = null;

        $allMem  = 0;
        $allTime = 0;

        for($i = 0;$i < $numberOfTimes;$i++) {

            $memory = 0;
            $time = 0;

            $r = call_user_func($cb, array(
                    "db-name" => "lemon-bench",
                    "host" => "localhost",
                    "username" => "root",
                    "password" => ""
                )
            );

            $memory = $r[0];
            $time   = $r[1];


            $allMem+= $memory;
            $allTime+= $time;


            if(null == $minTime || $minTime > $time ){
                $minTime = $time;
            }

            if(null == $maxTime || $maxTime < $time ){
                $maxTime = $time;
            }
        }

        return [



            "minTime" => $minTime*1000,
            "maxTime" => $maxTime*1000,

            "avgMem"  => ($allMem)/1000,
            "avgTime" => ($allTime/$numberOfTimes)*1000

        ];

    };


    /* @var $a Benchmark\TestInterface */

    switch ($argv[2]){
        case "simple":

            $stats = $run($repeat,function($db) use ($a){
                $a->launchSimple($db,
                    $memory,
                    $time
                );
                return [$memory,$time];

            });


            break;

        case "1join":

            $stats = $run($repeat,function($db) use ($a){

                $a->launchOneJoin($db,
                    $memory,
                    $time
                );

                return [$memory,$time];

            });

            break;
        case "2join":

            $stats = $run($repeat,function($db) use ($a){

                $a->launchTwoJoin($db,
                    $memory,
                    $time
                );

                return [$memory,$time];

            });

            break;
    }


    echo sprintf("| %10s |%8s | %9.4f kB    | %7.4f %8.5f %7.4f ms  |\n",$subNameSpace,$argv[2],
        $stats["avgMem"],
        $stats["minTime"],$stats["avgTime"],$stats["maxTime"]);




}