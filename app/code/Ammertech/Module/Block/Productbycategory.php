<?php
namespace Ammertech\Module\Block;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\ResourceModel\Product\Collection;
use Magento\Eav\Api\AttributeSetRepositoryInterface;
use Magento\Catalog\Helper\Output;
class Productbycategory extends \Magento\Catalog\Block\Product\ListProduct
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
    \Magento\Catalog\Model\CategoryRepository $_categoryRepository,
    \Magento\Framework\Data\Helper\PostHelper $postDataHelper,
    \Magento\Catalog\Model\Layer\Resolver $layerResolver,
    \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
    \Magento\Catalog\Helper\Output $helper,
    \Magento\Catalog\Api\CategoryRepositoryInterface $categoryRepository,
    \Magento\Framework\Url\Helper\Data $urlHelper,
    \Magento\Customer\Model\Session $customerSession,
    \Magento\Framework\Registry $registry,
    \Magento\Catalog\Model\CategoryFactory $categoryFactory,
    array $data = []
    ) {
        $this->_customerSession = $customerSession;
         $this->_categoryRepository = $_categoryRepository;
        $this->categoryFactory = $categoryFactory;
        $this->productCollectionFactory = $productCollectionFactory;
        $this->_helper = $helper;
        $this->registry = $registry;
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
        return $collection;
    }

    public function getProductCollectionByCategories($ids)
    {
        $collection = $this->productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addCategoriesFilter(['in' => $ids]);
        $collection->setPageSize(4);
        // $collection->setOrder('sku', 'asc');
        return $collection;
    }

    public function getsubcategoryid()
    {
        $category = $this->registry->registry('current_category');
        $subcat = $category->getChildrenCategories();
        $id = [];
        if($subcat)
        {
            foreach ($subcat as $value) {
                $id[] = $value->getId();
            }
            return $id;            
        }
    }
    public function getsubcategoryname()
    {
        $category = $this->registry->registry('current_category');
        $subcat = $category->getChildrenCategories();
        $name = [];
        foreach ($subcat as $value) {
            $name[] = $value->getName();
        }
        return $name;
    }
    public function getsubUrl()
    {
        $category_id = $this->getsubcategoryid();
        $category = $this->categoryFactory ->create();
        $url = [];
        foreach($category_id as $id)
        {
            $_category=$this->_categoryRepository->get($id,$this->_storeManager->getStore()->getId());
            $url[] = $_category->getUrl();

        }
        return $url;
    }


    private function addToolbarBlock(Collection $collection)
    {
        $toolbarLayout = $this->getToolbarFromLayout();

        if ($toolbarLayout) {
            $this->configureToolbar($toolbarLayout, $collection);
        }
    }

}
