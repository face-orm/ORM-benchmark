<?php

include 'vendor/autoload.php';

$subNameSpace=$argv[1];

$className = "Benchmark\\".$subNameSpace."\Go";

$a = new $className();

$time;
$memory;

$a->launch(array(
        "db-name"   =>"lemon-test",
        "host"      =>"localhost",
        "username"  =>"root",
        "password"  =>"root"
    ),
    $memory,
    $time
);

$type = $a->type();

echo sprintf(" %10s |%8s | %11.4f kB  | %10.5f ms  |\n",$subNameSpace,$type,$memory/1000,$time*1000);