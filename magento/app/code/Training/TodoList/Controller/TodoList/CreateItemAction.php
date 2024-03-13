<?php

namespace Training\TodoList\Controller\TodoList;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Training\TodoList\Model\TodoList\TodoListCollectionFactory;
use Magento\Framework\Message\ManagerInterface;

class CreateItemAction implements HttpPostActionInterface
{
    /**
     * @param PageFactory $pageFactory
     * @param RequestInterface $request
     */
    public function __construct(
        private RequestInterface $request,
        private TodoListCollectionFactory $todoListCollectionFactory,
        protected ManagerInterface $messageManager
    ) {

    }

    /**
     * @inheritdoc
     */
    public function execute()
    {
        $text = $this->request->getParam('text');

        try {
            $c = $this->todoListCollectionFactory->create();

            $model = $c->getNewEmptyItem();

            $model->addData([
                'text' => $text
            ])->save();
        } catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
        }
    }
}