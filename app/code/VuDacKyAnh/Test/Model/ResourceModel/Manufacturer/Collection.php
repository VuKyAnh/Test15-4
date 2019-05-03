<?php
namespace VuDacKyAnh\Test\Model\ResourceModel\Manufacturer;
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
        $this->_init('VuDacKyAnh\Test\Model\Manufacturer',
            'VuDacKyAnh\Test\Model\ResourceModel\Manufacturer');
    }

//    protected function _initSelect()
//    {
//        parent::_initSelect();
//
//        $this->getSelect()->joinLeft(
//            ['secondTable' => $this->getTable('catalog_product_entity')],
//            'main_table.id = secondTable.entity_id',
//            ['Sku']
//        );
//    }
}