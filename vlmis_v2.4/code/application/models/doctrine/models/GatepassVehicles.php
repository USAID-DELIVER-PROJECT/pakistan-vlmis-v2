<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * GatepassVehicles
 */
class GatepassVehicles
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var string $number
     */
    private $number;

    /**
     * @var ListDetail
     */
    private $vehicleType;


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
     * Set number
     *
     * @param string $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * Get number
     *
     * @return string 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set vehicleType
     *
     * @param ListDetail $vehicleType
     */
    public function setVehicleType(\ListDetail $vehicleType)
    {
        $this->vehicleType = $vehicleType;
    }

    /**
     * Get vehicleType
     *
     * @return ListDetail 
     */
    public function getVehicleType()
    {
        return $this->vehicleType;
    }
}