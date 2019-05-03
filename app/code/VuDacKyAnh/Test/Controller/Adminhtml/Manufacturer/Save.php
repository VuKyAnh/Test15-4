<?php

namespace VuDacKyAnh\Test\Controller\Adminhtml\Manufacturer;

use VuDacKyAnh\Test\Model\ManufacturerFactory as Manufacturer;
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
        $this->messageManager->addSuccessMessage('Add done !');
        $this->_redirect("test/manufacturer/index");
    }
}