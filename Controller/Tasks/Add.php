<?php

namespace Selfd515\TestCase\Controller\Tasks;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Context;
use Selfd515\TestCase\Model\TaskFactory;

class Add extends \Magento\Framework\App\Action\Action
{
    protected $_task;
    protected $resultRedirect;
    protected $logger;
    public function __construct(\Magento\Framework\App\Action\Context $context,
                                \Selfd515\TestCase\Model\TaskFactory $task,
                                \Magento\Framework\Controller\ResultFactory $result,
                                \Psr\Log\LoggerInterface $logger){

        $this->_task = $task;
        $this->resultRedirect = $result;
        $this->logger = $logger;
        $this->logger->error("zzz construct");
        return parent::__construct($context);
    }
    /**
     * Add action
     *
     * @return void
     */
    public function execute()
    {
        $this->logger->error("zzz execute");

        // 1. POST request : Get data
        $post = (array) $this->getRequest()->getPost();

        if (!empty($post)) {
            // Retrieve your form data
            $taskcontent   = $post['taskcontent'];

            // Doing-something with...
            $newtask = $this->_task->create();
            $newtask->addData([
                "taskcontent" => $taskcontent
            ]);
            $savedata = $newtask->save();

            if ($savedata) {
                // Display the success form validation message
                $this->messageManager->addSuccessMessage('New task added !');
            }
            // Redirect to your form page (or anywhere you want...)
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl('/testcase/tasks/index');

            return $resultRedirect;
        }

//        // 2. GET request : Render the addtask page
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}

