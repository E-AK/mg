<?php

namespace Training\TodoList\Model\TodoList;

use Magento\Framework\Model\ResourceModel\Db\VersionControl\AbstractDb;

class TodoListResource extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('todo_list', 'id');
    }
}