<?php

namespace Plugindemo\Changeprice\Plugin;
class Productprice
{
	public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
        $updateprice=$subject->getData('changeprice');
        $convert=(int)$updateprice;
         return $result+$convert;
    }

}