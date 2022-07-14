<?php
namespace Slider\Customization\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;

class InstallData implements InstallDataInterface
{
    /**
     * EAV setup factory
     *
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * Init
     *
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(\Magento\Catalog\Model\Product::ENTITY,
            'slider',
            [
                'type'     => 'int',
                'label'    => 'Is Enable',
                'input'    => 'boolean',
                'source'   => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
                'visible'  => true,
                'default'  => '0',
                'required' => false,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'group'    => 'Custom slider',
            ]
        );
    }
}
