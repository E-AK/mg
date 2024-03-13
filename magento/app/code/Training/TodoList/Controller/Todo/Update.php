<?php

namespace Training\TodoList\Controller\Todo;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Message\ManagerInterface;
use Training\TodoList\Model\TodoList\TodoListCollectionFactory;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Controller\Result\Redirect;

class Update implements HttpPostActionInterface
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
        $isChecked = $this->request->getParam('is_checked');
        try {
            $c = $this->todoListCollectionFactory->create()->addFieldToFilter('id', ['eq' => $id]);
            $model = $c->getFirstItem();

            $model->setData('is_checked', $isChecked)->save();

            $redirect = $this->redirectFactory->create();

            return $redirect->setPath('*/*/get');
        } catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
        }
    }
}