<?php
namespace Cmsblockcall\Cmsblock\Block;
class Header extends \Magento\Framework\View\Element\Template
{
	public function __construct(\Magento\Framework\View\Element\Template\Context $context,
	\Magento\Customer\Model\Session $session,
	\Magento\Directory\Block\Currency $currency
	)
	{
    	$this->session = $session;
    	$this->currency = $currency;
		parent::__construct($context);
	}
	public function headerdata()
	{
	
                $currencydata = $this->currency;
                
                $Cunfiguredcurrency = $currencydata->getCurrencies();
                $keys = array_keys($Cunfiguredcurrency);
                $value = array_values($Cunfiguredcurrency);
                $count=0;
                for($i=0;$i<sizeof($Cunfiguredcurrency);$i++)
                {
                    $data[] = $keys[$i]."-".$value[$i];
                }
                $currency = [];
                $currency['currencyname'] = 'india';
                print_r($currency);
                // $currency[''] = $data;
                // print_r($currency['currency']);;                
                // $headerdata['currency']		// $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		// $customerSession = $objectManager->get('Magento\Customer\Model\Session');

		// echo "<pre>";
		// print_r(get_class_methods($customerSession));
		// die;

		// if($customerSession->isLoggedIn()) {
		//     return "123";
		// } else {
		// 	return "456";

		// }
	}
}