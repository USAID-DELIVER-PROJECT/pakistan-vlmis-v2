<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * PlacementSummary
 */
class PlacementSummary
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var string $itemName
     */
    private $itemName;

    /**
     * @var string $batchNumber
     */
    private $batchNumber;

    /**
     * @var decimal $quantity
     */
    private $quantity;

    /**
     * @var integer $cartons
     */
    private $cartons;

    /**
     * @var VvmStages
     */
    private $vvmStage;

    /**
     * @var StockBatch
     */
    private $stockBatch;

    /**
     * @var PlacementLocations
     */
    private $placementLocation;


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
     * Set itemName
     *
     * @param string $itemName
     */
    public function setItemName($itemName)
    {
        $this->itemName = $itemName;
    }

    /**
     * Get itemName
     *
     * @return string 
     */
    public function getItemName()
    {
        return $this->itemName;
    }

    /**
     * Set batchNumber
     *
     * @param string $batchNumber
     */
    public function setBatchNumber($batchNumber)
    {
        $this->batchNumber = $batchNumber;
    }

    /**
     * Get batchNumber
     *
     * @return string 
     */
    public function getBatchNumber()
    {
        return $this->batchNumber;
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
     * Set cartons
     *
     * @param integer $cartons
     */
    public function setCartons($cartons)
    {
        $this->cartons = $cartons;
    }

    /**
     * Get cartons
     *
     * @return integer 
     */
    public function getCartons()
    {
        return $this->cartons;
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
     * Set placementLocation
     *
     * @param PlacementLocations $placementLocation
     */
    public function setPlacementLocation(\PlacementLocations $placementLocation)
    {
        $this->placementLocation = $placementLocation;
    }

    /**
     * Get placementLocation
     *
     * @return PlacementLocations 
     */
    public function getPlacementLocation()
    {
        return $this->placementLocation;
    }
}