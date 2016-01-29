<?php

/**
*  Model for Item Schedule
*/

use Doctrine\ORM\Mapping as ORM;

/**
 *  ItemSchedule
 */
class ItemSchedule
{
    /**
     * $pkId
     * @var integer $pkId
     */
    private $pkId;

    /**
     * $numberOfDoses
     * @var integer $numberOfDoses
     */
    private $numberOfDoses;

    /**
     * $startingNo
     * @var integer $startingNo
     */
    private $startingNo;

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
     * $stakeholderActivity
     * @var StakeholderActivities
     */
    private $stakeholderActivity;

    /**
     * $itemPackSize
     * @var ItemPackSizes
     */
    private $itemPackSize;

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
     * Get pkId
     *
     * @return integer 
     */
    public function getPkId()
    {
        return $this->pkId;
    }

    /**
     * Set numberOfDoses
     *
     * @param integer $numberOfDoses
     */
    public function setNumberOfDoses($numberOfDoses)
    {
        $this->numberOfDoses = $numberOfDoses;
    }

    /**
     * Get numberOfDoses
     *
     * @return integer 
     */
    public function getNumberOfDoses()
    {
        return $this->numberOfDoses;
    }

    /**
     * Set startingNo
     *
     * @param integer $startingNo
     */
    public function setStartingNo($startingNo)
    {
        $this->startingNo = $startingNo;
    }

    /**
     * Get startingNo
     *
     * @return integer 
     */
    public function getStartingNo()
    {
        return $this->startingNo;
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
}