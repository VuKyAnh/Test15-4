<?php

namespace VuDacKyAnh\Test\Controller\Adminhtml\ManuEntity;

use VuDacKyAnh\Test\Model\ManuEntityFactory as ManuEntity;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;


class Save extends \Magento\Framework\App\Action\Action
{
    protected $_menu;

    public function __construct(Context $context, ManuEntity $menu)
    {
        $this->_menu = $menu;
        parent::__construct($context);
    }


    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $movieModel = $this->_menu->create();
        $movieModel->setData($data)->save();
        $this->messageManager->addSuccessMessage('All Done !');
        $this->_redirect("test/manuentity/index");
    }
}