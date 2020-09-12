<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Petrovski\CmsPageViews\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * CMS page CRUD interface.
 * @api
 * @since 100.0.2
 */
interface ViewsRepositoryInterface
{
    /**
     * Save page.
     *
     * @param \Magento\Cms\Api\Data\PageInterface $page
     * @return \Magento\Cms\Api\Data\PageInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\Petrovski\CmsPageViews\Api\Data\ViewsInterface $views);

    /**
     * Retrieve page.
     *
     * @param int $pageId
     * @return \Magento\Cms\Api\Data\PageInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($cmsPageId);

    /**
     * Retrieve pages matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magento\Cms\Api\Data\PageSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */

    public function delete(\Petrovski\CmsPageViews\Api\Data\ViewsInterface $views);

    /**
     * Delete page by ID.
     *
     * @param int $pageId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($cmsPageId);
}
