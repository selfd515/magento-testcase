<?php
    namespace Selfd515\TestCase\Model\ResourceModel\Task;

    use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

    class Collection extends AbstractCollection
    {
        /**
         * File Collection Constructor
         * @return void
         */
        protected function _construct()
        {
            $this->_init('Selfd515\TestCase\Model\Task','Selfd515\TestCase\Model\ResourceModel\Task');
        }
    }
