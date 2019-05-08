<?php
namespace VuDacKyAnh\Test\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class Enabled extends Column
{
    /**
     *
     * @param ContextInterface   $context
     * @param UiComponentFactory $uiComponentFactory
     * @param array              $components
     * @param array              $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                if($item['enabled'] == 0){
                    $item[$this->getData('name')] = "<span class='grid-severity-critical'><span>Disabled</span></span>";//Value which you want to display
                }else{
                    $item[$this->getData('name')] = "<span class='grid-severity-notice'><span>Enable</span></span>";//Value which you want to display
                }

            }
        }
        return $dataSource;
    }
}