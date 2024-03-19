<?php

namespace Training\TodoList\Controller;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Training\TodoList\Model\TodoList\TodoListCollectionFactory;
use Magento\Framework\Controller\Result\Json;

class Delete implements HttpPostActionInterface
{
    /**
     * @param TodoListCollectionFactory $todoListCollectionFactory
     * @param RequestInterface $request
     * @param JsonFactory $resultJsonFactory
     */
    public function __construct(
        private TodoListCollectionFactory $todoListCollectionFactory,
        private RequestInterface $request,
        private JsonFactory $resultJsonFactory,
    ) {

    }

    /**
     * @return Json
     */
    public function execute(): Json
    {
        $id = $this->request->getParam('id');

        $c = $this->todoListCollectionFactory->create()->addFieldToFilter('id', ['eq' => $id]);
        $model = $c->getFirstItem();

        if (empty ($model)) {
            throw new \Exception('Not found', 404);
        }

        $model->delete();

        $resultJson = $this->resultJsonFactory->create();

        return $resultJson->setData($c->getItems());
    }
}