<?php

/**
 * Model_CampaignReadinessUnionCouncil
 *
 * 
 *
 *     Logistics Management Information System for Vaccines
 * @subpackage Campaigns
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */


/**
 *  Model for Campaign Item Groups
 */

class Model_CampaignItemGroups extends Model_Base {

    /**
     * $_table
     * @var type 
     */
    private $_table;

    /**
     * Model_CampaignItemGroups __construct
     */
    public function __construct() {
        parent::__construct();
        $this->_table = $this->_em->getRepository('CampaignItemGroups');
    }

    /**
     * Get Campaign Item Groups
     * 
     * @return type
     */
    public function getCampaignItemGroups() {
        $form_values = $this->form_values;

        $str_sql = $this->_em->createQueryBuilder()
                ->select("c.pkId,ips.itemName,c.ageGroup1Min,c.ageGroup1Max,c.ageGroup2Min,c.ageGroup2Max")
                ->from('CampaignItemGroups', 'c')
                ->join('c.itemPackSize', 'ips');
        if (!empty($form_values['item_id'])) {
            $str_sql->where("ips.pkId= '" . $form_values['item_id'] . "' ");
        }
        return $str_sql->getQuery()->getResult();
    }

}
