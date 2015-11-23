<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * PipelineConsignmentsPlacements
 */
class PipelineConsignmentsPlacements
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
     * @var decimal $quantity
     */
    private $quantity;

    /**
     * @var VvmStages
     */
    private $vvmStage;

    /**
     * @var PlacementLocations
     */
    private $placementLocation;

    /**
     * @var PipelineConsignments
     */
    private $pipelineConsignment;


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
     * Set pipelineConsignment
     *
     * @param PipelineConsignments $pipelineConsignment
     */
    public function setPipelineConsignment(\PipelineConsignments $pipelineConsignment)
    {
        $this->pipelineConsignment = $pipelineConsignment;
    }

    /**
     * Get pipelineConsignment
     *
     * @return PipelineConsignments 
     */
    public function getPipelineConsignment()
    {
        return $this->pipelineConsignment;
    }
}