<?php

/**
 * Model_CcmStatusHistory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    Logistics Management Information System for Vaccines
 * @subpackage Cold Chain
 * @author     Ajmal Hussain <ajmaleyetii@gmail.com>
 * @version    2
 */
class Model_CcmStatusHistory extends Model_Base {

    private $_table;

    public function __construct() {
        parent::__construct();
        $this->_table = $this->_em->getRepository('CcmStatusHistory');
    }

    public function updateColdChainStatus() {
        date_default_timezone_set('Asia/karachi');
        $cc_id = $this->form_values['ccm_id'];
        
        

        $created_by = $this->_em->find('Users', $this->_user_id);
        

        foreach ($cc_id as $index => $ccm_id) {
            $working_status = $this->form_values['working_status'];
            $temperature = $this->form_values['temperature'];
            $ccmAssetId = $this->form_values['asset_id'];
            $reason = $this->form_values['reason'];
            $utilization = $this->form_values['utilization'];

            $wh_id = $this->form_values['wh_id'];

            $ccm_status_history = new CcmStatusHistory();
            $ccm_status_history->setTemperatureAlarm($temperature[$index]);
            $cold_chain_id = $this->_em->getRepository('ColdChain')->find($ccm_id);
            $ccm_status_history->setCcm($cold_chain_id);

            $ccm_status_history->setStatusDate(new \DateTime(date("Y-m-d h:i")));
            $warehouse_id = $this->_em->getRepository('Warehouses')->find($wh_id);
            $ccm_status_history->setWarehouse($warehouse_id);
            $work_status = $this->_em->getRepository('CcmStatusList')->find($working_status[$index]);
            $ccm_status_history->setCcmStatusList($work_status);
            $ccm_asset_type = $this->_em->getRepository('CcmAssetTypes')->find($ccmAssetId[$index]);
            $ccm_status_history->setCcmAssetType($ccm_asset_type);
            if (empty($reason[$index])) {
                $reason_id = $this->_em->getRepository('CcmStatusList')->find(1);
                $ccm_status_history->setReason($reason_id);
            } else {
                $reason_id = $this->_em->getRepository('CcmStatusList')->find($reason[$index]);
                $ccm_status_history->setReason($reason_id);
            }
            if (empty($utilization[$index])) {
                $utilization_id = $this->_em->getRepository('CcmStatusList')->find(1);
                $ccm_status_history->setUtilization($utilization_id);
            } else {
                $utilization_id = $this->_em->getRepository('CcmStatusList')->find($utilization[$index]);
                $ccm_status_history->setUtilization($utilization_id);
            }
             $ccm_status_history->setCreatedBy($created_by);
            $ccm_status_history->setModifiedBy($created_by);
            $ccm_status_history->setModifiedDate(App_Tools_Time::now());
            $this->_em->persist($ccm_status_history);
            $this->_em->flush();

            $ccm_history_id = $ccm_status_history->getPkId();
            $cold_chain = new Model_ColdChain();

            $cold_chain->updateCcmStatusHistory($ccm_id, $ccm_history_id);
        }

        $ccm_id_q = $this->form_values['ccm_id_q'];

        foreach ($ccm_id_q as $index => $ccm_id_quantity) {

            $work_quantity = $this->form_values['work_quantity'];
            $comments = $this->form_values['comments'];
            $asset_id_q = $this->form_values['asset_id_q'];

            $wh_id = $this->form_values['wh_id'];
            $ccm_status = new CcmStatusHistory();
            $cold_chain_id_q = $this->_em->getRepository('ColdChain')->find($ccm_id_quantity);
            $ccm_status->setCcm($cold_chain_id_q);
            $ccm_status->setWorkingQuantity($work_quantity[$index]);
            $ccm_status->setComments($comments[$index]);
            $ccm_status->setStatusDate(new \DateTime(date("Y-m-d h:i")));
            $warehouse_id = $this->_em->getRepository('Warehouses')->find($wh_id);
            $ccm_status->setWarehouse($warehouse_id);
            $ccm_asset_type_q = $this->_em->getRepository('CcmAssetTypes')->find($asset_id_q[$index]);
            $ccm_status->setCcmAssetType($ccm_asset_type_q);
            $ccm_status->setCreatedBy($created_by);
            $ccm_status->setModifiedBy($created_by);
            $ccm_status->setModifiedDate(App_Tools_Time::now());
            $this->_em->persist($ccm_status);
            $this->_em->flush();
            $history_id = $ccm_status->getPkId();
            $cold_chain = new Model_ColdChain();
            $cold_chain->updateCcmStatusHistory($ccm_id_quantity, $history_id);
        }

        $ccm_id_histroy = $this->form_values['ccm_id_q'];

        foreach ($ccm_id_histroy as $index => $ccm_id_quantity) {

            $work_quantity = $this->form_values['work_quantity'];
            $total_quantity = $this->form_values['total_quantity'];


            $wh_id = $this->form_values['wh_id'];
            $ccm_history = new CcmHistory();
            $quantity = $total_quantity[$index] - $work_quantity[$index];
            $ccm_history->setQuantity($quantity);
            $ccm_history->setCreatedDate(new \DateTime(date("Y-m-d")));
            $action_id = $this->_em->getRepository('ListDetail')->find(26);
            $ccm_history->setAction($action_id);
            $ccm_id = $this->_em->getRepository('ColdChain')->find($ccm_id_quantity);
            $ccm_history->setCcm($ccm_id);

            $user_id = $this->_em->getRepository('Users')->find($this->_user_id);
            $ccm_history->setCreatedBy($user_id);

            $warehouse_id = $this->_em->getRepository('Warehouses')->find($wh_id);
            $ccm_history->setWarehouse($warehouse_id);
            $ccm_history->setCreatedBy($created_by);
            $ccm_history->setModifiedBy($created_by);
            $ccm_history->setModifiedDate(App_Tools_Time::now());
            $this->_em->persist($ccm_history);
        }

        $this->_em->flush();
    }

}
