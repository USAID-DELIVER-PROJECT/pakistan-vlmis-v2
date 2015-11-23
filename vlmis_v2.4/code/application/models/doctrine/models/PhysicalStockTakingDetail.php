<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * PhysicalStockTakingDetail
 */
class PhysicalStockTakingDetail
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var string $batchNumber
     */
    private $batchNumber;

    /**
     * @var integer $stakeholderItemPackSize
     */
    private $stakeholderItemPackSize;

    /**
     * @var decimal $quantity
     */
    private $quantity;

    /**
     * @var decimal $currentQuantity
     */
    private $currentQuantity;

    /**
     * @var datetime $productionDate
     */
    private $productionDate;

    /**
     * @var datetime $expiryDate
     */
    private $expiryDate;

    /**
     * @var datetime $createdDate
     */
    private $createdDate;

    /**
     * @var VvmStages
     */
    private $vvmStage;

    /**
     * @var PhysicalStockTaking
     */
    private $physicalStockTaking;

    /**
     * @var StockBatch
     */
    private $stockBatch;

    /**
     * @var StockMaster
     */
    private $stockMaster;

    /**
     * @var PlacementLocations
     */
    private $placementLocation;

    /**
     * @var ItemPackSizes
     */
    private $itemPackSize;

    /**
     * @var Warehouses
     */
    private $warehouse;


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
     * Set stakeholderItemPackSize
     *
     * @param integer $stakeholderItemPackSize
     */
    public function setStakeholderItemPackSize($stakeholderItemPackSize)
    {
        $this->stakeholderItemPackSize = $stakeholderItemPackSize;
    }

    /**
     * Get stakeholderItemPackSize
     *
     * @return integer 
     */
    public function getStakeholderItemPackSize()
    {
        return $this->stakeholderItemPackSize;
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
     * Set currentQuantity
     *
     * @param decimal $currentQuantity
     */
    public function setCurrentQuantity($currentQuantity)
    {
        $this->currentQuantity = $currentQuantity;
    }

    /**
     * Get currentQuantity
     *
     * @return decimal 
     */
    public function getCurrentQuantity()
    {
        return $this->currentQuantity;
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
     * Set physicalStockTaking
     *
     * @param PhysicalStockTaking $physicalStockTaking
     */
    public function setPhysicalStockTaking(\PhysicalStockTaking $physicalStockTaking)
    {
        $this->physicalStockTaking = $physicalStockTaking;
    }

    /**
     * Get physicalStockTaking
     *
     * @return PhysicalStockTaking 
     */
    public function getPhysicalStockTaking()
    {
        return $this->physicalStockTaking;
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

    /**
     * Set itemPackSize
     *
     * @param ItemPackSizes $itemPackSize
     */
    public function setItemPackSize(\ItemPackSizes $itemPackSize)
    {
        $this->itemPackSize = $itemPackSize;
    }

    /**
     * Get itemPackSize
     *
     * @return ItemPackSizes 
     */
    public function getItemPackSize()
    {
        return $this->itemPackSize;
    }

    /**
     * Set warehouse
     *
     * @param Warehouses $warehouse
     */
    public function setWarehouse(\Warehouses $warehouse)
    {
        $this->warehouse = $warehouse;
    }

    /**
     * Get warehouse
     *
     * @return Warehouses 
     */
    public function getWarehouse()
    {
        return $this->warehouse;
    }
}