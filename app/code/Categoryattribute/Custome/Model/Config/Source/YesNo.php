<?php
namespace Categoryattribute\Custome\Model\Config\Source;

class YesNo extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{

    protected $_options;

    /**
     * getAllOptions
     *
     * @return array
     */

    public function toOptionArray()
    {
         return array(
            array('value' => '1', 'label' => __('Yes')),
            array('value' => '0', 'label' => __('No'))
         );
     }
     public function getAllOptions()
    {
        return $this->toOptionArray();
    }
}