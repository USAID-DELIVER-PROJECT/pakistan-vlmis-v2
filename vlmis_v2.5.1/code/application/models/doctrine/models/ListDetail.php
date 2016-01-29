<?php

/**
*  Model for List Detail
*/

use Doctrine\ORM\Mapping as ORM;

/**
 *  ListDetail
 */
class ListDetail
{
    /**
     * $pkId
     * @var integer $pkId
     */
    private $pkId;

    /**
     * $listValue
     * @var string $listValue
     */
    private $listValue;

    /**
     * $description
     * @var text $description
     */
    private $description;

    /**
     * $rank
     * @var integer $rank
     */
    private $rank;

    /**
     * $referenceId
     * @var integer $referenceId
     */
    private $referenceId;

    /**
     * $parentId
     * @var integer $parentId
     */
    private $parentId;

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
     * $listMaster
     * @var ListMaster
     */
    private $listMaster;

    /**
     * $createdBy
     * @var Users
     */
    private $createdBy;

    /**
     * $modifiedBy
     * @var Users
     */
    private $modifiedBy;


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
     * Set listValue
     *
     * @param string $listValue
     */
    public function setListValue($listValue)
    {
        $this->listValue = $listValue;
    }

    /**
     * Get listValue
     *
     * @return string 
     */
    public function getListValue()
    {
        return $this->listValue;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set rank
     *
     * @param integer $rank
     */
    public function setRank($rank)
    {
        $this->rank = $rank;
    }

    /**
     * Get rank
     *
     * @return integer 
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * Set referenceId
     *
     * @param integer $referenceId
     */
    public function setReferenceId($referenceId)
    {
        $this->referenceId = $referenceId;
    }

    /**
     * Get referenceId
     *
     * @return integer 
     */
    public function getReferenceId()
    {
        return $this->referenceId;
    }

    /**
     * Set parentId
     *
     * @param integer $parentId
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
    }

    /**
     * Get parentId
     *
     * @return integer 
     */
    public function getParentId()
    {
        return $this->parentId;
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
     * Set listMaster
     *
     * @param ListMaster $listMaster
     */
    public function setListMaster(\ListMaster $listMaster)
    {
        $this->listMaster = $listMaster;
    }

    /**
     * Get listMaster
     *
     * @return ListMaster 
     */
    public function getListMaster()
    {
        return $this->listMaster;
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
}