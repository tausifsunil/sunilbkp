<?php 

namespace Configcreate\Customconfig\Model\Config\Source;

class ListMode implements \Magento\Framework\Data\OptionSourceInterface
{
 public function toOptionArray()
 {
  return [
    ['value' => 'Football', 'label' => __('Football')],
    ['value' => 'Cricket', 'label' => __('Cricket')],
    ['value' => 'Reading', 'label' => __('Reading')],
    ['value' => 'Music', 'label' => __('Music')]
  ];
 }
}