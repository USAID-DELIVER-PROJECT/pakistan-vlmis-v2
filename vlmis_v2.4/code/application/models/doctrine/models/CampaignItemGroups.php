<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * CampaignItemGroups
 */
class CampaignItemGroups
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var integer $ageGroup1Min
     */
    private $ageGroup1Min;

    /**
     * @var integer $ageGroup1Max
     */
    private $ageGroup1Max;

    /**
     * @var integer $ageGroup2Min
     */
    private $ageGroup2Min;

    /**
     * @var integer $ageGroup2Max
     */
    private $ageGroup2Max;

    /**
     * @var ItemPackSizes
     */
    private $itemPackSize;


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
     * Set ageGroup1Min
     *
     * @param integer $ageGroup1Min
     */
    public function setAgeGroup1Min($ageGroup1Min)
    {
        $this->ageGroup1Min = $ageGroup1Min;
    }

    /**
     * Get ageGroup1Min
     *
     * @return integer 
     */
    public function getAgeGroup1Min()
    {
        return $this->ageGroup1Min;
    }

    /**
     * Set ageGroup1Max
     *
     * @param integer $ageGroup1Max
     */
    public function setAgeGroup1Max($ageGroup1Max)
    {
        $this->ageGroup1Max = $ageGroup1Max;
    }

    /**
     * Get ageGroup1Max
     *
     * @return integer 
     */
    public function getAgeGroup1Max()
    {
        return $this->ageGroup1Max;
    }

    /**
     * Set ageGroup2Min
     *
     * @param integer $ageGroup2Min
     */
    public function setAgeGroup2Min($ageGroup2Min)
    {
        $this->ageGroup2Min = $ageGroup2Min;
    }

    /**
     * Get ageGroup2Min
     *
     * @return integer 
     */
    public function getAgeGroup2Min()
    {
        return $this->ageGroup2Min;
    }

    /**
     * Set ageGroup2Max
     *
     * @param integer $ageGroup2Max
     */
    public function setAgeGroup2Max($ageGroup2Max)
    {
        $this->ageGroup2Max = $ageGroup2Max;
    }

    /**
     * Get ageGroup2Max
     *
     * @return integer 
     */
    public function getAgeGroup2Max()
    {
        return $this->ageGroup2Max;
    }

    /**
     * Set itemPackSize
     *
     * @param ItemPackSizes $itemPackSize
     */
    public function setItemPackSize(\ItemPackSizes $itemPackSize)
    {
        $this->itemPackSize = $itemPackSize;
    }

    /**
     * Get itemPackSize
     *
     * @return ItemPackSizes 
     */
    public function getItemPackSize()
    {
        return $this->itemPackSize;
    }
}