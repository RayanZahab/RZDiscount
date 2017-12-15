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
 require_once(  'Item.php');
class Item_Electronic extends Item {

    public function __construct($_name, $_price) {
        parent::__construct($_name, $_price);
    }

    public function isDiscountable() {
        return true;
    }
    public function __toString()
    {
        return "Electronics ".$this->name. " ==> ".$this->price;
    }


}