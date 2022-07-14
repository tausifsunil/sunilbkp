<?php
namespace Twin\Url\Observer;
 
use Magento\Framework\Event\Observer;
use Magento\UrlRewrite\Model\UrlRewriteFactory;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\Event\ObserverInterface;
 
class View implements ObserverInterface
{
    /**
     * Below is the method that will fire whenever the event runs!
     *
     * @param Observer $observer
     */
    protected $urlRewriteFactory;
    protected $storeManager;
    // protected $urlinterface;
    
    public function __construct(
        Context $context,
        \Magento\UrlRewrite\Model\UrlRewriteFactory $urlRewriteFactory,
        \Magento\Framework\App\RequestInterface $request
        // \Magento\Framework\App\Cache\Frontend\Pool $cacheFrontendPool,
        //  array $data = []
    ) {
        $this->_urlRewriteFactory = $urlRewriteFactory;
        $this->_request = $request;
    }
    public function execute(Observer $observer)
    {
        $product = $observer->getProduct();
        $producturl = $product->getProductUrl();
        $urlInterface = \Magento\Framework\App\ObjectManager::getInstance()->get('Magento\Framework\UrlInterface');
        $currenturl = $urlInterface->getCurrentUrl();
        if ($currenturl != $producturl) {
            $custom_price = $product->getPrice() * 5 / 100;
            $product->setPrice($product->getPrice() - $custom_price);
            return $custom_price;
        }
    }
}
