<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Petrovski\CmsPageViews\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Views extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('custom_cms_page_counter', 'id');

    }
}
