<?php

namespace Customergroup\Product\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Customer\Model\Session;

class Collectionloadafter implements ObserverInterface
{
    const CUSTOMER_GROUP = 'customergroup'; // Custom Attribute

    protected $session;

    public function __construct(
        Session $session
    ) {
        $this->session = $session;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $productCollection = $observer->getEvent()->getCollection();
            $customerGroupId = $this->session->getCustomer()->getGroupId();
            // print_r($customerGroupId);
        if (isset($customerGroupId)) {
            $productCollection->addAttributeToSelect('*')
                ->addAttributeToFilter(self::CUSTOMER_GROUP, ['finset' => $customerGroupId]);
        }
        // echo"<pre>";
            // print_r(json_decode(json_encode($productCollection->getData()),1));
            // die();
        return $productCollection;
    }
}