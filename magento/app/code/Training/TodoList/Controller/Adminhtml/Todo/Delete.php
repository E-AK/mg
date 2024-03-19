<?php

namespace Training\TodoList\Controller\Adminhtml\Todo;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\RequestInterface;
use Training\TodoList\Controller\Delete as DeleteAction;
use Training\TodoList\Model\TodoList\TodoListCollectionFactory;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\JsonFactory;

class Delete extends Action implements HttpPostActionInterface
{
    /**
     * @param Context $context,
     * @param TodoListCollectionFactory $todoListCollectionFactory
     * @param RequestInterface $request
     * @param JsonFactory $resultJsonFactory
     */
    public function __construct(
        Context $context,
        private TodoListCollectionFactory $todoListCollectionFactory,
        private RequestInterface $request,
        private JsonFactory $resultJsonFactory,
    ) {
        parent::__construct($context);
    }

    /**
     * @return Json
     */
    public function execute(): Json
    {
        $deleteAction = new DeleteAction(
            $this->todoListCollectionFactory,
            $this->request,
            $this->resultJsonFactory,
        );

        return $deleteAction->execute();
    }
}