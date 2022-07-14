<?php
 
namespace Observerdemo\Changeprice\Observer\Product;
 
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
 
class Data implements ObserverInterface
{
    /**
     * Below is the method that will fire whenever the event runs!
     *
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $product = $observer->getProduct();
        $producturl = $product->getProductUrl();
        $urlInterface = \Magento\Framework\App\ObjectManager::getInstance()->get('Magento\Framework\UrlInterface');
        $currenturl = $urlInterface->getCurrentUrl();
        if($currenturl != $producturl)
        {
            $custom_price = $product->getPrice() * 5 / 100;
            $product->setPrice($product->getPrice() - $custom_price);
            // $jd = $product->getPrice() - $custom_price;
            // $item->setCustomPrice($jd);
            // // $item->setOriginalCustomPrice($jd);
            return $custom_price;
        }
        // $originalPrice = $product->getPrice();
        // $Addtoprice= $product ->getChangeprice();
        // $convertprice=(int)$Addtoprice;     //convert price string to int
        // $modifiedPrice = $originalPrice + $convertprice;
        // $product->setPrice($modifiedPrice);
        // return $modifiedPrice;
    }
}