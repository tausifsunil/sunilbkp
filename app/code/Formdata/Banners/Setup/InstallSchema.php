<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 *
 * Created By: MageDelight Pvt. Ltd.
 */
namespace Formdata\Banners\Setup;
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
         * Create table 'formdata_banners'
         */
        if (!$installer->tableExists('formdata_banners')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('formdata_banners')
            )->addColumn(
                'blog_id',
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
                'name',
                Table::TYPE_TEXT,
                255,
                [
                    'nullable => false',
                ],
                'Name'
            )->addColumn(
                'email',
                Table::TYPE_TEXT,
                '2M',
                [],
                'Email'
            )->addColumn(
                'hobby',
                Table::TYPE_TEXT,
                '2M',
                [],
                'hobby'
            )->addColumn(
                'dob',
                Table::TYPE_DATE,
                null,
                ['nullable'=> false],
                'Date of Birth'
            )->addColumn(
                'logo',
                Table::TYPE_TEXT,
                256,
                [
                    'nullable => false',
                ],
                'Image'
            )->setComment('Formdata Table');
            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}