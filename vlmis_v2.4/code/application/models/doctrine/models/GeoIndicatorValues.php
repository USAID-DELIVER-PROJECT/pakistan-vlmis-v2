<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * GeoIndicatorValues
 */
class GeoIndicatorValues
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var decimal $startValue
     */
    private $startValue;

    /**
     * @var decimal $endValue
     */
    private $endValue;

    /**
     * @var integer $interval
     */
    private $interval;

    /**
     * @var string $description
     */
    private $description;

    /**
     * @var GeoColor
     */
    private $geoColor;

    /**
     * @var GeoIndicators
     */
    private $geoIndicator;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set startValue
     *
     * @param decimal $startValue
     */
    public function setStartValue($startValue)
    {
        $this->startValue = $startValue;
    }

    /**
     * Get startValue
     *
     * @return decimal 
     */
    public function getStartValue()
    {
        return $this->startValue;
    }

    /**
     * Set endValue
     *
     * @param decimal $endValue
     */
    public function setEndValue($endValue)
    {
        $this->endValue = $endValue;
    }

    /**
     * Get endValue
     *
     * @return decimal 
     */
    public function getEndValue()
    {
        return $this->endValue;
    }

    /**
     * Set interval
     *
     * @param integer $interval
     */
    public function setInterval($interval)
    {
        $this->interval = $interval;
    }

    /**
     * Get interval
     *
     * @return integer 
     */
    public function getInterval()
    {
        return $this->interval;
    }

    /**
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set geoColor
     *
     * @param GeoColor $geoColor
     */
    public function setGeoColor(\GeoColor $geoColor)
    {
        $this->geoColor = $geoColor;
    }

    /**
     * Get geoColor
     *
     * @return GeoColor 
     */
    public function getGeoColor()
    {
        return $this->geoColor;
    }

    /**
     * Set geoIndicator
     *
     * @param GeoIndicators $geoIndicator
     */
    public function setGeoIndicator(\GeoIndicators $geoIndicator)
    {
        $this->geoIndicator = $geoIndicator;
    }

    /**
     * Get geoIndicator
     *
     * @return GeoIndicators 
     */
    public function getGeoIndicator()
    {
        return $this->geoIndicator;
    }
}