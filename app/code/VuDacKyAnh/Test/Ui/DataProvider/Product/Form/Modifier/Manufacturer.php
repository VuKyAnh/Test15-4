<?php
namespace VuDacKyAnh\Test\Ui\DataProvider\Product\Form\Modifier;

use Magento\Catalog\Model\Locator\LocatorInterface;
use VuDacKyAnh\Test\Model\ManufacturerFactory as Manu;
use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AbstractModifier;

class Manufacturer extends AbstractModifier
{
    protected $locator;
    protected $manufacturer;

    public function __construct(
        LocatorInterface $locator,
        Manu $manufacturer
    ) {
        $this->locator = $locator;
        $this->manufacturer = $manufacturer;
    }
    public function modifyMeta(array $meta)
    {
        $meta['test_fieldset_name'] = [
            'arguments' => [
                'data' => [
                    'config' => [
                        'componentType' => 'fieldset',
                        'label' => __('Manufacturer'),
                        'sortOrder' => 290,
                        'collapsible' => true,

                    ]
                ]
            ],
            'children' => [
                'test_field_name' => [
                    'arguments' => [
                        'data' => [
                            'config' => [
                                'dataType' => 'text',
                                'formElement' => 'input',
                                'componentType' => 'field',
                                'visible' => 1,
                                'required' => 1,
                                'label' => ('Name'),
                                'code' => 'test_field_name',
                                'dataScope' => 'data.product.test_field_name'
                            ]
                        ]
                    ]
                ],
                'test_field_address' => [
                    'arguments' => [
                        'data' => [
                            'config' => [
                                'dataType' => 'text',
                                'formElement' => 'input',
                                'componentType' => 'field',
                                'visible' => 1,
                                'required' => 1,
                                'label' => ('Address'),
                                'code' => 'test_field_address',
                                'dataScope' => 'data.product.test_field_address'
                            ]
                        ]
                    ]
                ],
                'test_field_contract_phone' => [
                    'arguments' => [
                        'data' => [
                            'config' => [
                                'dataType' => 'text',
                                'formElement' => 'input',
                                'componentType' => 'field',
                                'visible' => 1,
                                'required' => 1,
                                'label' => ('Contact Phone'),
                                'code' => 'test_field_contract_phone',
                                'dataScope' => 'data.product.test_field_contract_phone'
                            ]
                        ]
                    ]
                ],
                'test_field_contract_name' => [
                    'arguments' => [
                        'data' => [
                            'config' => [
                                'dataType' => 'text',
                                'formElement' => 'input',
                                'componentType' => 'field',
                                'visible' => 1,
                                'required' => 1,
                                'label' => ('Contact Name'),
                                'code' => 'test_field_contract_name',
                                'dataScope' => 'data.product.test_field_contract_name'
                            ]
                        ]
                    ]
                ]
            ]
        ];
        return $meta;
    }

    /**
     * {@inheritdoc}
     */
    public function modifyData(array $data)
    {
        $modelId = $this->locator->getProduct()->getId();
        $value = $this->getManufacturer();
        $data[$modelId]['product']['test_field_name']=$value->getName();
        $data[$modelId]['product']['test_field_address']=$value->getAddress();
        $data[$modelId]['product']['test_field_contact_phone']=$value->getContact_phone();
        $data[$modelId]['product']['test_field_contact_name']=$value->getContact_name();
        return $data;
    }

    public function getManufacturer(){
        $collection = $this->manufacturer->create()->getCollection()
            ->addFieldToFilter('product_id', $this->locator->getProduct()->getId());
        $model=$collection->getFirstItem();
        return $model;
    }
}