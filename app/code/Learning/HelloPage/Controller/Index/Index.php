<?php
namespace Learning\HelloPage\Controller\Index;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
// use Magento\Framework\App\Action\Context;
// use Magento\Framework\Controller\Result\JsonFactory;
// use Magento\Framework\Controller\ResultInterface;

class Index extends Action
{
    // public $collection;

    // public function __construct(Context $context, CollectionFactory $collectionFactory, array $data = [])
    // {
    //     $this->collection = $collectionFactory;
    //     parent::__construct($context, $data);
    // }
    public function execute()
    {
         // $this->pageResultFactory->create();
        echo "hello world<br>";        
    }
}