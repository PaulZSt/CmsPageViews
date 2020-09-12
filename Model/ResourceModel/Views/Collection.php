<?php

namespace Petrovski\CmsPageViews\Model\ResourceModel\Views;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Petrovski\CmsPageViews\Model\Views;
use Petrovski\CmsPageViews\Model\ResourceModel\Views as ResourceViews;

class Collection extends AbstractCollection
{

    protected function _construct()
    {
        $this->_init(Views::class, ResourceViews::class);
        parent::_construct();
    }


}
