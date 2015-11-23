<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * CampaignDistricts
 */
class CampaignDistricts
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var Campaigns
     */
    private $campaign;

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
     * Set campaign
     *
     * @param Campaigns $campaign
     */
    public function setCampaign(\Campaigns $campaign)
    {
        $this->campaign = $campaign;
    }

    /**
     * Get campaign
     *
     * @return Campaigns 
     */
    public function getCampaign()
    {
        return $this->campaign;
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