<?php

/**
*  Model for Resources
*/

use Doctrine\ORM\Mapping as ORM;

/**
 *  Resources
 */
class Resources
{
    /**
     * $pkId
     * @var integer $pkId
     */
    private $pkId;

    /**
     * $resourceName
     * @var string $resourceName
     */
    private $resourceName;

    /**
     * $description
     * @var text $description
     */
    private $description;

    /**
     * $pageTitle
     * @var string $pageTitle
     */
    private $pageTitle;

    /**
     * $metaTitle
     * @var string $metaTitle
     */
    private $metaTitle;

    /**
     * $metaDescription
     * @var text $metaDescription
     */
    private $metaDescription;

    /**
     * $rank
     * @var integer $rank
     */
    private $rank;

    /**
     * $level
     * @var integer $level
     */
    private $level;

    /**
     * $parentId
     * @var integer $parentId
     */
    private $parentId;

    /**
     * $iconClass
     * @var string $iconClass
     */
    private $iconClass;

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
     * $resourceType
     * @var ResourceTypes
     */
    private $resourceType;

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
     * Set resourceName
     *
     * @param string $resourceName
     */
    public function setResourceName($resourceName)
    {
        $this->resourceName = $resourceName;
    }

    /**
     * Get resourceName
     *
     * @return string 
     */
    public function getResourceName()
    {
        return $this->resourceName;
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
     * Set pageTitle
     *
     * @param string $pageTitle
     */
    public function setPageTitle($pageTitle)
    {
        $this->pageTitle = $pageTitle;
    }

    /**
     * Get pageTitle
     *
     * @return string 
     */
    public function getPageTitle()
    {
        return $this->pageTitle;
    }

    /**
     * Set metaTitle
     *
     * @param string $metaTitle
     */
    public function setMetaTitle($metaTitle)
    {
        $this->metaTitle = $metaTitle;
    }

    /**
     * Get metaTitle
     *
     * @return string 
     */
    public function getMetaTitle()
    {
        return $this->metaTitle;
    }

    /**
     * Set metaDescription
     *
     * @param text $metaDescription
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;
    }

    /**
     * Get metaDescription
     *
     * @return text 
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
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
     * Set level
     *
     * @param integer $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
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
     * Set iconClass
     *
     * @param string $iconClass
     */
    public function setIconClass($iconClass)
    {
        $this->iconClass = $iconClass;
    }

    /**
     * Get iconClass
     *
     * @return string 
     */
    public function getIconClass()
    {
        return $this->iconClass;
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
     * Set resourceType
     *
     * @param ResourceTypes $resourceType
     */
    public function setResourceType(\ResourceTypes $resourceType)
    {
        $this->resourceType = $resourceType;
    }

    /**
     * Get resourceType
     *
     * @return ResourceTypes 
     */
    public function getResourceType()
    {
        return $this->resourceType;
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