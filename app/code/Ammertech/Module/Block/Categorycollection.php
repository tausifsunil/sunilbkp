<?php
namespace Ammertech\Module\Block;

class Categorycollection extends \Magento\Framework\View\Element\Template {
    protected $_storeManager;
    public $ids;

    public function __construct(
        \Magento\Catalog\Block\Product\Context $context,  
        \Magento\Framework\Registry $registry,
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $collectionfectory,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Catalog\Model\CategoryRepository $categoryRepository,
        \Magento\Store\Model\StoreManagerInterface $storeManager,

        array $data = []
    ) {
        $this->_storeManager = $storeManager;
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->registry = $registry;
        $this->categoryRepository = $categoryRepository;
        $this->collectionfectory = $collectionfectory;
        parent::__construct(
            $context,          
            $data
        );
    }
    public function getStoreCategories(){
        $categories = $this->collectionfectory->create()                              
            ->addAttributeToSelect('*')
            ->addAttributeToFilter('level',2)
            ->setStore($this->_storeManager->getStore()); //categories from current store will be fetched
        foreach ($categories as $value){
                $categorydata[] = ['name'=>$value->getName(),'id'=>$value->getId()];
                // $child = $value->getChildrenCategories();
                // foreach($child as $data)
                // {
                //     print_r($data->getName());
                // }
        }
        return $categorydata;

    }
    public function getProductCollectionByCategories($ids)
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addCategoriesFilter(['in' => $ids]);
        return $collection;
    }
}
