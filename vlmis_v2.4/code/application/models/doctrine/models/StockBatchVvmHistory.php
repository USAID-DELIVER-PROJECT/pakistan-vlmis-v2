<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * StockBatchVvmHistory
 */
class StockBatchVvmHistory
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
     * @var VvmStages
     */
    private $vvmStage;

    /**
     * @var StockBatch
     */
    private $stockBatch;

    /**
     * @var StockBatchVvm
     */
    private $stockBatchVvm;


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
}