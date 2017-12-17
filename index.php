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
        
        <table border="1" width="80%"  style="text-align: center;">
            <thead>
                <tr>
                    <th colspan="4">Examples</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="employee.png" width="100" alt="Employee"/></td>
                    <td><img src="affiliate.svg" width="100" alt="Affiliate"/></td>
                    <td><img src="customer.jpg" width="100" alt="Loyal Customer"/></td>
                    <td><img src="customer.jpg" width="100" alt="New Customer"/></td>
                </tr>
        
        <?php
        require_once(  'phpUnit/ItemFactory.php');
        require_once(  'phpUnit/Employee.php');
        require_once(  'phpUnit/Customer.php');
        require_once(  'phpUnit/Affiliate.php');
        require_once(  'phpUnit/Affiliate.php');
        require_once(  'phpUnit/Bill.php');
        error_reporting(-1);
        ini_set('display_errors', 'On');
        $carts = array();

        //First cart: Mixed cart with grocery, and above 100
        $items = array();
        $items[] = ItemFactory::build("Grocery", "Banana","20");
        $items[] = ItemFactory::build("Electronic", "TV","900");
        $items[] = ItemFactory::build("Others", "Blanket","230");
        $items[] = ItemFactory::build("Cleaners", "Soap","14");

        $carts[]=$items;
        //First cart: Mixed cart with grocery, and below 100
        $items = array();
        $items[] = ItemFactory::build("Grocery", "Banana","20");
        $items[] = ItemFactory::build("Electronic", "Cable","10");
        $items[] = ItemFactory::build("Others", "Cup","3.5");
        $items[] = ItemFactory::build("Cleaners", "Soap","14");

        $carts[]=$items;

        //First cart: Cart with only grocery, and above 100
        $items = array();
        $items[] = ItemFactory::build("Grocery", "Banana","20");
        $items[] = ItemFactory::build("Grocery", "Apple","60");
        $items[] = ItemFactory::build("Grocery", "Soap","30");

        $carts[]=$items;

        //First cart: Cart with only grocery, and below 100
        $items = array();
        $items[] = ItemFactory::build("Grocery", "Banana","20");
        $items[] = ItemFactory::build("Grocery", "Apple","60");
        $items[] = ItemFactory::build("Grocery", "Soap","14");

        $carts[]=$items;


        $clients = array("Employee","Affiliate","Loyal","Customer");



        foreach($carts as $cart)
        {
        ?>
            <tr style="    background-color: lightgray;"><td colspan='4' > <pre><?php echo printItems($cart);?></pre></td></tr>
            <tr style="    font-weight: bold;">
                <td>Employee</td>
                <td>Affiliate</td>
                <td>Loyal Customer</td>
                <td>New Customer</td>
            </tr>
            <tr>
            <?php 
            foreach($clients as $clientType)
            {
                if(class_exists($clientType))
                {
                    $client = new $clientType();
                    
                }
                else
                {
                    if($clientType === "Loyal")
                    {
                        $three_years_ago = date("Y") -3;
                        $client = new Customer($three_years_ago);
                    }
                    else
                    {
                        $client = new $clientType();
                    }
                }
                $bill = new Bill($client);
                $bill->addItems($cart);
                $finalPrice = $bill->getFinalPrice();
                ?>
                <td > 
                <?php
                echo $finalPrice;
                ?>
                </td>
            <?php
            }
            ?>
            </tr>
            <?php
        }

        function printItems($items)
        {
            $text = "<b>Cart Contqains: </b>";
            foreach ($items as $item){
                $text = $text . " [ ".$item->getName()."( ".get_class($item). ") for: ".$item->getPrice()."] ,";
            }
            return $text;
            
        }
        ?>



            </tbody>
        </table>
    </body>
</html>
