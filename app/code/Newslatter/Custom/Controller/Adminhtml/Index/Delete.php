<?php

namespace Newslatter\Custom\Controller\Adminhtml\Index;
use Magento\Backend\App\Action\Context;
use Magento\Backend\App\Action;
class Delete extends Action
{
    /**
     * @var \MD\UiExample\Model\Blog
     */
    protected $dataExample;
    /**
     * @param Context                  $context
     * @param \MD\UiExample\Model\Blog $blogFactory
     */
    public function __construct(
        Context $context,
        \Newslatter\Custom\Model\DataExample $dataExample
    ) {
        parent::__construct($context);
        $this->dataExample = $dataExample;
    }
    
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $model = $this->dataExample;
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('Record deleted successfully.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        $this->messageManager->addError(__('Record does not exist.'));
        return $resultRedirect->setPath('*/*/');
    }
}