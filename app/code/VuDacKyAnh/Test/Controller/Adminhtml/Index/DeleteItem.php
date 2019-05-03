<?php
namespace	VuDacKyAnh\Test\Controller\Adminhtml\Index;
class	DeleteItem	extends	\Magento\Framework\App\Action\Action	{
    public	function	execute()	{
        $collection	=	$this->_objectManager->create('VuDacKyAnh\Test\Model\Manufacturer');
        $collection->load(1);
        $collection->delete();
        $this->getResponse()->setBody('success');
    }
}