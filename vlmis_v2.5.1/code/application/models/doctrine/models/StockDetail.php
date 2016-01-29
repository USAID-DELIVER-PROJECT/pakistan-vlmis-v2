<?php

/**
*  Model for Stock Detail
*/

use Doctrine\ORM\Mapping as ORM;

/**
 *  StockDetail
 */
class StockDetail
{
    /**
     * $pkId
     * @var integer $pkId
     */
    private $pkId;

    /**
     * $quantity
     * @var bigint $quantity
     */
    private $quantity;

    /**
     * $temporary
     * @var boolean $temporary
     */
    private $temporary;

    /**
     * $isReceived
     * @var integer $isReceived
     */
    private $isReceived;

    /**
     * $adjustmentType
     * @var integer $adjustmentType
     */
    private $adjustmentType;

    /**
     * $createdDate
     * @var datetime $createdDate
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
     * $vvmStage
     * @var VvmStages
     */
    private $vvmStage;

    /**
     * $stockMaster
     * @var StockMaster
     */
    private $stockMaster;

    /**
     * $stockBatchWarehouse
     * @var StockBatchWarehouses
     */
    private $stockBatchWarehouse;

    /**
     * $itemUnit
     * @var ItemUnits
     */
    private $itemUnit;

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
     * @param bigint $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * Get quantity
     *
     * @return bigint 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set temporary
     *
     * @param boolean $temporary
     */
    public function setTemporary($temporary)
    {
        $this->temporary = $temporary;
    }

    /**
     * Get temporary
     *
     * @return boolean 
     */
    public function getTemporary()
    {
        return $this->temporary;
    }

    /**
     * Set isReceived
     *
     * @param integer $isReceived
     */
    public function setIsReceived($isReceived)
    {
        $this->isReceived = $isReceived;
    }

    /**
     * Get isReceived
     *
     * @return integer 
     */
    public function getIsReceived()
    {
        return $this->isReceived;
    }

    /**
     * Set adjustmentType
     *
     * @param integer $adjustmentType
     */
    public function setAdjustmentType($adjustmentType)
    {
        $this->adjustmentType = $adjustmentType;
    }

    /**
     * Get adjustmentType
     *
     * @return integer 
     */
    public function getAdjustmentType()
    {
        return $this->adjustmentType;
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
     * Set vvmStage
     *
     * @param VvmStages $vvmStage
     */
    public function setVvmStage(\VvmStages $vvmStage)
    {
        $this->vvmStage = $vvmStage;
    }

    /**
     * Get vvmStage
     *
     * @return VvmStages 
     */
    public function getVvmStage()
    {
        return $this->vvmStage;
    }

    /**
     * Set stockMaster
     *
     * @param StockMaster $stockMaster
     */
    public function setStockMaster(\StockMaster $stockMaster)
    {
        $this->stockMaster = $stockMaster;
    }

    /**
     * Get stockMaster
     *
     * @return StockMaster 
     */
    public function getStockMaster()
    {
        return $this->stockMaster;
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
     * Set itemUnit
     *
     * @param ItemUnits $itemUnit
     */
    public function setItemUnit(\ItemUnits $itemUnit)
    {
        $this->itemUnit = $itemUnit;
    }

    /**
     * Get itemUnit
     *
     * @return ItemUnits 
     */
    public function getItemUnit()
    {
        return $this->itemUnit;
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