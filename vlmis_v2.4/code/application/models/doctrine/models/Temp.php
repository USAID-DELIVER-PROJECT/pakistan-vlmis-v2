<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Temp
 */
class Temp
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var string $epiCenter
     */
    private $epiCenter;

    /**
     * @var string $type
     */
    private $type;

    /**
     * @var string $level
     */
    private $level;

    /**
     * @var string $province
     */
    private $province;

    /**
     * @var string $district
     */
    private $district;

    /**
     * @var string $tehsil
     */
    private $tehsil;

    /**
     * @var string $uc
     */
    private $uc;

    /**
     * @var string $lead
     */
    private $lead;

    /**
     * @var string $username
     */
    private $username;


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
     * Set epiCenter
     *
     * @param string $epiCenter
     */
    public function setEpiCenter($epiCenter)
    {
        $this->epiCenter = $epiCenter;
    }

    /**
     * Get epiCenter
     *
     * @return string 
     */
    public function getEpiCenter()
    {
        return $this->epiCenter;
    }

    /**
     * Set type
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set level
     *
     * @param string $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * Get level
     *
     * @return string 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set province
     *
     * @param string $province
     */
    public function setProvince($province)
    {
        $this->province = $province;
    }

    /**
     * Get province
     *
     * @return string 
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set district
     *
     * @param string $district
     */
    public function setDistrict($district)
    {
        $this->district = $district;
    }

    /**
     * Get district
     *
     * @return string 
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Set tehsil
     *
     * @param string $tehsil
     */
    public function setTehsil($tehsil)
    {
        $this->tehsil = $tehsil;
    }

    /**
     * Get tehsil
     *
     * @return string 
     */
    public function getTehsil()
    {
        return $this->tehsil;
    }

    /**
     * Set uc
     *
     * @param string $uc
     */
    public function setUc($uc)
    {
        $this->uc = $uc;
    }

    /**
     * Get uc
     *
     * @return string 
     */
    public function getUc()
    {
        return $this->uc;
    }

    /**
     * Set lead
     *
     * @param string $lead
     */
    public function setLead($lead)
    {
        $this->lead = $lead;
    }

    /**
     * Get lead
     *
     * @return string 
     */
    public function getLead()
    {
        return $this->lead;
    }

    /**
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }
}