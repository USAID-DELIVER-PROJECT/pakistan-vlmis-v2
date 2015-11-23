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
     * @var integer $isReceived
     */
    private $isReceived;

    /**
     * @var boolean $adjustmentType
     */
    private $adjustmentType;

    /**
     * @var integer $actionType
     */
    private $actionType;

    /**
     * @var VvmStages
     */
    private $vvmStage;

    /**
     * @var ItemUnits
     */
    private $itemUnit;

    /**
     * @var StockBatch
     */
    private $stockBatch;

    /**
     * @var StockMasterHistory
     */
    private $stockMasterHistory;


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
     * Set actionType
     *
     * @param integer $actionType
     */
    public function setActionType($actionType)
    {
        $this->actionType = $actionType;
    }

    /**
     * Get actionType
     *
     * @return integer 
     */
    public function getActionType()
    {
        return $this->actionType;
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
     * Set stockBatch
     *
     * @param StockBatch $stockBatch
     */
    public function setStockBatch(\StockBatch $stockBatch)
    {
        $this->stockBatch = $stockBatch;
    }

    /**
     * Get stockBatch
     *
     * @return StockBatch 
     */
    public function getStockBatch()
    {
        return $this->stockBatch;
    }

    /**
     * Set stockMasterHistory
     *
     * @param StockMasterHistory $stockMasterHistory
     */
    public function setStockMasterHistory(\StockMasterHistory $stockMasterHistory)
    {
        $this->stockMasterHistory = $stockMasterHistory;
    }

    /**
     * Get stockMasterHistory
     *
     * @return StockMasterHistory 
     */
    public function getStockMasterHistory()
    {
        return $this->stockMasterHistory;
    }
}