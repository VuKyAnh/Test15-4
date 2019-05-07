<?php
namespace VuDacKyAnh\Test\Model\ResourceModel\ManuEntity;
/**
 *	Subscription	Collection
 */
class	Collection	extends
    \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     *	Initialize	resource	collection
     *
     *	@return	void
     */
    public	function	_construct()	{
        $this->_init('VuDacKyAnh\Test\Model\ManuEntity',
            'VuDacKyAnh\Test\Model\ResourceModel\ManuEntity');
    }

}