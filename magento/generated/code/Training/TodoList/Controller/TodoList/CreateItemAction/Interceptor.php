<?php
namespace Training\TodoList\Controller\TodoList\CreateItemAction;

/**
 * Interceptor class for @see \Training\TodoList\Controller\TodoList\CreateItemAction
 */
class Interceptor extends \Training\TodoList\Controller\TodoList\CreateItemAction implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\RequestInterface $request, \Training\TodoList\Model\TodoList\TodoListCollectionFactory $todoListCollectionFactory, \Magento\Framework\Message\ManagerInterface $messageManager)
    {
        $this->___init();
        parent::__construct($request, $todoListCollectionFactory, $messageManager);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        return $pluginInfo ? $this->___callPlugins('execute', func_get_args(), $pluginInfo) : parent::execute();
    }
}
