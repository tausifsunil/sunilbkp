<?php
 
namespace Preferencedemo\Example\Model;
 
class Product extends \Magento\Catalog\Model\Product
{
    public function getName()
    {
        $name= $this->_getData('name');
        // return $name." Custome Name";
    }

    public function getPrice()
    {
        // $name= $this->_getData('price');
        // return $name+111;
    }

}