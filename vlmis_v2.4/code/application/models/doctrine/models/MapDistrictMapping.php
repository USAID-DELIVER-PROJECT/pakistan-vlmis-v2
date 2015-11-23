<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * MapDistrictMapping
 */
class MapDistrictMapping
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var integer $mappingId
     */
    private $mappingId;

    /**
     * @var string $districtName
     */
    private $districtName;

    /**
     * @var string $provinceName
     */
    private $provinceName;

    /**
     * @var integer $defaultDistrict
     */
    private $defaultDistrict;

    /**
     * @var boolean $pilotDistrictStatus
     */
    private $pilotDistrictStatus;

    /**
     * @var Locations
     */
    private $district;

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
     * Set mappingId
     *
     * @param integer $mappingId
     */
    public function setMappingId($mappingId)
    {
        $this->mappingId = $mappingId;
    }

    /**
     * Get mappingId
     *
     * @return integer 
     */
    public function getMappingId()
    {
        return $this->mappingId;
    }

    /**
     * Set districtName
     *
     * @param string $districtName
     */
    public function setDistrictName($districtName)
    {
        $this->districtName = $districtName;
    }

    /**
     * Get districtName
     *
     * @return string 
     */
    public function getDistrictName()
    {
        return $this->districtName;
    }

    /**
     * Set provinceName
     *
     * @param string $provinceName
     */
    public function setProvinceName($provinceName)
    {
        $this->provinceName = $provinceName;
    }

    /**
     * Get provinceName
     *
     * @return string 
     */
    public function getProvinceName()
    {
        return $this->provinceName;
    }

    /**
     * Set defaultDistrict
     *
     * @param integer $defaultDistrict
     */
    public function setDefaultDistrict($defaultDistrict)
    {
        $this->defaultDistrict = $defaultDistrict;
    }

    /**
     * Get defaultDistrict
     *
     * @return integer 
     */
    public function getDefaultDistrict()
    {
        return $this->defaultDistrict;
    }

    /**
     * Set pilotDistrictStatus
     *
     * @param boolean $pilotDistrictStatus
     */
    public function setPilotDistrictStatus($pilotDistrictStatus)
    {
        $this->pilotDistrictStatus = $pilotDistrictStatus;
    }

    /**
     * Get pilotDistrictStatus
     *
     * @return boolean 
     */
    public function getPilotDistrictStatus()
    {
        return $this->pilotDistrictStatus;
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