<?php
namespace Customefilter\Sortproducts\Block;
class Productname extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        \Magento\Framework\Registry $registry,
        \Magento\Framework\View\Element\Template\Context $context
    ) {
             $this->registry = $registry;
            parent::__construct($context);
    }
    
    public function getprodcutname()
    {
         $product = $this->registry->registry('current_product');//get current product
        return $product->getName();
    }


}