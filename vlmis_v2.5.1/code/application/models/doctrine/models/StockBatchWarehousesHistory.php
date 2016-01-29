<?php

/**
*  Model for Stock Batch Warehouses History
*/

use Doctrine\ORM\Mapping as ORM;

/**
 *  StockBatchWarehousesHistory
 */
class StockBatchWarehousesHistory
{
    /**
     * $pkId
     * @var integer $pkId
     */
    private $pkId;

    /**
     * $number
     * @var string $number
     */
    private $number;

    /**
     * $batchMasterId
     * @var integer $batchMasterId
     */
    private $batchMasterId;

    /**
     * $expiryDate
     * @var datetime $expiryDate
     */
    private $expiryDate;

    /**
     * $quantity
     * @var bigint $quantity
     */
    private $quantity;

    /**
     * $status
     * @var string $status
     */
    private $status;

    /**
     * $unitPrice
     * @var float $unitPrice
     */
    private $unitPrice;

    /**
     * $productionDate
     * @var datetime $productionDate
     */
    private $productionDate;

    /**
     * $lastUpdate
     * @var datetime $lastUpdate
     */
    private $lastUpdate;

    /**
     * $itemPackSizeId
     * @var integer $itemPackSizeId
     */
    private $itemPackSizeId;

    /**
     * $vvmTypeId
     * @var integer $vvmTypeId
     */
    private $vvmTypeId;

    /**
     * $warehouseId
     * @var integer $warehouseId
     */
    private $warehouseId;

    /**
     * $stakeholderItemPackSizeId
     * @var integer $stakeholderItemPackSizeId
     */
    private $stakeholderItemPackSizeId;

    /**
     * $actionType
     * @var boolean $actionType
     */
    private $actionType;

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
     * $stockBatchWarehouse
     * @var StockBatchWarehouses
     */
    private $stockBatchWarehouse;

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
     * Set number
     *
     * @param string $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * Get number
     *
     * @return string 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set batchMasterId
     *
     * @param integer $batchMasterId
     */
    public function setBatchMasterId($batchMasterId)
    {
        $this->batchMasterId = $batchMasterId;
    }

    /**
     * Get batchMasterId
     *
     * @return integer 
     */
    public function getBatchMasterId()
    {
        return $this->batchMasterId;
    }

    /**
     * Set expiryDate
     *
     * @param datetime $expiryDate
     */
    public function setExpiryDate($expiryDate)
    {
        $this->expiryDate = $expiryDate;
    }

    /**
     * Get expiryDate
     *
     * @return datetime 
     */
    public function getExpiryDate()
    {
        return $this->expiryDate;
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
     * Set status
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set unitPrice
     *
     * @param float $unitPrice
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
    }

    /**
     * Get unitPrice
     *
     * @return float 
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * Set productionDate
     *
     * @param datetime $productionDate
     */
    public function setProductionDate($productionDate)
    {
        $this->productionDate = $productionDate;
    }

    /**
     * Get productionDate
     *
     * @return datetime 
     */
    public function getProductionDate()
    {
        return $this->productionDate;
    }

    /**
     * Set lastUpdate
     *
     * @param datetime $lastUpdate
     */
    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;
    }

    /**
     * Get lastUpdate
     *
     * @return datetime 
     */
    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }

    /**
     * Set itemPackSizeId
     *
     * @param integer $itemPackSizeId
     */
    public function setItemPackSizeId($itemPackSizeId)
    {
        $this->itemPackSizeId = $itemPackSizeId;
    }

    /**
     * Get itemPackSizeId
     *
     * @return integer 
     */
    public function getItemPackSizeId()
    {
        return $this->itemPackSizeId;
    }

    /**
     * Set vvmTypeId
     *
     * @param integer $vvmTypeId
     */
    public function setVvmTypeId($vvmTypeId)
    {
        $this->vvmTypeId = $vvmTypeId;
    }

    /**
     * Get vvmTypeId
     *
     * @return integer 
     */
    public function getVvmTypeId()
    {
        return $this->vvmTypeId;
    }

    /**
     * Set warehouseId
     *
     * @param integer $warehouseId
     */
    public function setWarehouseId($warehouseId)
    {
        $this->warehouseId = $warehouseId;
    }

    /**
     * Get warehouseId
     *
     * @return integer 
     */
    public function getWarehouseId()
    {
        return $this->warehouseId;
    }

    /**
     * Set stakeholderItemPackSizeId
     *
     * @param integer $stakeholderItemPackSizeId
     */
    public function setStakeholderItemPackSizeId($stakeholderItemPackSizeId)
    {
        $this->stakeholderItemPackSizeId = $stakeholderItemPackSizeId;
    }

    /**
     * Get stakeholderItemPackSizeId
     *
     * @return integer 
     */
    public function getStakeholderItemPackSizeId()
    {
        return $this->stakeholderItemPackSizeId;
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