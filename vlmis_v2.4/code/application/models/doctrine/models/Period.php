<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Period
 */
class Period
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var text $periodName
     */
    private $periodName;

    /**
     * @var integer $periodCode
     */
    private $periodCode;

    /**
     * @var text $isMonth
     */
    private $isMonth;

    /**
     * @var integer $beginMonth
     */
    private $beginMonth;

    /**
     * @var integer $endMonth
     */
    private $endMonth;

    /**
     * @var integer $monthCount
     */
    private $monthCount;


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
     * Set periodName
     *
     * @param text $periodName
     */
    public function setPeriodName($periodName)
    {
        $this->periodName = $periodName;
    }

    /**
     * Get periodName
     *
     * @return text 
     */
    public function getPeriodName()
    {
        return $this->periodName;
    }

    /**
     * Set periodCode
     *
     * @param integer $periodCode
     */
    public function setPeriodCode($periodCode)
    {
        $this->periodCode = $periodCode;
    }

    /**
     * Get periodCode
     *
     * @return integer 
     */
    public function getPeriodCode()
    {
        return $this->periodCode;
    }

    /**
     * Set isMonth
     *
     * @param text $isMonth
     */
    public function setIsMonth($isMonth)
    {
        $this->isMonth = $isMonth;
    }

    /**
     * Get isMonth
     *
     * @return text 
     */
    public function getIsMonth()
    {
        return $this->isMonth;
    }

    /**
     * Set beginMonth
     *
     * @param integer $beginMonth
     */
    public function setBeginMonth($beginMonth)
    {
        $this->beginMonth = $beginMonth;
    }

    /**
     * Get beginMonth
     *
     * @return integer 
     */
    public function getBeginMonth()
    {
        return $this->beginMonth;
    }

    /**
     * Set endMonth
     *
     * @param integer $endMonth
     */
    public function setEndMonth($endMonth)
    {
        $this->endMonth = $endMonth;
    }

    /**
     * Get endMonth
     *
     * @return integer 
     */
    public function getEndMonth()
    {
        return $this->endMonth;
    }

    /**
     * Set monthCount
     *
     * @param integer $monthCount
     */
    public function setMonthCount($monthCount)
    {
        $this->monthCount = $monthCount;
    }

    /**
     * Get monthCount
     *
     * @return integer 
     */
    public function getMonthCount()
    {
        return $this->monthCount;
    }
}