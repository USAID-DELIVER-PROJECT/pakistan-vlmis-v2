<?php

/**
*  Model for Purpose Transfer History
*/

use Doctrine\ORM\Mapping as ORM;

/**
 *  PurposeTransferHistory
 */
class PurposeTransferHistory
{
    /**
     * $pkId
     * @var integer $pkId
     */
    private $pkId;

    /**
     * $quantity
     * @var decimal $quantity
     */
    private $quantity;

    /**
     * $createdDate
     * @var date $createdDate
     */
    private $createdDate;

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
     * $fromActivity
     * @var StakeholderActivities
     */
    private $fromActivity;

    /**
     * $toActivity
     * @var StakeholderActivities
     */
    private $toActivity;

    /**
     * $fromStockBatchWarehouse
     * @var StockBatchWarehouses
     */
    private $fromStockBatchWarehouse;

    /**
     * $toStockBatchWarehouse
     * @var StockBatchWarehouses
     */
    private $toStockBatchWarehouse;

    /**
     * $transactionType
     * @var TransactionTypes
     */
    private $transactionType;

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
     * Set fromStockBatchWarehouse
     *
     * @param StockBatchWarehouses $fromStockBatchWarehouse
     */
    public function setFromStockBatchWarehouse(\StockBatchWarehouses $fromStockBatchWarehouse)
    {
        $this->fromStockBatchWarehouse = $fromStockBatchWarehouse;
    }

    /**
     * Get fromStockBatchWarehouse
     *
     * @return StockBatchWarehouses 
     */
    public function getFromStockBatchWarehouse()
    {
        return $this->fromStockBatchWarehouse;
    }

    /**
     * Set toStockBatchWarehouse
     *
     * @param StockBatchWarehouses $toStockBatchWarehouse
     */
    public function setToStockBatchWarehouse(\StockBatchWarehouses $toStockBatchWarehouse)
    {
        $this->toStockBatchWarehouse = $toStockBatchWarehouse;
    }

    /**
     * Get toStockBatchWarehouse
     *
     * @return StockBatchWarehouses 
     */
    public function getToStockBatchWarehouse()
    {
        return $this->toStockBatchWarehouse;
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