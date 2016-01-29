<?php

/**
*  Model for Locations
*/

use Doctrine\ORM\Mapping as ORM;

/**
 *  Locations
 */
class Locations
{
    /**
     * $pkId
     * @var integer $pkId
     */
    private $pkId;

    /**
     * $locationName
     * @var string $locationName
     */
    private $locationName;

    /**
     * $ccmLocationId
     * @var integer $ccmLocationId
     */
    private $ccmLocationId;

    /**
     * $sdmsName
     * @var string $sdmsName
     */
    private $sdmsName;

    /**
     * $createdDate
     * @var datetime $createdDate
     */
    private $createdDate;

    /**
     * $modifiedDate
     * @var datetime $modifiedDate
     */
    private $modifiedDate;

    /**
     * $district
     * @var Locations
     */
    private $district;

    /**
     * $geoLevel
     * @var GeoLevels
     */
    private $geoLevel;

    /**
     * $locationType
     * @var LocationTypes
     */
    private $locationType;

    /**
     * $province
     * @var Locations
     */
    private $province;

    /**
     * $createdBy
     * @var Users
     */
    private $createdBy;

    /**
     * $modifiedBy
     * @var Users
     */
    private $modifiedBy;

    /**
     * $parent
     * @var Locations
     */
    private $parent;


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
     * Set modifiedDate
     *
     * @param datetime $modifiedDate
     */
    public function setModifiedDate($modifiedDate)
    {
        $this->modifiedDate = $modifiedDate;
    }

    /**
     * Get modifiedDate
     *
     * @return datetime 
     */
    public function getModifiedDate()
    {
        return $this->modifiedDate;
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
     * Set modifiedBy
     *
     * @param Users $modifiedBy
     */
    public function setModifiedBy(\Users $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
    }

    /**
     * Get modifiedBy
     *
     * @return Users 
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
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
}