<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * PilotDistricts
 */
class PilotDistricts
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var Locations
     */
    private $district;


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
}