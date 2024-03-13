<?php

namespace Training\TodoList\Controller\Todo;

use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Message\ManagerInterface;
use Training\TodoList\Model\TodoList\TodoListCollectionFactory;
use Magento\Framework\Controller\Result\RedirectFactory;

class Delete implements HttpPostActionInterface
{
    /**
     * @param TodoListCollectionFactory $todoListCollectionFactory
     * @param RequestInterface $request
     * @param RedirectFactory $redirectFactory
     */
    public function __construct(
        private TodoListCollectionFactory $todoListCollectionFactory,
        private RequestInterface $request,
        protected ManagerInterface $messageManager,
        protected RedirectFactory $redirectFactory,
    ) {

    }

    /**
     * @return Redirect
     */
    public function execute(): Redirect
    {
        $id = $this->request->getParam('id');
        try {
            $c = $this->todoListCollectionFactory->create()->addFieldToFilter('id', ['eq' => $id]);
            $model = $c->getFirstItem();

            if (empty($model)) {
                throw new \Exception('Not found', 404);
            }

            $model->delete();

            $redirect = $this->redirectFactory->create();

            return $redirect->setPath('*/*/get');
        } catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
        }
    }
}