<?php

namespace VuDacKyAnh\Test\Ui\Component\Listing\Column;
use Magento\Framework\Escaper;
use Magento\Framework\Data\OptionSourceInterface;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory as Pro;
//use VuDacKyAnh\Test\Model\ManufacturerFactory as Pro;

class Options implements OptionSourceInterface
{

    protected $escaper;
    protected $_pro;

    protected $options;

    protected $currentOptions = [];

    public function __construct(Pro $pro, Escaper $escaper)
    {
        $this->_pro = $pro;
        $this->escaper = $escaper;
    }
    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        if ($this->options !== null) {
            return $this->options;
        }
        $this->options = $this->getAvailableGroups();
        return $this->options;
    }
    /**
     * Prepare groups
     *
     * @return array
     */
    private function getAvailableGroups()
    {
        $collection = $this->_pro->create();
        $collection->addAttributeToSelect('*');
        $result = [];
        $result[] = ['value' => ' ', 'label' => 'Select...'];
        foreach ($collection as $group) {
            $result[] = ['value' => $group->getId(), 'label' => $group->getName()];
        }
        return $result;
    }
}