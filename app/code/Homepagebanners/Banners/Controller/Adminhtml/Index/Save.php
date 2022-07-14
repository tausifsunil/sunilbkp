<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 *
 * Created By: MageDelight Pvt. Ltd.
 */
namespace Homepagebanners\Banners\Controller\Adminhtml\Index;
use Magento\Backend\App\Action;
use Magento\Backend\Model\Session;
use Homepagebanners\Banners\Model\Blog;
class Save extends \Magento\Backend\App\Action
{
    /*
     * @var Blog
     */
    protected $uiExamplemodel;
    /**
     * @var Session
     */
    protected $adminsession;
    /**
     * @param Action\Context $context
     * @param Blog           $uiExamplemodel
     * @param Session        $adminsession
     */
    public function __construct(
        Action\Context $context,
        Blog $uiExamplemodel,
        Session $adminsession
    ) {
        parent::__construct($context);
        $this->uiExamplemodel = $uiExamplemodel;
        $this->adminsession = $adminsession;
    }
    /**
     * Save blog record action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        // echo "<pre>";                                                       
        // print_r($data);

        if( array_key_exists('logo', $data))
        {
            $data['logo']=$data['logo'][0]['name'];
        }
        
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            $blog_id = $this->getRequest()->getParam('blog_id');
            // print_r($blog_id);
            // die();
            if ($blog_id) {
                $this->uiExamplemodel->load($blog_id);
            }
            $this->uiExamplemodel->setData($data);
            // die();
            try {
                $this->uiExamplemodel->save();
                $this->messageManager->addSuccess(__('The data has been saved.'));
                $this->adminsession->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    if ($this->getRequest()->getParam('back') == 'add') {
                        return $resultRedirect->setPath('*/*/add');
                    } else {
                        return $resultRedirect->setPath('*/*/edit', ['blog_id' => $this->uiExamplemodel->getBlogId(), '_current' => true]);
                    }
                }
                return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the data.'));
            }
            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['blog_id' => $this->getRequest()->getParam('blog_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}