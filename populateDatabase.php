<?php

include __DIR__ . "/vendor/autoload.php";


$dbInfos = [
    "db-name" => "lemon-bench",
    "host" => "localhost",
    "username" => "root",
    "password" => ""
];


$numberOfTrees  = 200;
$numberOfLemons = 300;
$numberOfSeeds  = 500;


$pdo = new PDO(
    "mysql:dbname=".$dbInfos["db-name"].";host=".$dbInfos["host"],
    $dbInfos["username"],
    $dbInfos["password"]
);



$faker = \Faker\Factory::create();


// TREES
$query = $pdo->prepare("INSERT INTO tree(id, age) VALUES (:id, :age)");
echo PHP_EOL;
for($i = 0; $i < $numberOfTrees; $i++){

    $current = $i+1;

    echo "\rinserting tree $current/$numberOfTrees";

    $query->bindValue(":id", $i);
    $query->bindValue(":age", $faker->numberBetween(1, 500));
    $query->execute();

}
echo PHP_EOL;


$query = $pdo->prepare("INSERT INTO lemon(id, tree_id, mature) VALUES (:id, :tree_id, :mature)");
echo PHP_EOL;
for($i = 0; $i < $numberOfLemons; $i++){

    $current = $i+1;

    echo "\rinserting lemon $current/$numberOfLemons";

    $query->bindValue(":id", $i);
    $query->bindValue(":tree_id", $faker->numberBetween(1, $numberOfTrees));
    $query->bindValue(":mature", $faker->numberBetween(0, 1));
    $query->execute();

}
echo PHP_EOL;

$query = $pdo->prepare("INSERT INTO seed(id, lemon_id, fertil) VALUES (:id, :lemon_id, :fertil)");
echo PHP_EOL;
for($i = 0; $i < $numberOfSeeds; $i++){

    $current = $i+1;

    echo "\rinserting seed $current/$numberOfSeeds";

    $query->bindValue(":id", $i);
    $query->bindValue(":lemon_id", $faker->numberBetween(1, $numberOfLemons));
    $query->bindValue(":fertil", $faker->numberBetween(0, 1));
    $query->execute();

}
echo PHP_EOL;
