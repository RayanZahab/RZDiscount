<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Rzahab
 */
abstract class User {
    public abstract function getDiscount();
}

class Employee extends User{
    
     public function getDiscount($discountable_total) {
         return 0.3*$discountable_total;
        
    }

}
class Affiliate extends User{
    
     public function getDiscount($discountable_total) {
        return 0.1*$discountable_total;
    }

}

class Customer extends User{
    public $year_joined;
    
    public function __construct($_year_joined = Null){
        $this->year_joined = ( is_null($_year_joined))? date("Y"): $_year_joined;
        $this->setLoyalty();
    }
    
    public function getDiscount($discountable_total) {
        return isLoyal()? 0.05*$discountable_total: 0;
    }

    public function isLoyal() {
        return (date("Y") - $this->year_joined >2);
    }

}

