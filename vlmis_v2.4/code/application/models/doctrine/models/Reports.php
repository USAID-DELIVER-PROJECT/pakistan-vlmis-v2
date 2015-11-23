<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Reports
 */
class Reports
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
     * @var string $reportGroup
     */
    private $reportGroup;

    /**
     * @var decimal $reportType
     */
    private $reportType;

    /**
     * @var string $reportTitle
     */
    private $reportTitle;

    /**
     * @var string $reportXaxis
     */
    private $reportXaxis;

    /**
     * @var string $reportYaxis
     */
    private $reportYaxis;

    /**
     * @var string $reportUnits
     */
    private $reportUnits;

    /**
     * @var decimal $reportFactor
     */
    private $reportFactor;

    /**
     * @var string $reportField
     */
    private $reportField;

    /**
     * @var text $reportDescription
     */
    private $reportDescription;

    /**
     * @var string $staticPage
     */
    private $staticPage;

    /**
     * @var string $footerStaticPage
     */
    private $footerStaticPage;

    /**
     * @var boolean $reportOrder
     */
    private $reportOrder;

    /**
     * @var boolean $reportShowSimple
     */
    private $reportShowSimple;

    /**
     * @var boolean $reportShowComparision
     */
    private $reportShowComparision;


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
     * Set reportGroup
     *
     * @param string $reportGroup
     */
    public function setReportGroup($reportGroup)
    {
        $this->reportGroup = $reportGroup;
    }

    /**
     * Get reportGroup
     *
     * @return string 
     */
    public function getReportGroup()
    {
        return $this->reportGroup;
    }

    /**
     * Set reportType
     *
     * @param decimal $reportType
     */
    public function setReportType($reportType)
    {
        $this->reportType = $reportType;
    }

    /**
     * Get reportType
     *
     * @return decimal 
     */
    public function getReportType()
    {
        return $this->reportType;
    }

    /**
     * Set reportTitle
     *
     * @param string $reportTitle
     */
    public function setReportTitle($reportTitle)
    {
        $this->reportTitle = $reportTitle;
    }

    /**
     * Get reportTitle
     *
     * @return string 
     */
    public function getReportTitle()
    {
        return $this->reportTitle;
    }

    /**
     * Set reportXaxis
     *
     * @param string $reportXaxis
     */
    public function setReportXaxis($reportXaxis)
    {
        $this->reportXaxis = $reportXaxis;
    }

    /**
     * Get reportXaxis
     *
     * @return string 
     */
    public function getReportXaxis()
    {
        return $this->reportXaxis;
    }

    /**
     * Set reportYaxis
     *
     * @param string $reportYaxis
     */
    public function setReportYaxis($reportYaxis)
    {
        $this->reportYaxis = $reportYaxis;
    }

    /**
     * Get reportYaxis
     *
     * @return string 
     */
    public function getReportYaxis()
    {
        return $this->reportYaxis;
    }

    /**
     * Set reportUnits
     *
     * @param string $reportUnits
     */
    public function setReportUnits($reportUnits)
    {
        $this->reportUnits = $reportUnits;
    }

    /**
     * Get reportUnits
     *
     * @return string 
     */
    public function getReportUnits()
    {
        return $this->reportUnits;
    }

    /**
     * Set reportFactor
     *
     * @param decimal $reportFactor
     */
    public function setReportFactor($reportFactor)
    {
        $this->reportFactor = $reportFactor;
    }

    /**
     * Get reportFactor
     *
     * @return decimal 
     */
    public function getReportFactor()
    {
        return $this->reportFactor;
    }

    /**
     * Set reportField
     *
     * @param string $reportField
     */
    public function setReportField($reportField)
    {
        $this->reportField = $reportField;
    }

    /**
     * Get reportField
     *
     * @return string 
     */
    public function getReportField()
    {
        return $this->reportField;
    }

    /**
     * Set reportDescription
     *
     * @param text $reportDescription
     */
    public function setReportDescription($reportDescription)
    {
        $this->reportDescription = $reportDescription;
    }

    /**
     * Get reportDescription
     *
     * @return text 
     */
    public function getReportDescription()
    {
        return $this->reportDescription;
    }

    /**
     * Set staticPage
     *
     * @param string $staticPage
     */
    public function setStaticPage($staticPage)
    {
        $this->staticPage = $staticPage;
    }

    /**
     * Get staticPage
     *
     * @return string 
     */
    public function getStaticPage()
    {
        return $this->staticPage;
    }

    /**
     * Set footerStaticPage
     *
     * @param string $footerStaticPage
     */
    public function setFooterStaticPage($footerStaticPage)
    {
        $this->footerStaticPage = $footerStaticPage;
    }

    /**
     * Get footerStaticPage
     *
     * @return string 
     */
    public function getFooterStaticPage()
    {
        return $this->footerStaticPage;
    }

    /**
     * Set reportOrder
     *
     * @param boolean $reportOrder
     */
    public function setReportOrder($reportOrder)
    {
        $this->reportOrder = $reportOrder;
    }

    /**
     * Get reportOrder
     *
     * @return boolean 
     */
    public function getReportOrder()
    {
        return $this->reportOrder;
    }

    /**
     * Set reportShowSimple
     *
     * @param boolean $reportShowSimple
     */
    public function setReportShowSimple($reportShowSimple)
    {
        $this->reportShowSimple = $reportShowSimple;
    }

    /**
     * Get reportShowSimple
     *
     * @return boolean 
     */
    public function getReportShowSimple()
    {
        return $this->reportShowSimple;
    }

    /**
     * Set reportShowComparision
     *
     * @param boolean $reportShowComparision
     */
    public function setReportShowComparision($reportShowComparision)
    {
        $this->reportShowComparision = $reportShowComparision;
    }

    /**
     * Get reportShowComparision
     *
     * @return boolean 
     */
    public function getReportShowComparision()
    {
        return $this->reportShowComparision;
    }
}