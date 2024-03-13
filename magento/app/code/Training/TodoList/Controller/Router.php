<?php
declare(strict_types=1);

namespace Training\TodoList\Controller;

use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\RouterInterface;
use Magento\Framework\App\Action\Forward;
use Training\TodoList\Controller\TodoList\GetTodoListAction;

/**
 * Class Router
 */
class Router implements RouterInterface
{
    /**
     * Router constructor.
     *
     * @param ActionFactory $actionFactory
     * @param ResponseInterface $response
     */
    public function __construct(
        private ActionFactory $actionFactory,
        private ResponseInterface $response
    ) {

    }

    /**
     * @param RequestInterface $request
     * @return ActionInterface
     * @throws \Exception
     */
    public function match(RequestInterface $request): ActionInterface
    {
        /**
         * @var string $identifier
         */
        $identifier = trim($request->getPathInfo(), '/');

        if (strpos($identifier, 'Training_TodoList') !== false) {
            $request->setModuleName('a');
            $request->setControllerName('b');
            $request->setActionName('c');

            return $this->actionFactory->create(Forward::class, ['request' => $request]);
        }

        throw new \Exception('Not found', 404);
    }
}