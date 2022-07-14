<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 *
 * Created By: MageDelight Pvt. Ltd.
 */
namespace Logtable\Getdata\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class Blog extends AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('logtable', 'id');
    }
}