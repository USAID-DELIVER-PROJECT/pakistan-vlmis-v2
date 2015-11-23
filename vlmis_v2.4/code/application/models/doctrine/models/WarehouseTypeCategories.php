<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * WarehouseTypeCategories
 */
class WarehouseTypeCategories
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var string $categoryName
     */
    private $categoryName;


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
     * Set categoryName
     *
     * @param string $categoryName
     */
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;
    }

    /**
     * Get categoryName
     *
     * @return string 
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }
}