<?php
namespace Logtable\Getdata\Block;
use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use Logtable\Getdata\Model\ResourceModel\Blog\CollectionFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Checkout\Model\Cart;

class Index extends Template
{

    public $collection;

    public function __construct(Context $context, CollectionFactory $collectionFactory,Cart $cart, array $data = [])
    {
        $this->collection = $collectionFactory;
        $this->cart= $cart;
        parent::__construct($context, $data);
    }

    public function getCollection()
    {
        return $this->collection->create();
    }

}