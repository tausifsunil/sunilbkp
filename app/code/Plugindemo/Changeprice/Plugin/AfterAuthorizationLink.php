<?php

namespace Plugindemo\Changeprice\Plugin;

class AfterAuthorizationLink
{
	public function afterGetLabel(\Magento\Customer\Block\Account\AuthorizationLink $subject, $result)
    {
        return $subject->isLoggedIn() ? __('Afmelden') : __('Inloggen');
    }

}