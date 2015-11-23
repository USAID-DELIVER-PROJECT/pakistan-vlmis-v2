<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * BarcodeScanners
 */
class BarcodeScanners
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var string $scannerName
     */
    private $scannerName;

    /**
     * @var string $licenceNumber
     */
    private $licenceNumber;


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
     * Set scannerName
     *
     * @param string $scannerName
     */
    public function setScannerName($scannerName)
    {
        $this->scannerName = $scannerName;
    }

    /**
     * Get scannerName
     *
     * @return string 
     */
    public function getScannerName()
    {
        return $this->scannerName;
    }

    /**
     * Set licenceNumber
     *
     * @param string $licenceNumber
     */
    public function setLicenceNumber($licenceNumber)
    {
        $this->licenceNumber = $licenceNumber;
    }

    /**
     * Get licenceNumber
     *
     * @return string 
     */
    public function getLicenceNumber()
    {
        return $this->licenceNumber;
    }
}