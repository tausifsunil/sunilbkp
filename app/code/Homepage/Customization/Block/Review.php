<?php
namespace Homepage\Customization\Block;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\ResourceModel\Product\Collection;
use Magento\Eav\Api\AttributeSetRepositoryInterface;
use Magento\Catalog\Helper\Output;

class Review extends \Magento\Catalog\Block\Product\ListProduct
{
    protected $_customerSession;
    protected $categoryFactory;

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
    \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
    \Magento\Catalog\Helper\Output $helper,
    \Magento\Catalog\Api\CategoryRepositoryInterface $categoryRepository,
    \Magento\Framework\Url\Helper\Data $urlHelper,
    \Magento\Customer\Model\Session $customerSession,
    \Magento\Catalog\Model\CategoryFactory $categoryFactory,
    array $data = []
    ) {
        $this->_customerSession = $customerSession;
        $this->categoryFactory = $categoryFactory;
        $this->productCollectionFactory = $productCollectionFactory;
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
        $collection = $this->productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->getSelect()->joinLeft(array('rova'=> 'rating_option_vote_aggregated'),'e.entity_id =rova.entity_pk_value', array("percent" => 'percent'))->group('e.entity_id');

        $collection->getSelect()->where("rova.percent = 100");

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
