<?php
namespace Petrovski\CmsPageViews\Service;

//declare(strict_types=1);
use Psr\Log\LoggerInterface;
use Petrovski\CmsPageViews\Model\ResourceModel\Views\Collection;
use Petrovski\CmsPageViews\Model\ResourceModel\Views\CollectionFactory;
use Magento\Store\Model\ScopeInterface;

/**
 * Class PageStatusUpdater
 */
class ViewsCountUpdate
{
      /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $_scopeConfig;

    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * ViewsCountUpdate constructor.
     * @param LoggerInterface $logger
     * @param CollectionFactory $collectionFactory
     * @param \Magento\Framework\View\Element\Context $context
     */
    public function __construct(
        LoggerInterface $logger,
        CollectionFactory $collectionFactory,
        \Magento\Framework\View\Element\Context $context
    ) {
        $this->logger = $logger;
        $this->collectionFactory = $collectionFactory;
        $this->_scopeConfig = $context->getScopeConfig();
    }

    /**
     * @param string $documentStatus
     * @throws LocalizedException
     * @throws AlreadyExistsException
     */
    public function execute(int $pageId, $type) {
        $homePageIdentifier = $this->_scopeConfig->getValue(
            'web/cms_page_views_counters/cms_count_views',
            ScopeInterface::SCOPE_STORE
        );

        $views = $this->getViews($pageId);
        $viewRecordId = $views->getData('id');
        $frontendViews = $views->getData('frontend_counter');
        $backendViews = $views->getData('backend_counter');

        if($type==1) {
            $frontendViews = $views->getData('frontend_counter') + 1;
        } else {
            $backendViews = $views->getData('backend_counter') + 1;
        }

        if(!$viewRecordId) {
            $data = [
                'cms_page_id' => $pageId,
                'backend_counter' => 1,
                'frontend_counter' => 1
            ];
            $views->setData($data);
            $views->save();
        } else {
            $data = [
                'id' => $viewRecordId,
                'frontend_counter' => $frontendViews,
                'backend_counter' => $backendViews
            ];
            $views->setData($data);
            $views->save();
        }
    }

    /**
     * @param int $pageId
     * @return DataObject
     */

    private function getViews($pageId) {
        $collection = $this->collectionFactory->create();
        $collection->addFieldToFilter('cms_page_id', $pageId);
        return $collection->getFirstItem();
    }
}