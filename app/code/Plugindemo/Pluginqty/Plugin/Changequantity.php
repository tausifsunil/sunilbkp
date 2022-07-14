<?php

namespace Plugindemo\Pluginqty\Plugin;
class Changequantity
{
        public function beforeAddProduct(
            \Magento\Checkout\Model\Cart $subject,
            $productInfo,
            $requestInfo = null
        ){
            $requestInfo['qty'] = 10;
            return array($productInfo, $requestInfo);
        }

}