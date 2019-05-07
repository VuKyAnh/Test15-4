<?php

namespace VuDacKyAnh\Test\Block;

use Magento\Framework\View\Element\Template\Context;
use VuDacKyAnh\Test\Model\MemberFactory as Mem;
use VuDacKyAnh\Test\Model\ManuEntityFactory as Manu;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory as Pro;
/**
 * Test List block
 */
class ListMember extends \Magento\Framework\View\Element\Template
{
    protected $customerSession;
    protected $_mem;
    protected $_manu;
    protected $_pro;
    public function __construct( Context $context,\Magento\Customer\Model\Session $customerSession, Mem $mem,Pro $pro,Manu $manu, array $data = [])
    {
        $this->_mem = $mem;
        $this->_manu = $manu;
        $this->_pro = $pro;
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

    public function getEntity()
    {
        $collection = $this->_manu->create()->getCollection();
        return $collection;
    }
    public function getProduct()
    {
        $collection = $this->_pro->create();
        $collection->addAttributeToSelect('*');
        return $collection;
    }

}