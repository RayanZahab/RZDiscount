# RZDiscount

Implementation of the discount system: On a retail website, the following discounts apply: 
1. If the user is an employee of the store, he gets a 30% discount 
2. If the user is an affiliate of the store, he gets a 10% discount 
3. If the user has been a customer for over 2 years, he gets a 5% discount. 
4. For every $100 on the bill, there would be a $ 5 discount (e.g. for $ 990, you get $ 45 as a discount). 
5. The percentage based discounts do not apply on groceries. 
6. A user can get only one of the percentage based discounts on a bill.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. 

## Prerequisites

1) PHP: This program is written in pure PHP 7
check the official PHP page for info on installation http://php.net/manual/en/install.php

2) PHPUNIT Test: 
All unit tests are written using the PhpUnitTest Framework
Check the official PHP Unit Test page for more info: https://phpunit.de/

## Running the program

After installing an appache server with php
Clone the repository into your hosting server
Access the folder /RZDiscount through any web browser

It will redirect yo uthe /RZDiscount/index.php which contains a sample of the tests of the program

In that page you will see 4 different carts with different items and their details, and the final price according to the customer type


## Running the test

After installing PhpUnit on the server
From the command line type : #vendor/bin/phpunit
### Expected Result:
	................                                                  16 / 16 (100%)

	Time: 23 ms, Memory: 4.00MB

	OK (16 tests, 16 assertions)

### In case of any error, something like this will appear to point out the exact scenario failing :
	........FFFF....                                                  16 / 16 (100%)
	Time: 26 ms, Memory: 4.00MB

	There were 4 failures:

	1) BillTest::testGetFinalPriceOnlyGroceryBelow100 with data set #0 ('Employee', '94')
	Failed asserting that 194.0 matches expected '94'.

	/var/www/html/RZDiscount/phpUnit/Test/BillTest.php:155

	2) BillTest::testGetFinalPriceOnlyGroceryBelow100 with data set #1 ('Affiliate', '94')
	Failed asserting that 194.0 matches expected '94'.

	/var/www/html/RZDiscount/phpUnit/Test/BillTest.php:155

	3) BillTest::testGetFinalPriceOnlyGroceryBelow100 with data set #2 ('Loyal', '94')
	Failed asserting that 194.0 matches expected '94'.

	/var/www/html/RZDiscount/phpUnit/Test/BillTest.php:155

	4) BillTest::testGetFinalPriceOnlyGroceryBelow100 with data set #3 ('Customer', '94')
	Failed asserting that 194.0 matches expected '94'.

	/var/www/html/RZDiscount/phpUnit/Test/BillTest.php:155

	FAILURES!
	Tests: 16, Assertions: 16, Failures: 4.


## Built With

PHP
APACHE
PHPUNIT

## Versioning

https://github.com/RayanZahab/RZDiscount

## Authors

Rayan Al Zahab - rayanzahab@gmail.com

## License

-------

## Acknowledgments

-------