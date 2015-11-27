<?php

class ColdChainController extends App_Controller_Base {

    public function init() {
        parent::init();
    }

    public function addRefrigeratorAction() {
        $form = new Form_AddRefrigerator();
        $main_form = new Form_AddMain();
        $action = 'add-refrigerator';
        $action_main = 'add';

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost()) && $main_form->isValid($this->_request->getPost())) {
                $cold_chain = new Model_ColdChain();
                $form_values = $form->getValues();
                $main_form_values = $main_form->getValues();
                $form_values = array_merge($form_values, $main_form_values);
                $cold_chain->form_values = $form_values;
                $cold_chain->form_values['warehouse'] = $this->_request->warehouse;
                $cold_chain->addRefrigerator();
                $this->redirect("/cold-chain/add-refrigerator?success=1");
            }
        }

        $id = $this->_request->getParam('id', '');

        if (!empty($id)) {
            $arr = explode('|', App_Controller_Functions::decrypt($id));
            $action = $arr[0];
            $id = $arr[1];
            // $campaigns->form_values['campaign_id'] = $id;
            $cold_chain = $this->_em->getRepository("ColdChain")->find($id);

            $form->ccm_id->setValue($id);
            // if (!empty($cold_chain->getWorkingSince())){
            $form->working_since->setValue($cold_chain->getWorkingSince()->format('Y-m-d ')); //}
            $form->serial_number->setValue($cold_chain->getSerialNumber());
            $main_form->asset_id->setValue($cold_chain->getAssetId());
            $main_form->source_id->setValue($cold_chain->getSource()->getPkId());
            //$model_id = $this->_em->getRepository('CcmModels')->find();
            $form->catalogue_id->setValue($cold_chain->getCcmModel()->getPkId());
            //$form->campaign_name->setValue($campaign->getCampaignName());

            $form->temperature_monitor->setValue($cold_chain->getTemperatureMonitor()->getPkId());

            $action = 'update-refrigerator';
            $action_main = 'update';
            $base_url = Zend_Registry::get('baseurl');
            $this->view->inlineScript()->appendFile($base_url . '/js/default/cold-chain/update-refrigerator.js');
        }

        $this->view->form = $form;
        $this->view->main_form = $main_form;
        $this->view->action = $action;

        $this->view->main_action = $action_main;
        //$main_form->asset_type->setValue("Refrigerator");
        $main_form->placed_at->setValue(0);
        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/all_level_combos.js');
        $this->view->inlineScript()->appendFile($base_url . '/js/default/cold-chain/add-main.js');
    }

    public function updateRefrigeratorAction() {
        $form = new Form_AddRefrigerator();
        $main_form = new Form_AddMain();
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost()) && $main_form->isValid($this->_request->getPost())) {
                $cold_chain = new Model_ColdChain();
                $form_values = $form->getValues();
                $main_form_values = $main_form->getValues();
                $form_values = array_merge($form_values, $main_form_values);
                $cold_chain->form_values = $form_values;

                $cold_chain->updateRefrigerator();
                $this->redirect("/cold-chain/search-refrigerator?success=1");
            }
        }
    }

    public function addVoltageRegulatorAction() {
        $form = new Form_AddVoltageRegulator();
        $ccm_model = new Model_CcmModels();
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $cold_chain = new Model_ColdChain();
                //$cold_chain->form_values['warehouse'] = $this->_request->warehouse;
                $cold_chain->form_values = $this->_request->getPost();
                $data = $form->getValues();
                $ccm_model->form_values = $data;
                $ccm_model->form_values['warehouse'] = $this->_request->warehouse;
                $cold_chain->addVoltageRegulator();
                $this->redirect("/cold-chain/add-voltage-regulator?success=1");
            }
        }
        $this->view->form = $form;
        $result = $ccm_model->getVoltageRegulators();
        $this->view->result = $result;
        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/all_level_combos.js');
    }

    public function addTransportAction() {
        $main_form = new Form_AddMain();
        $form = new Form_AddTransport();
        $ccm_vehicle = new Model_CcmVehicles();
        $action = 'add-transport';
        $action_main = 'add';
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost()) && $main_form->isValid($this->_request->getPost())) {
                $form_values = $form->getValues();
                $main_form_values = $main_form->getValues();
                $form_values = array_merge($form_values, $main_form_values);

                $ccm_vehicle->form_values = $form_values;
                $ccm_vehicle->form_values['warehouse'] = $this->_request->warehouse;
                $ccm_vehicle->addTransport();
                $this->redirect("/cold-chain/add-transport?success=1");
            }
        }
        $id = $this->_request->getParam('id', '');
        if (!empty($id)) {
            $arr = explode('|', App_Controller_Functions::decrypt($id));
            $action_edit = $arr[0];
            $id = $arr[1];

            // $campaigns->form_values['campaign_id'] = $id;
            $cold_chain = $this->_em->getRepository("ColdChain")->find($id);
            $form->ccm_id->setValue($id);
            $main_form->asset_id->setValue($cold_chain->getAssetId());
            //exit;
            //if (!empty($cold_chain->getSource()->getPkId())) {
            // $main_form->source_id->setValue($cold_chain->getSource());
            $ccm_model = $this->_em->getRepository("CcmModels")->find($cold_chain->getCcmModel()->getPkId());

            $ccm_vehicles = $this->_em->getRepository("CcmVehicles")->findBy(array('ccm' => $id));

            // App_Controller_Functions::pr($ccm_vehicles['0']);
            $main_form->source_id->setValue($cold_chain->getSource()->getPkId());
            $form->ccm_make_id->setValue($ccm_model->getCcmMake()->getPkId());
            $form->ccm_asset_sub_type_id->setValue($ccm_vehicles['0']->getCcmAssetSubType()->getPkId());
            $form->model_hidden->setValue($cold_chain->getCcmModel()->getPkId());

            $form->registration_no->setValue($ccm_vehicles['0']->getRegistrationNo());
            $form->manufacture_year->setValue($cold_chain->getManufactureYear()->format('Y-m-d H:i:s'));
            //    $form->manufacture_year->setValue($ccm_vehicles['0']->getPowerRating());
            $form->used_for_epi->setValue($ccm_vehicles['0']->getUsedForEpi());
            $form->fuel_type_id->setValue($ccm_vehicles['0']->getFuelType()->getPkId());
            $form->comments->setValue($ccm_vehicles['0']->getComments());
            //   }

            $action = 'update-transport';
            $action_main = 'update';
            $base_url = Zend_Registry::get('baseurl');
            $this->view->inlineScript()->appendFile($base_url . '/js/default/cold-chain/update-transport.js');
        }

        $this->view->action = $action;
        $this->view->main_action = $action_main;
        $this->view->form = $form;
        $this->view->main_form = $main_form;
        // $main_form->asset_type->setValue("Transport");
        $main_form->placed_at->setValue(0);
        $result = $ccm_vehicle->getTransports();
        $this->view->result = $result;
        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/all_level_combos.js');
        $this->view->inlineScript()->appendFile($base_url . '/js/default/cold-chain/add-main.js');
    }

    public function updateTransportAction() {
        $main_form = new Form_AddMain();
        $form = new Form_AddTransport();
        $ccm_vehicle = new Model_CcmVehicles();
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost()) && $main_form->isValid($this->_request->getPost())) {
                $form_values = $form->getValues();
                $main_form_values = $main_form->getValues();
                $form_values = array_merge($form_values, $main_form_values);
                $ccm_vehicle->form_values = $form_values;
                $ccm_vehicle->updateTransport();
                $this->redirect("/cold-chain/search-transport?success=1");
            }
        }
    }

    public function addGeneratorAction() {
        $form_values = array();
        $main_form_values = array();
        $temp = array();
        $arr_data = array('success' => $this->_request->success);
        $ccm_generator = new Model_CcmGenerators();
        $main_form = new Form_AddMain();
        $form = new Form_AddGenerator();
        $action = 'add-generator';
        $action_main = 'add';
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost()) && $main_form->isValid($this->_request->getPost())) {
                //$em = Zend_Registry::get('doctrine');
                //$em->getConnection()->beginTransaction();
                try {
                    $form_values = $form->getValues();
                    $main_form_values = $main_form->getValues();
                    $form_values = array_merge($form_values, $main_form_values);
                    $ccm_generator->form_values = $form_values;
                    $ccm_generator->form_values['warehouse'] = $this->_request->warehouse;
                    $ccm_generator->form_values['reasons'] = $this->_request->reason;
                    $ccm_generator->form_values['utilizations'] = $this->_request->utilization;
                    $ccm_generator->addGenerator();
                    //$em->getConnection()->commit();
                } catch (Exception $e) {
                    //$em->getConnection()->rollback();
                    //$em->close();
                    App_FileLogger::info($e);
                }
                $this->redirect("/cold-chain/add-generator/success/1");
                exit;
            }
        }
        $id = $this->_request->getParam('id', '');
        if (!empty($id)) {
            $arr = explode('|', App_Controller_Functions::decrypt($id));
            $action_edit = $arr[0];
            $id = $arr[1];
            $cold_chain = $this->_em->getRepository("ColdChain")->find($id);
            $form->ccm_id->setValue($id);
            $main_form->asset_id->setValue($cold_chain->getAssetId());
            if (($cold_chain->getSource() != "")) {
                $main_form->source_id->setValue($cold_chain->getSource()->getPkId());
            }
            $ccm_model = $this->_em->getRepository("CcmModels")->find($cold_chain->getCcmModel()->getPkId());
            // echo $id;
            $ccm_generator = $this->_em->getRepository("CcmGenerators")->findBy(array('ccm' => $id));

            //App_Controller_Functions::pr($ccm_generator);
            $form->model_hidden->setValue($cold_chain->getCcmModel()->getPkId());
            $form->make->setValue($ccm_model->getCcmMake()->getPkId());
            $form->no_of_phases->setValue($ccm_model->getNoOfPhases());
            $form->serial_number->setValue($cold_chain->getSerialNumber());
            $form->power_rating->setValue($ccm_generator['0']->getPowerRating());
            $form->power_source->setValue($ccm_generator['0']->getPowerSource()->getPkId());
            $form->use_for->setValue($ccm_generator['0']->getUseFor());
            $form->automatic_start->setValue($ccm_generator['0']->getAutomaticStartMechanism());
            $form->working_since->setValue($cold_chain->getWorkingSince()->format('Y-m-d'));
            //   }
            $action = 'update-generator';
            $action_main = 'update';
            $base_url = Zend_Registry::get('baseurl');
            $this->view->inlineScript()->appendFile($base_url . '/js/default/cold-chain/update-generator.js');
        }
        $this->view->action = $action;
        $this->view->main_action = $action_main;
        $this->view->form = $form;
        $this->view->main_form = $main_form;
        $this->view->arr_data = $arr_data;
        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/all_level_combos.js');
        $this->view->inlineScript()->appendFile($base_url . '/js/default/cold-chain/add-main.js');
    }

    public function updateGeneratorAction() {
        $ccm_generator = new Model_CcmGenerators();
        $main_form = new Form_AddMain();
        $form = new Form_AddGenerator();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost()) && $main_form->isValid($this->_request->getPost())) {
                //$em = Zend_Registry::get('doctrine');
                //$em->getConnection()->beginTransaction();
                try {
                    $form_values = $form->getValues();
                    $main_form_values = $main_form->getValues();
                    $form_values = array_merge($form_values, $main_form_values);
                    $ccm_generator->form_values = $form_values;
                    $ccm_generator->updateGenerator();
                    //$em->getConnection()->commit();
                } catch (Exception $e) {
                    //$em->getConnection()->rollback();
                    //$em->close();
                    App_FileLogger::info($e);
                }
                $this->redirect("/cold-chain/search-generator/success/1");
                exit;
            }
        }
    }

    public function addColdRoomAction() {
        $form_values = array();
        $main_form_values = array();
        $temp = array();
        $arr_data = array('success' => $this->_request->success);
        $main_form = new Form_AddMain();
        $form = new Form_AddColdRoom();
        $cold_room = new Model_CcmColdRooms();
        $action = 'add-cold-room';
        $action_main = 'add';
        if ($this->_request->isPost()) {
            // if ($form->isValid($this->_request->getPost()) && $main_form->isValid($this->_request->getPost())) {
            //$em = Zend_Registry::get('doctrine');
            //$em->getConnection()->beginTransaction();
            try {
                //  $form_values = $form->getValues();
                //  $main_form_values = $main_form->getValues();
                //  $form_values = array_merge($form_values, $main_form_values);
                $form_values = $this->_request->getPost();
                $cold_room->form_values = $form_values;
                //$cold_room->form_values['warehouse'] = $this->_request->warehouse;
                //$cold_room->form_values['reasons'] = $this->_request->reason;
                //$cold_room->form_values['utilizations'] = $this->_request->utilization;

                $cold_room->addColdRoom();
                //$em->getConnection()->commit();
            } catch (Exception $e) {
                //  $em->getConnection()->rollback();
                //  $em->close();
                App_FileLogger::info($e);
            }
            $this->redirect("/cold-chain/add-cold-room/success/1");
            exit;
            // }
        }
        $id = $this->_request->getParam('id', '');

        if (!empty($id)) {
            $arr = explode('|', App_Controller_Functions::decrypt($id));
            $action = $arr[0];
            $id = $arr[1];
            $cold_chain = $this->_em->getRepository("ColdChain")->find($id);
            $form->ccm_id->setValue($id);
            $form->working_since->setValue($cold_chain->getWorkingSince()->format('Y-m-d H:i:s'));
            // $form->serial_number->setValue($cold_chain->getSerialNumber());
            $main_form->asset_id->setValue($cold_chain->getAssetId());
            $cold_room = $this->_em->getRepository("CcmColdRooms")->findBy(array('ccm' => $id));
            // echo $cold_room['0']->getCcmAssetSubType()->getPkId();
            $form->ccm_asset_sub_type_id->setValue($cold_room['0']->getCcmAssetSubType()->getPkId());
            $ccm_model = $this->_em->getRepository("CcmModels")->find($cold_chain->getCcmModel()->getPkId());
            $form->model_hidden->setValue($cold_chain->getCcmModel()->getPkId());

            $form->asset_dimension_length->setValue($ccm_model->getAssetDimensionLength());
            $form->asset_dimension_width->setValue($ccm_model->getAssetDimensionWidth());
            $form->asset_dimension_height->setValue($ccm_model->getAssetDimensionHeight());

            if ($cold_room['0']->getCcmAssetSubType()->getPkId() == 36) {
                $form->gross_capacity->setValue($ccm_model->getGrossCapacity4());
                $form->net_capacity->setValue($ccm_model->getNetCapacity4());
            }
            if ($cold_room['0']->getCcmAssetSubType()->getPkId() == 37) {
                $form->gross_capacity->setValue($ccm_model->getGrossCapacity20());
                $form->net_capacity->setValue($ccm_model->getNetCapacity20());
            }
            $form->cooling_system->setValue($cold_room['0']->getCoolingSystem());

            //echo $cold_room['0']->getRefrigeratorGasType()->getPkId();
            // exit;
            if ($cold_room['0']->getRefrigeratorGasType() != "") {
                $form->refrigerator_gas_type->setValue($cold_room['0']->getRefrigeratorGasType()->getPkId());
            }
            if ($cold_room['0']->getBackupGenerator() != "") {
                $form->backup_generator->setValue($cold_room['0']->getBackupGenerator()->getPkId());
            }
            if ($cold_room['0']->getTemperatureRecordingSystem() != "") {
                $form->temperature_recording_system->setValue($cold_room['0']->getTemperatureRecordingSystem()->getPkId());
            }
            if ($cold_room['0']->getTypeRecordingSystem() != "") {

                $form->type_recording_system->setValue($cold_room['0']->getTypeRecordingSystem()->getPkId());
            }
            $form->has_voltage->setValue($cold_room['0']->getHasVoltage());
            $form->make->setValue($ccm_model->getCcmMake()->getPkId());

            if ($cold_chain->getSource() != "") {
                $main_form->source_id->setValue($cold_chain->getSource()->getPkId());
            }
            ////$model_id = $this->_em->getRepository('CcmModels')->find();
            //$form->catalogue_id->setValue($cold_chain->getCcmModel()->getPkId());
            //$form->campaign_name->setValue($campaign->getCampaignName());

            $action = 'update-cold-room';
            $action_main = 'update';
            $base_url = Zend_Registry::get('baseurl');
            $this->view->inlineScript()->appendFile($base_url . '/js/default/cold-chain/update-cold-room.js');
        }
        $this->view->action = $action;
        $this->view->main_action = $action_main;
        $this->view->form = $form;
        $this->view->main_form = $main_form;
        $this->view->arr_data = $arr_data;
        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/all_level_combos.js');
        $this->view->inlineScript()->appendFile($base_url . '/js/default/cold-chain/add-main.js');
    }

    public function updateColdRoomAction() {
        $cold_room = new Model_CcmColdRooms();
        if ($this->_request->isPost()) {
            try {
                $form_values = $this->_request->getPost();
                $cold_room->form_values = $form_values;
                $cold_room->updateColdRoom();
            } catch (Exception $e) {

                App_FileLogger::info($e);
            }
            $this->redirect("/cold-chain/search-cold-room/success/1");
            exit;
        }
    }

    public function transferAssetAction() {
        $form_values = array();
        $temp = array();
        $arr_data = array('success' => $this->_request->success,
            'tempassets' => '');
        $arr_coldchain_ids = $this->_request->hdn_coldchain_id;
        if (count($arr_coldchain_ids) > 0) {
            $cold_chain = new Model_ColdChain();
            //$em = Zend_Registry::get('doctrine');
            //$em->getConnection()->beginTransaction();
            try {
                foreach ($arr_coldchain_ids as $coldchain_id) {
                    $cold_chain->form_values['coldchain_id'] = $coldchain_id;
                    $str_quantity_issue = "quantity_issue_" . $coldchain_id;
                    $str_quantity_available = "quantity_available_" . $coldchain_id;
                    $str_transfer = "transfer_" . $coldchain_id;
                    $cold_chain->form_values['quantity_issue'] = $this->_request->$str_quantity_issue;
                    $cold_chain->form_values['quantity_available'] = $this->_request->$str_quantity_available;
                    $cold_chain->form_values['transfer'] = $this->_request->$str_transfer;
                    $cold_chain->form_values['from_warehouse'] = $this->_request->warehouse;
                    $cold_chain->form_values['to_warehouse'] = $this->_request->warehouse2;
                    $cold_chain->transferColdChainAsset();
                }
                //$em->getConnection()->commit();
            } catch (Exception $e) {
                //$em->getConnection()->rollback();
                //$em->close();
                App_FileLogger::info($e);
            }
        } else {
            
        }
        $this->view->user_level = $this->_identity->getUserLevel($this->_userid);
        $this->view->arr_data = $arr_data;
        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/all_level_combos.js');
        $this->view->inlineScript()->appendFile($base_url . '/js/all_level_combos2.js');
    }

    public function addVaccineCarrierAction() {
        $form = new Form_AddVaccineCarrier();
        $this->view->form = $form;
        $ccm_model = new Model_CcmModels();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $data = $form->getValues();
                $ccm_model->form_values = $data;
                $ccm_model->form_values['warehouse'] = $this->_request->warehouse;
                $ccm_model->addVaccineCarrier();
                $this->redirect("/cold-chain/add-vaccine-carrier?success=1");
            }
        }
        $result = $ccm_model->getVaccineCarriers();
        $this->view->result = $result;
        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/all_level_combos.js');
    }

    public function addIcePackAction() {
        $form = new Form_AddIcePacks();
        $this->view->form = $form;
        $ccm_model = new Model_CcmModels();
        if ($this->_request->isPost()) {
            $data = $this->_request->getPost();
            $ccm_model->form_values = $data;
            $ccm_model->addIcePack();
            $this->redirect("/cold-chain/add-ice-pack?success=1");
        }
        $ice_pack_sizes = $ccm_model->getModelsByGenericMake();
        $this->view->icePackSizes = $ice_pack_sizes;
        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/all_level_combos.js');
    }

    public function statusWorkingUpdateAction() {
        $form = new Form_StatusWorkingUpdate();
        $this->view->form = $form;
        $cold_chain = new Model_ColdChain();
        $warehouse_name_asset = $cold_chain->getWarehouseNamesAssetStatus();
        $this->view->warehosue_name = $warehouse_name_asset;
    }

    public function ajaxGetModelsAction() {
        $this->_helper->layout->disableLayout();
        if (isset($this->_request->make) && !empty($this->_request->make)) {
            $models = new Model_CcmModels();
            $models->form_values['make_id'] = $this->_request->make;
            $array = $models->getModelsByMakeId();
            $this->view->model_id = $this->_request->model;
            $this->view->data = $array;
        }
    }

    public function ajaxGetMakeAction() {
        $this->_helper->layout->disableLayout();
        if (isset($this->_request->make) && !empty($this->_request->make)) {
            $makes = new Model_CcmMakes();
            $makes->form_values['make_id'] = $this->_request->make;
            $array = $makes->getMakeByMakeId();
            //$this->view->model_id = $this->_request->model;
            $this->view->data = $array;
        }
    }

    public function ajaxIcePacksAction() {
        $this->_helper->layout->disableLayout();
        if (isset($this->_request->wh_id) && !empty($this->_request->wh_id)) {
            $ccm_model = new Model_CcmModels();
            $ccm_model->form_values['unallocated'] = $this->_request->unallocated;
            $ccm_model->form_values['warehouse'] = $this->_request->wh_id;
            $array = $ccm_model->getQuantityByGenericMake();
            $this->view->icePackQuantity = $array;
        }
    }

    public function ajaxIcePacksUnallocatedAction() {
        $this->_helper->layout->disableLayout();
        if (isset($this->_request->unallocated) && !empty($this->_request->unallocated)) {
            $ccm_model = new Model_CcmModels();
            $ccm_model->form_values['unallocated'] = $this->_request->unallocated;
            $array = $ccm_model->getQuantityByGenericMake();
            $this->view->icePackQuantity = $array;
        }
    }

    public function ajaxTransferAssetAction() {
        $this->_helper->layout->setLayout("ajax");
        $data = array();
        $cold_chain = new Model_ColdChain();
        $cold_chain->form_values['warehouse'] = $this->_request->warehouse;
      //  $data_0 = $cold_chain->getAllColdChainAssetForTransfer();
        $data = $cold_chain->getQuantityColdChainAssetForTransfer();
        $this->view->arr_data = $data;
        $data1 = $cold_chain->getNonQuantityColdChainAssetForTransfer();
        $this->view->arr_data1 = $data1;
    }

    public function ajaxGetReasonsAction() {
        $this->_helper->layout->disableLayout();
        $ccm_status_list = new Model_CcmStatusList();
        $ccm_status_list->form_values['working_status'] = $this->_request->working_status;
        $data = $ccm_status_list->getAllReasons();
        $this->view->arr_data = $data;
    }

    public function ajaxGetUtilizationsAction() {
        $this->_helper->layout->disableLayout();
        $ccm_status_list = new Model_CcmStatusList();
        $ccm_status_list->form_values['working_status'] = $this->_request->working_status;
        $data = $ccm_status_list->getAllUtilizations();
        $this->view->arr_data = $data;
    }

    public function ajaxGetDataByCatalogueIdAction() {
        $this->_helper->layout->disableLayout();
        $ccm_models = new Model_CcmModels();
        $ccm_models->form_values['catalogue_id'] = $this->_request->catalogue_id;
        $arr_data = $ccm_models->getAssetDetailsById();
        $this->view->arr_data = $arr_data;
    }

    public function addNewMakeModelAction() {
        $this->_helper->layout->setLayout("ajax");
        $models = new Model_CcmModels();
        $models->form_values = $this->_request->getParams();
        $models->addNewMakeModel();
        $models->form_values['asset_type'] = $this->_request->getParam('model_type');
        $result = $models->getAllAssetsByType();
        $this->view->result = $result;
    }

    public function searchIcePackAction() {
        $ice_pack_search = array();
        $identity = App_Auth::getInstance();
        $form = new Form_SearchIcePack();
        $this->view->form = $form;
        $cold_chain = new Model_ColdChain();
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $data = $form->getValues();
                $data['warehouse'] = $this->_request->warehouse;
                $data['warehouse'] = $this->_request->warehouse;
                $data['office'] = $this->_request->office;
                $data['combo1'] = $this->_request->combo1;
                $cold_chain->form_values = $data;

                //Pagination
                $sort = $this->_getParam("sort", "asc");
                $order = $this->_getParam("order", "make_name");

                $result = $cold_chain->searchIcePacks($sort, $order);
                //Paginate the contest results
                $paginator = Zend_Paginator::factory($result);
                $page = $this->_getParam("page", 1);
                $counter = $this->_getParam("counter", 10);
                $paginator->setCurrentPageNumber((int) $page);
                $paginator->setItemCountPerPage((int) $counter);
                $this->view->paginator = $paginator;
                $this->view->sort = $sort;
                $this->view->order = $order;
                $this->view->counter = $counter;

                $form->office_id->setValue($data['office']);
                $form->combo1_id->setValue($data['combo1']);
                $form->warehouse_id->setValue($data['warehouse']);
                $form->model_id->setValue($data['ccm_model_id']);
            }
        } else {
            $form->placed_at->setValue(1);
            $form->office_id->setValue($identity->getUserLevel($identity->getIdentity()));
            $role_id = $this->_identity->getRoleId();
            if ($role_id != 11) {
                $form->combo1_id->setValue($identity->getUserProvinceId());
            }
            $form->warehouse_id->setValue($this->_identity->getWarehouseId());
        }
        // $result = $makes->getAllMakes($order, $sort);
        $this->view->ice_pack_search = $result;
        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/all_level_combos.js');
        $this->view->inlineScript()->appendFile($base_url . '/js/default/cold-chain/add-main.js');
    }

    public function searchVaccineCarrierAction() {
        $result = array();
        $identity = App_Auth::getInstance();
        $form = new Form_SearchVaccineCarrier();
        $this->view->form = $form;
        $cold_chain = new Model_ColdChain();
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $data = $form->getValues();
                $data['warehouse'] = $this->_request->warehouse;
                $data['office'] = $this->_request->office;
                $data['combo1'] = $this->_request->combo1;
                $cold_chain->form_values = $data;
                $result = $cold_chain->searchVaccineCarriers();
                $form->office_id->setValue($data['office']);
                $form->combo1_id->setValue($data['combo1']);
                $form->warehouse_id->setValue($data['warehouse']);
                $form->model_id->setValue($data['ccm_model_id']);
            }
        } else {
            $form->placed_at->setValue(1);
            $form->office_id->setValue($identity->getUserLevel($identity->getIdentity()));
            $role_id = $this->_identity->getRoleId();
            if ($role_id != 11) {
                $form->combo1_id->setValue($identity->getUserProvinceId());
            }
            $form->warehouse_id->setValue($this->_identity->getWarehouseId());
        }
        $this->view->vaccine_carrier_search = $result;
        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/all_level_combos.js');
        $this->view->inlineScript()->appendFile($base_url . '/js/default/cold-chain/add-main.js');
    }

    public function searchColdRoomAction() {
        $result = array();
        $identity = App_Auth::getInstance();
        $form = new Form_SearchColdRoom();
        $this->view->form = $form;
        $cold_room = new Model_CcmColdRooms();
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $data = $form->getValues();
                $data['warehouse'] = $this->_request->warehouse;
                $data['office'] = $this->_request->office;
                $data['combo1'] = $this->_request->combo1;
                $cold_room->form_values = $data;
                $result = $cold_room->searchColdRooms();
                $form->office_id->setValue($data['office']);
                $form->combo1_id->setValue($data['combo1']);
                $form->warehouse_id->setValue($data['warehouse']);
                $form->model_id->setValue($data['ccm_model_id']);
            }
        } else {
            $form->placed_at->setValue(1);
            $form->office_id->setValue($identity->getUserLevel($identity->getIdentity()));
            $role_id = $this->_identity->getRoleId();
            if ($role_id != 11) {
                $form->combo1_id->setValue($identity->getUserProvinceId());
            }
            $form->warehouse_id->setValue($this->_identity->getWarehouseId());
        }
        $this->view->search_cold_room = $result;
        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/all_level_combos.js');
        $this->view->inlineScript()->appendFile($base_url . '/js/default/cold-chain/add-main.js');
    }

    public function searchGeneratorAction() {
        $arr_data = array();
        $identity = App_Auth::getInstance();
        $form = new Form_SearchGenerator();
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $ccm_generators = new Model_CcmGenerators();
                $data = $form->getValues();
                $data['warehouse'] = $this->_request->warehouse;
                $data['office'] = $this->_request->office;
                $data['combo1'] = $this->_request->combo1;
                $ccm_generators->form_values = $data;
                $ccm_generators->form_values['warehouse'] = $this->_request->warehouse;
                $arr_data = $ccm_generators->searchGenerators();
                $form->office_id->setValue($data['office']);
                $form->combo1_id->setValue($data['combo1']);
                $form->warehouse_id->setValue($data['warehouse']);
                $form->model_id->setValue($data['ccm_model_id']);
            }
        } else {
            $form->placed_at->setValue(1);
            $form->office_id->setValue($identity->getUserLevel($identity->getIdentity()));
            $role_id = $this->_identity->getRoleId();
            if ($role_id != 11) {
                $form->combo1_id->setValue($identity->getUserProvinceId());
            }
            $form->warehouse_id->setValue($this->_identity->getWarehouseId());
        }

        $this->view->form = $form;
        $this->view->result = $arr_data;
        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/all_level_combos.js');
    }

    public function searchVoltageRegulatorAction() {
        $arr_data = array();
        $identity = App_Auth::getInstance();
        $form = new Form_SearchVoltageRegulator();
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $cold_chain = new Model_ColdChain();
                $data = $form->getValues();
                $data['warehouse'] = $this->_request->warehouse;
                $data['office'] = $this->_request->office;
                $data['combo1'] = $this->_request->combo1;
                $cold_chain->form_values = $data;
                $cold_chain->form_values['warehouse'] = $this->_request->warehouse;
                $arr_data = $cold_chain->searchVoltageRegulator();
                $form->office_id->setValue($data['office']);
                $form->combo1_id->setValue($data['combo1']);
                $form->warehouse_id->setValue($data['warehouse']);
                $form->model_id->setValue($data['ccm_model_id']);
            }
        } else {
            $form->placed_at->setValue(1);
            $form->office_id->setValue($identity->getUserLevel($identity->getIdentity()));
            $role_id = $this->_identity->getRoleId();
            if ($role_id != 11) {
                $form->combo1_id->setValue($identity->getUserProvinceId());
            }
            $form->warehouse_id->setValue($this->_identity->getWarehouseId());
        }
        $this->view->form = $form;
        $this->view->result = $arr_data;
        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/all_level_combos.js');
    }

    public function searchTransportAction() {
        $arr_data = array();
        $identity = App_Auth::getInstance();
        $form = new Form_SearchTransport();
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $ccm_vehicles = new Model_CcmVehicles();
                $data = $form->getValues();
                $data['warehouse'] = $this->_request->warehouse;
                $data['office'] = $this->_request->office;
                $data['combo1'] = $this->_request->combo1;
                $ccm_vehicles->form_values = $data;
                $ccm_vehicles->form_values['warehouse'] = $this->_request->warehouse;
                $arr_data = $ccm_vehicles->searchVehicles();
                $form->office_id->setValue($data['office']);
                $form->combo1_id->setValue($data['combo1']);
                $form->warehouse_id->setValue($data['warehouse']);
                $form->model_id->setValue($data['ccm_model_id']);
            }
        } else {
            $form->placed_at->setValue(1);
            $form->office_id->setValue($identity->getUserLevel($identity->getIdentity()));
            $role_id = $this->_identity->getRoleId();
            if ($role_id != 11) {
                $form->combo1_id->setValue($identity->getUserProvinceId());
            }
            $form->warehouse_id->setValue($this->_identity->getWarehouseId());
        }
        $this->view->form = $form;
        $this->view->result = $arr_data;
        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/all_level_combos.js');
    }

    public function searchRefrigeratorAction() {
        $arr_data = array();
        $form = new Form_SearchRefrigerator();

        $identity = App_Auth::getInstance();
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $cold_chain = new Model_ColdChain();
                $data = $form->getValues();
                $data['warehouse'] = $this->_request->warehouse;
                $data['office'] = $this->_request->office;
                $data['combo1'] = $this->_request->combo1;
                $cold_chain->form_values = $data;
                $cold_chain->form_values['warehouse'] = $this->_request->warehouse;
                $arr_data = $cold_chain->searchRefrigerator();
                $form->office_id->setValue($data['office']);
                $form->combo1_id->setValue($data['combo1']);
                $form->warehouse_id->setValue($data['warehouse']);
                $form->model_id->setValue($data['ccm_model_id']);
            }
        } else {
            $form->placed_at->setValue(1);
            $form->office_id->setValue($identity->getUserLevel($identity->getIdentity()));
            $role_id = $this->_identity->getRoleId();
            //echo $role_id;
            //exit;
            if ($role_id != 11) {
                $form->combo1_id->setValue($identity->getUserProvinceId());
            }
            $form->warehouse_id->setValue($this->_identity->getWarehouseId());
        }
        $this->view->form = $form;
        $this->view->result = $arr_data;
        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/all_level_combos.js');
    }

    public function updateWorkingStatusAction() {
        $warehouse_id = $this->_request->getParam('id', '');
        $status_list = new Model_CcmStatusList();
        $result1 = $status_list->getStatusLists();
        $this->view->working_list = $result1;
        $result2 = $status_list->getAllReasons();
        $this->view->reason_list = $result2;
        $result3 = $status_list->getAllUtilizations();
        $this->view->utilization_list = $result3;
        $this->view->warehouse_id = $warehouse_id;
        if ($this->_request->isPost()) {
            $ccm_status_histroy = new Model_CcmStatusHistory();
            $data = $this->_request->getPost();
            $ccm_status_histroy->form_values = $data;

            $ccm_status_histroy->updateColdChainStatus();
            $role_id = $this->_identity->getRoleId();
            if ($role_id == 7) {
                $this->redirect("/stock/monthly-consumption2");
            } else {
                $this->redirect("/cold-chain/status-working-update?success=1");
            }
        }
    }

    public function printRefrigeratorAction() {
        $this->_helper->layout->setLayout('print');
        $this->view->headTitle("Print Refrigerator");
        $this->view->print_title = "Refrigerator Details";
        $this->view->pkId = $this->_request->id;
        $this->view->warehousename = $this->_identity->getWarehouseName();
    }

    public function printVaccineCarrierAction() {
        $this->_helper->layout->setLayout('print');
        $this->view->headTitle("Print Vaccine Carrier");
        $this->view->print_title = "Vaccine Carrier Details";
        $this->view->pkId = $this->_request->id;
        $this->view->warehousename = $this->_identity->getWarehouseName();
    }

    public function printIcePackAction() {
        $this->_helper->layout->setLayout('print');
        $this->view->headTitle("Print Ice Pack");
        $this->view->print_title = "Ice Pack Details";
        $this->view->pkId = $this->_request->id;
        $this->view->warehousename = $this->_identity->getWarehouseName();
    }

    public function printColdRoomAction() {
        $this->_helper->layout->setLayout('print');
        $this->view->headTitle("Print Cold Room");
        $this->view->print_title = "Cold Room Details";
        $this->view->pkId = $this->_request->id;
        $this->view->warehousename = $this->_identity->getWarehouseName();
    }

    public function printVoltageRegulatorAction() {
        $this->_helper->layout->setLayout('print');
        $this->view->headTitle("Print Voltage Regulator");
        $this->view->print_title = "Voltage Regulator Details";
        $this->view->pkId = $this->_request->id;
        $this->view->warehousename = $this->_identity->getWarehouseName();
    }

    public function printGeneratorAction() {
        $this->_helper->layout->setLayout('print');
        $this->view->headTitle("Print Generator");
        $this->view->print_title = "Generator Details";
        $this->view->pkId = $this->_request->id;
        $this->view->warehousename = $this->_identity->getWarehouseName();
    }

    public function printTransportAction() {
        $this->_helper->layout->setLayout('print');
        $this->view->headTitle("Print Transport");
        $this->view->print_title = "Transport Details";
        $this->view->pkId = $this->_request->id;
        $this->view->warehousename = $this->_identity->getWarehouseName();
    }

}
