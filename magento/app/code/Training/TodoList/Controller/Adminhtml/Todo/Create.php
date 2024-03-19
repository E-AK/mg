<?php

namespace Training\TodoList\Controller\Adminhtml\Todo;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\RequestInterface;
use Training\TodoList\Controller\Create as CreateAction;
use Training\TodoList\Model\TodoList\TodoListCollectionFactory;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\JsonFactory;

class Create extends Action implements HttpPostActionInterface
{
    /**
     * @param Context $context,
     * @param RequestInterface $request,
     * @param TodoListCollectionFactory $todoListCollectionFactory,
     * @param JsonFactory $resultJsonFactory
     */
    public function __construct(
        Context $context,
        private RequestInterface $request,
        private TodoListCollectionFactory $todoListCollectionFactory,
        private JsonFactory $resultJsonFactory,
    ) {
        parent::__construct($context);
    }

    /**
     * @return Json
     */
    public function execute(): Json
    {
        $createAction = new CreateAction(
            $this->request,
            $this->todoListCollectionFactory,
            $this->resultJsonFactory
        );

        return $createAction->execute();
    }
}