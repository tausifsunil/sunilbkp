<?php
namespace Newslatter\Custom\Controller\Adminhtml\Index;
use Magento\Framework\Controller\ResultFactory;
class Add extends \Magento\Backend\App\Action
{
    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */ 
    protected $_resultPage;
    // protected $resultPageFactory;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Add New Record'));
        return $resultPage;
    }
}
