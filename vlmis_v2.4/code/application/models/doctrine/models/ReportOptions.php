<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ReportOptions
 */
class ReportOptions
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var string $reportId
     */
    private $reportId;

    /**
     * @var string $reportTitleSql
     */
    private $reportTitleSql;

    /**
     * @var string $reportDataSql
     */
    private $reportDataSql;

    /**
     * @var integer $reportStakeholder
     */
    private $reportStakeholder;

    /**
     * @var integer $reportComparision
     */
    private $reportComparision;

    /**
     * @var integer $reportDataPosition
     */
    private $reportDataPosition;

    /**
     * @var integer $reportComparisionFlag
     */
    private $reportComparisionFlag;


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
     * Set reportId
     *
     * @param string $reportId
     */
    public function setReportId($reportId)
    {
        $this->reportId = $reportId;
    }

    /**
     * Get reportId
     *
     * @return string 
     */
    public function getReportId()
    {
        return $this->reportId;
    }

    /**
     * Set reportTitleSql
     *
     * @param string $reportTitleSql
     */
    public function setReportTitleSql($reportTitleSql)
    {
        $this->reportTitleSql = $reportTitleSql;
    }

    /**
     * Get reportTitleSql
     *
     * @return string 
     */
    public function getReportTitleSql()
    {
        return $this->reportTitleSql;
    }

    /**
     * Set reportDataSql
     *
     * @param string $reportDataSql
     */
    public function setReportDataSql($reportDataSql)
    {
        $this->reportDataSql = $reportDataSql;
    }

    /**
     * Get reportDataSql
     *
     * @return string 
     */
    public function getReportDataSql()
    {
        return $this->reportDataSql;
    }

    /**
     * Set reportStakeholder
     *
     * @param integer $reportStakeholder
     */
    public function setReportStakeholder($reportStakeholder)
    {
        $this->reportStakeholder = $reportStakeholder;
    }

    /**
     * Get reportStakeholder
     *
     * @return integer 
     */
    public function getReportStakeholder()
    {
        return $this->reportStakeholder;
    }

    /**
     * Set reportComparision
     *
     * @param integer $reportComparision
     */
    public function setReportComparision($reportComparision)
    {
        $this->reportComparision = $reportComparision;
    }

    /**
     * Get reportComparision
     *
     * @return integer 
     */
    public function getReportComparision()
    {
        return $this->reportComparision;
    }

    /**
     * Set reportDataPosition
     *
     * @param integer $reportDataPosition
     */
    public function setReportDataPosition($reportDataPosition)
    {
        $this->reportDataPosition = $reportDataPosition;
    }

    /**
     * Get reportDataPosition
     *
     * @return integer 
     */
    public function getReportDataPosition()
    {
        return $this->reportDataPosition;
    }

    /**
     * Set reportComparisionFlag
     *
     * @param integer $reportComparisionFlag
     */
    public function setReportComparisionFlag($reportComparisionFlag)
    {
        $this->reportComparisionFlag = $reportComparisionFlag;
    }

    /**
     * Get reportComparisionFlag
     *
     * @return integer 
     */
    public function getReportComparisionFlag()
    {
        return $this->reportComparisionFlag;
    }
}