<?php

namespace VuDacKyAnh\Test\Controller\Adminhtml\Manufacturer;
class Delete extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'VuDacKyAnh_Test::manufacturer_delete';
    /**
     * Delete manufacturer
     *
     * @return \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
        // check if we know what should be deleted
        $manu = (int)$this->getRequest()->getParam('id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($manu && (int) $manu > 0) {
            try {
                $model = $this->_objectManager->create('VuDacKyAnh\Test\Model\Manufacturer');
                $model->load($manu);
                $model->delete();
                $this->messageManager->addSuccess(__('The Banner has been deleted successfully.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addError($e->getMessage());
                // go back to the question grid
                return $resultRedirect->setPath('*/*/index');
            }
        }
        // display error message
        $this->messageManager->addError(__('Manufacturer doesn\'t exist any longer.'));
        // go to the question grid
        return $resultRedirect->setPath('*/*/index');
    }
}

