<?php

namespace Benchmark\Doctrine2\Models;

/** @Entity
 *  @Table(name="lemon")
 *  **/
class Lemon {

    /** @Id @GeneratedValue @Column(type="integer") **/
    public $id;
    /** @Column(type="integer") **/
    public $tree_id;
    /** @Column(type="integer") **/
    public $mature;
    /** @ManyToOne(targetEntity="Benchmark\Doctrine2\Models\Tree") **/
    public $tree;
    /** @OneToMany(targetEntity="Benchmark\Doctrine2\Models\Seed", mappedBy="lemon") */
    public $seeds=array();
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTree_id() {
        return $this->tree_id;
    }

    public function setTree_id($tree_id) {
        $this->tree_id = $tree_id;
    }

    public function getMature() {
        return $this->mature;
    }

    public function setMature($mature) {
        $this->mature = $mature;
    }

    
    public function getTree() {
        return $this->tree;
    }

    public function setTree($tree) {
        $this->tree = $tree;
    }
    
    public function getSeeds() {
        return $this->seeds;
    }

    public function setSeeds($seeds) {
        $this->seeds = $seeds;
    }


}