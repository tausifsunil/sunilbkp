<?php

namespace Observerdemo\Changeqty\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\RequestInterface;

class MyObserver implements ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer) {
            $item = $observer->getEvent()->getData('quote_item');           
            $item = ( $item->getParentItem() ? $item->getParentItem() : $item );
            $qty= $item->getQty() * 5; //set your quantity here
            $item->setQty($qty);
            $item->getProduct()->setIsSuperMode(true);
        }

}
