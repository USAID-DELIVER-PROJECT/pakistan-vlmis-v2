<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * LocationPopulations
 */
class LocationPopulations
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var integer $population
     */
    private $population;

    /**
     * @var datetime $estimationDate
     */
    private $estimationDate;

    /**
     * @var Locations
     */
    private $location;


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
     * Set population
     *
     * @param integer $population
     */
    public function setPopulation($population)
    {
        $this->population = $population;
    }

    /**
     * Get population
     *
     * @return integer 
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * Set estimationDate
     *
     * @param datetime $estimationDate
     */
    public function setEstimationDate($estimationDate)
    {
        $this->estimationDate = $estimationDate;
    }

    /**
     * Get estimationDate
     *
     * @return datetime 
     */
    public function getEstimationDate()
    {
        return $this->estimationDate;
    }

    /**
     * Set location
     *
     * @param Locations $location
     */
    public function setLocation(\Locations $location)
    {
        $this->location = $location;
    }

    /**
     * Get location
     *
     * @return Locations 
     */
    public function getLocation()
    {
        return $this->location;
    }
}