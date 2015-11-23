<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * CcmWarehousesSolarEnergy
 */
class CcmWarehousesSolarEnergy
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var CcmWarehouses
     */
    private $ccmWarehouse;

    /**
     * @var ListDetail
     */
    private $solarEnergy;


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
     * Set ccmWarehouse
     *
     * @param CcmWarehouses $ccmWarehouse
     */
    public function setCcmWarehouse(\CcmWarehouses $ccmWarehouse)
    {
        $this->ccmWarehouse = $ccmWarehouse;
    }

    /**
     * Get ccmWarehouse
     *
     * @return CcmWarehouses 
     */
    public function getCcmWarehouse()
    {
        return $this->ccmWarehouse;
    }

    /**
     * Set solarEnergy
     *
     * @param ListDetail $solarEnergy
     */
    public function setSolarEnergy(\ListDetail $solarEnergy)
    {
        $this->solarEnergy = $solarEnergy;
    }

    /**
     * Get solarEnergy
     *
     * @return ListDetail 
     */
    public function getSolarEnergy()
    {
        return $this->solarEnergy;
    }
}