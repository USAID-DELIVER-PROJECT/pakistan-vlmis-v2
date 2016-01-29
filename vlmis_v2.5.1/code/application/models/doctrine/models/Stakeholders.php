<?php

/**
*  Model for Stakeholders
*/

use Doctrine\ORM\Mapping as ORM;

/**
 *  Stakeholders
 */
class Stakeholders
{
    /**
     * $pkId
     * @var integer $pkId
     */
    private $pkId;

    /**
     * $stakeholderName
     * @var string $stakeholderName
     */
    private $stakeholderName;

    /**
     * $listRank
     * @var integer $listRank
     */
    private $listRank;

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
     * $mainStakeholder
     * @var Stakeholders
     */
    private $mainStakeholder;

    /**
     * $stakeholderType
     * @var StakeholderTypes
     */
    private $stakeholderType;

    /**
     * $stakeholderSector
     * @var StakeholderSectors
     */
    private $stakeholderSector;

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
     * $modifiedBy
     * @var Users
     */
    private $modifiedBy;

    /**
     * $parent
     * @var Stakeholders
     */
    private $parent;


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
     * Set stakeholderName
     *
     * @param string $stakeholderName
     */
    public function setStakeholderName($stakeholderName)
    {
        $this->stakeholderName = $stakeholderName;
    }

    /**
     * Get stakeholderName
     *
     * @return string 
     */
    public function getStakeholderName()
    {
        return $this->stakeholderName;
    }

    /**
     * Set listRank
     *
     * @param integer $listRank
     */
    public function setListRank($listRank)
    {
        $this->listRank = $listRank;
    }

    /**
     * Get listRank
     *
     * @return integer 
     */
    public function getListRank()
    {
        return $this->listRank;
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
     * Set mainStakeholder
     *
     * @param Stakeholders $mainStakeholder
     */
    public function setMainStakeholder(\Stakeholders $mainStakeholder)
    {
        $this->mainStakeholder = $mainStakeholder;
    }

    /**
     * Get mainStakeholder
     *
     * @return Stakeholders 
     */
    public function getMainStakeholder()
    {
        return $this->mainStakeholder;
    }

    /**
     * Set stakeholderType
     *
     * @param StakeholderTypes $stakeholderType
     */
    public function setStakeholderType(\StakeholderTypes $stakeholderType)
    {
        $this->stakeholderType = $stakeholderType;
    }

    /**
     * Get stakeholderType
     *
     * @return StakeholderTypes 
     */
    public function getStakeholderType()
    {
        return $this->stakeholderType;
    }

    /**
     * Set stakeholderSector
     *
     * @param StakeholderSectors $stakeholderSector
     */
    public function setStakeholderSector(\StakeholderSectors $stakeholderSector)
    {
        $this->stakeholderSector = $stakeholderSector;
    }

    /**
     * Get stakeholderSector
     *
     * @return StakeholderSectors 
     */
    public function getStakeholderSector()
    {
        return $this->stakeholderSector;
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
     * Set parent
     *
     * @param Stakeholders $parent
     */
    public function setParent(\Stakeholders $parent)
    {
        $this->parent = $parent;
    }

    /**
     * Get parent
     *
     * @return Stakeholders 
     */
    public function getParent()
    {
        return $this->parent;
    }
}