<?php

namespace Training\TodoList\Model\TodoList;

use Magento\Framework\Model\AbstractModel;

class TodoListModel extends AbstractModel
{
    public function _construct()
    {
        parent::_construct();

        $this->_init(TodoListResource::class);
        $this->setIdFieldName('id');
    }
}