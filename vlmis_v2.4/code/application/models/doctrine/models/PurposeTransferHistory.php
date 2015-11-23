<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * PurposeTransferHistory
 */
class PurposeTransferHistory
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var decimal $quantity
     */
    private $quantity;

    /**
     * @var date $createdDate
     */
    private $createdDate;

    /**
     * @var Users
     */
    private $createdBy;

    /**
     * @var StakeholderActivities
     */
    private $fromActivity;

    /**
     * @var StakeholderActivities
     */
    private $toActivity;

    /**
     * @var StockBatch
     */
    private $fromBatch;

    /**
     * @var StockBatch
     */
    private $toBatch;

    /**
     * @var TransactionTypes
     */
    private $transactionType;


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
     * Set quantity
     *
     * @param decimal $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * Get quantity
     *
     * @return decimal 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set createdDate
     *
     * @param date $createdDate
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }

    /**
     * Get createdDate
     *
     * @return date 
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
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

    /**
     * Set fromActivity
     *
     * @param StakeholderActivities $fromActivity
     */
    public function setFromActivity(\StakeholderActivities $fromActivity)
    {
        $this->fromActivity = $fromActivity;
    }

    /**
     * Get fromActivity
     *
     * @return StakeholderActivities 
     */
    public function getFromActivity()
    {
        return $this->fromActivity;
    }

    /**
     * Set toActivity
     *
     * @param StakeholderActivities $toActivity
     */
    public function setToActivity(\StakeholderActivities $toActivity)
    {
        $this->toActivity = $toActivity;
    }

    /**
     * Get toActivity
     *
     * @return StakeholderActivities 
     */
    public function getToActivity()
    {
        return $this->toActivity;
    }

    /**
     * Set fromBatch
     *
     * @param StockBatch $fromBatch
     */
    public function setFromBatch(\StockBatch $fromBatch)
    {
        $this->fromBatch = $fromBatch;
    }

    /**
     * Get fromBatch
     *
     * @return StockBatch 
     */
    public function getFromBatch()
    {
        return $this->fromBatch;
    }

    /**
     * Set toBatch
     *
     * @param StockBatch $toBatch
     */
    public function setToBatch(\StockBatch $toBatch)
    {
        $this->toBatch = $toBatch;
    }

    /**
     * Get toBatch
     *
     * @return StockBatch 
     */
    public function getToBatch()
    {
        return $this->toBatch;
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
}