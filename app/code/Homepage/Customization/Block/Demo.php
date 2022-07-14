<?php

namespace Homepage\Customization\Block;

// namespace Mageplaza\HelloWorld\Model;
// use Magento\Framework\Model\AbstractModel;
class Demo extends \Magento\Catalog\Block\Product\ListProduct
{

    public function __construct(
            \Magento\Store\Model\StoreManagerInterface $storeManager,
            \Magento\Catalog\Model\ProductFactory $productFactory,
            \Magento\Review\Model\RatingFactory $ratingFactory,
            // \Magento\Review\Model\ReviewFactory $reviewFactory
            \Magento\Review\Model\ResourceModel\Review\CollectionFactory $reviewFactory
        ) {
            $this->_storeManager = $storeManager;
            $this->_productFactory = $productFactory;
            $this->_ratingFactory = $ratingFactory;
            $this->_reviewFactory = $reviewFactory;
        }

   
        public function getRatingSummary()
        {
            $this->_reviewFactory->create()->getEntitySummary($product, $this->_storeManager->getStore()->getId());
            $ratingSummary = $product->getRatingSummary()->getRatingSummary();
            return $ratingSummary;
        }
}
