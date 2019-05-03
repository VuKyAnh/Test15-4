<?php
namespace VuDacKyAnh\Test\Controller\Adminhtml\Index;
use VuDacKyAnh\Test\Model\ManufacturerFactory as ManuFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Context;
class Insert extends \Magento\Framework\App\Action\Action{
    protected $_manufacturer;
    protected $resultRedirect;
    public function __construct(\Magento\Framework\App\Action\Context $context,
                                ManuFactory  $manufacturer,
                                \Magento\Framework\Controller\ResultFactory $result){
        parent::__construct($context);
        $this->_manufacturer = $manufacturer;
        $this->resultRedirect = $result;
    }
    public function execute(){
        $resultRedirect = $this->resultRedirect->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        $model = $this->_manufacturer->create();
        $model->addData([
            "name" => 'Michael Cofew',
            "product_id" => '4',
            "address" => 'USA',
            "contract_phone" => '666',
            "contract_name" => 'Grant'
        ]);
        $saveData = $model->save();
        if($saveData){
            $this->messageManager->addSuccess( __('Insert Record Successfully !') );
        }
        return $resultRedirect;
    }
}