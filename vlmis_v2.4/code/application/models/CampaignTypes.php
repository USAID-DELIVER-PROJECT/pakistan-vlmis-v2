<?php

/**
 * Model_CampaignTypes
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    Logistics Management Information System for Vaccines
 * @subpackage Campaigns
 * @author     Ajmal Hussain <ajmaleyetii@gmail.com>
 * @version    2
 */
class Model_CampaignTypes extends Model_Base {

    private $_table;

    public function __construct() {
        parent::__construct();
        $this->_table = $this->_em->getRepository('CampaignTypes');
    }

    public function getAllCampaignTypes() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select("ct.pkId,ct.camapignTypeName")
                ->from('CampaignTypes', 'ct')
                ->orderBy("ct.listRank", "DESC");
        return $str_sql->getQuery()->getResult();
    }

    public function getCampaignTypes() {
        $form_values = $this->form_values;

        $str_sql = $this->_em->createQueryBuilder()
                ->select("ct.pkId,ct.camapignTypeName")
                ->from('CampaignTypes', 'ct');
        if (!empty($form_values['campaign_type_name'])) {
            $str_sql->where("ct.camapignTypeName= '" . $form_values['campaign_type_name'] . "' ");
        }
        // echo $str_sql->getQuery()->getSql();exit;
        $rs = $str_sql->getQuery()->getResult();
        return $rs;
    }

    public function checkCampaignType() {
        $form_values = $this->form_values;

        $str_sql = $this->_em->createQueryBuilder()
                ->select("ct.pkId")
                ->from('CampaignTypes', 'ct')
                ->where("ct.camapignTypeName= '" . $form_values . "' ");

        $rs = $str_sql->getQuery()->getResult();
        return $rs;
    }

}
