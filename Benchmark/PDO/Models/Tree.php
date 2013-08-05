<?php

namespace Benchmark\PDO\Models;

class Tree {


    public $id;
    public $age;
    public $lemons=array();
    public $leafs=array();
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
    }
    
    public function getLemons() {
        return $this->lemons;
    }

    public function setLemons($lemons) {
        $this->lemons = $lemons;
    }

    public function addLemon($lemons) {
        $this->lemons[] = $lemons;
    }
    

    public function getLeafs() {
        return $this->leafs;
    }

    public function setLeafs($leafs) {
        $this->leafs = $leafs;
    }


    
}