<?php
require_once("User.php");

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

class Customer extends User{
    public $year_joined;
    protected $loyal;


    public function __construct($_year_joined = Null){
        $this->year_joined = ( is_null($_year_joined))? date("Y"): $_year_joined;
        $this->setLoyalty();
    }
    private function setLoyalty()
    {
        $this->loyal = (date("Y") - $this->year_joined > 2);
    }
    
    public function getDiscount($discountable_total) {
        return $this->isLoyal()? 0.05*$discountable_total: 0;
    }

    public function isLoyal() {
        return $this->loyal;
    }

}

