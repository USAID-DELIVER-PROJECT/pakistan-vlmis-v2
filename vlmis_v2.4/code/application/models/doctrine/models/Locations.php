<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Locations
 */
class Locations
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var string $locationName
     */
    private $locationName;

    /**
     * @var integer $ccmLocationId
     */
    private $ccmLocationId;

    /**
     * @var string $sdmsName
     */
    private $sdmsName;

    /**
     * @var Locations
     */
    private $parent;

    /**
     * @var Locations
     */
    private $district;

    /**
     * @var GeoLevels
     */
    private $geoLevel;

    /**
     * @var LocationTypes
     */
    private $locationType;

    /**
     * @var Locations
     */
    private $province;


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
     * Set locationName
     *
     * @param string $locationName
     */
    public function setLocationName($locationName)
    {
        $this->locationName = $locationName;
    }

    /**
     * Get locationName
     *
     * @return string 
     */
    public function getLocationName()
    {
        return $this->locationName;
    }

    /**
     * Set ccmLocationId
     *
     * @param integer $ccmLocationId
     */
    public function setCcmLocationId($ccmLocationId)
    {
        $this->ccmLocationId = $ccmLocationId;
    }

    /**
     * Get ccmLocationId
     *
     * @return integer 
     */
    public function getCcmLocationId()
    {
        return $this->ccmLocationId;
    }

    /**
     * Set sdmsName
     *
     * @param string $sdmsName
     */
    public function setSdmsName($sdmsName)
    {
        $this->sdmsName = $sdmsName;
    }

    /**
     * Get sdmsName
     *
     * @return string 
     */
    public function getSdmsName()
    {
        return $this->sdmsName;
    }

    /**
     * Set parent
     *
     * @param Locations $parent
     */
    public function setParent(\Locations $parent)
    {
        $this->parent = $parent;
    }

    /**
     * Get parent
     *
     * @return Locations 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set district
     *
     * @param Locations $district
     */
    public function setDistrict(\Locations $district)
    {
        $this->district = $district;
    }

    /**
     * Get district
     *
     * @return Locations 
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Set geoLevel
     *
     * @param GeoLevels $geoLevel
     */
    public function setGeoLevel(\GeoLevels $geoLevel)
    {
        $this->geoLevel = $geoLevel;
    }

    /**
     * Get geoLevel
     *
     * @return GeoLevels 
     */
    public function getGeoLevel()
    {
        return $this->geoLevel;
    }

    /**
     * Set locationType
     *
     * @param LocationTypes $locationType
     */
    public function setLocationType(\LocationTypes $locationType)
    {
        $this->locationType = $locationType;
    }

    /**
     * Get locationType
     *
     * @return LocationTypes 
     */
    public function getLocationType()
    {
        return $this->locationType;
    }

    /**
     * Set province
     *
     * @param Locations $province
     */
    public function setProvince(\Locations $province)
    {
        $this->province = $province;
    }

    /**
     * Get province
     *
     * @return Locations 
     */
    public function getProvince()
    {
        return $this->province;
    }
}