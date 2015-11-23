<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * VvmGroups
 */
class VvmGroups
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var integer $vvmGroup
     */
    private $vvmGroup;

    /**
     * @var VvmStages
     */
    private $vvmStage;


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
     * Set vvmStage
     *
     * @param VvmStages $vvmStage
     */
    public function setVvmStage(\VvmStages $vvmStage)
    {
        $this->vvmStage = $vvmStage;
    }

    /**
     * Get vvmStage
     *
     * @return VvmStages 
     */
    public function getVvmStage()
    {
        return $this->vvmStage;
    }
}