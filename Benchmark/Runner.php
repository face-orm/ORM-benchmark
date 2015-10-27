<?php
/**
 * @license see LICENSE
 */

namespace Benchmark;


use Lavoiesl\PhpBenchmark\Benchmark;

class Runner {

    /**
     * @var TestInterface[]
     */
    protected $test = [];

    protected $dbInfos;

    public function __construct($dbInfos){
        $this->dbInfos = $dbInfos;
    }

    public function addTest($test){
        $this->test[] = $test;
    }


    public function run(){

        $testers = [

            "no join" => function($testInstance){
                $testInstance->launchSimple();
            },

            "1 join" => function($testInstance){
                $testInstance->launchOneJoin();
            },

            "2 joins" => function($testInstance){
                $testInstance->launchTwoJoin();
            }

        ];

        foreach($testers as $testName => $t) {
            $benchmark = new Benchmark();
            $benchmark->setCount(10);

            foreach ($this->test as $test) {

                /* @var $testInstance \Benchmark\TestInterface */
                $testInstance = new $test($this->dbInfos);

                $benchmark->add(
                    $testInstance->getName() . ": $testName  ",
                    function () use ($t, $testInstance) {
                        $t($testInstance);
                    }
                );
            }

            echo PHP_EOL;
            echo "Testing $testName \n";
            echo "==========\n";
            $benchmark->run();

        }

    }
}