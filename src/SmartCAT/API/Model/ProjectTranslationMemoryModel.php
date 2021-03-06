<?php

namespace SmartCAT\API\Model;

class ProjectTranslationMemoryModel
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var int
     */
    protected $matchThreshold;
    /**
     * @var int
     */
    protected $targetLanguageId;
    /**
     * @var bool
     */
    protected $isWritable;
    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param string $id
     *
     * @return self
     */
    public function setId($id = null)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * @return int
     */
    public function getMatchThreshold()
    {
        return $this->matchThreshold;
    }
    /**
     * @param int $matchThreshold
     *
     * @return self
     */
    public function setMatchThreshold($matchThreshold = null)
    {
        $this->matchThreshold = $matchThreshold;
        return $this;
    }
    /**
     * @return int
     */
    public function getTargetLanguageId()
    {
        return $this->targetLanguageId;
    }
    /**
     * @param int $targetLanguageId
     *
     * @return self
     */
    public function setTargetLanguageId($targetLanguageId = null)
    {
        $this->targetLanguageId = $targetLanguageId;
        return $this;
    }
    /**
     * @return bool
     */
    public function getIsWritable()
    {
        return $this->isWritable;
    }
    /**
     * @param bool $isWritable
     *
     * @return self
     */
    public function setIsWritable($isWritable = null)
    {
        $this->isWritable = $isWritable;
        return $this;
    }
}