<?php

foreach (glob("/var/www/html/RZDiscount/phpUnitTutorial/*.php") as $filename)
{
    require_once( $filename);
}
class BillTest extends \PHPUnit_Framework_TestCase
{
    
    public function providerTestGetFinalPrice()
    {
        return array(
            array("Employee","780.8"),
            array("Affiliate","999.6"),
            array("Loyal","1051.8"),
            array("Customer","1109"),
        );
    }

    /**
     * @param string $clientType String to be sluggified
     * @param string $expectedResult What we expect our last price to be
     * @dataProvider providerTestGetFinalPrice
     */
    public function testGetFinalPrice($clientType, $expectedResult)
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

        $items = array();
        $items[] = ItemFactory::build("Grocery", "Banana","20");
        $items[] = ItemFactory::build("Electronic", "TV","900");
        $items[] = ItemFactory::build("Others", "Blanket","230");
        $items[] = ItemFactory::build("Cleaners", "Soap","14");
        $bill->addItems($items);

        $result = $bill->getFinalPrice();
        $this->assertEquals($expectedResult, $result);

    }


    
    public function providerTestGetFinalPriceBelow100()
    {
        return array(
            array("Employee","39.25"),
            array("Affiliate","44.75"),
            array("Loyal","46.125"),
            array("Customer","47.5"),
        );
    }

    /**
     * @param string $clientType String to be sluggified
     * @param string $expectedResult What we expect our last price to be
     * @dataProvider providerTestGetFinalPriceBelow100
     */
    public function testGetFinalPriceBelow100($clientType, $expectedResult)
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

        $items = array();
        $items[] = ItemFactory::build("Grocery", "Banana","20");
        $items[] = ItemFactory::build("Electronic", "Cable","10");
        $items[] = ItemFactory::build("Others", "Cup","3.5");
        $items[] = ItemFactory::build("Cleaners", "Soap","14");
        $bill->addItems($items);

        $result = $bill->getFinalPrice();
        $this->assertEquals($expectedResult, $result);

    }



    public function providerTestGetFinalPriceOnlyGroceryBelow100()
        {
            return array(
                array("Employee","94"),
                array("Affiliate","94"),
                array("Loyal","94"),
                array("Customer","11"),
            );
        }

    /**
     * @param string $clientType String to be sluggified
     * @param string $expectedResult What we expect our last price to be
     * @dataProvider providerTestGetFinalPriceOnlyGroceryBelow100
     */
    public function testGetFinalPriceOnlyGroceryBelow100($clientType, $expectedResult)
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

        $items = array();
        $items[] = ItemFactory::build("Grocery", "Banana","20");
        $items[] = ItemFactory::build("Grocery", "Apple","60");
        $items[] = ItemFactory::build("Grocery", "Soap","14");
        $bill->addItems($items);

        $result = $bill->getFinalPrice();
        $this->assertEquals($expectedResult, $result);

    }


    public function providerTestGetFinalPriceOnlyGroceryAbove100()
    {
        return array(
            array("Employee","105"),
            array("Affiliate","105"),
            array("Loyal","105"),
            array("Customer","105"),
        );
    }

    /**
    * @param string $clientType String to be sluggified
    * @param string $expectedResult What we expect our last price to be
    * @dataProvider providerTestGetFinalPriceOnlyGroceryAbove100
    */
    public function testGetFinalPriceOnlyGroceryAbove100($clientType, $expectedResult)
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

        $items = array();
        $items[] = ItemFactory::build("Grocery", "Banana","20");
        $items[] = ItemFactory::build("Grocery", "Apple","60");
        $items[] = ItemFactory::build("Grocery", "Soap","30");
        $bill->addItems($items);

        $result = $bill->getFinalPrice();
        $this->assertEquals($expectedResult, $result);

    }

}