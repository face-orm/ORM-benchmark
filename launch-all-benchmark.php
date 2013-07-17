<?php
$sepline = str_replace(" ","-",sprintf("| %10s |%8s | %11.4s     | %10.5s     |\n","","","",""));

echo PHP_EOL;

echo $sepline;
echo sprintf("| %10s |%8s | %11s     | %10s     |\n","Library  ","TypeTest","Memory","Time ");
echo $sepline;

passthru("php run-benchmark.php Face simple");
passthru("php run-benchmark.php Face 1join");
passthru("php run-benchmark.php Face 2join");

passthru("php run-benchmark.php Doctrine2 simple");
passthru("php run-benchmark.php Doctrine2 1join");
passthru("php run-benchmark.php Doctrine2 2join");

passthru("php run-benchmark.php Falcon simple");

echo $sepline;

echo PHP_EOL;