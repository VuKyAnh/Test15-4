<?php

namespace VuDacKyAnh\Test\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;


class PreventCart implements ObserverInterface
{

    const XML_TEXTFIELD_VALUE = 'member_config/part_time/product_name';


    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;
    protected $configWriter;
    protected $_configInterface;

    /**
     * AdminFailed constructor.
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\App\Config\Storage\WriterInterface $configWriter,
        \Magento\Framework\App\Config\ConfigResource\ConfigInterface $configInterface
    )
    {
        $this->scopeConfig = $scopeConfig;
        $this->configWriter = $configWriter;
        $this->_configInterface = $configInterface;
    }

    public function execute(Observer $observer)
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $text_field = $this->scopeConfig->getValue(self::XML_TEXTFIELD_VALUE, $storeScope);
        $text_field=strtolower($text_field);

        $name=$observer->getProduct()->getName();
        $name=strtolower($name);
        if(!strstr($name,$text_field)){
            throw new \Exception('Product name must contain: '.$text_field);
        }


    }
}