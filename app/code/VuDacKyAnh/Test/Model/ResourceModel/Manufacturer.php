<?php
namespace	VuDacKyAnh\Test\Model\ResourceModel;
class	Manufacturer	extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb	{
    public	function	_construct()	{
        $this->_init('manufacturer',	'id');
    }
}