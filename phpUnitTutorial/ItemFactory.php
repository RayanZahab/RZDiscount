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
require_once(    'Item_Grocery.php');
require_once(    'Item_Others.php');
require_once(    'Item_Electronic.php');
class ItemFactory {
 
    public static function build($product_type, $name, $price)
    {
        echo $product = "Item_" . ucwords($product_type);
        if(class_exists($product))
        {
          return new $product($name, $price);
        }
        else {
            return ItemFactory::build("Others",$name,$price);
        }
    }
}