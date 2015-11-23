<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ItemPackSizes
 */
class ItemPackSizes
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var string $itemName
     */
    private $itemName;

    /**
     * @var text $description
     */
    private $description;

    /**
     * @var integer $numberOfDoses
     */
    private $numberOfDoses;

    /**
     * @var boolean $status
     */
    private $status;

    /**
     * @var integer $listRank
     */
    private $listRank;

    /**
     * @var integer $multiplier
     */
    private $multiplier;

    /**
     * @var float $wastageRateAllowed
     */
    private $wastageRateAllowed;

    /**
     * @var string $color
     */
    private $color;

    /**
     * @var integer $vvmGroup
     */
    private $vvmGroup;

    /**
     * @var StakeholderActivities
     */
    private $stakeholderActivity;

    /**
     * @var ItemCategories
     */
    private $itemCategory;

    /**
     * @var Items
     */
    private $item;

    /**
     * @var ItemUnits
     */
    private $itemUnit;


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
     * Set itemName
     *
     * @param string $itemName
     */
    public function setItemName($itemName)
    {
        $this->itemName = $itemName;
    }

    /**
     * Get itemName
     *
     * @return string 
     */
    public function getItemName()
    {
        return $this->itemName;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
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
     * Set multiplier
     *
     * @param integer $multiplier
     */
    public function setMultiplier($multiplier)
    {
        $this->multiplier = $multiplier;
    }

    /**
     * Get multiplier
     *
     * @return integer 
     */
    public function getMultiplier()
    {
        return $this->multiplier;
    }

    /**
     * Set wastageRateAllowed
     *
     * @param float $wastageRateAllowed
     */
    public function setWastageRateAllowed($wastageRateAllowed)
    {
        $this->wastageRateAllowed = $wastageRateAllowed;
    }

    /**
     * Get wastageRateAllowed
     *
     * @return float 
     */
    public function getWastageRateAllowed()
    {
        return $this->wastageRateAllowed;
    }

    /**
     * Set color
     *
     * @param string $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set vvmGroup
     *
     * @param integer $vvmGroup
     */
    public function setVvmGroup($vvmGroup)
    {
        $this->vvmGroup = $vvmGroup;
    }

    /**
     * Get vvmGroup
     *
     * @return integer 
     */
    public function getVvmGroup()
    {
        return $this->vvmGroup;
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
     * Set itemCategory
     *
     * @param ItemCategories $itemCategory
     */
    public function setItemCategory(\ItemCategories $itemCategory)
    {
        $this->itemCategory = $itemCategory;
    }

    /**
     * Get itemCategory
     *
     * @return ItemCategories 
     */
    public function getItemCategory()
    {
        return $this->itemCategory;
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
     * Set itemUnit
     *
     * @param ItemUnits $itemUnit
     */
    public function setItemUnit(\ItemUnits $itemUnit)
    {
        $this->itemUnit = $itemUnit;
    }

    /**
     * Get itemUnit
     *
     * @return ItemUnits 
     */
    public function getItemUnit()
    {
        return $this->itemUnit;
    }
}