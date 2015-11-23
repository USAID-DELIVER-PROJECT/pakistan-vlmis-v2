<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * NonCcmLocations
 */
class NonCcmLocations
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var string $locationName
     */
    private $locationName;

    /**
     * @var Warehouses
     */
    private $warehouse;

    /**
     * @var ListDetail
     */
    private $area;

    /**
     * @var ListDetail
     */
    private $level;

    /**
     * @var ListDetail
     */
    private $pallet;

    /**
     * @var RackInformation
     */
    private $rackInformation;

    /**
     * @var ListDetail
     */
    private $rack;

    /**
     * @var ListDetail
     */
    private $row;


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
     * Set locationName
     *
     * @param string $locationName
     */
    public function setLocationName($locationName)
    {
        $this->locationName = $locationName;
    }

    /**
     * Get locationName
     *
     * @return string 
     */
    public function getLocationName()
    {
        return $this->locationName;
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
     * Set area
     *
     * @param ListDetail $area
     */
    public function setArea(\ListDetail $area)
    {
        $this->area = $area;
    }

    /**
     * Get area
     *
     * @return ListDetail 
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set level
     *
     * @param ListDetail $level
     */
    public function setLevel(\ListDetail $level)
    {
        $this->level = $level;
    }

    /**
     * Get level
     *
     * @return ListDetail 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set pallet
     *
     * @param ListDetail $pallet
     */
    public function setPallet(\ListDetail $pallet)
    {
        $this->pallet = $pallet;
    }

    /**
     * Get pallet
     *
     * @return ListDetail 
     */
    public function getPallet()
    {
        return $this->pallet;
    }

    /**
     * Set rackInformation
     *
     * @param RackInformation $rackInformation
     */
    public function setRackInformation(\RackInformation $rackInformation)
    {
        $this->rackInformation = $rackInformation;
    }

    /**
     * Get rackInformation
     *
     * @return RackInformation 
     */
    public function getRackInformation()
    {
        return $this->rackInformation;
    }

    /**
     * Set rack
     *
     * @param ListDetail $rack
     */
    public function setRack(\ListDetail $rack)
    {
        $this->rack = $rack;
    }

    /**
     * Get rack
     *
     * @return ListDetail 
     */
    public function getRack()
    {
        return $this->rack;
    }

    /**
     * Set row
     *
     * @param ListDetail $row
     */
    public function setRow(\ListDetail $row)
    {
        $this->row = $row;
    }

    /**
     * Get row
     *
     * @return ListDetail 
     */
    public function getRow()
    {
        return $this->row;
    }
}