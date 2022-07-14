<?php
namespace Filterstooltip\Layerednavigation\Block;
use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;

class Index extends Template
{



    // protected $eavConfig;
    // public function __construct(
    //     \Magento\Eav\Model\Config $eavConfig
    // ){
    //     $this->eavConfig = $eavConfig;
    // }
    protected $_productRepository;
    public $collection;

    public function __construct(Context $context,\Magento\Eav\Model\Config $eavConfig,\Magento\Catalog\Model\ProductRepository $productRepository, array $data = [])
    {
        $this->eavConfig = $eavConfig;
        $this->_productRepository = $productRepository;
        parent::__construct($context, $data);
    }

    public function getattibutecollection()
    {
        $product = $this->_productRepository;
        echo "<pre>";
        print_r(get_class_methods($product));
        die;
        $attributes = $product->getList();
        foreach($attributes as $a)
        {
            echo $a->getName()."\n";
        }
        die;
    }

}

// wyomind_elasticsearchlayerednavigation