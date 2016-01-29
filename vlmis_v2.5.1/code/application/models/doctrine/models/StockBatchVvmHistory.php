<?php

/**
*  Model for Stock Batch VVM History
*/

use Doctrine\ORM\Mapping as ORM;

/**
 *  StockBatchVvmHistory
 */
class StockBatchVvmHistory
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
     * $stockBatchVvm
     * @var StockBatchVvm
     */
    private $stockBatchVvm;

    /**
     * $stockBatchWarehouse
     * @var StockBatchWarehouses
     */
    private $stockBatchWarehouse;

    /**
     * $vvmStage
     * @var VvmStages
     */
    private $vvmStage;

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
     * Set stockBatchVvm
     *
     * @param StockBatchVvm $stockBatchVvm
     */
    public function setStockBatchVvm(\StockBatchVvm $stockBatchVvm)
    {
        $this->stockBatchVvm = $stockBatchVvm;
    }

    /**
     * Get stockBatchVvm
     *
     * @return StockBatchVvm 
     */
    public function getStockBatchVvm()
    {
        return $this->stockBatchVvm;
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