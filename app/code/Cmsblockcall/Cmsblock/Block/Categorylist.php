<?php
namespace Cmsblockcall\Cmsblock\Block;
use Magento\Framework\View\Element\Template\Context;
class Categorylist extends \Magento\Framework\View\Element\Template
{
	protected $_storeManager;
protected $_categoryCollection;

public function __construct(
    \Magento\Store\Model\StoreManagerInterface $storeManager,
    \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollection,
    $data = []
) {
    $this->_storeManager = $storeManager;
    $this->_categoryCollection = $categoryCollection;
    parent::__construct($data);
}

public function getCategories(){
     $categories = $this->_categoryCollection->create()                              
         ->addAttributeToSelect('*')
         ->setStore($this->_storeManager->getStore()); //categories from current store will be fetched

     foreach ($categories as $category){
         $category->getName();
     }
 }
}
