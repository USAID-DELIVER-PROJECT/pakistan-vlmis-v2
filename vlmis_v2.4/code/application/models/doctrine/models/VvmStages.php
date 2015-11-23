<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * VvmStages
 */
class VvmStages
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var string $vvmStageValue
     */
    private $vvmStageValue;


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
     * Set vvmStageValue
     *
     * @param string $vvmStageValue
     */
    public function setVvmStageValue($vvmStageValue)
    {
        $this->vvmStageValue = $vvmStageValue;
    }

    /**
     * Get vvmStageValue
     *
     * @return string 
     */
    public function getVvmStageValue()
    {
        return $this->vvmStageValue;
    }
}