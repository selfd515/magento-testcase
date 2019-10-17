<?php

namespace Selfd515\TestCase\Controller\Tasks;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Context;
use Selfd515\TestCase\Model\TaskFactory;

class Add extends \Magento\Framework\App\Action\Action
{
    protected $_task;
    protected $resultRedirect;
    public function __construct(\Magento\Framework\App\Action\Context $context,
                                \Selfd515\TestCase\Model\TaskFactory $task,
                                \Magento\Framework\Controller\ResultFactory $result
    ){
        $this->_task = $task;
        $this->resultRedirect = $result;
        return parent::__construct($context);
    }
    /**
     * Add action
     *
     * @return void
     */
    public function execute()
    {
        // 1. POST request: Get data from form
        $post = (array) $this->getRequest()->getPost();

        if (!empty($post)) {
            $taskcontent   = $post['taskcontent'];
            $newtask = $this->_task->create();
            $newtask->addData([
                "taskcontent" => $taskcontent
            ]);
            $savedata = $newtask->save();

            if ($savedata) {
                $this->messageManager->addSuccessMessage('New task added');
            }
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl('/testcase/tasks/index');

            return $resultRedirect;
        }
        //GET request: Render the add task page
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}

