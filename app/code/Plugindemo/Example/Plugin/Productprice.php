<?php
namespace Plugindemo\Example\Plugin;
class Productprice
{
    protected $urlRewriteFactory;

    public function __construct(
        // \Magento\Framework\App\Cache\Manager $cacheManager,
        \Magento\UrlRewrite\Model\UrlRewriteFactory $urlRewriteFactory
    )
    {
        // $this->cacheManager = $cacheManager;
        $this->_urlRewriteFactory = $urlRewriteFactory;
    }
	public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
        $urlInterface = \Magento\Framework\App\ObjectManager::getInstance()->get('Magento\Framework\UrlInterface');
        $currenturl = $urlInterface->getCurrentUrl();
        $twin = $subject->getTwinUrl();
        $producturl = $subject->getProductUrl();
        $dataurl = explode('/', $currenturl);
        $data=array_pop($dataurl);
        if($twin && $data == $twin)
        {
            $discount = $result*(5/100);
            return $result - $discount;    
        }
        else
        {
            return $result;
        }
    }
}
