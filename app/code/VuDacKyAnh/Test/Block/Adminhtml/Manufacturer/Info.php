<?php

    namespace VuDacKyAnh\Test\Block\Adminhtml\Manufacturer;

    use Magento\Framework\View\Element\Template\Context;
    use VuDacKyAnh\Test\Model\ManufacturerFactory as Manu;

    use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory as Pro;
    /**
     * Test List block
     */
    class Info extends \Magento\Framework\View\Element\Template
    {
        protected $_test;
        protected $_manu;
        public function __construct( Context $context, Pro $test, Manu $manu)
        {
            $this->_test = $test;
            $this->_manu = $manu;
            parent::__construct($context);
        }

        public function _prepareLayout()
        {
            $this->pageConfig->getTitle()->set(__('Simple Custom Info List Page'));

            return parent::_prepareLayout();
        }

        public function getOptions()
        {
            $collection = $this->_test->create();
            $collection->addAttributeToSelect('*');
            return $collection;
        }

        public function  getManufacturer()
        {
            $manu = $this->_manu->create()->getCollection();
            return $manu;
        }
    }