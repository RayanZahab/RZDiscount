<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bill
 *
 * @author Rzahab
 */
class Bill {

    //Array of Items
    protected $items;
    //An instance of User
    protected $customer;
    protected $total;
    protected $final_price;

    public function __construct($_customer) {
        $this->customer = $_customer;
        $this->items = array();
    }

    /**
     * 
     * @param Item $item : It can be a single Item or an Array of Items
     */
    public function addItems(array $item) {
        $this->items = array_merge($this->items, (array) $item);
    }

    public function getFinalPrice() {
        $customer_discount = $this->customer->getDiscount($this->getTotalOfDiscountableItems());

        $this->total = $this->getTotal() - $customer_discount;

        return $final_price = $this->total - $this->above100Discount($this->total);
    }

    public function above100Discount() {
        echo "above:".floor($this->total / 100) * 5 ."<BR>";
        return floor($this->total / 100) * 5;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }
        return $total;
    }

    public function getTotalOfDiscountableItems() {
        $discountable_total = 0;
        foreach ($this->items as $item) {
            if ($item->isDiscountable()) {
                $discountable_total += $item->getPrice();
            }
        }
        return $discountable_total;
    }

}

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
