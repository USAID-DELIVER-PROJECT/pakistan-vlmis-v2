<?php

class Iadmin_ManageStocksController extends App_Controller_Base {

    public function init() {
        parent::init();
    }

    public function indexAction() {
        
    }

    function setupBarcodeAction() {
        $form = new Form_Iadmin_SetupBarcode();
        $stakeholder_item_pack = new Model_StakeholderItemPackSizes();

        if ($this->_request->getPost()) {
            $stakeholder_item_pack->form_values = $this->_request->getPost();
            $stakeholder_item_pack->setupBarcode();
            $this->redirect("/iadmin/manage-stocks/setup-barcode?success=1");
        }
        $this->view->form = $form;
        $result = $stakeholder_item_pack->getStakeholderItemPackSizes();
        $this->view->result = $result;
    }

    public function ajaxSetupBarcodeAction() {
        $this->_helper->layout->setLayout('ajax');
        $stakeholder_item_pack = new StakeholderItemPackSizes();
        $barcode_type_id = $this->_request->getParam('barcode_type_id');
        $form = new Form_Iadmin_SetupBarcode();
        /* if ($barcode_type_id != Model_StakeholderItemPackSizes::NON_GSI) {
          $form->readOnlyFields();
          $form->gtin->setValue(Model_StakeholderItemPackSizes::GTIN);
          $form->batch->setValue(Model_StakeholderItemPackSizes::BATCH);
          $form->expiry->setValue(Model_StakeholderItemPackSizes::EXPIRY);
          $form->gtin_start_position->setValue(Model_StakeholderItemPackSizes::GTIN_START);
          $form->batch_no_start_position->setValue(Model_StakeholderItemPackSizes::BATCH_START);
          $form->expiry_date_start_position->setValue(Model_StakeholderItemPackSizes::EXPIRY_START);
          $form->gtin_end_position->setValue(Model_StakeholderItemPackSizes::GTIN_END);
          $form->batch_no_end_position->setValue(Model_StakeholderItemPackSizes::BATCH_END);
          $form->expiry_date_end_position->setValue(Model_StakeholderItemPackSizes::EXPIRY_END);
          } else { */
        $gtin = $stakeholder_item_pack->getGtin();
        if (!empty($gtin)) {
            $form->gtin->setValue($gtin);
        } else {
            $form->gtin->setValue(Model_StakeholderItemPackSizes::GTIN);
        }
        $batch = $stakeholder_item_pack->getBatch();
        if (!empty($batch)) {
            $form->batch->setValue($batch);
        } else {
            $form->batch->setValue(Model_StakeholderItemPackSizes::BATCH);
        }
        $expiry = $stakeholder_item_pack->getExpiry();
        if (!empty($expiry)) {
            $form->expiry->setValue($expiry);
        } else {
            $form->expiry->setValue(Model_StakeholderItemPackSizes::EXPIRY);
        }
        $gtin_start = $stakeholder_item_pack->getGtinStartPosition();
        if (!empty($gtin_start)) {
            $form->gtin_start_position->setValue($gtin_start);
        } else {
            $form->gtin_start_position->setValue(Model_StakeholderItemPackSizes::GTIN_START);
        }
        $batch_start = $stakeholder_item_pack->getBatchNoStartPosition();
        if (!empty($batch_start)) {
            $form->batch_no_start_position->setValue($batch_start);
        } else {
            $form->batch_no_start_position->setValue(Model_StakeholderItemPackSizes::BATCH_START);
        }
        $expirt_start = $stakeholder_item_pack->getExpiryDateStartPosition();
        if (!empty($expirt_start)) {
            $form->expiry_date_start_position->setValue($expirt_start);
        } else {
            $form->expiry_date_start_position->setValue(Model_StakeholderItemPackSizes::EXPIRY_START);
        }
        $gtin_end = $stakeholder_item_pack->getGtinEndPosition();
        if (!empty($gtin_end)) {
            $form->gtin_end_position->setValue();
        } else {
            $form->gtin_end_position->setValue(Model_StakeholderItemPackSizes::GTIN_END);
        }
        $batch_end = $stakeholder_item_pack->getBatchNoEndPosition();
        if (!empty($batch_end)) {
            $form->batch_no_end_position->setValue($batch_end);
        } else {
            $form->batch_no_end_position->setValue(Model_StakeholderItemPackSizes::BATCH_END);
        }
        $expiry_end = $stakeholder_item_pack->getExpiryDateEndPosition();
        if (!empty($expiry_end)) {
            $form->expiry_date_end_position->setValue($expiry_end);
        } else {
            $form->expiry_date_end_position->setValue(Model_StakeholderItemPackSizes::EXPIRY_END);
        }
        //}
        $this->view->form = $form;
    }

