<?php

namespace Training\TodoList\Controller;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\View\Result\PageFactory;
use Training\TodoList\Model\TodoList\TodoListCollectionFactory;
use Magento\Framework\Controller\Result\Json;

class Create implements HttpPostActionInterface
{
    /**
     * @param PageFactory $pageFactory
     * @param RequestInterface $request
     * @param JsonFactory $resultJsonFactory
     */
    public function __construct(
        private RequestInterface $request,
        private TodoListCollectionFactory $todoListCollectionFactory,
        private JsonFactory $resultJsonFactory,
    ) {

    }

    /**
     * @return Json
     */
    public function execute(): Json
    {
        $text = $this->request->getParam('text');

        $collection = $this->todoListCollectionFactory->create();

        $model = $collection->getNewEmptyItem();

        $model->addData([
            'text' => $text
        ])->save();

        $result = [];
        $items = $collection->getItems();
        foreach ($items as $item) {
            $result[] = [
                'id' => $item->getId(),
                'text' => $item->getText(),
                'is_complete' => $item->getIsComplete(),
            ];
        }

        $resultJson = $this->resultJsonFactory->create();
        return $resultJson->setData($result);
    }
}