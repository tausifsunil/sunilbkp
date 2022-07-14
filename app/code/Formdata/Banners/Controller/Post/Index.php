<?php

namespace Formdata\Banners\Controller\Post;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;
use Formdata\Banners\Model\Blog;
// use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\App\Filesystem\DirectoryList;

// use Helloworld\Hellowords\Model\Test; //this is call the model

class Index extends Action
{
    /**
     * @var PageFactory
     */
    private $pageFactory;

    /**
     * Index constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        blog $model,
        \Magento\Framework\Filesystem $filesystem,
        \Magento\MediaStorage\Model\File\UploaderFactory $fileUploaderFactory,
        \Magento\Framework\Controller\Result\RedirectFactory $resultRedirectFactory
    ) {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->_fileUploaderFactory = $fileUploaderFactory;
        $this->resultRedirectFactory = $resultRedirectFactory;
        // $this->test = $test;
        $this->_filesystem = $filesystem;
        $this->model = $model;
    }
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $image=$this->getRequest()->getFiles();
        if($image['logo']['name'])
        {
            $data['logo']=$image['logo']['name'];
        
            $uploader = $this->_fileUploaderFactory->create(['fileId' => 'logo']);
             
            $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
             
            $uploader->setAllowRenameFiles(false);
             
            $uploader->setFilesDispersion(false);

            $path = $this->_filesystem->getDirectoryRead(DirectoryList::MEDIA)
             
            ->getAbsolutePath('banners/image');
             
            $uploader->save($path);
        }
        // echo "<pre>";
        // print_r($image);
        // die();
        unset($data['submit']);
        
        if( array_key_exists('hobby', $data))
        {
            $data['hobby']=implode(',',$data['hobby']);
        }   
        $this->model->setData($data);             
        if($this->model->save())
        {
            $this->messageManager->addSuccess(__('We can\'t find products matching the selection.'));
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('');
        return $resultRedirect;
    }
}