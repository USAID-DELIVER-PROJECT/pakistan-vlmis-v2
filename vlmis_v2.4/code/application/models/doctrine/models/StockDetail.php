<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * StockDetail
 */
class StockDetail
{
    /**
     * @var integer $pkId
     */
    private $pkId;

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
     * @var integer $adjustmentType
     */
    private $adjustmentType;

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
     * @var StockMaster
     */
    private $stockMaster;


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
}