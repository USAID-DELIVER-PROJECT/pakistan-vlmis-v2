<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * GeoMaps
 */
class GeoMaps
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var string $classification
     */
    private $classification;

    /**
     * @var string $title
     */
    private $title;

    /**
     * @var integer $noOfClasses
     */
    private $noOfClasses;

    /**
     * @var Resources
     */
    private $resource;


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
     * Set classification
     *
     * @param string $classification
     */
    public function setClassification($classification)
    {
        $this->classification = $classification;
    }

    /**
     * Get classification
     *
     * @return string 
     */
    public function getClassification()
    {
        return $this->classification;
    }

    /**
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set noOfClasses
     *
     * @param integer $noOfClasses
     */
    public function setNoOfClasses($noOfClasses)
    {
        $this->noOfClasses = $noOfClasses;
    }

    /**
     * Get noOfClasses
     *
     * @return integer 
     */
    public function getNoOfClasses()
    {
        return $this->noOfClasses;
    }

    /**
     * Set resource
     *
     * @param Resources $resource
     */
    public function setResource(\Resources $resource)
    {
        $this->resource = $resource;
    }

    /**
     * Get resource
     *
     * @return Resources 
     */
    public function getResource()
    {
        return $this->resource;
    }
}