<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Petrovski\CmsPageViews\Model;

use Magento\Framework\Model\AbstractModel;
use Petrovski\CmsPageViews\Model\ResourceModel\Views as ResourceViews;

class Views extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceViews::class);
        parent::_construct();
    }
}
