<?php

namespace Training\TodoList\Controller\Adminhtml\Todo;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Result\PageFactory;
use Training\TodoList\Controller\Get as GetAction;

class Get extends Action implements HttpGetActionInterface
{
    /**
     * @param PageFactory $pageFactory
     */
    public function __construct(
        Context $context,
        private PageFactory $pageFactory,
        private RequestInterface $request,
    ) {
        parent::__construct($context);
    }

    /**
     * @inheritdoc
     */
    public function execute()
    {
        $getAction = new GetAction(
            $this->pageFactory,
            $this->request
        );

        return $getAction->execute();
    }
}