<?php
namespace	VuDacKyAnh\Test\Model\ResourceModel;
class	Member	extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb	{
    public	function	_construct()	{
        $this->_init('magenest_part_time',	'member_id');
    }
}