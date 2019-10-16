<?php

namespace Selfd515\TestCase\Controller\Tasks;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Context;
use Selfd515\TestCase\Model\TaskFactory;

class Delete extends \Magento\Framework\App\Action\Action {

    /**
     * @var TaskFactory
     */
    protected $_taskFactory;
    protected $messageManager;
    protected $resultRedirect;
    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param TaskFactory $taskFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        TaskFactory $taskFactory, \Magento\Framework\Controller\ResultFactory $result
    ) {
        $this->_taskFactory = $taskFactory;
        $this->resultRedirect = $result;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        try {
            $task = $this->_taskFactory->create();
            $task->load($id);
            $task->delete();
            $this->messageManager->addSuccessMessage('Task deleted !');
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl('/testcase/tasks/index');

        return $resultRedirect;
    }

}
