<?php


namespace VuDacKyAnh\Test\Model\Attribute\Source;

class Manufacturer extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * Get all options
     * @return array
     */
    public function getAllOptions()
    {
        $obj = \Magento\Framework\App\ObjectManager::getInstance();
        $helper = $obj->create('VuDacKyAnh\Test\Model\ManuEntity');
        $tags = $helper->getCollection();
        foreach($tags as $tag){
            if($tag->getEnabled() == 1){
                $label = $tag->getName();
                $value = $tag->getEntity_id();
                $option[] = array('label'=>$label,'value'=>$value);
            }
        }
        $this->_options = $option;
        return $this->_options;
    }
}

