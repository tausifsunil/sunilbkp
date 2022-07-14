<?php
namespace Plugindemo\Example\Plugin;
class CartPrice
{
    protected $_request;
    
    public function __construct(
        \Magento\Framework\App\RequestInterface $request
    )
    {
        $this->_request = $request;
    }
    public function afterAddProduct(
            \Magento\Checkout\Model\Cart $subject,
            $request, 
            $product,
            $result
    )
    {
        if(isset($result['twin'])){
            $twin = $result['twin'];
            $item = $subject->getQuote()->getAllItems();
            $price = $product->getPrice();
            $discount =$price*(5/100);
            $custome = $price - $discount; 
            if($twin)
            {   
                foreach ($item as $value)
                {    
                    // print_r($value->getProductId());
                    // print_r($product->getId());
                    // die;
                    if($value->getProductId() == $product->getId())
                    {
                        $value->setCustomPrice($custome);
                        $value->setOriginalCustomPrice($custome);
                        $value->getProduct()->setIsSuperMode(true);
                    }
                        
                }     
            }
        }
        return $result;
    }
}
