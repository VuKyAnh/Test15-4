<?php
namespace VuDacKyAnh\Test\Controller\Adminhtml\Manufacturer;
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
        $id = $this->getRequest()->getParam('id');
        $model = $this->_objectManager->create('VuDacKyAnh\Test\Model\Manufacturer');
        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This manufacturer no longer exists.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();

                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('manufacturer', $model);
        // 5. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu(
            'VuDacKyAnh_Test::all_manufacturer'
        )->addBreadcrumb(
            __('Manufacturer'), __('Manufacturer')
        )->addBreadcrumb(
            __('All Manufacturer'), __('All Manufacturer')
        )->addBreadcrumb(
            $id ? __('Edit Manufacturer') : __('New Manufacturer'),
            $id ? __('Edit Manufacturer') : __('New Manufacturer')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Edit Manufacturer'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? $model->getName() : __('New Manufacturer'));
        return $resultPage;
    }
    /**
     * Authorization level of a basic admin session
     *
     * @return bool
     */
}