<?php

namespace Training\TodoList\Controller;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\RequestInterface;
use Training\TodoList\Model\TodoList\TodoListCollectionFactory;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\JsonFactory;

class Update implements HttpPostActionInterface
{
    /**
     * @param TodoListCollectionFactory $todoListCollectionFactory
     * @param RequestInterface $request
     * @param JsonFactory $resultJsonFactory
     */
    public function __construct(
        private TodoListCollectionFactory $todoListCollectionFactory,
        private RequestInterface $request,
        private JsonFactory $resultJsonFactory
    ) {

    }

    /**
     * @return Json
     */
    public function execute(): Json
    {
        $id = $this->request->getParam('id');
        $isComplete = $this->request->getParam('is_complete');

        $c = $this->todoListCollectionFactory->create()->addFieldToFilter('id', ['eq' => $id]);
        $model = $c->getFirstItem();

        $model->setData('is_complete', $isComplete)->save();

        $resultJson = $this->resultJsonFactory->create();

        return $resultJson->setData($c->getItems());
    }
}