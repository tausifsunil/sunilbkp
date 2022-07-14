<?php

namespace ProductAttribute\Custom\Model\Config\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class OptionList extends AbstractSource
{

    public function getAllOptions()
    {
        return [
            ['value' => 'S SIZE', 'label' => __('S SIZE')],
            ['value' => 'M SIZE', 'label' => __('M SIZE')],
            ['value' => 'L SIZE', 'label' => __('L SIZE')],
            ['value' => 'XL SIZE', 'label' => __('XL SIZE')]
        ];
    }
   
    public function getOptions()
    {
        $res = [];
        foreach ($this->getOptionArray() as $index => $value) {
            $res[] = ['value' => $index, 'label' => $value];
        }
        return $res;
    }
}