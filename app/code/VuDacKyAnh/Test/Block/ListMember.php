<?php

namespace VuDacKyAnh\Test\Block;

use Magento\Framework\View\Element\Template\Context;
use VuDacKyAnh\Test\Model\MemberFactory as Mem;

//use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory as Pro;
/**
 * Test List block
 */
class ListMember extends \Magento\Framework\View\Element\Template
{
    protected $customerSession;
    protected $_mem;
    public function __construct( Context $context,\Magento\Customer\Model\Session $customerSession, Mem $mem, array $data = [])
    {
        $this->_mem = $mem;
        $this->customerSession = $customerSession;
        parent::__construct($context,$data);
    }

    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

    public function getOptions()
    {
        $collection = $this->_mem->create()->getCollection();
        return $collection;
    }

    public function  getFormAction()
    {
        return 'save';
    }

    public function getInfoMember()
    {
        $info = $this->customerSession->getCustomer();
        return $info;
    }



}