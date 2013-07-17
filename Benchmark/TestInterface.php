<?php

namespace Benchmark;

/**
 *
 * @author bobito
 */
interface TestInterface {
    
    public function launch($dbInfo,&$memoryUsage,&$time);
    
    public function type();
    
}

?>
