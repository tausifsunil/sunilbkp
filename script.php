<?php

use Magento\Framework\App\Bootstrap;
require 'app/bootstrap.php';
$bootstrap = Bootstrap::create(BP, $_SERVER);
$objectManager = $bootstrap->getObjectManager();
$state = $objectManager->get('Magento\Framework\App\State');
$state->setAreaCode('frontend');




$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
    $priceHelper = $objectManager->create('Magento\Framework\Pricing\PriceCurrencyInterface'); 
    echo  $priceHelper->convertAndFormat($amount); //₹100.00
    echo "<br>";
    echo $priceHelper->round($amount); // 100 
    echo "<br>";
    echo $priceHelper->getCurrencySymbol(); //₹
    echo "<br>";
        exit();

exit();
$localeInterface = $objectManager->create('Magento\Framework\TranslateInterface');
$localeInterface->setLocale('ar_SA');
echo "yes";
echo "<br>";
echo $localeInterface->getLocale(); 
echo "<br>";

echo "yes";


echo "<hr>";
$priceHelper = $objectManager->create('Magento\Framework\Pricing\PriceCurrencyInterface'); 
$price =  100; 
echo "<br>";
echo $priceHelper->convertAndFormat($price); //₹100.00
echo "<br>";
echo $priceHelper->round($price); // 100 
echo "<br>";
echo $priceHelper->getCurrencySymbol(); //₹
echo "<br>";




exit();

$amount = 1924.55;
        // echo $amount; exit();
        // setlocale(LC_MONETARY, 'en_IN.UTF-8');
        // $amount = money_format('%.0n', $amount);
        $fmt = numfmt_create( 'en_IN.UTF-8', NumberFormatter::CURRENCY );
        $return = numfmt_format_currency($fmt, $amount, "inr");
        // return $amount;
echo  $return; exit();

        // Italian national format with 2 decimals`
        // setlocale(LC_MONETARY, 'it_IT');
        // echo money_format('%.2n', $number) . "\n";
        // // Eu 1.234,56