<?php
namespace VuDacKyAnh\Test\Ui\Component\Listing\Column;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;

class GetProduct extends Column
{

    protected $_product;

    public function __construct(ContextInterface $context, CollectionFactory $product, UiComponentFactory $uiComponentFactory, array $components = [], array $data = [])
    {
        $this->_product = $product;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }


//    public function GetProduct($produc_id)
//    {
////        $id = $this->getRequest()->getParam('id');
////        $id =1;
//        $collection = $this->_product->create()->load($produc_id);
//        $result = $collection->getName();
//        return $result;
//    }
}