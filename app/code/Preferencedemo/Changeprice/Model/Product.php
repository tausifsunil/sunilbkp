<?php
 
namespace Preferencedemo\Changeprice\Model;
 
class Product extends \Magento\Catalog\Model\Product
{
    public function getPrice()
    {
        $price= $this->_getData('price');
        $Addtoprice = $this->_getData('changeprice');
        $attributevalue = (int)$Addtoprice;
        return $price+$Addtoprice;
    }

}