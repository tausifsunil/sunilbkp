<?php

namespace Newslatter\Custom\Controller\popup;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;



class Index extends Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;
    protected $subscriberFactory;
    protected $dataExample;    
    /**
     * @param \Magento\Backend\App\Action\Context        $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Newsletter\Model\SubscriberFactory  $subscriberFactory,
        \Magento\Framework\Controller\Result\RedirectFactory $resultRedirectFactory,
        \Newslatter\Custom\Model\DataExample $dataExample,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
         $this->subscriberFactory = $subscriberFactory;
         $this->resultRedirectFactory = $resultRedirectFactory;
         $this->dataExample = $dataExample;
        $this->resultPageFactory = $resultPageFactory;
    }
    /**
     * @return \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
       
        
        $formdata=$this->getRequest()->getPostValue();

        $firstname=$formdata['firstname'];
        $lastname=$formdata['lastname'];
        $email=$formdata['email'];

        $data = [
            'subscriber_email'=>$email,
        ];

        $value =[
            'firstname'=>$firstname,
             'lastname'=>$lastname,
             'email'=>$email,   
        ]; 

        
       /*$model = $this->subscriber->create();
        $model->addData($data);
        $saveData = $model->save();
        */
        $subscriber = $this->subscriberFactory->create();
        $subscriber->subscribe($email);

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('');

        

        // $custom=$this->dataExample->create();
        $this->dataExample->addData($value);
        $this->dataExample->save();

        return $resultRedirect;
       
    }

    // public function subscribe($email)
    // {
    //     echo 15252;die;
    //     $form=$this->getRequest()->getPostValue();
    //     $emails=$form['email'];
    //     $data = [
    //         'subscriber_email'=>$emails,
    //     ];

    //     $model = $this->subscriberFactory->create();
    //     $model->addData($data);
    //     $saveData = $model->save();      
    // }
}


