<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * GeoIndicators
 */
class GeoIndicators
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var string $geoIndicatorName
     */
    private $geoIndicatorName;


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
     * Set geoIndicatorName
     *
     * @param string $geoIndicatorName
     */
    public function setGeoIndicatorName($geoIndicatorName)
    {
        $this->geoIndicatorName = $geoIndicatorName;
    }

    /**
     * Get geoIndicatorName
     *
     * @return string 
     */
    public function getGeoIndicatorName()
    {
        return $this->geoIndicatorName;
    }
}