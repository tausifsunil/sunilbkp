<?php

namespace Twin\Url\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\RequestInterface;

class Cart implements ObserverInterface
{
    protected $_request;
    public function __construct(
        \Magento\Framework\App\RequestInterface $request
    ) {
        $this->_request = $request;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $twin = $this->_request->getParam('twin');
        $product = $observer->getEvent()->getProduct();
        $item = $observer->getEvent()->getQuoteItem();

        // print_r(json_decode(json_encode($item->getData())));
        // die();
        if ($product && $twin) {
            $custom_price = $product->getPrice() * 5 / 100;
            $custome = $product->getPrice() - $custom_price;
            $item->setCustomPrice($custome);
            $item->setOriginalCustomPrice($custome);
            $item->getProduct()->setIsSuperMode(true);
            return $this;
        }
    }
}
