<?php


namespace Selfd515\TestCase\Block;

use \Magento\Framework\Exception\LocalizedException;
use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;
use \Magento\Framework\Registry;
use \Selfd515\TestCase\Model\TaskFactory;
use \Selfd515\TestCase\Controller\Tasks\View as ViewAction;

class View extends Template
{
    /**
     * Core registry
     * @var Registry
     */
    protected $_coreRegistry;

    /**
     * Post
     * @var null|Post
     */
    protected $_task = null;

    /**
     * TaskFactory
     * @var null|TaskFactory
     */
    protected $_taskFactory = null;

    /**
     * Constructor
     * @param Context $context
     * @param Registry $coreRegistry
     * @param TaskFactory $taskCollectionFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        TaskFactory $taskFactory,
        array $data = []
    )
    {
        $this->_taskFactory = $taskFactory;
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context, $data);
    }

    /**
     * Lazy loads the requested post
     * @return Post
     * @throws LocalizedException
     */
    public function getTask()
    {
        if ($this->_task === null) {
            /** @var Post $post */
            $task = $this->_taskFactory->create();
            $task->load($this->_getTaskId());

            if (!$task->getId()) {
                throw new LocalizedException(__('Task not found'));
            }

            $this->_task = $task;
        }
        return $this->_task;
    }

    /**
     * Retrieves the task id from the registry
     * @return int
     */
    protected function _getTaskId()
    {
        return (int)$this->_coreRegistry->registry(
            ViewAction::REGISTRY_KEY_TASK_ID
        );
    }
}

