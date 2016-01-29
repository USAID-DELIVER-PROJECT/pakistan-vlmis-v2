<?php

/**
*  Model for Stock Master
*/

use Doctrine\ORM\Mapping as ORM;

/**
 *  StockMaster
 */
class StockMaster
{
    /**
     * $pkId
     * @var integer $pkId
     */
    private $pkId;

    /**
     * $transactionDate
     * @var datetime $transactionDate
     */
    private $transactionDate;

    /**
     * $transactionNumber
     * @var string $transactionNumber
     */
    private $transactionNumber;

    /**
     * $transactionCounter
     * @var integer $transactionCounter
     */
    private $transactionCounter;

    /**
     * $transactionReference
     * @var string $transactionReference
     */
    private $transactionReference;

    /**
     * $dispatchBy
     * @var string $dispatchBy
     */
    private $dispatchBy;

    /**
     * $draft
     * @var boolean $draft
     */
    private $draft;

    /**
     * $comments
     * @var text $comments
     */
    private $comments;

    /**
     * $parentId
     * @var integer $parentId
     */
    private $parentId;

    /**
     * $campaignId
     * @var integer $campaignId
     */
    private $campaignId;

    /**
     * $createdDate
     * @var datetime $createdDate
     */
    private $createdDate;

    /**
     * $issueFrom
     * @var date $issueFrom
     */
    private $issueFrom;

    /**
     * $issueTo
     * @var date $issueTo
     */
    private $issueTo;

    /**
     * $modifiedDate
     * @var datetime $modifiedDate
     */
    private $modifiedDate;

    /**
     * $modifiedBy
     * @var Users
     */
    private $modifiedBy;

    /**
     * $transactionType
     * @var TransactionTypes
     */
    private $transactionType;

    /**
     * $fromWarehouse
     * @var Warehouses
     */
    private $fromWarehouse;

    /**
     * $toWarehouse
     * @var Warehouses
     */
    private $toWarehouse;

    /**
     * $stakeholderActivity
     * @var StakeholderActivities
     */
    private $stakeholderActivity;

    /**
     * $createdBy
     * @var Users
     */
    private $createdBy;


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
     * Set dispatchBy
     *
     * @param string $dispatchBy
     */
    public function setDispatchBy($dispatchBy)
    {
        $this->dispatchBy = $dispatchBy;
    }

    /**
     * Get dispatchBy
     *
     * @return string 
     */
    public function getDispatchBy()
    {
        return $this->dispatchBy;
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
     * Set issueFrom
     *
     * @param date $issueFrom
     */
    public function setIssueFrom($issueFrom)
    {
        $this->issueFrom = $issueFrom;
    }

    /**
     * Get issueFrom
     *
     * @return date 
     */
    public function getIssueFrom()
    {
        return $this->issueFrom;
    }

    /**
     * Set issueTo
     *
     * @param date $issueTo
     */
    public function setIssueTo($issueTo)
    {
        $this->issueTo = $issueTo;
    }

    /**
     * Get issueTo
     *
     * @return date 
     */
    public function getIssueTo()
    {
        return $this->issueTo;
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

    /**
     * Set modifiedBy
     *
     * @param Users $modifiedBy
     */
    public function setModifiedBy(\Users $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
    }

    /**
     * Get modifiedBy
     *
     * @return Users 
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }

    /**
     * Set transactionType
     *
     * @param TransactionTypes $transactionType
     */
    public function setTransactionType(\TransactionTypes $transactionType)
    {
        $this->transactionType = $transactionType;
    }

    /**
     * Get transactionType
     *
     * @return TransactionTypes 
     */
    public function getTransactionType()
    {
        return $this->transactionType;
    }

    /**
     * Set fromWarehouse
     *
     * @param Warehouses $fromWarehouse
     */
    public function setFromWarehouse(\Warehouses $fromWarehouse)
    {
        $this->fromWarehouse = $fromWarehouse;
    }

    /**
     * Get fromWarehouse
     *
     * @return Warehouses 
     */
    public function getFromWarehouse()
    {
        return $this->fromWarehouse;
    }

    /**
     * Set toWarehouse
     *
     * @param Warehouses $toWarehouse
     */
    public function setToWarehouse(\Warehouses $toWarehouse)
    {
        $this->toWarehouse = $toWarehouse;
    }

    /**
     * Get toWarehouse
     *
     * @return Warehouses 
     */
    public function getToWarehouse()
    {
        return $this->toWarehouse;
    }

    /**
     * Set stakeholderActivity
     *
     * @param StakeholderActivities $stakeholderActivity
     */
    public function setStakeholderActivity(\StakeholderActivities $stakeholderActivity)
    {
        $this->stakeholderActivity = $stakeholderActivity;
    }

    /**
     * Get stakeholderActivity
     *
     * @return StakeholderActivities 
     */
    public function getStakeholderActivity()
    {
        return $this->stakeholderActivity;
    }

    /**
     * Set createdBy
     *
     * @param Users $createdBy
     */
    public function setCreatedBy(\Users $createdBy)
    {
        $this->createdBy = $createdBy;
    }

    /**
     * Get createdBy
     *
     * @return Users 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }
}