<?php
namespace VuDacKyAnh\Test\Controller\Adminhtml\Member;
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
        $id = $this->getRequest()->getParam('member_id');
        $model = $this->_objectManager->create('VuDacKyAnh\Test\Model\Member');
        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getMember_id()) {
                $this->messageManager->addError(__('This member no longer exists.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();

                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('member', $model);
        // 5. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu(
            'VuDacKyAnh_Test::all_member'
        )->addBreadcrumb(
            __('Member'), __('Member')
        )->addBreadcrumb(
            __('All Member'), __('All Member')
        )->addBreadcrumb(
            $id ? __('Edit Member') : __('New Member'),
            $id ? __('Edit Member') : __('New Member')
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