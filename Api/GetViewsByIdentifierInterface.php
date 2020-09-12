<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Petrovski\CmsPageViews\Api;

/**
 * Command to load the page data by specified identifier
 * @api
 * @since 103.0.0
 */
interface GetViewsByIdentifierInterface
{
    /**
     * Load page data by given page identifier.
     *
     * @param string $identifier
     * @param int $storeId
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @return \Magento\Cms\Api\Data\PageInterface
     * @since 103.0.0
     */
    public function execute(string $identifier, int $storeId) : \Petrovski\CmsPageViews\Api\Data\ViewsInterface;
}
