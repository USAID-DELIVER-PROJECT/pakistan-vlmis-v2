<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * GeoLocations
 */
class GeoLocations
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var integer $gisId
     */
    private $gisId;

    /**
     * @var Locations
     */
    private $location;

    /**
     * @var GeoLevels
     */
    private $geoLevel;

    /**
     * @var GeoMaps
     */
    private $geoMap;

    /**
     * @var Stakeholders
     */
    private $stakeholder;


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
     * Set gisId
     *
     * @param integer $gisId
     */
    public function setGisId($gisId)
    {
        $this->gisId = $gisId;
    }

    /**
     * Get gisId
     *
     * @return integer 
     */
    public function getGisId()
    {
        return $this->gisId;
    }

    /**
     * Set location
     *
     * @param Locations $location
     */
    public function setLocation(\Locations $location)
    {
        $this->location = $location;
    }

    /**
     * Get location
     *
     * @return Locations 
     */
    public function getLocation()
    {
        return $this->location;
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
     * Set geoMap
     *
     * @param GeoMaps $geoMap
     */
    public function setGeoMap(\GeoMaps $geoMap)
    {
        $this->geoMap = $geoMap;
    }

    /**
     * Get geoMap
     *
     * @return GeoMaps 
     */
    public function getGeoMap()
    {
        return $this->geoMap;
    }

    /**
     * Set stakeholder
     *
     * @param Stakeholders $stakeholder
     */
    public function setStakeholder(\Stakeholders $stakeholder)
    {
        $this->stakeholder = $stakeholder;
    }

    /**
     * Get stakeholder
     *
     * @return Stakeholders 
     */
    public function getStakeholder()
    {
        return $this->stakeholder;
    }
}