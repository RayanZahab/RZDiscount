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

class Employee extends User{
    
     public function getDiscount($discountable_total) {
         return 0.3*$discountable_total;
        
    }

}