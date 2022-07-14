<?php
namespace Myvendor\Mymodule\Plugin\Checkout\CustomerData;

use Magento\Store\Model\ScopeInterface;

class Cart
{
    protected $checkoutSession;
    protected $checkoutHelper;
    protected $quote;
    protected $scopeConfig;

    public function __construct(
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Checkout\Helper\Data $checkoutHelper,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->checkoutSession = $checkoutSession;
        $this->checkoutHelper = $checkoutHelper;
         $this->scopeConfig = $scopeConfig;
    }
    
    /**
     * Get active quote
     *
     * @return \Magento\Quote\Model\Quote
     */
    protected function getQuote()
    {
        if (null === $this->quote) {
            $this->quote = $this->checkoutSession->getQuote();
        }
        return $this->quote;
    }

    public function afterGetSectionData(\Magento\Checkout\CustomerData\Cart $subject, $result)
    {
        // if($this->getQuote()->getShippingAddress()->getCustomerId())
        // {

            $shipingcharge =$this->getQuote()->getShippingAddress()->getShippingAmount();
            $result['discount_amount'] = $shipingcharge;
        // }
        // else
        // {
        //     // echo 123;
        //     // die;
        //     $quote = $this->getQuote();
        //     // $shipingcharge =60;
        //     $country = $this->scopeConfig->getValue("tax/defaults/country",ScopeInterface::SCOPE_STORE);
        //     // $postcode = $this->scopeConfig->getValue("tax/defaults/postcode",ScopeInterface::SCOPE_STORE);
        //     $region = $this->scopeConfig->getValue("tax/defaults/region",ScopeInterface::SCOPE_STORE);
        //     // print_r($country);
        //     // // print_r($postcode);
        //     // print_r($region);
        //     die();
        //     $quote->getShippingAddress()->setPostcode($postcode);
        //     $quote->getShippingAddress()->setCountryId($country);
        //     $shipingcharge =$this->getQuote()->getShippingAddress()->getShippingAmount();
        // }

        
        return $result;
    }
}
