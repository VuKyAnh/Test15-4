<?php
namespace VuDacKyAnh\Test\Controller\Adminhtml\ManuEntity;
class Edit extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;
    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magento\Framework\Registry $coreRegistry
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $coreRegistry
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);
    }
    /**
     * Edit action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('entity_id');
        $model = $this->_objectManager->create('VuDacKyAnh\Test\Model\ManuEntity');
        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getEntity_id()) {
                $this->messageManager->addError(__('This member no longer exists.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();

                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('entity', $model);
        // 5. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu(
            'VuDacKyAnh_Test::all_manuentity'
        )->addBreadcrumb(
            __('Entity'), __('Entity')
        )->addBreadcrumb(
            __('All Entity'), __('All Entity')
        )->addBreadcrumb(
            $id ? __('Edit Entity') : __('New Entity'),
            $id ? __('Edit Entity') : __('New Entity')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Edit Member'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? $model->getName() : __('New Member'));
        return $resultPage;
    }
    /**
     * Authorization level of a basic admin session
     *
     * @return bool
     */
}