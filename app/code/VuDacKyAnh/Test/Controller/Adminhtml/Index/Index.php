<?php
namespace	VuDacKyAnh\Test\Controller\Adminhtml\Index;
use Magento\Framework\App\Action\Context;
class	Index	extends	\Magento\Framework\App\Action\Action
{
    /**
     *	Index	action
     *
     *	@return	$this
     */
    protected	$resultPageFactory;
    public	function	__construct(
        Context	$context,
        \Magento\Framework\View\Result\PageFactory	$resultPageFactory
    )	{
        $this->resultPageFactory	=	$resultPageFactory;
        parent::__construct($context);
    }
    public	function	execute()
    {
        $resultPage	=	$this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Manufacturer'));
        return	$resultPage;
    }
}