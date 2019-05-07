<?php
namespace	VuDacKyAnh\Test\Model\ResourceModel;
class	ManuEntity	extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb	{
    public	function	_construct()	{
        $this->_init('manufacturer_entity',	'entity_id');
    }
}