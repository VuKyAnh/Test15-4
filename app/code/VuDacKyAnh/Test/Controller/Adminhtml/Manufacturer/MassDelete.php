<?php

namespace VuDacKyAnh\Test\Controller\Adminhtml\Manufacturer;

use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use VuDacKyAnh\Test\Model\ManufacturerFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\ResponseInterface;

class MassDelete extends \Magento\Backend\App\Action
{
    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @var ManufacturerFactory
     */
    protected $_manufacturer;

    /**
     * @param Context $context
     * @param Filter $filter
     * @param ManufacturerFactory $collectionFactory
     */
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    /**
     * Dispatch request
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $data = $this->getRequest()->getParams('selected');
        $array = $data['selected'];
        $count = 0;

        try {
            foreach ($array as $item) {
                $model = $this->_objectManager->create('VuDacKyAnh\Test\Model\Manufacturer')->load($item);
                $model->delete();
                $count++;
            }
            $this->messageManager->addSuccessMessage(__('A total of %1 record(s) have been deteled.', $count));
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        } catch (\Exception $e) {
            $this->_getSession()->addException($e, __('Something went wrong while delete the post(s).'));
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);

        return $resultRedirect->setPath('*/*/');
    }
}