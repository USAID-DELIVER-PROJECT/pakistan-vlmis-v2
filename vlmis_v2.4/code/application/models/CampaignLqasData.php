<?php

/**
 * Model_CampaignLqasData
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    Logistics Management Information System for Vaccines
 * @subpackage Campaigns
 * @author     Ajmal Hussain <ajmaleyetii@gmail.com>
 * @version    2
 */
class Model_CampaignLqasData extends Model_Base {

    private $_table;

    public function __construct() {
        parent::__construct();
        $this->_table = $this->_em->getRepository('CampaignLqasData');
    }
    
    
    

}