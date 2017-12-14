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
include  'Item.php';
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

