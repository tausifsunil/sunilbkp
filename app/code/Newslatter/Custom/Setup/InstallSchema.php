<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 *
 * Created By: MageDelight Pvt. Ltd.
 */
namespace Newslatter\Custom\Setup;
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
         * Create table 'newslatter_custom'
         */
        if (!$installer->tableExists('newslatter_custom')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('newslatter_custom')
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
                'firstname',
                Table::TYPE_TEXT,
                255,
                [
                    'nullable => false',
                ],
                'FirstName'
            )->addColumn(
                'lastname',
                Table::TYPE_TEXT,
                255,
                [
                    'nullable => false',
                ],
                'LastName'
            )->addColumn(
                'email',
                Table::TYPE_TEXT,
                '2M',
                [],
                'Email'
            )->setComment('Newslatter Table');
            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}