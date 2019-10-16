<?php
namespace Selfd515\TestCase\Block;

use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;
use \Selfd515\TestCase\Model\ResourceModel\Task\Collection as taskCollection;
use \Selfd515\TestCase\Model\ResourceModel\Task\CollectionFactory as taskCollectionFactory;
use \Selfd515\TestCase\Model\Task;

class Tasks extends Template
{
    /**
     * CollectionFactory
     * @var null|CollectionFactory
     */
    protected $_taskCollectionFactory = null;

    /**
     * Constructor
     *
     * @param Context $context
     * @param TaskCollectionFactory $taskCollectionFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        TaskCollectionFactory $taskCollectionFactory,
        array $data = []
    ) {
        $this->_taskCollectionFactory = $taskCollectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return Tasks[]
     */
    public function getTasks()
    {
        /** @var TaskCollection $taskCollection */
        $taskCollection = $this->_taskCollectionFactory->create();
        $taskCollection->addFieldToSelect('*')->load();
        return $taskCollection->getItems();
    }

    /**
     * For a given tasks, returns its url
     * @param Task $task
     * @return string
     */
    public function getTaskUrl(
        Task $task
    ) {
        return '/testcase/tasks/view/id/' . $task->getId();
    }
    /**
     * Returns add task url
     * @return string
     */
    public function getAddTaskUrl(
    ) {
        return '/testcase/tasks/add/';
    }
    /**
     * Returns add task url
     * @param Task $task
     * @return string
     */
    public function getDeleteTaskUrl(
        Task $task
    ) {
        return '/testcase/tasks/delete/id/' . $task->getId();
    }

}
