<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * PlacementLocations
 */
class PlacementLocations
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var string $locationBarcode
     */
    private $locationBarcode;

    /**
     * @var integer $locationId
     */
    private $locationId;

    /**
     * @var decimal $capacityPercentage
     */
    private $capacityPercentage;

    /**
     * @var ListDetail
     */
    private $locationType;


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
     * Set locationBarcode
     *
     * @param string $locationBarcode
     */
    public function setLocationBarcode($locationBarcode)
    {
        $this->locationBarcode = $locationBarcode;
    }

    /**
     * Get locationBarcode
     *
     * @return string 
     */
    public function getLocationBarcode()
    {
        return $this->locationBarcode;
    }

    /**
     * Set locationId
     *
     * @param integer $locationId
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * Get locationId
     *
     * @return integer 
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Set capacityPercentage
     *
     * @param decimal $capacityPercentage
     */
    public function setCapacityPercentage($capacityPercentage)
    {
        $this->capacityPercentage = $capacityPercentage;
    }

    /**
     * Get capacityPercentage
     *
     * @return decimal 
     */
    public function getCapacityPercentage()
    {
        return $this->capacityPercentage;
    }

    /**
     * Set locationType
     *
     * @param ListDetail $locationType
     */
    public function setLocationType(\ListDetail $locationType)
    {
        $this->locationType = $locationType;
    }

    /**
     * Get locationType
     *
     * @return ListDetail 
     */
    public function getLocationType()
    {
        return $this->locationType;
    }
}