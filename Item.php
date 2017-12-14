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

class ItemFactory {
 
    public static function build($product_type, $name, $price)
    {
        $product = "Item_" . ucwords($product_type);
        if(class_exists($product))
        {
          return new $product($name, $price);
        }
        else {
            return ItemFactory::build("Others",$name,$price);
        }
    }
}


class Item_Grocery extends Item {

    public function __construct($_name, $_price) {
        parent::__construct($_name, $_price);
    }

    public function isDiscountable() {
        return false;
    }
    
    public function __toString()
    {
        return "Grocery ".$this->name. " ==> ".$this->price ." Discountable: ".$this->isDiscountable();
    }

}

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

class Item_Others extends Item {

    public function __construct($_name, $_price) {
        parent::__construct($_name, $_price);
    }

    public function isDiscountable() {
        return true;
    }
    public function __toString()
    {
        return "Others ".$this->name. " ==> ".$this->price;
    }

}
