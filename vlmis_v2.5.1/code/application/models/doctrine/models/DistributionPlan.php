<?php

/**
*  Model for Distribution Plan
*/

use Doctrine\ORM\Mapping as ORM;

/**
 *  DistributionPlan
 */
class DistributionPlan
{
    /**
     * $pkId
     * @var integer $pkId
     */
    private $pkId;

    /**
     * $status
     * @var boolean $status
     */
    private $status;

    /**
     * $createdDate
     * @var datetime $createdDate
     */
    private $createdDate;

    /**
     * $modifiedDate
     * @var datetime $modifiedDate
     */
    private $modifiedDate;

    /**
     * $modifiedBy
     * @var Users
     */
    private $modifiedBy;

    /**
     * $senderWarehouse
     * @var Warehouses
     */
    private $senderWarehouse;

    /**
     * $receiverWarehouse
     * @var Warehouses
     */
    private $receiverWarehouse;

    /**
     * $geoLevel
     * @var GeoLevels
     */
    private $geoLevel;

    /**
     * $stakeholderActivity
     * @var StakeholderActivities
     */
    private $stakeholderActivity;

    /**
     * $createdBy
     * @var Users
     */
    private $createdBy;


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
     * Set status
     *
     * @param boolean $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
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
     * Set modifiedBy
     *
     * @param Users $modifiedBy
     */
    public function setModifiedBy(\Users $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
    }

    /**
     * Get modifiedBy
     *
     * @return Users 
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }

    /**
     * Set senderWarehouse
     *
     * @param Warehouses $senderWarehouse
     */
    public function setSenderWarehouse(\Warehouses $senderWarehouse)
    {
        $this->senderWarehouse = $senderWarehouse;
    }

    /**
     * Get senderWarehouse
     *
     * @return Warehouses 
     */
    public function getSenderWarehouse()
    {
        return $this->senderWarehouse;
    }

    /**
     * Set receiverWarehouse
     *
     * @param Warehouses $receiverWarehouse
     */
    public function setReceiverWarehouse(\Warehouses $receiverWarehouse)
    {
        $this->receiverWarehouse = $receiverWarehouse;
    }

    /**
     * Get receiverWarehouse
     *
     * @return Warehouses 
     */
    public function getReceiverWarehouse()
    {
        return $this->receiverWarehouse;
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
     * Set stakeholderActivity
     *
     * @param StakeholderActivities $stakeholderActivity
     */
    public function setStakeholderActivity(\StakeholderActivities $stakeholderActivity)
    {
        $this->stakeholderActivity = $stakeholderActivity;
    }

    /**
     * Get stakeholderActivity
     *
     * @return StakeholderActivities 
     */
    public function getStakeholderActivity()
    {
        return $this->stakeholderActivity;
    }

    /**
     * Set createdBy
     *
     * @param Users $createdBy
     */
    public function setCreatedBy(\Users $createdBy)
    {
        $this->createdBy = $createdBy;
    }

    /**
     * Get createdBy
     *
     * @return Users 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }
}