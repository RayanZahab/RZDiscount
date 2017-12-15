<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Item
 *
 * @author Rzahab
 */

abstract class Item {

    public $name="";
    public $price="";
    abstract public function isDiscountable();

    public function __construct($_name, $_price) {
        $this->name = $_name;
        $this->price = $_price;
    }

    public function getPrice() {
        return $this->price;
    }
    
    public function getName() {
        return $this->name;
    }

}