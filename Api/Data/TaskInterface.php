<?php
namespace Selfd515\TestCase\Api\Data;

interface TaskInterface {
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const TASK_ID       ='task_id';
    const TASKCONTENT   ='taskcontent';
    const CREATED_AT    ='created_at';

    /**
     * Get ID
     *
     * @return string/null
     */
    public function getId();

    /**
     * Get Content
     *
     * @return string/null
     */
    public function getContent();

    /**
     * Get Created At
     *
     * @return int/null
     */
    public function getCreatedAt();

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Set Content
     *
     * @param string $content
     * @return $this
     */
    public function setContent($content);

    /**
     * Set Created At
     *
     * @param int $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);
}
