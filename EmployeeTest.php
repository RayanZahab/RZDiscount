<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include  'User.php';
        include  'Bill.php';
        error_reporting(-1);
ini_set('display_errors', 'On');
        use PHPUnit\Framework\TestCase;
        
        $items = array();
        $items[] = ItemFactory::build("Grocery", "Banana","20");
        $items[] = ItemFactory::build("Electronic", "TV","900");
        $items[] = ItemFactory::build("Others", "Blanket","230");
        $items[] = ItemFactory::build("Cleaners", "Soap","14");
        echo "<pre>";
        echo "raaay";
        echo phpversion(); 
        
        echo "The Cart: <BR>";
        print_r($items);
        echo "===============================<BR>";
        echo "The Employee Summary: <br>";      
        $employee = new Employee();
        $emp_bill = new Bill($employee);
        $emp_bill->addItems($items);

        
        echo "Total : ".$emp_bill->getTotal() ."<br>";
        echo "Disc Total : ".$emp_bill->getTotalOfDiscountableItems() ."<br>";
        echo "Final : ".$emp_bill->getFinalPrice() ."<br>";
        echo "===============================<BR>";
        
        
        echo "The Affiliate Summary: <br>";
        $affiliate = new Affiliate();
        $af_bill = new Bill($affiliate);
        $af_bill->addItems($items);
        echo "Total : ".$af_bill->getTotal() ."<br>";
        echo "Disc Total : ".$af_bill->getTotalOfDiscountableItems() ."<br>";
        echo "Final : ".$af_bill->getFinalPrice() ."<br>";
        echo "===============================<BR>";
        
        echo "The Loyal Customer Summary: <br>";
        $loyal = new Customer("1999");
        $loyal_bill = new Bill($loyal);
        $loyal_bill->addItems($items);
        echo "Total : ".$loyal_bill->getTotal() ."<br>";
        echo "Disc Total : ".$loyal_bill->getTotalOfDiscountableItems() ."<br>";
        echo "Final : ".$loyal_bill->getFinalPrice() ."<br>";
        echo "===============================<BR>";
        
        echo "The New Customer Summary: <br>";
        $customer = new Customer();
        $cust_bill = new Bill($customer);
        $cust_bill->addItems($items);
        echo "Total : ".$cust_bill->getTotal() ."<br>";
        echo "Disc Total : ".$cust_bill->getTotalOfDiscountableItems() ."<br>";
        echo "Final : ".$cust_bill->getFinalPrice() ."<br>";
        echo "===============================<BR>";
        
        
        ?>
    </body>
</html>