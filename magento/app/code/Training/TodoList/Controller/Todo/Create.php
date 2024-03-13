<?php

namespace Training\TodoList\Controller\Todo;

use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\View\Result\PageFactory;
use Training\TodoList\Model\TodoList\TodoListCollectionFactory;
use Magento\Framework\Message\ManagerInterface;

class Create implements HttpPostActionInterface
{
    /**
     * @param PageFactory $pageFactory
     * @param RequestInterface $request
     * @param RedirectFactory $redirectFactory
     */
    public function __construct(
        private RequestInterface $request,
        private TodoListCollectionFactory $todoListCollectionFactory,
        protected ManagerInterface $messageManager,
        protected RedirectFactory $redirectFactory,
    ) {

    }

    /**
     * @return Redirect
     */
    public function execute(): Redirect
    {
        $text = $this->request->getParam('text');

        try {
            $c = $this->todoListCollectionFactory->create();

            $model = $c->getNewEmptyItem();

            $model->addData([
                'text' => $text
            ])->save();

            $redirect = $this->redirectFactory->create();

            return $redirect->setPath('*/*/get');
        } catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
        }
    }
}