    public function ajaxUpdateBarcodeAction() {
        $this->_helper->layout->setLayout('ajax');
        $stakeholder_item_pack = new StakeholderItemPackSizes();
        $barcode_type_id = $this->_request->getParam('barcode_type_id');
        $form = new Form_Iadmin_SetupBarcode();
        /* if ($barcode_type_id != Model_StakeholderItemPackSizes::NON_GSI) {
          $form->readOnlyFields();
          $form->gtin->setValue(Model_StakeholderItemPackSizes::GTIN);
          $form->batch->setValue(Model_StakeholderItemPackSizes::BATCH);
          $form->expiry->setValue(Model_StakeholderItemPackSizes::EXPIRY);
          $form->gtin_start_position->setValue(Model_StakeholderItemPackSizes::GTIN_START);
          $form->batch_no_start_position->setValue(Model_StakeholderItemPackSizes::BATCH_START);
          $form->expiry_date_start_position->setValue(Model_StakeholderItemPackSizes::EXPIRY_START);
          $form->gtin_end_position->setValue(Model_StakeholderItemPackSizes::GTIN_END);
          $form->batch_no_end_position->setValue(Model_StakeholderItemPackSizes::BATCH_END);
          $form->expiry_date_end_position->setValue(Model_StakeholderItemPackSizes::EXPIRY_END);
          } else { */
        $form->gtin->setValue($stakeholder_item_pack->getGtin());
        $form->batch->setValue($stakeholder_item_pack->getBatch());
        $form->expiry->setValue($stakeholder_item_pack->getExpiry());
        $form->gtin_start_position->setValue($stakeholder_item_pack->getGtinStartPosition());
        $form->batch_no_start_position->setValue($stakeholder_item_pack->getBatchNoStartPosition());
        $form->expiry_date_start_position->setValue($stakeholder_item_pack->getExpiryDateStartPosition());
        $form->gtin_end_position->setValue($stakeholder_item_pack->getGtinEndPosition());
        $form->batch_no_end_position->setValue($stakeholder_item_pack->getBatchNoEndPosition());
        $form->expiry_date_end_position->setValue($stakeholder_item_pack->getExpiryDateEndPosition());
        //}
        $this->view->form = $form;
    }

    public function detailBarcodeAction() {
        $this->_helper->layout->disableLayout();
        $barcode_id = $this->_request->getParam('barcode_id', '');
        //$barcode_id = $this->_request->getParam('editid', '');
        $form = new Form_Iadmin_SetupBarcode();
        $stakeholder_item_pack = new Model_StakeholderItemPackSizes();

        $result = $stakeholder_item_pack->getStakeholderItemPackSizesAll($barcode_id);
        $this->view->result = $result[0];
        $this->view->form = $form;
    }

    public function updateBarcodeAction() {
        //$this->_helper->layout->disableLayout();
        $this->_helper->layout->setLayout("ajax");

        $barcode_id = $this->_request->getParam('barcode_id', '');

        // $barcode_type_id = $this->_request->getParam('barcode_type_id', '');
        //$stakeholder_item_pack = new StakeholderItemPackSizes();
        $stakeholder_item_pack = $this->_em->find('StakeholderItemPackSizes', $barcode_id);
        $pack_info = $this->_em->find('PackInfo', $stakeholder_item_pack->getPkId());
        $form = new Form_Iadmin_SetupBarcode();
        //  $form->addFields();

        $form->barcode_id->setValue($barcode_id);

        $form->item_pack_size_id_update->setValue($stakeholder_item_pack->getItemPackSize()->getPkId());
        $form->item_pack_size_id_hidden->setValue($stakeholder_item_pack->getItemPackSize()->getPkId());
        $form->stakeholder_id->setValue($stakeholder_item_pack->getStakeholder()->getPkId());
        $form->stakeholder_id_update_hidden->setValue($stakeholder_item_pack->getStakeholder()->getPkId());
        $form->packaging_level_update->setValue($pack_info->getPackagingLevel()->getPkId());
        // $form->barcode_ty_id = setValue($stakeholder_item_pack->getBarcodeType()->getPkId());
        $form->item_gtin->setValue($pack_info->getItemGtin());
        //$form->gtin_start_position->setValue($stakeholder_item_pack->getGtinStartPosition());
        // $form->batch_no_start_position->setValue($stakeholder_item_pack->getBatchNoStartPosition());
        //$form->expiry_date_start_position->setValue($stakeholder_item_pack->getExpiryDateStartPosition());
//
//        $form->gtin_end_position->setValue($stakeholder_item_pack->getGtinEndPosition());
//        $form->batch_no_end_position->setValue($stakeholder_item_pack->getBatchNoEndPosition());
//        $form->expiry_date_end_position->setValue($stakeholder_item_pack->getExpiryDateEndPosition());
        $form->pack_size_description->setValue($pack_info->getPackSizeDescription());
//        $form->gtin->setValue($stakeholder_item_pack->getGtin());
//        $form->batch->setValue($stakeholder_item_pack->getBatch());
//        $form->expiry->setValue($stakeholder_item_pack->getExpiry());
//        $form->batch_length->setValue($stakeholder_item_pack->getBatchLength());
        $form->length->setValue($pack_info->getLength());
        $form->width->setValue($pack_info->getWidth());
        $form->height->setValue($pack_info->getHeight());
        $form->quantity_per_pack->setValue($pack_info->getQuantityPerPack());
        $form->volum_per_vial->setValue($pack_info->getVolumPerVial());

        $this->view->form = $form;

        //$base_url = Zend_Registry::get('baseurl');
        // $this->view->inlineScript()->appendFile($base_url . '/js/iadmin/manage-stocks/ajax-update-barcode.js');
    }

