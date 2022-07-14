<?php
declare(strict_types=1);

namespace Filterstooltip\Layerednavigation\Block\Adminhtml\Form\Field;

use Magento\Framework\View\Element\Html\Select;

class Attributelist extends Select
{
    /**
     * Set "name" for <select> element
     *
     * @param string $value
     * @return $this
     */

    // protected $eavConfig;
    // public function __construct(
    //     \Magento\Eav\Model\Config $eavConfig
    // ){
    //     $this->eavConfig = $eavConfig;
    // }
    public function setInputName($value)
    {
        return $this->setName($value);
    }

    /**
     * Set "id" for <select> element
     *
     * @param $value
     * @return $this
     */
    public function setInputId($value)
    {
        return $this->setId($value);
    }

    /**
     * Render block HTML
     *
     * @return string
     */
    public function _toHtml(): string
    {
        if (!$this->getOptions()) {
            $this->setOptions($this->getSourceOptions());
        }
        return parent::_toHtml();
    }

    private function getSourceOptions(): array
    {
        return [
            ['label' => 'Yesssss', 'value' => '1'],
            ['label' => 'Nooooo', 'value' => '0'],
        ];
    }
}