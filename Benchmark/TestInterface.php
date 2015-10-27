<?php

namespace Benchmark;

/**
 *
 * @author bobito
 */
interface TestInterface {

    public function __construct($dbInfos);

    public function launchSimple();
    
    public function launchOneJoin();
    
    public function launchTwoJoin();
    
    public function getName();

}
