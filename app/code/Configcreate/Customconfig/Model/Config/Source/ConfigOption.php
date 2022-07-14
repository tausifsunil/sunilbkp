<?php

namespace Configcreate\Customconfig\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;


class ConfigOption implements OptionSourceInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => 'Gujarati', 'label' => __('Gujarati')],
            ['value' => 'English', 'label' => __('English')],
            ['value' => 'Hindi', 'label' => __('Hindi')],
            ['value' => 'Marathi', 'label' => __('Marathi')]
        ];
    }
}