<?php

class Cadmin_ManageModelsController extends App_Controller_Base {

    public function init() {
        parent::init();
    }

    public function indexAction() {
        $form = new Form_Cadmin_ModelsSearch();
        $form_add = new Form_Cadmin_ModelsAdd();

        $models = new Model_CcmModels();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $models->form_values = $form->getValues();
            }
            //$form->ccm_asset_type_id_popup->setValue($ccm_asset_type_id_popup);
            //$form->ccm_asset_sub_type->setValue($ccm_asset_sub_type);
        }

        $sort = $this->_getParam("sort", "desc");
        $order = $this->_getParam("order", "pk_id");

        $result = $models->getModelsBySearch($order, $sort);

        //Paginate the contest results
        $paginator = Zend_Paginator::factory($result);
        $page = $this->_getParam("page", 1);
        $counter = $this->_getParam("counter", 10);
        $paginator->setCurrentPageNumber((int) $page);
        $paginator->setItemCountPerPage((int) $counter);

        $this->view->form = $form;
        $this->view->form_add = $form_add;
        $this->view->paginator = $paginator;
        $this->view->sort = $sort;
        $this->view->order = $order;
        $this->view->counter = $counter;

        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/records_per_page.js');
    }

    public function addAction() {
        $form = new Form_Cadmin_ModelsAdd();

        if ($this->_request->isPost()) {
            if ($this->_request->getPost()) {
   
                $form_values = $this->_request->getPost();
               
                $model = new CcmModels();
                $asset_type_id = $this->_em->find('CcmAssetTypes', $form_values['ccm_asset_sub_type']);
                $model->setCcmAssetType($asset_type_id);
                $ccm_make = $this->_em->find('CcmMakes', $form_values['ccm_make_id']);
                $model->setCcmMake($ccm_make);
                $model->setCcmModelName($form_values['ccm_model_name']);
                $model->setCatalogueId($form_values['catalogue_id']);
                $model->setGrossCapacity20($form_values['gross_capacity_20']);
                $model->setGrossCapacity4($form_values['gross_capacity_4']);
                $model->setNetCapacity20($form_values['net_capacity_20']);
                $model->setNetCapacity4($form_values['net_capacity_4']);
                $model->setAssetDimensionLength($form_values['asset_dimension_length']);
                $model->setAssetDimensionWidth($form_values['asset_dimension_width']);
                $model->setAssetDimensionHeight($form_values['asset_dimension_height']);
                $model->setCfcFree($form_values['cfc_free']);
                $user_id = $this->_em->find('Users', $this->_userid);
                $model->setCreatedBy($user_id);
                $model->setCreatedDate(new \DateTime());
                $model->setModifiedBy($user_id);
                $model->setModifiedDate(new \DateTime());
                $this->_em->persist($model);
                $this->_em->flush();
                
            }
        }
        $this->_redirect("/cadmin/manage-models");
    }

    public function ajaxGetAllMakesByAssetTypeAction() {
        $this->_helper->layout->disableLayout();
        if (isset($this->_request->type_id) && !empty($this->_request->type_id)) {
            $makes = new Model_CcmMakes();
            
            $makes->form_values['type_id'] = $this->_request->type_id;
            $array = $makes->getAllMakesByAssetType();
            $this->view->data = $array;
        }
    }

    public function ajaxGetAssetSubtypesByAssetTypeAction() {
        $this->_helper->layout->disableLayout();
        if (isset($this->_request->type_id) && !empty($this->_request->type_id)) {
            $asset_types = new Model_CcmAssetTypes();
            $asset_types->form_values['parent_id'] = $this->_request->type_id;
            $array = $asset_types->getAssetSubTypes();
            $this->view->data = $array;
        }
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

    public function ajaxEditAction() {
        $this->_helper->layout->setLayout('ajax');
        $model_id = $this->_request->getParam('model_id', '');
        $ccm_model = $this->_em->find('CcmModels', $model_id);
        // $ccm_model = $this->_em->find('CcmModels', $model_id);
        $form = new Form_Cadmin_ModelsAdd();
        $form->addHidden();

        // $form->ccm_asset_type_id_update->setValue($ccm_model->getCcmAssetType()->getParent()->getPkId());
        $form->ccm_asset_sub_type_update->setValue($ccm_model->getCcmAssetType()->getPkId());
        $form->ccm_make_id->setValue($ccm_model->getCcmMake()->getPkId());
        $form->ccm_model_name->setValue($ccm_model->getCcmModelName());
        $form->catalogue_id->setValue($ccm_model->getCatalogueId());
        $form->asset_dimension_length->setValue($ccm_model->getAssetDimensionLength());
        $form->asset_dimension_width->setValue($ccm_model->getAssetDimensionWidth());
        $form->asset_dimension_height->setValue($ccm_model->getAssetDimensionHeight());
        $form->gross_capacity_20->setValue($ccm_model->getNetCapacity20());
        $form->gross_capacity_4->setValue($ccm_model->getNetCapacity4());
        $form->net_capacity_20->setValue($ccm_model->getNetCapacity20());
        $form->net_capacity_4->setValue($ccm_model->getNetCapacity4());
        $form->cfc_free->setValue($ccm_model->getCfcFree());
        $form->id->setValue($ccm_model->getPkId());

        $this->view->form = $form;
    }

    public function updateAction() {
        $form = new Form_Cadmin_ModelsAdd();
        $form->addHidden();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $model_id = $form->id->getValue();
                $model = $this->_em->getRepository("CcmModels")->find($model_id);
                $asset_type_id = $this->_em->find('CcmAssetTypes', $form->ccm_asset_sub_type_update->getValue());
                $model->setCcmAssetType($asset_type_id);
                $ccm_make = $this->_em->find('CcmMakes', $form->ccm_make_id->getValue());
                $model->setCcmMake($ccm_make);
                $model->setCcmModelName($form->ccm_model_name->getValue());
                $model->setCatalogueId($form->catalogue_id->getValue());
                $model->setGrossCapacity20($form->gross_capacity_20->getValue());
                $model->setGrossCapacity4($form->gross_capacity_4->getValue());
                $model->setNetCapacity20($form->net_capacity_20->getValue());
                $model->setNetCapacity4($form->net_capacity_4->getValue());
                $model->setAssetDimensionLength($form->asset_dimension_length->getValue());
                $model->setAssetDimensionWidth($form->asset_dimension_width->getValue());
                $model->setAssetDimensionHeight($form->asset_dimension_height->getValue());
                $model->setCfcFree($form->cfc_free->getValue());
                
                $this->_em->persist($model);
                $this->_em->flush();
            }
        }
        $this->_redirect("/cadmin/manage-models");
    }

    public function ajaxDetailAction() {
        $form = new Form_Cadmin_ModelsAdd();
        $this->_helper->layout->disableLayout();
        $ccm_model = $this->_em->find('CcmModels', $form->id->getValue());
        // App_Controller_Functions::pr($ccm_model);
        $this->view->data = $ccm_model;
    }

    public function ajaxChangeStatusAction() {
        $this->_helper->layout->disableLayout();
        $row = $this->_em->getRepository("CcmModels")->find($this->_request->getParam('id'));

        if ($this->_request->getParam('ajaxaction') == 'active') {
            $row->setStatus('1');
            $this->_em->persist($row);
            $this->_em->flush();
        } else if ($this->_request->getParam('ajaxaction') == 'deactive') {
            $row->setStatus('0');
            $this->_em->persist($row);
            $this->_em->flush();
        }
        $this->view->ajaxaction = $this->_request->getParam('ajaxaction');
    }

}
