<?php

namespace Training\TodoList\Controller\TodoList;

use Magento\Framework\App\Action\HttpDeleteActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Message\ManagerInterface;
use Training\TodoList\Model\TodoList\TodoListCollectionFactory;

class CreateItemAction implements HttpDeleteActionInterface
{
    /**
     * @param TodoListCollectionFactory $todoListCollectionFactory
     * @param RequestInterface $request
     */
    public function __construct(
        private TodoListCollectionFactory $todoListCollectionFactory,
        private RequestInterface $request,
        protected ManagerInterface $messageManager
    ) {

    }

    /**
     * @inheritdoc
     */
    public function execute()
    {
        $id = $this->request->getParam('id');
        try {
            $c = $this->todoListCollectionFactory->create()->addFieldToFilter('id', ['eq' => $id]);
            $model = $c->getFirstItem();

            if (empty($model)) {
                throw new \Exception('Not found', 404);
            }

            $model->delete();
        } catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
        }
    }
}