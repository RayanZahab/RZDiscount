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
    
    public function getFinalPrice()
    {
        $customer = new Employee();
        $customer_discount = $customer->getDiscount($this->getTotalOfDiscountableItems());
        
        $this->total = $this->getTotal() - $customer_discount;
        
        return $final_price = $this->$total - above100Discount($total);
        
    }
    
    public function above100Discount()
    {       
        return floor ($this->$final_price/100) * 5;   
    }
    
    public function getTotal()
    {
        $total = 0;
        foreach($items as $item)
        {
            $total =+ $item->getPrice();                     
        }
    }
    
    public function getTotalOfDiscountableItems()
    {
        $discountable_total = 0;
        foreach($items as $item)
        {
            if($item->isDiscountable())
            {
                $discountable_total =+ $item->getPrice();
            }
        }
        return $discountable_total;
    }
}

class Item {
    public $name;
    public $price;
    public $type;
    
    public function __construct($_name,$_price,$_type) {
        $this->$name = $_name;
        $this->$price = $_price;
        #This is an ItemType
        $this->$type = $_type;
    }
    
    public function getPrice()
    {
        return $price();
    }
}

abstract class ItemType{
    abstract public function isDiscountable();
}

class Grocery extends ItemType{
    public function __construct(){}
    public function isDiscountable() {
        return false;
    }
}
class Electronic extends ItemType{
    public function __construct(){}
    public function isDiscountable() {
        return true;
    }
}
class Others extends ItemType{
    public function __construct(){}
    public function isDiscountable() {
        return true;
    }
}