<?php

require_once(  '/var/www/html/RZDiscount/phpUnitTutorial/ItemFactory.php');

class BillTest extends \PHPUnit_Framework_TestCase
{
    
	public function providerTestFinalPrice()
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
     * @dataProvider providerTestFinalPrice
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
                $thre_years_ago = date("Y") -3;
                $client = new Customer(thre_years_ago);
            }
            else
            {
                $client = new $clientType();
            }
        }
        $bill = new Bill($client);
        $bill->addItems($items);

        $items = array();
        $items[] = ItemFactory::build("Grocery", "Banana","20");
        $items[] = ItemFactory::build("Electronic", "TV","900");
        $items[] = ItemFactory::build("Others", "Blanket","230");
        $items[] = ItemFactory::build("Cleaners", "Soap","14");

        $result = $bill->getFinalPrice();
        $this->assertEquals($expectedResult, $result);

    }

}