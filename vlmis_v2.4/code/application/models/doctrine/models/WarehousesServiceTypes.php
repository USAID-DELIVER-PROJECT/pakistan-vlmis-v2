<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * WarehousesServiceTypes
 */
class WarehousesServiceTypes
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var Warehouses
     */
    private $warehouse;

    /**
     * @var ListDetail
     */
    private $serviceType;


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

    /**
     * Set serviceType
     *
     * @param ListDetail $serviceType
     */
    public function setServiceType(\ListDetail $serviceType)
    {
        $this->serviceType = $serviceType;
    }

    /**
     * Get serviceType
     *
     * @return ListDetail 
     */
    public function getServiceType()
    {
        return $this->serviceType;
    }
}