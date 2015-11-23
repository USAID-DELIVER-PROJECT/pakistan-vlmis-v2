<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * LogBookItemDoses
 */
class LogBookItemDoses
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var integer $doses
     */
    private $doses;

    /**
     * @var LogBook
     */
    private $logBook;

    /**
     * @var ItemPackSizes
     */
    private $itemPackSize;


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
     * Set doses
     *
     * @param integer $doses
     */
    public function setDoses($doses)
    {
        $this->doses = $doses;
    }

    /**
     * Get doses
     *
     * @return integer 
     */
    public function getDoses()
    {
        return $this->doses;
    }

    /**
     * Set logBook
     *
     * @param LogBook $logBook
     */
    public function setLogBook(\LogBook $logBook)
    {
        $this->logBook = $logBook;
    }

    /**
     * Get logBook
     *
     * @return LogBook 
     */
    public function getLogBook()
    {
        return $this->logBook;
    }

    /**
     * Set itemPackSize
     *
     * @param ItemPackSizes $itemPackSize
     */
    public function setItemPackSize(\ItemPackSizes $itemPackSize)
    {
        $this->itemPackSize = $itemPackSize;
    }

    /**
     * Get itemPackSize
     *
     * @return ItemPackSizes 
     */
    public function getItemPackSize()
    {
        return $this->itemPackSize;
    }
}