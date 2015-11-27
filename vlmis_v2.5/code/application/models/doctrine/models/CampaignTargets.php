<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * CampaignTargets
 */
class CampaignTargets
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var integer $dailyTarget
     */
    private $dailyTarget;

    /**
     * @var integer $createdBy
     */
    private $createdBy;

    /**
     * @var datetime $createdDate
     */
    private $createdDate;

    /**
     * @var integer $modifiedBy
     */
    private $modifiedBy;

    /**
     * @var datetime $modifiedDate
     */
    private $modifiedDate;

    /**
     * @var ItemPackSizes
     */
    private $itemPackSize;

    /**
     * @var Campaigns
     */
    private $campaign;

    /**
     * @var Warehouses
     */
    private $warehouse;


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
     * Set dailyTarget
     *
     * @param integer $dailyTarget
     */
    public function setDailyTarget($dailyTarget)
    {
        $this->dailyTarget = $dailyTarget;
    }

    /**
     * Get dailyTarget
     *
     * @return integer 
     */
    public function getDailyTarget()
    {
        return $this->dailyTarget;
    }

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
    }

    /**
     * Get createdBy
     *
     * @return integer 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
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
     * Set modifiedBy
     *
     * @param integer $modifiedBy
     */
    public function setModifiedBy($modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
    }

    /**
     * Get modifiedBy
     *
     * @return integer 
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
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
     * Set warehouse
     *
     * @param Warehouses $warehouse
     */
    public function setWarehouse(\Warehouses $warehouse)
    {
        $this->warehouse = $warehouse;
    }

    /**
     * Get warehouse
     *
     * @return Warehouses 
     */
    public function getWarehouse()
    {
        return $this->warehouse;
    }
}