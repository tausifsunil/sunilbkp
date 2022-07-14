<?php
namespace Categoryattribute\Custome\Setup;

use Magento\Framework\Setup\{
    ModuleContextInterface,
    ModuleDataSetupInterface,
    InstallDataInterface
};

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory) {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(\Magento\Catalog\Model\Category::ENTITY, 'isenable', [
            'type'     => 'int',
            'label'    => 'Is Enable',
            'input'    => 'boolean',
            'source'   => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
            'visible'  => true,
            'default'  => '0',
            'required' => false,
            'global'   => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
            'group'    => 'Custome',
        ]);

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'text',
            [
                'type'         => 'varchar',
                'label'        => 'text',
                'input'        => 'text',
                'sort_order'   => 100,
                'source'       => '',
                'global'       => 1,
                'visible'      => true,
                'required'     => false,
                'user_defined' => false,
                'default'      => null,
                'group'        => 'Custome',
                'backend'      => ''
            ]
        );

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'select',
            [
                'type' => 'varchar',
                'label' => 'select anyone',
                'input' => 'select',
                'visible' => true,
                'required' => false,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                'group' => 'Custome',
            ]
        );

         $eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'multiselect',
            [
                'type' => 'varchar',
                'label' => 'multiselect',
                'input' => 'multiselect',
                'visible' => true,
                'required' => false,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                'group' => 'Custome',
            ]
        );
    }
}