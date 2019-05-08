<?php
namespace VuDacKyAnh\Test\Model;

use VuDacKyAnh\Test\Model\ResourceModel\ManuEntity\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
class ManuEntityDataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $_loadedData;
    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;
    protected $collection;
    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $movieCollectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $movieCollectionFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $movieCollectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data
     *
     * @return array
     */
    //Load dữ liệu đã có ra form edit
    public function getData()
    {
        //return [];
        if (isset($this->_loadedData)) {
            return $this->_loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $employee) {
            $this->_loadedData[$employee->getId()] = $employee->getData();
        }
        return $this->_loadedData;
    }
}