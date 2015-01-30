<?php

namespace Benchmark\Doctrine2\Models;

/** @Entity
 *  @Table(name="tree")
 *  **/
class Tree {

    /** @Id @GeneratedValue @Column(type="integer") **/
    public $id;
    /** @Column(type="integer") **/
    public $age;

    /** @OneToMany(targetEntity="Benchmark\Doctrine2\Models\Lemon", mappedBy="tree") */
    public $lemons=array();

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

    
}