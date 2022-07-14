<?php
/**
 * Created By : RH
 */
namespace  Grid\Slider\Block\Adminhtml;
use Grid\Banners\Model\ResourceModel\Blog\CollectionFactory;
class AssignProducts extends \Magento\Backend\Block\Template
{
    /**
     * Block template
     *
     * @var string
     */
    protected $_template = 'products/assign_products.phtml';
    /**
     * @var \Magento\Catalog\Block\Adminhtml\Category\Tab\Product
     */
    protected $blockGrid;
    /**
     * @var \Magento\Framework\Registry
     */
    protected $registry;
    /**
     * @var \Magento\Framework\Json\EncoderInterface
     */
    protected $jsonEncoder;
    /**
     * @var \RH\CustProductGrid\Model\ResourceModel\Product\CollectionFactory
     */
    protected $productFactory;
    /**
     * @param \Magento\Backend\Block\Template\Context                           $context
     * @param \Magento\Framework\Registry                                       $registry
     * @param \Magento\Framework\Json\EncoderInterface                          $jsonEncoder
     * @param \RH\CustProductGrid\Model\ResourceModel\Product\CollectionFactory $productFactory
     * @param array                                                             $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        CollectionFactory $blogCollectionFactory,
        \Magento\Framework\Json\EncoderInterface $jsonEncoder,
        // \RH\CustProductGrid\Model\ResourceModel\Product\CollectionFactory $productFactory,
        array $data = []
    ) {
        $this->registry = $registry;
        $this->jsonEncoder = $jsonEncoder;
        $this->collection = $blogCollectionFactory->create();
        // $this->productFactory = $productFactory;
        parent::__construct($context, $data);
    }
    /**
     * Retrieve instance of grid block
     *
     * @return \Magento\Framework\View\Element\BlockInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getBlockGrid()
    {
        if (null === $this->blockGrid) {
            $this->blockGrid = $this->getLayout()->createBlock(
                'Grid\Slider\Block\Adminhtml\Tab\Productgrid',
                'grid.slider.tab.productgrid'
            );
        }
        return $this->blockGrid;
    }
    /**
     * Return HTML of grid block
     *
     * @return string
     */
    public function getGridHtml()
    {
        return $this->getBlockGrid()->toHtml();
    }
    /**
     * @return string
     */
    public function getProductsJson()
    {
        $entity_id = $this->getRequest()->getParam('blog_id');
        $entity_id=explode(",",$entity_id);
        // print_r($entity_id);
        // echo "hello";
        // die();
        $productFactory = $this->collection->addFieldToFilter('blog_id',['in'=>$entity_id]);

        $data=$productFactory->getData();
        // die;
        // $productFactory->addFieldToSelect(['blog_id']);
        // $productFactory->addFieldToFilter('blog_id', ['eq' => $entity_id]);
        $result = [];
        if (!empty($productFactory->getData())) {
            foreach ($productFactory->getData() as $dataId) {
                $result[$dataId['blog_id']] = '';
            }
        // for ($i=0; $i <sizeof($data) ; $i++) 
        // { 
            // $result[] = $data[$i]['blog_id'];
        // }
           return $this->jsonEncoder->encode($result);
        

        }
        return '{}';
    }
    public function getItem()
    {
        return $this->registry->registry('grid_slider');
    }
}