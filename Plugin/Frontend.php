<?php
namespace Petrovski\CmsPageViews\Plugin;

use Magento\Framework\Exception\LocalizedException;
use Psr\Log\LoggerInterface;
use Petrovski\CmsPageViews\Model\ResourceModel\Views\Collection;
use Petrovski\CmsPageViews\Model\ResourceModel\Views\CollectionFactory;
use Petrovski\CmsPageViews\Service\ViewsCountUpdate;

class Frontend
{
    /** Plugin Type frontend */
    const TYPE = 'frontend';

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $_scopeConfig;

    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    private $_objectManager;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @var ViewsCountUpdate
     */
    private $viewsCountUpdate;

    public function __construct(\Magento\Cms\Api\PageRepositoryInterface $pageRepository,
                                \Magento\Framework\ObjectManagerInterface $objectmanager,
                                LoggerInterface $logger,
                                CollectionFactory $collectionFactory,
                                ViewsCountUpdate $viewsCountUpdate
    )
    {
        $this->pageRepository = $pageRepository;
        $this->_objectManager = $objectmanager;
        $this->logger = $logger;
        $this->collectionFactory = $collectionFactory;
        $this->viewsCountUpdate = $viewsCountUpdate;
    }

    public function afterExecute(\Magento\Cms\Controller\Page\View $subject, $resultPage) {
        $cmsPage = $this->_objectManager->get('\Magento\Cms\Model\Page');
        $pageId = $cmsPage->getId();
        try {
            $this->viewsCountUpdate->execute($pageId, self::TYPE);
        } catch (LocalizedException $exception) {
            $this->logger->critical($exception);
        }
        return $resultPage;
    }
}