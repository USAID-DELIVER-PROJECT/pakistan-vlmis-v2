<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * CcmWarehouses
 */
class CcmWarehouses
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var string $routineImmunizationIcepackRequirments
     */
    private $routineImmunizationIcepackRequirments;

    /**
     * @var string $campaignIcepackRequirments
     */
    private $campaignIcepackRequirments;

    /**
     * @var ListDetail
     */
    private $electricityAvailability;

    /**
     * @var ListDetail
     */
    private $vaccineSupplyMode;

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
     * Set routineImmunizationIcepackRequirments
     *
     * @param string $routineImmunizationIcepackRequirments
     */
    public function setRoutineImmunizationIcepackRequirments($routineImmunizationIcepackRequirments)
    {
        $this->routineImmunizationIcepackRequirments = $routineImmunizationIcepackRequirments;
    }

    /**
     * Get routineImmunizationIcepackRequirments
     *
     * @return string 
     */
    public function getRoutineImmunizationIcepackRequirments()
    {
        return $this->routineImmunizationIcepackRequirments;
    }

    /**
     * Set campaignIcepackRequirments
     *
     * @param string $campaignIcepackRequirments
     */
    public function setCampaignIcepackRequirments($campaignIcepackRequirments)
    {
        $this->campaignIcepackRequirments = $campaignIcepackRequirments;
    }

    /**
     * Get campaignIcepackRequirments
     *
     * @return string 
     */
    public function getCampaignIcepackRequirments()
    {
        return $this->campaignIcepackRequirments;
    }

    /**
     * Set electricityAvailability
     *
     * @param ListDetail $electricityAvailability
     */
    public function setElectricityAvailability(\ListDetail $electricityAvailability)
    {
        $this->electricityAvailability = $electricityAvailability;
    }

    /**
     * Get electricityAvailability
     *
     * @return ListDetail 
     */
    public function getElectricityAvailability()
    {
        return $this->electricityAvailability;
    }

    /**
     * Set vaccineSupplyMode
     *
     * @param ListDetail $vaccineSupplyMode
     */
    public function setVaccineSupplyMode(\ListDetail $vaccineSupplyMode)
    {
        $this->vaccineSupplyMode = $vaccineSupplyMode;
    }

    /**
     * Get vaccineSupplyMode
     *
     * @return ListDetail 
     */
    public function getVaccineSupplyMode()
    {
        return $this->vaccineSupplyMode;
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