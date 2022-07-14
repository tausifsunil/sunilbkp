<?php
namespace Simplerouter\Demo\Helper;
use \Magento\Framework\App\Helper\AbstractHelper;
class Data extends AbstractHelper
{
       public function __construct(
           \Magento\Framework\App\Helper\Context $context,
           \Magento\Eav\Model\Attribute $eavAttribute,
           \Magento\Eav\Model\Entity $entity
       ) {
           $this->eavAttribute = $eavAttribute;
           $this->entity = $entity;
           parent::__construct($context);
       }
       public function getCustomerUserDefinedAttributes()
       {
           $attributeCollection = $this->eavAttribute->getCollection();
           return $attributeCollection;
       }
}