<?php
namespace Categorycustom\Attributeset\Setup;

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
        
      $eavSetup->addAttribute(
        \Magento\Catalog\Model\Category::ENTITY,
        'attributeset',
        [
            'type' => 'varchar',
            'label' => 'Attributeset',
            'input' => 'multiselect',
            //'source'=>
            'visible' => true,
            'required' => false,
            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
            'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
            'group' => 'Custome',
        ]
        );
    }
}