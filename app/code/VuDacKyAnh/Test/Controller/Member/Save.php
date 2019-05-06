<?php

namespace VuDacKyAnh\Test\Controller\Member;

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
        if($data)
        {
            $id = $this->getRequest()->getParam('member_id');
            $model = $this->_menu->create()->load($id);
            $model->setData($data)->save();
            $this->_redirect("part/member/index");
        }
    }
}