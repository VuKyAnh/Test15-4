<?php

namespace VuDacKyAnh\Test\Controller\Adminhtml\Member;

use VuDacKyAnh\Test\Model\MemberFactory as Manufacturer;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;


class Save extends \Magento\Framework\App\Action\Action
{
    protected $_menu;

    public function __construct(Context $context, Manufacturer $menu)
    {
        $this->_menu = $menu;
        parent::__construct($context);
    }

    /**
     * @return void
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $movieModel = $this->_menu->create();
        $movieModel->setData($data)->save();
        $this->messageManager->addSuccessMessage('All Done !');
        $this->_redirect("test/member/index");
    }
}