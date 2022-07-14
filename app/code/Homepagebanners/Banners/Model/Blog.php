<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 *
 * Created By: MageDelight Pvt. Ltd
 */
namespace Homepagebanners\Banners\Model;
use Magento\Framework\Model\AbstractModel;
use Homepagebanners\Banners\Model\ResourceModel\Blog as BlogResourceModel;
class Blog extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init(BlogResourceModel::class);
    }
}