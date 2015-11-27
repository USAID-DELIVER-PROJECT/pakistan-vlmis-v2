<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * StockMasterHistory
 */
class StockMasterHistory
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var integer $masterId
     */
    private $masterId;

    /**
     * @var datetime $transactionDate
     */
    private $transactionDate;

    /**
     * @var string $transactionNumber
     */
    private $transactionNumber;

    /**
     * @var integer $transactionCounter
     */
    private $transactionCounter;

    /**
     * @var string $transactionReference
     */
    private $transactionReference;

    /**
     * @var boolean $draft
     */
    private $draft;

    /**
     * @var text $comments
     */
    private $comments;

    /**
     * @var integer $transactionTypeId
     */
    private $transactionTypeId;

    /**
     * @var integer $fromWarehouseId
     */
    private $fromWarehouseId;

    /**
     * @var integer $toWarehouseId
     */
    private $toWarehouseId;

    /**
     * @var integer $parentId
     */
    private $parentId;

    /**
     * @var integer $campaignId
     */
    private $campaignId;

    /**
     * @var integer $stakeholderActivityId
     */
    private $stakeholderActivityId;

    /**
     * @var integer $createdBy
     */
    private $createdBy;

    /**
     * @var datetime $createdDate
     */
    private $createdDate;

    /**
     * @var boolean $actionType
     */
    private $actionType;

    /**
     * @var integer $modifiedBy
     */
    private $modifiedBy;

    /**
     * @var datetime $modifiedDate
     */
    private $modifiedDate;


    /**
     * Get pkId
     *
     * @return integer 
     */
    public function getPkId()
    {
        return $this->pkId;
    }

    /**
     * Set masterId
     *
     * @param integer $masterId
     */
    public function setMasterId($masterId)
    {
        $this->masterId = $masterId;
    }

    /**
     * Get masterId
     *
     * @return integer 
     */
    public function getMasterId()
    {
        return $this->masterId;
    }

    /**
     * Set transactionDate
     *
     * @param datetime $transactionDate
     */
    public function setTransactionDate($transactionDate)
    {
        $this->transactionDate = $transactionDate;
    }

    /**
     * Get transactionDate
     *
     * @return datetime 
     */
    public function getTransactionDate()
    {
        return $this->transactionDate;
    }

    /**
     * Set transactionNumber
     *
     * @param string $transactionNumber
     */
    public function setTransactionNumber($transactionNumber)
    {
        $this->transactionNumber = $transactionNumber;
    }

    /**
     * Get transactionNumber
     *
     * @return string 
     */
    public function getTransactionNumber()
    {
        return $this->transactionNumber;
    }

    /**
     * Set transactionCounter
     *
     * @param integer $transactionCounter
     */
    public function setTransactionCounter($transactionCounter)
    {
        $this->transactionCounter = $transactionCounter;
    }

    /**
     * Get transactionCounter
     *
     * @return integer 
     */
    public function getTransactionCounter()
    {
        return $this->transactionCounter;
    }

    /**
     * Set transactionReference
     *
     * @param string $transactionReference
     */
    public function setTransactionReference($transactionReference)
    {
        $this->transactionReference = $transactionReference;
    }

    /**
     * Get transactionReference
     *
     * @return string 
     */
    public function getTransactionReference()
    {
        return $this->transactionReference;
    }

    /**
     * Set draft
     *
     * @param boolean $draft
     */
    public function setDraft($draft)
    {
        $this->draft = $draft;
    }

    /**
     * Get draft
     *
     * @return boolean 
     */
    public function getDraft()
    {
        return $this->draft;
    }

    /**
     * Set comments
     *
     * @param text $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * Get comments
     *
     * @return text 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set transactionTypeId
     *
     * @param integer $transactionTypeId
     */
    public function setTransactionTypeId($transactionTypeId)
    {
        $this->transactionTypeId = $transactionTypeId;
    }

    /**
     * Get transactionTypeId
     *
     * @return integer 
     */
    public function getTransactionTypeId()
    {
        return $this->transactionTypeId;
    }

    /**
     * Set fromWarehouseId
     *
     * @param integer $fromWarehouseId
     */
    public function setFromWarehouseId($fromWarehouseId)
    {
        $this->fromWarehouseId = $fromWarehouseId;
    }

    /**
     * Get fromWarehouseId
     *
     * @return integer 
     */
    public function getFromWarehouseId()
    {
        return $this->fromWarehouseId;
    }

    /**
     * Set toWarehouseId
     *
     * @param integer $toWarehouseId
     */
    public function setToWarehouseId($toWarehouseId)
    {
        $this->toWarehouseId = $toWarehouseId;
    }

    /**
     * Get toWarehouseId
     *
     * @return integer 
     */
    public function getToWarehouseId()
    {
        return $this->toWarehouseId;
    }

    /**
     * Set parentId
     *
     * @param integer $parentId
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
    }

    /**
     * Get parentId
     *
     * @return integer 
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Set campaignId
     *
     * @param integer $campaignId
     */
    public function setCampaignId($campaignId)
    {
        $this->campaignId = $campaignId;
    }

    /**
     * Get campaignId
     *
     * @return integer 
     */
    public function getCampaignId()
    {
        return $this->campaignId;
    }

    /**
     * Set stakeholderActivityId
     *
     * @param integer $stakeholderActivityId
     */
    public function setStakeholderActivityId($stakeholderActivityId)
    {
        $this->stakeholderActivityId = $stakeholderActivityId;
    }

    /**
     * Get stakeholderActivityId
     *
     * @return integer 
     */
    public function getStakeholderActivityId()
    {
        return $this->stakeholderActivityId;
    }

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
    }

    /**
     * Get createdBy
     *
     * @return integer 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set createdDate
     *
     * @param datetime $createdDate
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }

    /**
     * Get createdDate
     *
     * @return datetime 
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Set actionType
     *
     * @param boolean $actionType
     */
    public function setActionType($actionType)
    {
        $this->actionType = $actionType;
    }

    /**
     * Get actionType
     *
     * @return boolean 
     */
    public function getActionType()
    {
        return $this->actionType;
    }

    /**
     * Set modifiedBy
     *
     * @param integer $modifiedBy
     */
    public function setModifiedBy($modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
    }

    /**
     * Get modifiedBy
     *
     * @return integer 
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }

    /**
     * Set modifiedDate
     *
     * @param datetime $modifiedDate
     */
    public function setModifiedDate($modifiedDate)
    {
        $this->modifiedDate = $modifiedDate;
    }

    /**
     * Get modifiedDate
     *
     * @return datetime 
     */
    public function getModifiedDate()
    {
        return $this->modifiedDate;
    }
}