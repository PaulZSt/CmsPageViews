<?php
namespace Petrovski\CmsPageViews\Plugin;

use Magento\Framework\Exception\LocalizedException;
use Psr\Log\LoggerInterface;
use Petrovski\CmsPageViews\Model\ResourceModel\Views\Collection;
use Petrovski\CmsPageViews\Model\ResourceModel\Views\CollectionFactory;
use Petrovski\CmsPageViews\Service\ViewsCountUpdate;

/**
 * Class Backend
 */
class Backend
{
    /** Plugin Type backend */
    const TYPE = 'backend';

    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    private $_objectManager;

    /**
     * @var LoggerInterface
     */

    private $logger;
    private $collectionFactory;
    private $viewsCountUpdate;

    /**
     * Backend constructor.
     * @param \Magento\Framework\App\RequestInterface $request
     * @param \Magento\Framework\ObjectManagerInterface $objectmanager
     * @param LoggerInterface $logger
     * @param CollectionFactory $collectionFactory
     * @param ViewsCountUpdate $viewsCountUpdate
     */
    public function __construct(\Magento\Framework\App\RequestInterface $request,
                                \Magento\Framework\ObjectManagerInterface $objectmanager,
                                LoggerInterface $logger,
                                CollectionFactory $collectionFactory,
                                ViewsCountUpdate $viewsCountUpdate
    )
    {
        $this->_request = $request;
        $this->_objectManager = $objectmanager;
        $this->logger = $logger;
        $this->collectionFactory = $collectionFactory;
        $this->viewsCountUpdate = $viewsCountUpdate;
    }

    /**
     * @param \Magento\Cms\Controller\Adminhtml\Page\Edit $subject
     * @param $resultPage
     * @return mixed
     */
    public function afterExecute(\Magento\Cms\Controller\Adminhtml\Page\Edit $subject, $resultPage) {

        $pageId = $id = $this->_request->getParam('page_id');
        try {
           $this->viewsCountUpdate->execute($pageId, self::TYPE);
        } catch (LocalizedException $exception) {
            $this->logger->critical($exception);
        }
        return $resultPage;
    }
}