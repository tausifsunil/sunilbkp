<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 *
 * Created By: MageDelight Pvt. Ltd.
 */
namespace Homepagebanners\Banners\Setup;
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
         * Create table 'homepagebanners_banners'
         */
        if (!$installer->tableExists('homepagebanners_banners')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('homepagebanners_banners')
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
                'position',
                Table::TYPE_TEXT,
                255,
                [
                    'nullable => false',
                ],
                'Position'
            )->addColumn(
                'status',
                Table::TYPE_SMALLINT,
                null,
                [
                    'nullable' => false,
                ],
                'Status'
            )->addColumn(
                'logo',
                Table::TYPE_TEXT,
                256,
                [
                    'nullable => false',
                ],
                'Image'
            )->setComment('HomepageSlider Table');
            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}