    function updateBarcode1Action() {
        $form = new Form_Iadmin_SetupBarcode();
        $stakeholder_item_pack = new Model_StakeholderItemPackSizes();

        $stakeholder_item_pack->form_values = $this->_request->getPost();
        $stakeholder_item_pack->updateBarcode();

        $this->redirect("/iadmin/manage-stocks/setup-barcode?success=1");

        $this->view->form = $form;
        $result = $stakeholder_item_pack->getStakeholderItemPackSizes();

        $this->view->result = $result;
    }

    public function deleteStakeholderItemPackSizeAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);

        $barcode_id = $this->_request->getParam("barcode_id");

        $stkbatch = $this->_em->getRepository("StakeholderItemPackSizes")->find($barcode_id);
        $this->_em->remove($stkbatch);
        try {
            $this->_em->flush();
            echo "true";
        } catch (Exception $exc) {
            echo "false";
        }
    }

    public function ajaxGetManufacturerByProductAction() {
        $this->_helper->layout->disableLayout();
        $item_id = $this->_request->getParam('item_id', '');
        $stakeholder_items = new Model_Stakeholders();
        $stakeholder_items->form_values['item_id'] = $item_id;
        $associated = $stakeholder_items->getManufacturerByProduct();
        $this->view->associated = $associated;
        $not_associated = $stakeholder_items->getUnaccociatedManufacturer();
        $this->view->not_associated = $not_associated;
    }

    function updateBarcodeSaveAction() {
        $form = new Form_Iadmin_SetupBarcode();
        $stakeholder_item_pack = new Model_StakeholderItemPackSizes();

        if ($this->_request->getPost()) {
            $stakeholder_item_pack->form_values = $this->_request->getPost();
            $stakeholder_item_pack->updateBarcodeSave();
            $this->redirect("/iadmin/manage-stocks/setup-barcode?success=1");
        }
        //  $form->expiry_date_format->setValue("YYMMDD");
        $this->view->form = $form;
        $result = $stakeholder_item_pack->getStakeholderItemPackSizes();
        $this->view->result = $result;
    }

    function checkSetupBarcodeCombinationAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        $form_values = $this->_request->getPost();
        $stakeholder_item_pack_sizes = new Model_StakeholderItemPackSizes();
        $stakeholder_item_pack_sizes->form_values = $form_values;
        $result = $stakeholder_item_pack_sizes->checkSetupBarcodeCombination();
        if (!empty($result) && count($result) > 0) {
            echo 'f';
        } else {
            echo 't';
        }
    }

    function checkSetupBarcodeCombinationUpdateAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        $form_values = $this->_request->getPost();
        $stakeholder_item_pack_sizes = new Model_StakeholderItemPackSizes();
        $stakeholder_item_pack_sizes->form_values = $form_values;
        $result = $stakeholder_item_pack_sizes->checkSetupBarcodeCombinationUpdate();
        if (!empty($result) && count($result) > 0) {
            echo 'f';
        } else {
            echo 't';
        }
    }

}