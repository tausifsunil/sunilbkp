<?php

namespace Categoryattribute\Custome\Model\Config\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class OptionList extends AbstractSource
{

    public function getAllOptions()
    {
        return [
            ['value' => 'Maruti Suzuki Swift', 'label' => __('Maruti Suzuki Swift')],
            ['value' => 'Hyundai Creta', 'label' => __('Hyundai Creta')],
            ['value' => 'Hyundai Verna', 'label' => __('Hyundai Verna')],
            ['value' => 'Toyota Fortuner', 'label' => __('Toyota Fortuner')]
        ];
    }
    // public function getOptionArray()
    // {
    //     $options = [];
    //     $options['Maruti Suzuki Swift'] = (__('Maruti Suzuki Swift'));
    //     $options['Hyundai Creta'] = (__('Hyundai Creta'));
    //     $options['Hyundai Verna'] = (__('Hyundai Verna'));
    //     $options['Toyota Fortuner'] = (__('Toyota Fortuner'));

    //     return $options;
    // }

    // public function getAllOptions()
    // {
    //     $res = $this->getOptions();
    //     array_unshift($res, ['value' => '', 'label' => '']);
    //     return $res;
    // }

    public function getOptions()
    {
        $res = [];
        foreach ($this->getOptionArray() as $index => $value) {
            $res[] = ['value' => $index, 'label' => $value];
        }
        return $res;
    }

    // public function toOptionArray()
    // {
    //     return $this->getOptions();
    // }
}