<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * System
 */
class System
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var datetime $startDate
     */
    private $startDate;

    /**
     * @var string $tagLine
     */
    private $tagLine;


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
     * Set startDate
     *
     * @param datetime $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * Get startDate
     *
     * @return datetime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set tagLine
     *
     * @param string $tagLine
     */
    public function setTagLine($tagLine)
    {
        $this->tagLine = $tagLine;
    }

    /**
     * Get tagLine
     *
     * @return string 
     */
    public function getTagLine()
    {
        return $this->tagLine;
    }
}