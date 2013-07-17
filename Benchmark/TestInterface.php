<?php

namespace Benchmark;

/**
 *
 * @author bobito
 */
interface TestInterface {
    
    public function launchSimple($dbInfo,&$memoryUsage,&$time);
    
    public function launchOneJoin($dbInfo,&$memoryUsage,&$time);
    
    public function launchTwoJoin($dbInfo,&$memoryUsage,&$time);
    
    
}

?>
