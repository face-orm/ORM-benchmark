<?php

include __DIR__ . "/vendor/autoload.php";


$runner = new \Benchmark\Runner([
    "db-name" => "lemon-bench",
    "host" => "localhost",
    "username" => "root",
    "password" => ""
]);

$redis = new Redis();
$redis->connect("127.0.0.1");

$runner->addTest("Benchmark\PDO\Go");
$runner->addTest("Benchmark\Face\Go");
$runner->addTest("Benchmark\Doctrine2\Go");
$runner->addTest("Benchmark\Idiorm\Go");
$runner->addTest("Benchmark\Propel\Go");
$runner->addTest("Benchmark\Phalcon\Go");

$runner->run();