<?php 
namespace Newslatter\Custom\Model\ResourceModel\View;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	public function _construct()
	{
		$this->_init("Newslatter\Custom\Model\DataExample","Newslatter\Custom\Model\ResourceModel\DataExample");
	}
}
 ?>