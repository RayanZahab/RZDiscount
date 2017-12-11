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
        echo "lala";
        echo floor(0.9);
        function above100Discount($f)
        {       
            return floor ($f/100) * 5;   
        }
        
        echo "Disc: ".above100Discount(101);
        ?>
    </body>
</html>
