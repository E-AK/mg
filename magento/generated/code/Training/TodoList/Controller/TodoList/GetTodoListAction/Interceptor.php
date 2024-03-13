<?php
namespace Training\TodoList\Controller\TodoList\GetTodoListAction;

/**
 * Interceptor class for @see \Training\TodoList\Controller\TodoList\GetTodoListAction
 */
class Interceptor extends \Training\TodoList\Controller\TodoList\GetTodoListAction implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Controller\Result\ForwardFactory $forwardFactory)
    {
        $this->___init();
        parent::__construct($forwardFactory);
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
