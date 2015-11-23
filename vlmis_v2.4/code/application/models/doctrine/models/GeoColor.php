<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * GeoColor
 */
class GeoColor
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var string $colorCode
     */
    private $colorCode;


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
}