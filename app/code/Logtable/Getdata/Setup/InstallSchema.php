<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 *
 * Created By: MageDelight Pvt. Ltd.
 */
namespace Logtable\Getdata\Setup;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        /**
         * Create table 'grid_Slider'
         */
        if (!$installer->tableExists('logtable')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('logtable')
            )->addColumn(
                'id',
                Table::TYPE_INTEGER,
                null,
                [
                    'identity' => true,
                    'nullable' => false,
                    'primary' => true,
                    'unsigned' => true,
                ],
                'ID'
            )->addColumn(
                'productid',
                Table::TYPE_INTEGER,
                255,
                [
                    'nullable => false',
                ],
                'ProductId'
            )->addColumn(
                'productname',
                Table::TYPE_TEXT,
                '255',
                [
                    'nullable => false',
                ],
                'ProductName'
            )->addColumn(
                'sku',
                Table::TYPE_TEXT,
                '255',
                [
                    'nullable' => false,
                ],
                'SKU'
            )->addColumn(
                'customername',
                Table::TYPE_TEXT,
                '255',
                [
                    'nullable => false',
                ],
                'CustomerName'
            )
            ->addColumn(
            'created_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
            'Created At'
            )->setComment('logtable');
            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}