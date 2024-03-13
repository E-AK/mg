<?php

namespace Training\TodoList\Controller\Todo;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Result\PageFactory;

class Get implements HttpGetActionInterface
{
    /**
     * @param PageFactory $pageFactory
     * @param RequestInterface $request
     */
    public function __construct(
        private PageFactory $pageFactory,
        private RequestInterface $request
    ) {

    }

    /**
     * @inheritdoc
     */
    public function execute()
    {
        // var_dump($this->request->getFullActionName());
        // exit;
        return $this->pageFactory->create();
    }
}