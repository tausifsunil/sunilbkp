<?php

namespace Homepagebanners\Banners\Model\Config\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class CustomOptionList extends AbstractSource
{
    public function getAllOptions()
    {
        return [
            ['value' => 'RED', 'label' => __('RED')],
            ['value' => 'GREEN', 'label' => __('GREEN')],
            ['value' => 'YELLOW', 'label' => __('YELLOW')],
            ['value' => 'BULE', 'label' => __('BULE')]
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