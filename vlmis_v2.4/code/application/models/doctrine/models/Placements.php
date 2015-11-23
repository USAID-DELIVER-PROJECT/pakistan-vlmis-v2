<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Placements
 */
class Placements
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var integer $quantity
     */
    private $quantity;

    /**
     * @var boolean $isPlaced
     */
    private $isPlaced;

    /**
     * @var datetime $createdDate
     */
    private $createdDate;

    /**
     * @var VvmStages
     */
    private $vvmStage;

    /**
     * @var Users
     */
    private $createdBy;

    /**
     * @var ListDetail
     */
    private $placementTransactionType;

    /**
     * @var StockBatch
     */
    private $stockBatch;

    /**
     * @var StockDetail
     */
    private $stockDetail;

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
     * Set isPlaced
     *
     * @param boolean $isPlaced
     */
    public function setIsPlaced($isPlaced)
    {
        $this->isPlaced = $isPlaced;
    }

    /**
     * Get isPlaced
     *
     * @return boolean 
     */
    public function getIsPlaced()
    {
        return $this->isPlaced;
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

    /**
     * Set placementTransactionType
     *
     * @param ListDetail $placementTransactionType
     */
    public function setPlacementTransactionType(\ListDetail $placementTransactionType)
    {
        $this->placementTransactionType = $placementTransactionType;
    }

    /**
     * Get placementTransactionType
     *
     * @return ListDetail 
     */
    public function getPlacementTransactionType()
    {
        return $this->placementTransactionType;
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
     * Set stockDetail
     *
     * @param StockDetail $stockDetail
     */
    public function setStockDetail(\StockDetail $stockDetail)
    {
        $this->stockDetail = $stockDetail;
    }

    /**
     * Get stockDetail
     *
     * @return StockDetail 
     */
    public function getStockDetail()
    {
        return $this->stockDetail;
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