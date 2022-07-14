<?php
namespace Configcreate\Customconfig\Block;

// use Magento\Framework\View\Template;
use Magento\Store\Model\ScopeInterface;


class Hello extends \Magento\Framework\View\Element\Template
{
	public function __construct(\Magento\Framework\View\Element\Template\Context $context,
		\Magento\Cms\Model\Template\FilterProvider $filterProvider)
	{
		parent::__construct($context);
		$this->_filterProvider = $filterProvider;
	}


	public function getYesno()
	{
		
		$enable=$this->_scopeConfig->getValue('section1/group1/yesno', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
		return $enable;
	}
	
	public function getText()
	{
		
		$heading=$this->_scopeConfig->getValue('section1/group1/text', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
		return $heading;
		// echo $enable;
		// die();
	}

	public function getSelectone()
	{
		
		$hobbies=$this->_scopeConfig->getValue('section1/group1/selectone', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
		return $hobbies;
		// die();
	}

	public function getLanguage()
	{
		
		$language=$this->_scopeConfig->getValue('section1/group1/language', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
		return $language ;
		// die();
	}	

	public function getEditor()
	{
		$edit=$this->_scopeConfig->getValue('section1/group1/editor', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
	 	$html = $this->_filterProvider->getPageFilter()->filter($edit);
        return $html;
	}		
}
