<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ItemSchedule
 */
class ItemSchedule
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var integer $numberOfDoses
     */
    private $numberOfDoses;

    /**
     * @var integer $startingNo
     */
    private $startingNo;

    /**
     * @var StakeholderActivities
     */
    private $stakeholderActivity;

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
}