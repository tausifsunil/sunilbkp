<?php
namespace Logtable\Getdata\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Logtable\Getdata\Model\Blog;
use \Magento\Checkout\Model\Cart;
use Magento\Customer\Model\Session;

class AddtoCart implements ObserverInterface {

    protected $resultPageFactory;
    protected $customersession;

    public function __construct(
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,Blog $blogmodel,Session $customersession,Cart $cart ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->model = $blogmodel;
        $this->cart= $cart;
        $this->customersession= $customersession;
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $customersession=$this->customersession;
        if  ($customersession->isLoggedIn()) 
        {
            $customername=$customersession->getCustomer()->getName();
        }
        else {
                
                $customername='guest';   
        }

        $itemsCollection = $this->cart->getQuote()->getItemsCollection();
        $data = [];
        $x = 0;
        foreach($itemsCollection as $item) {
            $data[$x]['productid'] = $item->getProductId();
            $data[$x]['productname'] = $item->getName();
            $data[$x]['sku'] = $item->getSku();
            $data[$x]['customername'] = $customername;
            $data[$x]['created_at'] = $item->getCreatedAt();
            $x++;
          }
            $phtml_data = json_encode($data);

            $data=json_decode($phtml_data,true);
            
            for ($i=0; $i <sizeof($data) ; $i++) { 
                // code...
                $this->model->setData($data[$i]);
                $this->model->save();
            }
    }
}