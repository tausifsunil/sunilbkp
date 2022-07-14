<?php
namespace Simplerouter\Demo\Helper;
class Stock extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * @var Magento\CatalogInventory\Api\StockStateInterface
     */
    protected $stockState;
    protected $storeManager;

    /**
     * Output constructor.
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\CatalogInventory\Api\StockStateInterface $stockState
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\CatalogInventory\Api\StockStateInterface $stockState,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
        $this->stockState = $stockState;
         $this->storeManager = $storeManager;
        parent::__construct($context);
    }

    /**
     * Retrieve stock qty whether product
     *
     * @param int $productId
     * @param int $websiteId
     * @return float
     */
    public function getStoreId()
    {
         return $this->storeManager->getStore()->getId();
    }
    
    public function getStockQty($productId, $websiteId = null)
    {        
        return $this->stockState->getStockQty($productId,$websiteId);
    }
}