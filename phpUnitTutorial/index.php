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
        
        <table border="1" width="80%">
            <thead>
                <tr>
                    <th colspan="3">Who are you?</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td>Employee</td>
                    <td>Affiliate</td>
                    <td>Customer</td>
                </tr>
                <tr>
                    <td><img src="employee.png" width="100" alt="Employee"/></td>
                    <td><img src="affiliate.svg" width="100" alt="Affiliate"/></td>
                    <td><img src="customer.jpg" width="100" alt="Customer"/></td>
                </tr>
            </tbody>
        </table>

        

        
        
        
        <?php
        echo "lala";
        echo floor(0.9);
        function above100Discount($f)
        {       
            return floor ($f/100) * 5;   
        }
        
        echo "Disc: ".above100Discount(101);
        
        $b = array();
        $b[]="a";
        $c = [];
        
        $c[]="c1";
        $c[]="c2";
        
        //$b[]=$c;
        $b = array_merge($b,(array)$c);
        print_r($b);
        $b = array_merge($b,(array)"shi");
        print_r($b);
        ?>
    </body>
</html>
