<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * MosScale
 */
class MosScale
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var string $shortTerm
     */
    private $shortTerm;

    /**
     * @var string $longTerm
     */
    private $longTerm;

    /**
     * @var float $scaleStart
     */
    private $scaleStart;

    /**
     * @var float $scaleEnd
     */
    private $scaleEnd;

    /**
     * @var string $extra
     */
    private $extra;

    /**
     * @var string $colorCode
     */
    private $colorCode;

    /**
     * @var GeoLevels
     */
    private $geoLevel;

    /**
     * @var Items
     */
    private $item;

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
     * Set shortTerm
     *
     * @param string $shortTerm
     */
    public function setShortTerm($shortTerm)
    {
        $this->shortTerm = $shortTerm;
    }

    /**
     * Get shortTerm
     *
     * @return string 
     */
    public function getShortTerm()
    {
        return $this->shortTerm;
    }

    /**
     * Set longTerm
     *
     * @param string $longTerm
     */
    public function setLongTerm($longTerm)
    {
        $this->longTerm = $longTerm;
    }

    /**
     * Get longTerm
     *
     * @return string 
     */
    public function getLongTerm()
    {
        return $this->longTerm;
    }

    /**
     * Set scaleStart
     *
     * @param float $scaleStart
     */
    public function setScaleStart($scaleStart)
    {
        $this->scaleStart = $scaleStart;
    }

    /**
     * Get scaleStart
     *
     * @return float 
     */
    public function getScaleStart()
    {
        return $this->scaleStart;
    }

    /**
     * Set scaleEnd
     *
     * @param float $scaleEnd
     */
    public function setScaleEnd($scaleEnd)
    {
        $this->scaleEnd = $scaleEnd;
    }

    /**
     * Get scaleEnd
     *
     * @return float 
     */
    public function getScaleEnd()
    {
        return $this->scaleEnd;
    }

    /**
     * Set extra
     *
     * @param string $extra
     */
    public function setExtra($extra)
    {
        $this->extra = $extra;
    }

    /**
     * Get extra
     *
     * @return string 
     */
    public function getExtra()
    {
        return $this->extra;
    }

    /**
     * Set colorCode
     *
     * @param string $colorCode
     */
    public function setColorCode($colorCode)
    {
        $this->colorCode = $colorCode;
    }

    /**
     * Get colorCode
     *
     * @return string 
     */
    public function getColorCode()
    {
        return $this->colorCode;
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
     * Set item
     *
     * @param Items $item
     */
    public function setItem(\Items $item)
    {
        $this->item = $item;
    }

    /**
     * Get item
     *
     * @return Items 
     */
    public function getItem()
    {
        return $this->item;
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