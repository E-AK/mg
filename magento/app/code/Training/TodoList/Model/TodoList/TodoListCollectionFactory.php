<?php

namespace Training\TodoList\Model\TodoList;

use Magento\Framework\ObjectManagerInterface;

class TodoListCollectionFactory
{
    /**
     * @param ObjectManagerInterface $objectManager
     * @param string $instanceName
     */
    public function __construct(
        protected ObjectManagerInterface $objectManager,
        protected string $instanceName,
    ) {

    }

    /**
     * @param array $data
     */
    public function create(array $data = [])
    {
        return $this->objectManager->create($this->instanceName, $data);
    }
}