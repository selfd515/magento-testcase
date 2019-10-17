<?php
namespace Selfd515\TestCase\Model;

use \Magento\Framework\Model\AbstractModel;
use \Magento\Framework\DataObject\IdentityInterface;
use \Selfd515\TestCase\Api\Data\TaskInterface;

/**
 * Class file
 * @package Selfd515\TestCase\Model
 * @SuppressWarnings(PHPHMD.CouplingBetweenObjects)
 */
class Task extends AbstractModel implements TaskInterface, IdentityInterface
{
    /**
     * Cache Tag
     */
    const CACHE_TAG='selfd515_testcase_tasks';
    /**
     * Task Initialization
     * @retutn void
     */
    protected function _construct()
    {
        $this->_init('Selfd515\TestCase\Model\ResourceModel\Task');
    }
    /**
     * Get ID
     *
     * @return string/null
     */
    public function getId()
    {
        return $this->getData(self::TASK_ID);
    }
    /**
     * Get Content
     *
     * @return string/null
     */
    public function getContent()
    {
        return $this->getData(self::TASKCONTENT);
    }
    /**
     * Get Created At
     *
     * @return int/null
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }
    /**
     * Return Identities
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG.'_'.$this->getId()];
    }
    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData(self::TASK_ID,$id);
    }
    /**
     * Set Content
     *
     * @param string $content
     * @return $this
     */
    public function setContent($content)
    {
        return $this->setData(self::TASKCONTENT,$content);
    }
    /**
     * Set Created At
     *
     * @param int $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT,$createdAt);
    }

}
