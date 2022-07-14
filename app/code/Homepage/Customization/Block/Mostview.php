<?php
namespace Homepage\Customization\Block;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\ResourceModel\Product\Collection;
use Magento\Eav\Api\AttributeSetRepositoryInterface;
use Magento\Catalog\Helper\Output;
use Magento\Sales\Model\ResourceModel\Report\Bestsellers\CollectionFactory as BestSellersCollectionFactory;

class Mostview extends \Magento\Catalog\Block\Product\ListProduct
{
    protected $_customerSession;
    protected $categoryFactory;
    protected $BestSellersCollectionFactory;

    /**
     * ListProduct constructor.
     * @param \Magento\Catalog\Block\Product\Context $context
     * @param \Magento\Framework\Data\Helper\PostHelper $postDataHelper
     * @param \Magento\Catalog\Model\Layer\Resolver $layerResolver
     * @param \Magento\Catalog\Api\CategoryRepositoryInterface $categoryRepository
     * @param \Magento\Framework\Url\Helper\Data $urlHelper
     * @param Helper $helper
     * @param array $data
     * @param \Magento\Customer\Model\Session $customerSession
     * @param \Magento\Catalog\Model\CategoryFactory $categoryFactory
     */
    public function __construct(
    \Magento\Catalog\Block\Product\Context $context,
    \Magento\Framework\Data\Helper\PostHelper $postDataHelper,
    \Magento\Catalog\Model\Layer\Resolver $layerResolver,
    // \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
    BestSellersCollectionFactory $bestseller,
     \Magento\Reports\Model\ResourceModel\Product\CollectionFactory $productsFactory,
    \Magento\Catalog\Helper\Output $helper,
    \Magento\Catalog\Api\CategoryRepositoryInterface $categoryRepository,
    \Magento\Framework\Url\Helper\Data $urlHelper,
    \Magento\Customer\Model\Session $customerSession,
    \Magento\Catalog\Model\CategoryFactory $categoryFactory,
    array $data = []
    ) {
        $this->_customerSession = $customerSession;
        $this->categoryFactory = $categoryFactory;
        // $this->productCollectionFactory = $productCollectionFactory;
        $this->bestseller = $bestseller;
        $this->_productsFactory = $productsFactory;
        $this->_helper = $helper;
        parent::__construct(
            $context,
            $postDataHelper,
            $layerResolver,
            $categoryRepository,
            $urlHelper,
            $data
        );

    }

    public function getLoadedProductCollection()
    {
        return $this->_getProductCollection();
    }

    protected function _getProductCollection()
    {
        if ($this->_productCollection === null) {
            $this->_productCollection = $this->initializeProductCollection();
        }

        return $this->_productCollection;
        // echo"<pre>";print_r($sunil->getData());die;
    }

    private function initializeProductCollection()
    {
        $currentStoreId = $this->_storeManager->getStore()->getId();

        $collection = $this->_productsFactory->create()
        ->addAttributeToSelect(
            '*'
        )->addViewsCount()->setStoreId(
                $currentStoreId
        )->addStoreFilter(
                $currentStoreId
        );
        // $items = $collection->getItems();
        return $collection;
    }

    private function addToolbarBlock(Collection $collection)
    {
        $toolbarLayout = $this->getToolbarFromLayout();

        if ($toolbarLayout) {
            $this->configureToolbar($toolbarLayout, $collection);
        }
    }

}
