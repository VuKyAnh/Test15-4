<?php
namespace VuDacKyAnh\Test\Controller\Adminhtml\Member;

use Magento\Framework\Controller\ResultFactory;

class NewAction extends \Magento\Backend\App\Action
{
    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        return $resultPage;
    }
}