<?php

namespace Categoryattribute\Custome\Model\Config\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class CustomOptionList extends AbstractSource
{
    public function getAllOptions()
    {
        return [
            ['value' => 'Apple', 'label' => __('Apple2')],
            ['value' => 'Banana', 'label' => __('Banana')],
            ['value' => 'Greps', 'label' => __('Graps')],
            ['value' => 'Watermelon', 'label' => __('Watermelon')]
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