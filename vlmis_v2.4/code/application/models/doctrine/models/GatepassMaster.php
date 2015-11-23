<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * GatepassMaster
 */
class GatepassMaster
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
     * @var datetime $transactionDate
     */
    private $transactionDate;

    /**
     * @var GatepassVehicles
     */
    private $gatepassVehicle;

    /**
     * @var Warehouses
     */
    private $warehouse;


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
     * Set transactionDate
     *
     * @param datetime $transactionDate
     */
    public function setTransactionDate($transactionDate)
    {
        $this->transactionDate = $transactionDate;
    }

    /**
     * Get transactionDate
     *
     * @return datetime 
     */
    public function getTransactionDate()
    {
        return $this->transactionDate;
    }

    /**
     * Set gatepassVehicle
     *
     * @param GatepassVehicles $gatepassVehicle
     */
    public function setGatepassVehicle(\GatepassVehicles $gatepassVehicle)
    {
        $this->gatepassVehicle = $gatepassVehicle;
    }

    /**
     * Get gatepassVehicle
     *
     * @return GatepassVehicles 
     */
    public function getGatepassVehicle()
    {
        return $this->gatepassVehicle;
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
}