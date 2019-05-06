<?php
namespace	VuDacKyAnh\Test\Controller\Member;
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
        \Magento\Framework\App\Action\Context	$context,
        \Magento\Framework\View\Result\PageFactory	$resultPageFactory
    )	{
        $this->resultPageFactory	=	$resultPageFactory;
        parent::__construct($context);
    }
    public	function	execute()
    {
        $resultPage	=	$this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Member Info'));
        return	$resultPage;
    }
}