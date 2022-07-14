<?php
/**
 * Created By : Rohan Hapani
 */
namespace Formdata\Banners\Controller\Adminhtml\Index;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Controller\ResultFactory;
class Uploader extends \Magento\Backend\App\Action
{
    /**
     * Image uploader
     * @var \Magento\Catalog\Model\ImageUploader
     */
    protected $imageUploader;
    /**
     * @var \Magento\Framework\Filesystem
     */
    protected $filesystem;
    /**
     * @var \Magento\Framework\Filesystem\Io\File
     */
    protected $fileIo;
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;
    /**
     * Upload constructor.
     * @param \Magento\Backend\App\Action\Context        $context
     * @param \Magento\Catalog\Model\ImageUploader       $imageUploader
     * @param \Magento\Framework\Filesystem              $filesystem
     * @param \Magento\Framework\Filesystem\Io\File      $fileIo
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Catalog\Model\ImageUploader $imageUploader,
        \Magento\Framework\Filesystem $filesystem,
        \Magento\Framework\Filesystem\Io\File $fileIo,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ){
        parent::__construct($context);
        $this->imageUploader = $imageUploader;
        $this->filesystem = $filesystem;
        $this->fileIo = $fileIo;
        $this->storeManager = $storeManager;
    }
    /**
     * Upload file controller action.
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        // echo "hello";
        // die();
        $imageUploadId = $this->getRequest()->getParam('param_name', 'logo');
        try {
                $imageResult = $this->imageUploader->saveFileToTmpDir($imageUploadId);
        } 
        catch (\Exception $e) {
            $imageResult = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
        }
        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($imageResult);
    }
}