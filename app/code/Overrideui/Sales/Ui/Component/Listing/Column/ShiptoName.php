<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Overrideui\Sales\Ui\Component\Listing\Column;

use Magento\Framework\Escaper;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Sales\Model\ResourceModel\Order\Status\CollectionFactory;

/**
 * Class Address
 */
class ShiptoName extends Column
{
    /**
     * @var Escaper
     */
    protected $escaper;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param Escaper $escaper
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        Escaper $escaper,
        array $components = [],
        array $data = []
    ) {
        $this->escaper = $escaper;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            // echo "<pre>";
            // print_r($dataSource['data']['items']);
            // // print_r($dataSource['data']['items'][1]['shipping_name']);
            // echo"</pre>";
            // die;
            foreach ($dataSource['data']['items'] as & $item) {
                if($item['shipping_name'] == 'demo demo')
                {
                    $item['shipping_name'] = 'Test UI';   
                }
                // print_r($item);
                // echo 1234;   
                $item[$this->getData('name')] = nl2br($this->escaper->escapeHtml($item[$this->getData('name')]));
            }
                // die;
        }

        return $dataSource;
    }
}