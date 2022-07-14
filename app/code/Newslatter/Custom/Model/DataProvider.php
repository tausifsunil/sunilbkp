<?php

namespace Newslatter\Custom\Model;

use Newslatter\Custom\Model\ResourceModel\View\CollectionFactory;
use Magento\Store\Model\StoreManagerInterface;
// use RH\Helloworld\Model\ResourceModel\Helloworld\Collection;
use Newslatter\Custom\Model\ResourceModel\View\Collection;
use Magento\Framework\App\RequestInterface;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var array
     */
    protected $collection;
    protected $loadedData;
    protected $request;
    protected $storeManager;
    // @codingStandardsIgnoreStart
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $blogCollectionFactory,
        Collection $collection,
        RequestInterface $request,
        StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $blogCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
         $this->collection = $collection;
        $this->request = $request;
        $this->storeManager = $storeManager;
    }
    // @codingStandardsIgnoreEnd
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $item) {
            
            $this->loadedData[$item->getId()] = $item->getData();
        }   
       return $this->loadedData;
        }   
        
    }

 