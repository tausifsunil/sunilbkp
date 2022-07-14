<?php
namespace Cmsblockcall\Cmsblock\Block;
class Display extends \Magento\Framework\View\Element\Template
{
	public function __construct(\Magento\Framework\View\Element\Template\Context $context,\Magento\Sales\Model\Order $orders,
	\Magento\Store\Model\StoreManagerInterface $storeManager,
    \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollection)
	{
		$this->orders = $orders;
		$this->_storeManager = $storeManager;
    	$this->_categoryCollection = $categoryCollection;
		parent::__construct($context);
	}

	public function Hello()
	{
		// $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		// $orders = $objectManager->create('Magento\Sales\Model\Order')->getCollection();
		$orders = $this->orders->getCollection()->getData();
		// echo "<pre>";
		// // print_r(json_decode(json_encode($orders->getCollection()->getData()),1));
		// echo $orders[0]['customer_firstname'];
		// die();
		// echo $custLastName= $orders->getCustomerLastname();
	}
	public function getCategories() {
	    	$categories = $this->_categoryCollection->create()                              
                ->addAttributeToSelect('*')
                // ->addAttributeToFilter('level',2)
                ->setStore($this->_storeManager->getStore()); //categories from current store will be fetched
             $CategoryList['list'] = [];
                foreach($categories as $category) {
                		// echo "<pre>";
                		$data = base64_encode($category->getId());
                		// echo "<pre>";print_r(base64_encode($category->getId()));
                		
                		// echo "<pre>";print_r(base64_decode($data));

                		// die;

                    $CategoryList['list'][$category->getId()]['uid'] = base64_encode($category->getId());
                    $CategoryList['list'][$category->getId()]['name'] = $category->getName();
                    $CategoryList['list'][$category->getId()]['parent_id'] = base64_encode($category->getParentId());
                    $CategoryList['list'][$category->getId()]['children_count'] = $category->getChildrenCount();
                    $CategoryList['list'][$category->getId()]['url_key'] = $category->getUrlKey();
                    $CategoryList['list'][$category->getId()]['url_path'] = $category->getUrlPath();
                    $CategoryList['list'][$category->getId()]['image'] = $category->getImage();
                    $CategoryList['list'][$category->getId()]['description'] = $category->getDescription();
                    $CategoryList['list'][$category->getId()]['meta_title'] = $category->getMetaTitle();
                    $CategoryList['list'][$category->getId()]['meta_keywords'] = $category->getMetaKeywords();
                    $CategoryList['list'][$category->getId()]['meta_description'] = $category->getMetaDescription();
                }
                // die;
// 
	    // $phtml_data = json_encode($CategoryList);
	    // $data=json_decode($phtml_data,true);
	    // echo "<pre>";print_r($CategoryList);
	    // return $name;
	    // die;
 	}
}