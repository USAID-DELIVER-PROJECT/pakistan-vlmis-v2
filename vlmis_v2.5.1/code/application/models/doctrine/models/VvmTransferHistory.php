<?php

/**
*  Model for VVM Transfer History
*/

use Doctrine\ORM\Mapping as ORM;

/**
 *  VvmTransferHistory
 */
class VvmTransferHistory
{
    /**
     * $pkId
     * @var integer $pkId
     */
    private $pkId;

    /**
     * $quantity
     * @var integer $quantity
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
     * $stockBatchWarehouse
     * @var StockBatchWarehouses
     */
    private $stockBatchWarehouse;

    /**
     * $fromVvmStage
     * @var VvmStages
     */
    private $fromVvmStage;

    /**
     * $toVvmStage
     * @var VvmStages
     */
    private $toVvmStage;

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
     * @param integer $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * Get quantity
     *
     * @return integer 
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
     * Set stockBatchWarehouse
     *
     * @param StockBatchWarehouses $stockBatchWarehouse
     */
    public function setStockBatchWarehouse(\StockBatchWarehouses $stockBatchWarehouse)
    {
        $this->stockBatchWarehouse = $stockBatchWarehouse;
    }

    /**
     * Get stockBatchWarehouse
     *
     * @return StockBatchWarehouses 
     */
    public function getStockBatchWarehouse()
    {
        return $this->stockBatchWarehouse;
    }

    /**
     * Set fromVvmStage
     *
     * @param VvmStages $fromVvmStage
     */
    public function setFromVvmStage(\VvmStages $fromVvmStage)
    {
        $this->fromVvmStage = $fromVvmStage;
    }

    /**
     * Get fromVvmStage
     *
     * @return VvmStages 
     */
    public function getFromVvmStage()
    {
        return $this->fromVvmStage;
    }

    /**
     * Set toVvmStage
     *
     * @param VvmStages $toVvmStage
     */
    public function setToVvmStage(\VvmStages $toVvmStage)
    {
        $this->toVvmStage = $toVvmStage;
    }

    /**
     * Get toVvmStage
     *
     * @return VvmStages 
     */
    public function getToVvmStage()
    {
        return $this->toVvmStage;
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