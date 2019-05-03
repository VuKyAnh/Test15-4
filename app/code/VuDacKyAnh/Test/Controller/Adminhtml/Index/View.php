<?php

namespace VuDacKyAnh\Test\Controller\Adminhtml\Index;

use Magento\Framework\App\Action\Context;
use VuDacKyAnh\Test\Model\ManufacturerFactory;

class View extends \Magento\Framework\App\Action\Action {

    protected $_manufacturer;
    public function __construct(Context $context,ManufacturerFactory $manufacturer)
    {
        $this->_manufacturer = $manufacturer;
        parent::__construct($context);
    }

    public function execute()
    {
        $collection = $this->_manufacturer->create()->getCollection();
        foreach ($collection as $data)
        {
            print_r($data->getID());
            echo "<br/>";
            print_r($data->getProductId());
            echo "<br/>";
            print_r($data->getName());
            echo "<br/>";
            print_r($data->getAddress());
            echo "<br/>";
            print_r($data->getContactPhone());
            echo "<br/>";
            print_r($data->getContactName());
            echo "<br/>";

        }
    }

}