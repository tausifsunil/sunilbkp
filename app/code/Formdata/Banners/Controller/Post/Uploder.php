<?php
/**
 * Created By : Rohan Hapani
 */
namespace Formdata\Banners\Controller\Adminhtml\Index;
    use Magento\Framework\App\Filesystem\DirectoryList;
    use Magento\Framework\App\Action;
class Index extends Action
{

    protected $_fileUploaderFactory;

    public function __construct(
        \Magento\MediaStorage\Model\File\UploaderFactory $fileUploaderFactory,
        Action\Context $context
         
    ) {
 
        $this->_fileUploaderFactory = $fileUploaderFactory;
        parent::__construct($context);
    }
 
    public function execute(){

        $uploader = $this->_fileUploaderFactory->create(['fileId' => 'logo']);
         
        $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
         
        $uploader->setAllowRenameFiles(false);
         
        $uploader->setFilesDispersion(false);

        $path = $this->_filesystem->getDirectoryRead(DirectoryList::MEDIA)
         
        ->getAbsolutePath('banners/image');
         
        $uploader->save($path);
 
    }
}