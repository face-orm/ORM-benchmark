<?php
/**
 * @license see LICENSE
 */

namespace Benchmark;

class Timer {

    protected $startTime;
    protected $currentTime = 0;

    /**
     * @var Timer[]
     */
    protected $steps = [];


    public function start($what = null){

        if($what){
            if(!isset($this->steps[$what])) {
                $this->steps[$what] = new self();
            }
            $this->steps[$what]->start();
        }else{
            $this->startTime = microtime(true);
        }

    }

    public function stop($what = null){

        if($what){
            $this->steps[$what]->stop();
        }else{
            $this->currentTime  += microtime(true) - $this->startTime;
        }
    }

    public function getTime(){
        return ($this->currentTime) * 1000;
    }

    public function dump(){

        echo "Running Time: " . $this->getTime();

        echo PHP_EOL;
        foreach($this->steps as $stepName => $step){
            echo "  | $stepName: " . $step->getTime();
            echo PHP_EOL;
        }


    }

}