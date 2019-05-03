<?php

namespace VuDacKyAnh\Test\Observer;

use Magento\Framework\Event\ObserverInterface;
use VuDacKyAnh\Test\Model\ManufacturerFactory;

class Productsaveafter implements ObserverInterface
{
    protected $_manufacturer;

    public function __construct(ManufacturerFactory $manufacturer)
    {
        $this->_manufacturer = $manufacturer;

    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $_product = $observer->getProduct();  // you will get product object
        $_product_id = $_product->getEntity_id();
        $_test_field_name = $_product->getTest_field_name();
        $_test_field_address = $_product->getTest_field_address();
        $_test_field_contract_phone = $_product->getTest_field_contract_phone();
        $_test_field_contract_name = $_product->getTest_field_contract_name();
        $model = $this->_manufacturer->create();
        $modelUpdate = $model->load($_product_id,'product_id');
        $modelUpdate->setName($_test_field_name);
        $modelUpdate->setAddress($_test_field_address);
        $modelUpdate->setContract_phone($_test_field_contract_phone);
        $modelUpdate->setContract_name($_test_field_contract_name);
        $modelUpdate->save();
    }
}