<?php

namespace Formdata\Banners\Model\Config\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class CustomOptionList extends AbstractSource
{
    public function getAllOptions()
    {
        return [
                ['value' => 'Football', 'label' => __('Football')],
                ['value' => 'Cricket', 'label' => __('Cricket')],
                ['value' => 'Reading', 'label' => __('Reading')],
                ['value' => 'Music', 'label' => __('Music')]
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

