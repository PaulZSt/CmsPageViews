<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Petrovski\CmsPageViews\Api\Data;

/**
 * CMS page interface.
 * @api
 * @since 100.0.2
 */
interface ViewsInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID                       = 'id';
    const PAGE_ID                  = 'page_id';
    const CMS_PAGE_ID              = 'cms_page_id';
    const BACKEND_COUNTER          = 'backend_counter';
    const FRONTEND_COUNTER         = 'frontend_counter';

    /**#@-*/

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get identifier
     *
     * @return string
     */

    public function getPageId();

    /**
     * Get identifier
     *
     * @return string
     */

    public function getCmsPageId();

    /**
     * Get title
     *
     * @return string|null
     */
    public function getBackendCounter();


    public function getFrontendCounter();


    /**
     * Set ID
     *
     * @param int $id
     * @return \Magento\Cms\Api\Data\PageInterface
     */
    public function setId($id);

    /**
     * Set identifier
     *
     * @param string $identifier
     * @return \Magento\Cms\Api\Data\PageInterface
     */


    public function setCmsPageId($pageId);

    /**
     * Set identifier
     *
     * @param string $identifier
     * @return \Magento\Cms\Api\Data\PageInterface
     */


    public function setBackendCounter($backendCounter);

    /**
     * Set title
     *
     * @param string $title
     * @return \Magento\Cms\Api\Data\PageInterface
     */
    public function setFrontendCounter($frontendCounter);

    /**
     * Set page layout
     *
     * @param string $pageLayout
     * @return \Magento\Cms\Api\Data\PageInterface
     */



}
