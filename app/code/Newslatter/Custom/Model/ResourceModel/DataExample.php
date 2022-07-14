<?php 
namespace Newslatter\Custom\Model\ResourceModel;
class DataExample extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init("newslatter_custom","id");
    }
}
 ?>