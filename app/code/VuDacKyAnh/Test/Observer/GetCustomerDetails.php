<?php
namespace VuDacKyAnh\Test\Observer;

use Magento\Framework\Event\ObserverInterface;
use VuDacKyAnh\Test\Model\MemberFactory;

class GetCustomerDetails implements ObserverInterface
{
    protected $_customerRepositoryInterface;
    protected $_member;

    public function __construct(
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface,
        MemberFactory $member
    ) {
        $this->_customerRepositoryInterface = $customerRepositoryInterface;
        $this->_member = $member;

    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();
//        print_r($customer->getId());
        $name = $customer->getLastname();
        $address = $customer->getEmail();
        $phone = '1111111111';
        $model = $this->_member->create();
        $model->setName($name);
        $model->setAddress($address);
        $model->setPhone($phone);
        $model->save();

    }
}