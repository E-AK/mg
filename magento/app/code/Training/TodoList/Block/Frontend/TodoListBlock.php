<?php

namespace Training\TodoList\Block\Frontend;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Training\TodoList\Model\TodoList\TodoListCollectionFactory;

class TodoListBlock extends Template
{
  /**
   * @var TodoListCollectionFactory $todoListCollectionFactory
   */
  protected TodoListCollectionFactory $todoListCollectionFactory;

  /**
   * @param Context $context
   * @param TodoListCollectionFactory $todoListCollectionFactory
   */
  public function __construct(
    Context $context,
    TodoListCollectionFactory $todoListCollectionFactory
  ) {
    $this->todoListCollectionFactory = $todoListCollectionFactory;
    parent::__construct($context);
  }

  public function getTodoList()
  {
    $todoList = $this->todoListCollectionFactory->create();
    return $todoList->getCollection(); // a
  }
}