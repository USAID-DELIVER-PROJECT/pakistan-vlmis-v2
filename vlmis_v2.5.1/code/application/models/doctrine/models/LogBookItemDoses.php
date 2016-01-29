<?php

/**
*  Model for Log Book Item Doses
*/

use Doctrine\ORM\Mapping as ORM;

/**
 *  LogBookItemDoses
 */
class LogBookItemDoses
{
    /**
     * $pkId
     * @var integer $pkId
     */
    private $pkId;

    /**
     * $doses
     * @var integer $doses
     */
    private $doses;

    /**
     * $createdDate
     * @var datetime $createdDate
     */
    private $createdDate;

    /**
     * $modifiedDate
     * @var datetime $modifiedDate
     */
    private $modifiedDate;

    /**
     * $modifiedBy
     * @var Users
     */
    private $modifiedBy;

    /**
     * $itemPackSize
     * @var ItemPackSizes
     */
    private $itemPackSize;

    /**
     * $logBook
     * @var LogBook
     */
    private $logBook;

    /**
     * $createdBy
     * @var Users
     */
    private $createdBy;


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
     * Set createdDate
     *
     * @param datetime $createdDate
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }

    /**
     * Get createdDate
     *
     * @return datetime 
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Set modifiedDate
     *
     * @param datetime $modifiedDate
     */
    public function setModifiedDate($modifiedDate)
    {
        $this->modifiedDate = $modifiedDate;
    }

    /**
     * Get modifiedDate
     *
     * @return datetime 
     */
    public function getModifiedDate()
    {
        return $this->modifiedDate;
    }

    /**
     * Set modifiedBy
     *
     * @param Users $modifiedBy
     */
    public function setModifiedBy(\Users $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
    }

    /**
     * Get modifiedBy
     *
     * @return Users 
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
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
     * Set createdBy
     *
     * @param Users $createdBy
     */
    public function setCreatedBy(\Users $createdBy)
    {
        $this->createdBy = $createdBy;
    }

    /**
     * Get createdBy
     *
     * @return Users 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }
}