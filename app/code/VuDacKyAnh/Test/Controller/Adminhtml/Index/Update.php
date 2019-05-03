<?php

namespace VuDacKyAnh\Test\Controller\Adminhtml\Index;

use Magento\Framework\App\Action\Context;

class Update extends \Magento\Framework\App\Action\Action {

    protected $_manufacturer;
    public function __construct(Context $context,\VuDacKyAnh\Test\Model\ManufacturerFactory $manufacturer)
    {
        $this->_manufacturer = $manufacturer;
        parent::__construct($context);
    }

    public function execute()
    {
        $collection = $this->_manufacturer->create()->getCollection();
        foreach ($collection as $data) {
            $data->setAddress('Hanoi, Vietnam');
            $data->save();
        }
        // TODO: Implement execute() method.
    }

}