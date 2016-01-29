<?php

/**
*  Model for Campaign Readiness Union Council
*/

use Doctrine\ORM\Mapping as ORM;

/**
 *  CampaignReadinessUnionCouncil
 */
class CampaignReadinessUnionCouncil
{
    /**
     * $pkId
     * @var integer $pkId
     */
    private $pkId;

    /**
     * $inaccessibleChildren
     * @var string $inaccessibleChildren
     */
    private $inaccessibleChildren;

    /**
     * $inaccessibleArea
     * @var string $inaccessibleArea
     */
    private $inaccessibleArea;

    /**
     * $numberMobileTeams
     * @var integer $numberMobileTeams
     */
    private $numberMobileTeams;

    /**
     * $numberFixedTeams
     * @var integer $numberFixedTeams
     */
    private $numberFixedTeams;

    /**
     * $numberTransitPoints
     * @var integer $numberTransitPoints
     */
    private $numberTransitPoints;

    /**
     * $aicTrained
     * @var integer $aicTrained
     */
    private $aicTrained;

    /**
     * $numberTeamsTrained
     * @var integer $numberTeamsTrained
     */
    private $numberTeamsTrained;

    /**
     * $mobilePopulationAreas
     * @var integer $mobilePopulationAreas
     */
    private $mobilePopulationAreas;

    /**
     * $upecMeetingDate
     * @var datetime $upecMeetingDate
     */
    private $upecMeetingDate;

    /**
     * $unionCouncilId
     * @var integer $unionCouncilId
     */
    private $unionCouncilId;

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
     * $campaign
     * @var Campaigns
     */
    private $campaign;

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
     * Set inaccessibleChildren
     *
     * @param string $inaccessibleChildren
     */
    public function setInaccessibleChildren($inaccessibleChildren)
    {
        $this->inaccessibleChildren = $inaccessibleChildren;
    }

    /**
     * Get inaccessibleChildren
     *
     * @return string 
     */
    public function getInaccessibleChildren()
    {
        return $this->inaccessibleChildren;
    }

    /**
     * Set inaccessibleArea
     *
     * @param string $inaccessibleArea
     */
    public function setInaccessibleArea($inaccessibleArea)
    {
        $this->inaccessibleArea = $inaccessibleArea;
    }

    /**
     * Get inaccessibleArea
     *
     * @return string 
     */
    public function getInaccessibleArea()
    {
        return $this->inaccessibleArea;
    }

    /**
     * Set numberMobileTeams
     *
     * @param integer $numberMobileTeams
     */
    public function setNumberMobileTeams($numberMobileTeams)
    {
        $this->numberMobileTeams = $numberMobileTeams;
    }

    /**
     * Get numberMobileTeams
     *
     * @return integer 
     */
    public function getNumberMobileTeams()
    {
        return $this->numberMobileTeams;
    }

    /**
     * Set numberFixedTeams
     *
     * @param integer $numberFixedTeams
     */
    public function setNumberFixedTeams($numberFixedTeams)
    {
        $this->numberFixedTeams = $numberFixedTeams;
    }

    /**
     * Get numberFixedTeams
     *
     * @return integer 
     */
    public function getNumberFixedTeams()
    {
        return $this->numberFixedTeams;
    }

    /**
     * Set numberTransitPoints
     *
     * @param integer $numberTransitPoints
     */
    public function setNumberTransitPoints($numberTransitPoints)
    {
        $this->numberTransitPoints = $numberTransitPoints;
    }

    /**
     * Get numberTransitPoints
     *
     * @return integer 
     */
    public function getNumberTransitPoints()
    {
        return $this->numberTransitPoints;
    }

    /**
     * Set aicTrained
     *
     * @param integer $aicTrained
     */
    public function setAicTrained($aicTrained)
    {
        $this->aicTrained = $aicTrained;
    }

    /**
     * Get aicTrained
     *
     * @return integer 
     */
    public function getAicTrained()
    {
        return $this->aicTrained;
    }

    /**
     * Set numberTeamsTrained
     *
     * @param integer $numberTeamsTrained
     */
    public function setNumberTeamsTrained($numberTeamsTrained)
    {
        $this->numberTeamsTrained = $numberTeamsTrained;
    }

    /**
     * Get numberTeamsTrained
     *
     * @return integer 
     */
    public function getNumberTeamsTrained()
    {
        return $this->numberTeamsTrained;
    }

    /**
     * Set mobilePopulationAreas
     *
     * @param integer $mobilePopulationAreas
     */
    public function setMobilePopulationAreas($mobilePopulationAreas)
    {
        $this->mobilePopulationAreas = $mobilePopulationAreas;
    }

    /**
     * Get mobilePopulationAreas
     *
     * @return integer 
     */
    public function getMobilePopulationAreas()
    {
        return $this->mobilePopulationAreas;
    }

    /**
     * Set upecMeetingDate
     *
     * @param datetime $upecMeetingDate
     */
    public function setUpecMeetingDate($upecMeetingDate)
    {
        $this->upecMeetingDate = $upecMeetingDate;
    }

    /**
     * Get upecMeetingDate
     *
     * @return datetime 
     */
    public function getUpecMeetingDate()
    {
        return $this->upecMeetingDate;
    }

    /**
     * Set unionCouncilId
     *
     * @param integer $unionCouncilId
     */
    public function setUnionCouncilId($unionCouncilId)
    {
        $this->unionCouncilId = $unionCouncilId;
    }

    /**
     * Get unionCouncilId
     *
     * @return integer 
     */
    public function getUnionCouncilId()
    {
        return $this->unionCouncilId;
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
     * Set campaign
     *
     * @param Campaigns $campaign
     */
    public function setCampaign(\Campaigns $campaign)
    {
        $this->campaign = $campaign;
    }

    /**
     * Get campaign
     *
     * @return Campaigns 
     */
    public function getCampaign()
    {
        return $this->campaign;
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