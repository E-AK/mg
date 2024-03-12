<?php

namespace Training\TodoList\Model\TodoList;

use Magento\Framework\Model\ResourceModel\Db\VersionControl\Collection;

/**
 * @method TodoListModel[] getItems()
 * @method TodoListModel[] getNewEmptyItem()
 */
class TodoListCollection extends Collection
{
    public function _construct()
    {
        parent::_construct();

        $this->_init(TodoListModel::class, TodoListResource::class);
        $this->_setIdFieldName($this->getResource()->getIdFieldName());
    }
}