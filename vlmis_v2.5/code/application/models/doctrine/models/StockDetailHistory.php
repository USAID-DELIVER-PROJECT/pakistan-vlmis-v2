<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * StockDetailHistory
 */
class StockDetailHistory
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var integer $detailId
     */
    private $detailId;

    /**
     * @var bigint $quantity
     */
    private $quantity;

    /**
     * @var boolean $temporary
     */
    private $temporary;

    /**
     * @var integer $vvmStage
     */
    private $vvmStage;

    /**
     * @var integer $isReceived
     */
    private $isReceived;

    /**
     * @var boolean $adjustmentType
     */
    private $adjustmentType;

    /**
     * @var integer $stockMasterId
     */
    private $stockMasterId;

    /**
     * @var integer $stockBatchId
     */
    private $stockBatchId;

    /**
     * @var integer $itemUnitId
     */
    private $itemUnitId;

    /**
     * @var boolean $actionType
     */
    private $actionType;

    /**
     * @var integer $createdBy
     */
    private $createdBy;

    /**
     * @var datetime $createdDate
     */
    private $createdDate;

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
     * Set detailId
     *
     * @param integer $detailId
     */
    public function setDetailId($detailId)
    {
        $this->detailId = $detailId;
    }

    /**
     * Get detailId
     *
     * @return integer 
     */
    public function getDetailId()
    {
        return $this->detailId;
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
     * Set vvmStage
     *
     * @param integer $vvmStage
     */
    public function setVvmStage($vvmStage)
    {
        $this->vvmStage = $vvmStage;
    }

    /**
     * Get vvmStage
     *
     * @return integer 
     */
    public function getVvmStage()
    {
        return $this->vvmStage;
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
     * @param boolean $adjustmentType
     */
    public function setAdjustmentType($adjustmentType)
    {
        $this->adjustmentType = $adjustmentType;
    }

    /**
     * Get adjustmentType
     *
     * @return boolean 
     */
    public function getAdjustmentType()
    {
        return $this->adjustmentType;
    }

    /**
     * Set stockMasterId
     *
     * @param integer $stockMasterId
     */
    public function setStockMasterId($stockMasterId)
    {
        $this->stockMasterId = $stockMasterId;
    }

    /**
     * Get stockMasterId
     *
     * @return integer 
     */
    public function getStockMasterId()
    {
        return $this->stockMasterId;
    }

    /**
     * Set stockBatchId
     *
     * @param integer $stockBatchId
     */
    public function setStockBatchId($stockBatchId)
    {
        $this->stockBatchId = $stockBatchId;
    }

    /**
     * Get stockBatchId
     *
     * @return integer 
     */
    public function getStockBatchId()
    {
        return $this->stockBatchId;
    }

    /**
     * Set itemUnitId
     *
     * @param integer $itemUnitId
     */
    public function setItemUnitId($itemUnitId)
    {
        $this->itemUnitId = $itemUnitId;
    }

    /**
     * Get itemUnitId
     *
     * @return integer 
     */
    public function getItemUnitId()
    {
        return $this->itemUnitId;
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