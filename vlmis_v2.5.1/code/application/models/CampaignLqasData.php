<?php

/**
 * Model_CampaignLqasData
 *
 * 
 *
 *     Logistics Management Information System for Vaccines
 * @subpackage Campaigns
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */

/**
 *  Model for Campaign LQAS Data
 */

class Model_CampaignLqasData extends Model_Base {

    /**
     * $_table
     * @var type 
     */
    private $_table;

    /**
     * Model_CampaignLqasData __construct
     */
    public function __construct() {
        parent::__construct();
        $this->_table = $this->_em->getRepository('CampaignLqasData');
    }

}
