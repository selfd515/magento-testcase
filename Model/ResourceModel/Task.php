<?php
namespace Selfd515\TestCase\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Task extends AbstractDb
{
    /**
     * Task Abstract Resource Constructor
     * @return void
     */
    protected function _construct()
    {
        $this->_init('selfd_testcase_tasks','task_id');
    }

}
