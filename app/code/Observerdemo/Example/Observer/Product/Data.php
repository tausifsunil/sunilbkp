<?php
 
namespace Observerdemo\Example\Observer\Product;
 
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
        $originalName = $product->getPrice();
        $modifiedName = $originalName + 1234;
        // return $modifiedName;
        $product->setPrice($modifiedName);
    }
}