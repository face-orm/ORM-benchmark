<?php





$sepline = str_replace(" ","-",sprintf("| %10s |%8s | %11.4s     | %24.5s     |\n","","","",""));
$emptyLine = sprintf("| %10s |%8s | %11s     | %24s     |\n","","","","");

echo PHP_EOL;

echo $sepline;
echo sprintf("| %10s |%8s | %11s     |       %16s %2s    |\n","Library  ","TypeTest","Memory","Time min/avg/max","");
echo $sepline;


echo sprintf("| %-53s                 |\n","Structure aware ORM");
echo $sepline;
echo $emptyLine;

passthru("php run-benchmark.php Face simple");
passthru("php run-benchmark.php Face 1join");
passthru("php run-benchmark.php Face 2join");

echo $emptyLine;

passthru("php run-benchmark.php Doctrine2 simple");
passthru("php run-benchmark.php Doctrine2 1join");
passthru("php run-benchmark.php Doctrine2 2join");


echo $emptyLine;

passthru("php run-benchmark.php Propel simple");
passthru("php run-benchmark.php Propel 1join");
passthru("php run-benchmark.php Propel 2join");


echo $emptyLine;
echo $sepline;
echo sprintf("| %-53s                 |\n","Intermediate ORM");
echo $sepline;

echo $emptyLine;

passthru("php run-benchmark.php Phalcon simple");
//passthru("php run-benchmark.php Phalcon 1join");
//passthru("php run-benchmark.php Phalcon 2join");

echo $emptyLine;
echo $sepline;
echo sprintf("| %-53s                 |\n","Simple ORM");
echo $sepline;


echo $emptyLine;

passthru("php run-benchmark.php Idiorm simple");
passthru("php run-benchmark.php Idiorm 1join");
passthru("php run-benchmark.php Idiorm 2join");

echo $emptyLine;
echo $sepline;
echo sprintf("| %-53s                 |\n","No ORM");
echo $sepline;

echo $emptyLine;

passthru("php run-benchmark.php PDO simple");
passthru("php run-benchmark.php PDO 1join");
passthru("php run-benchmark.php PDO 2join");

echo $emptyLine;
echo $sepline;

echo PHP_EOL;
