<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Stakeholders
 */
class Stakeholders
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var string $stakeholderName
     */
    private $stakeholderName;

    /**
     * @var integer $listRank
     */
    private $listRank;

    /**
     * @var StakeholderActivities
     */
    private $stakeholderActivity;

    /**
     * @var GeoLevels
     */
    private $geoLevel;

    /**
     * @var Stakeholders
     */
    private $parent;

    /**
     * @var Stakeholders
     */
    private $mainStakeholder;

    /**
     * @var StakeholderSectors
     */
    private $stakeholderSector;

    /**
     * @var StakeholderTypes
     */
    private $stakeholderType;


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
}