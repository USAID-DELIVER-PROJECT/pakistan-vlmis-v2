<?php

/**
 * Iadmin_ManageStoresController
 *
 * 
 *
 *     Logistics Management Information System for Vaccines
 * @subpackage Iadmin
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */

/**
 *  This Controller Manages Stores
 */
class Iadmin_ManageStoresController extends App_Controller_Base {

    /**
     * Routine
     */
    public function routineAction() {

        $form = new Form_Iadmin_Stores();
        $warehouses = new Model_Warehouses();
        $params = array();
        if ($this->_request->isPost()) {

            $form_values = $this->_request->getPost();
            $this->view->combos = $this->_request->getPost();
            $form->province_id->setValue($form_values['combo1']);
            $form->district_id->setValue($form_values['combo2']);
            $form->tehsil_id->setValue($form_values['combo3']);
            $form->parent_id->setValue($form_values['combo4']);

            $params['office_type'] = '6';
            $params['stakeholder'] = '6';
            if (!empty($form_values['combo1'])) {
                $params['combo1'] = $form_values['combo1'];
            }
            if (!empty($form_values['combo2'])) {
                $params['combo2'] = $form_values['combo2'];
            }
            if (!empty($form_values['combo3'])) {
                $params['combo3'] = $form_values['combo3'];
            }
            if (!empty($form_values['combo4'])) {
                $params['combo4'] = $form_values['combo4'];
            }
            $counter = $this->_getParam("counter", 10);
            $sort = $this->_getParam("sort", "asc");
            $order = $this->_getParam("order", "store");
            $warehouses->form_values = $this->_request->getPost();
            $warehouses->form_values['office_type'] = '6';
            $warehouses->form_values['stakeholder'] = '6';
            $result = $warehouses->getAllWarehouses($order, $sort);
            $this->view->result = $result;

            $this->view->combos_1 = 'routine';
            $this->view->form = $form;
            $this->view->sort = $sort;
            $this->view->order = $order;
            $this->view->counter = $counter;
            $this->view->pagination_params = $params;
        } else {
            $counter = $this->_getParam("counter", 10);
            $sort = $this->_getParam("sort", "asc");
            $order = $this->_getParam("order", "store");
            $warehouses->form_values = $this->_request->getParams();
            $params = $this->_request->getParams();
            $this->view->combos = $this->_request->getParams();
            $form->province_id->setValue(1);
            $form->district_id->setValue(33);
            $form->tehsil_id->setValue(194);
            $form->parent_id->setValue(543);

            $warehouses->form_values['office_type'] = '6';
            $warehouses->form_values['stakeholder'] = '6';
            $warehouses->form_values['combo1'] = 1;
            $warehouses->form_values['combo2'] = 33;
            $warehouses->form_values['combo3'] = 194;
            $warehouses->form_values['combo4'] = 543;
            $result = $warehouses->getAllWarehouses($order, $sort);
            $this->view->result = $result;

            $this->view->combos_1 = 'routine';
            $this->view->form = $form;
            $this->view->sort = $sort;
            $this->view->order = $order;
            $this->view->counter = $counter;
            $this->view->pagination_params = $params;
        }
        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/routine_combos.js');
        $this->view->inlineScript()->appendFile($base_url . '/js/routine_add_combos.js');
        $this->view->headLink()->appendStylesheet($base_url . '/common/theme/scripts/plugins/tables/DataTables/media/css/DT_bootstrap.css');
    }

    /**
     * Campaigns
     */
    public function campaignsAction() {

        $form = new Form_Iadmin_Stores();
        $warehouses = new Model_Warehouses();
        $params = array();
        if ($this->_request->isPost()) {

            $form_values = $this->_request->getPost();
            $this->view->combos = $this->_request->getPost();
            $form->province_id->setValue($form_values['combo1']);
            $form->district_id->setValue($form_values['combo2']);
            $form->tehsil_id->setValue($form_values['combo3']);
            $form->parent_id->setValue($form_values['combo4']);
            $params['office_type'] = '6';
            $params['stakeholder'] = '10';
            if (!empty($form_values['combo1'])) {
                $params['combo1'] = $form_values['combo1'];
            }
            if (!empty($form_values['combo2'])) {
                $params['combo2'] = $form_values['combo2'];
            }
            if (!empty($form_values['combo3'])) {
                $params['combo3'] = $form_values['combo3'];
            }
            if (!empty($form_values['combo4'])) {
                $params['combo4'] = $form_values['combo4'];
            }
            $sort = $this->_getParam("sort", "asc");
            $order = $this->_getParam("order", "asset_sub_type");
            $warehouses->form_values = $this->_request->getPost();
            $warehouses->form_values['office_type'] = '6';
            $warehouses->form_values['stakeholder'] = '10';

            $result = $warehouses->getAllWarehouses($order, $sort);

            //Paginate the contest results
            $paginator = Zend_Paginator::factory($result);
            $page = $this->_getParam("page", 1);
            $counter = $this->_getParam("counter", 10);
            $paginator->setCurrentPageNumber((int) $page);
            $paginator->setItemCountPerPage((int) $counter);
            $this->view->combos_1 = 'campaigns';
            $this->view->form = $form;
            $this->view->paginator = $paginator;
            $this->view->sort = $sort;
            $this->view->order = $order;
            $this->view->counter = $counter;
            $this->view->pagination_params = $params;
        } else {
            $sort = $this->_getParam("sort", "asc");
            $order = $this->_getParam("order", "store");
            $warehouses->form_values = $this->_request->getParams();
            $params = $this->_request->getParams();
            $this->view->combos = $this->_request->getParams();
            $form->province_id->setValue($this->_getParam('combo1'));
            $form->district_id->setValue($this->_getParam('combo2'));
            $form->tehsil_id->setValue($this->_getParam('combo3'));
            $form->parent_id->setValue($this->_getParam('combo4'));

            $warehouses->form_values['office_type'] = '6';
            $warehouses->form_values['stakeholder'] = '10';
            $result = $warehouses->getAllWarehouses($order, $sort);

            //Paginate the contest results
            $paginator = Zend_Paginator::factory($result);
            $page = $this->_getParam("page", 1);
            $counter = $this->_getParam("counter", 10);
            $paginator->setCurrentPageNumber((int) $page);
            $paginator->setItemCountPerPage((int) $counter);
            $this->view->combos_1 = 'campaigns';
            $this->view->form = $form;
            $this->view->paginator = $paginator;
            $this->view->sort = $sort;
            $this->view->order = $order;
            $this->view->counter = $counter;
            $this->view->pagination_params = $params;
        }
        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/routine_combos.js');
        $this->view->inlineScript()->appendFile($base_url . '/js/routine_add_combos.js');
        $this->view->headLink()->appendStylesheet($base_url . '/common/theme/scripts/plugins/tables/DataTables/media/css/DT_bootstrap.css');
    }

    /**
     * Inventory
     */
    public function inventoryAction() {

        $form = new Form_Iadmin_Stores();
        $warehouses = new Model_Warehouses();

        if ($this->_request->isPost()) {

            $form_values = $this->_request->getPost();
            $this->view->combos = $this->_request->getPost();
            $this->view->combos_1 = 'inventory';
            $form->province_id->setValue($form_values['combo1']);
            $form->district_id->setValue($form_values['combo2']);
            $form->tehsil_id->setValue($form_values['combo3']);
            $form->parent_id->setValue($form_values['combo4']);
            if (!empty($form_values['combo1'])) {
                $params['combo1'] = $form_values['combo1'];
            }
            if (!empty($form_values['combo2'])) {
                $params['combo2'] = $form_values['combo2'];
            }
            if (!empty($form_values['combo3'])) {
                $params['combo3'] = $form_values['combo3'];
            }
            if (!empty($form_values['combo4'])) {
                $params['combo4'] = $form_values['combo4'];
            }
            $sort = $this->_getParam("sort", "asc");
            $order = $this->_getParam("order", "stores");
            $warehouses->form_values = $this->_request->getParams();
            $params = $this->_request->getParams();
            $this->view->combos = $this->_request->getParams();
            if (!empty($form_values['office_type'])) {
                $params['office_type'] = $form_values['office_type'];
            }
            $form->province_id->setValue($this->_getParam('combo1'));
            $form->district_id->setValue($this->_getParam('combo2'));
            $form->tehsil_id->setValue($this->_getParam('combo3'));
            $form->parent_id->setValue($this->_getParam('combo4'));

            $warehouses->form_values = $this->_request->getPost();
            $result = $warehouses->getAllWarehousesInventory($order, $sort);

            //Paginate the contest results
            $paginator = Zend_Paginator::factory($result);
            $page = $this->_getParam("page", 1);
            $counter = $this->_getParam("counter", 10);
            $paginator->setCurrentPageNumber((int) $page);
            $paginator->setItemCountPerPage((int) $counter);

            $this->view->form = $form;
            $this->view->paginator = $paginator;
            $this->view->sort = $sort;
            $this->view->order = $order;
            $this->view->counter = $counter;
            $this->view->pagination_params = $params;
        } else {
            $sort = $this->_getParam("sort", "asc");
            $order = $this->_getParam("order", "store");
            $warehouses->form_values = $this->_request->getParams();
            $params = $this->_request->getParams();
            $this->view->combos = $this->_request->getParams();
            $form->province_id->setValue($this->_getParam('combo1'));
            $form->district_id->setValue($this->_getParam('combo2'));
            $form->tehsil_id->setValue($this->_getParam('combo3'));
            $form->parent_id->setValue($this->_getParam('combo4'));
            $result = $warehouses->getAllWarehousesInventory($order, $sort);

            //Paginate the contest results
            $paginator = Zend_Paginator::factory($result);
            $page = $this->_getParam("page", 1);
            $counter = $this->_getParam("counter", 10);
            $paginator->setCurrentPageNumber((int) $page);
            $paginator->setItemCountPerPage((int) $counter);
            $this->view->combos_1 = 'inventory';
            $this->view->form = $form;
            $this->view->paginator = $paginator;
            $this->view->sort = $sort;
            $this->view->order = $order;
            $this->view->counter = $counter;
            $this->view->pagination_params = $params;
        }
        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/stores_combos.js');
        $this->view->inlineScript()->appendFile($base_url . '/js/stores_add_combos.js');
        $this->view->headLink()->appendStylesheet($base_url . '/common/theme/scripts/plugins/tables/DataTables/media/css/DT_bootstrap.css');
        $this->view->count = 1;
        if ($page > 1) {
            $this->view->count = (($page - 1) * $counter) + 1;
        }
    }

    /**
     * ajaxEdit
     */
    public function ajaxEditAction() {
        $this->_helper->layout->setLayout("ajax");
        $wh_id = $this->_request->getParam('wh_id', '');

        $warehouse = $this->_em->find('Warehouses', $wh_id);
        $form = new Form_Iadmin_Stores();
        $form->store_name_update->setValue($warehouse->getWarehouseName());
        $form->wh_id->setValue($wh_id);
        $form->office_id_edit->setValue($warehouse->getStakeholderOffice()->getPkId());
        $form->province_id_edit->setValue($warehouse->getProvince()->getPkId());
        $form->district_id_edit->setValue($warehouse->getDistrict()->getPkId());
        if ($warehouse->getStakeholderOffice()->getPkId() == 5) {
            $form->tehsil_id_edit->setValue($warehouse->getLocation()->getPkId());
        }
        if ($warehouse->getStakeholderOffice()->getPkId() == 6) {

            $form->parent_id_edit->setValue($warehouse->getLocation()->getPkId());
            $locations = $this->_em->find('Locations', $warehouse->getLocation()->getPkId());
            $form->tehsil_id_edit->setValue($locations->getParent()->getPkId());
        }

        $form->warehouse_type_id_hidden->setValue($warehouse->getWarehouseType()->getPkId());

        $form->ccm_warehouse_id_update->setValue($warehouse->getCcemId());
        $this->view->form = $form;

        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/locations_edit_combos.js');
    }

    /**
     * ajaxRoutineEdit
     */
    public function ajaxRoutineEditAction() {
        $this->_helper->layout->setLayout("ajax");
        $wh_id = $this->_request->getParam('wh_id', '');

        $warehouse = $this->_em->find('Warehouses', $wh_id);
        $form = new Form_Iadmin_Stores();
        $form->store_name_update->setValue($warehouse->getWarehouseName());
        $form->wh_id->setValue($wh_id);
        $form->province_id_edit->setValue($warehouse->getProvince()->getPkId());
        $form->district_id_edit->setValue($warehouse->getDistrict()->getPkId());
        $form->parent_id_edit->setValue($warehouse->getLocation()->getPkId());
        $locations = $this->_em->find('Locations', $warehouse->getLocation()->getPkId());
        $form->tehsil_id_edit->setValue($locations->getParent()->getPkId());
        $form->warehouse_type_id_hidden->setValue($warehouse->getWarehouseType()->getPkId());
        $form->ccm_warehouse_id_update->setValue($warehouse->getCcemId());
        $this->view->form = $form;

        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/routine_edit_combos.js');
    }

    /**
     * ajaxCampaignsEdit
     */
    public function ajaxCampaignsEditAction() {
        $this->_helper->layout->setLayout("ajax");
        $wh_id = $this->_request->getParam('wh_id', '');

        $warehouse = $this->_em->find('Warehouses', $wh_id);
        $form = new Form_Iadmin_Stores();
        $form->store_name_update->setValue($warehouse->getWarehouseName());
        $form->wh_id->setValue($wh_id);
        $form->province_id_edit->setValue($warehouse->getProvince()->getPkId());
        $form->district_id_edit->setValue($warehouse->getDistrict()->getPkId());
        $form->parent_id_edit->setValue($warehouse->getLocation()->getPkId());
        $locations = $this->_em->find('Locations', $warehouse->getLocation()->getPkId());
        $form->tehsil_id_edit->setValue($locations->getParent()->getPkId());

        $this->view->form = $form;

        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/routine_edit_combos.js');
    }

    /**
     * This method Adds store (Inventory)
     */
    public function addInventoryAction() {

        if ($this->_request->isPost() && $this->_request->getPost()) {
            $form_values = $this->_request->getPost();

            $warehouses = new Warehouses();
            if ($form_values['office_type_add'] == 2) {

                $parentId = $form_values['combo1_add'];
                $dist_id = $form_values['combo1_add'];
            }

            if ($form_values['office_type_add'] == 3) {

                $parentId = $form_values['combo1_add'];
                $dist_id = $form_values['combo1_add'];
            }

            if ($form_values['office_type_add'] == 4) {

                $parentId = $form_values['combo2_add'];
                $dist_id = $form_values['combo2_add'];
            }
            if ($form_values['office_type_add'] == 5) {

                $parentId = $form_values['combo3_add'];
                $dist_id = $form_values['combo2_add'];
            }
            if ($form_values['office_type_add'] == 6) {

                $parentId = $form_values['combo4_add'];
                $dist_id = $form_values['combo2_add'];
            }


            $warehouses->setWarehouseName($form_values['store_name_add']);
            $province_id = $this->_em->find('Locations', $form_values['combo1_add']);
            $warehouses->setProvince($province_id);
            $district_id = $this->_em->find('Locations', $dist_id);
            $warehouses->setDistrict($district_id);
            $stakeholder = $this->_em->find('Stakeholders', 1);
            $warehouses->setStakeholder($stakeholder);
            $stakeholder_office = $this->_em->find('Stakeholders', $form_values['office_type_add']);
            $warehouses->setStakeholderOffice($stakeholder_office);
            $location_id = $this->_em->find('Locations', $parentId);
            $warehouses->setLocation($location_id);
            $warehouse_type = $this->_em->find('WarehouseTypes', $form_values['warehouse_type']);
            $warehouses->setWarehouseType($warehouse_type);
            $warehouses->setCcemId($form_values['ccm_warehouse_id']);
            $warehouses->setStatus('1');

            $created_by = $this->_em->find('Users', $this->_userid);
            $warehouses->setCreatedBy($created_by);
            $warehouses->setCreatedDate(App_Tools_Time::now());
            $warehouses->setModifiedBy($created_by);
            $warehouses->setModifiedDate(App_Tools_Time::now());

            $this->_em->persist($warehouses);
            $this->_em->flush();
        }
        $this->_redirect("/iadmin/manage-stores/inventory");
    }

    /**
     * This method Adds store (Routine)
     */
    public function addRoutineAction() {

        if ($this->_request->isPost() && $this->_request->getPost()) {
            $form_values = $this->_request->getPost();

            $warehouses = new Warehouses();
            $parentId = $form_values['combo4_add'];
            $dist_id = $form_values['combo2_add'];

            $warehouses->setWarehouseName($form_values['store_name_add']);
            $province_id = $this->_em->find('Locations', $form_values['combo1_add']);
            $warehouses->setProvince($province_id);
            $district_id = $this->_em->find('Locations', $dist_id);
            $warehouses->setDistrict($district_id);
            $stakeholder = $this->_em->find('Stakeholders', 1);
            $warehouses->setStakeholder($stakeholder);
            $stakeholder_office = $this->_em->find('Stakeholders', 6);
            $warehouses->setStakeholderOffice($stakeholder_office);
            $location_id = $this->_em->find('Locations', $parentId);
            $warehouses->setLocation($location_id);
            $warehouse_type = $this->_em->find('WarehouseTypes', $form_values['warehouse_type']);
            $warehouses->setWarehouseType($warehouse_type);
            $warehouses->setCcemId($form_values['ccm_warehouse_id']);
            $warehouses->setStatus(1);

            $created_by = $this->_em->find('Users', $this->_userid);
            $warehouses->setCreatedBy($created_by);
            $warehouses->setCreatedDate(App_Tools_Time::now());
            $warehouses->setModifiedBy($created_by);
            $warehouses->setModifiedDate(App_Tools_Time::now());

            $this->_em->persist($warehouses);
            $this->_em->flush();
        }
        $this->_redirect("/iadmin/manage-stores/routine");
    }

    /**
     * This method Adds store (Campaigns)
     */
    public function addCampaignsAction() {

        if ($this->_request->isPost() && $this->_request->getPost()) {
            $form_values = $this->_request->getPost();

            $warehouses = new Warehouses();
            $parentId = $form_values['combo4_add'];
            $dist_id = $form_values['combo2_add'];



            $warehouses->setWarehouseName($form_values['store_name_add']);
            $province_id = $this->_em->find('Locations', $form_values['combo1_add']);
            $warehouses->setProvince($province_id);
            $district_id = $this->_em->find('Locations', $dist_id);
            $warehouses->setDistrict($district_id);
            $stakeholder = $this->_em->find('Stakeholders', 10);
            $warehouses->setStakeholder($stakeholder);
            $stakeholder_office = $this->_em->find('Stakeholders', 10);
            $warehouses->setStakeholderOffice($stakeholder_office);
            $location_id = $this->_em->find('Locations', $parentId);
            $warehouses->setLocation($location_id);

            $created_by = $this->_em->find('Users', $this->_userid);
            $warehouses->setCreatedBy($created_by);
            $warehouses->setCreatedDate(App_Tools_Time::now());
            $warehouses->setModifiedBy($created_by);
            $warehouses->setModifiedDate(App_Tools_Time::now());

            $this->_em->persist($warehouses);
            $this->_em->flush();
        }
        $this->_redirect("/iadmin/manage-stores/campaigns");
    }

    /**
     * This method Updates store (Inventory)
     */
    public function updateInventoryAction() {

        if ($this->_request->isPost() && $this->_request->getPost()) {
            $form_values = $this->_request->getPost();

            $warehouses = $this->_em->find('Warehouses', $form_values['wh_id']);
            if ($form_values['office_type_edit'] == 2) {

                $parentId = $form_values['combo1_edit'];
                $dist_id = $form_values['combo1_edit'];
            }

            if ($form_values['office_type_edit'] == 3) {

                $parentId = $form_values['combo1_edit'];
                $dist_id = $form_values['combo1_edit'];
            }

            if ($form_values['office_type_edot'] == 4) {

                $parentId = $form_values['combo2_edit'];
                $dist_id = $form_values['combo2_edit'];
            }
            if ($form_values['office_type_edit'] == 5) {

                $parentId = $form_values['combo3_edit'];
                $dist_id = $form_values['combo2_edit'];
            }
            if ($form_values['office_type_edit'] == 6) {

                $parentId = $form_values['combo4_edit'];
                $dist_id = $form_values['combo2_edit'];
            }
            $warehouses->setWarehouseName($form_values['store_name_update']);
            $province_id = $this->_em->find('Locations', $form_values['combo1_edit']);
            $warehouses->setProvince($province_id);
            $district_id = $this->_em->find('Locations', $dist_id);
            $warehouses->setDistrict($district_id);
            $stakeholder = $this->_em->find('Stakeholders', 1);
            $warehouses->setStakeholder($stakeholder);
            $stakeholder_office = $this->_em->find('Stakeholders', $form_values['office_type_edit']);
            $warehouses->setStakeholderOffice($stakeholder_office);
            $location_id = $this->_em->find('Locations', $parentId);
            $warehouses->setLocation($location_id);

            $warehouse_type = $this->_em->find('WarehouseTypes', $form_values['warehouse_type_update']);
            $warehouses->setWarehouseType($warehouse_type);
            $warehouses->setCcemId($form_values['ccm_warehouse_id_update']);

            $created_by = $this->_em->find('Users', $this->_userid);
            $warehouses->setModifiedBy($created_by);
            $warehouses->setModifiedDate(App_Tools_Time::now());
            $this->_em->persist($warehouses);
            $this->_em->flush();
        }

        $this->_redirect("/iadmin/manage-stores/inventory");
    }

    /**
     * This method Updates store (Routine)
     */
    public function updateRoutineAction() {

        if ($this->_request->isPost() && $this->_request->getPost()) {
            $form_values = $this->_request->getPost();

            $warehouses = $this->_em->find('Warehouses', $form_values['wh_id']);

            $parentId = $form_values['combo4_edit'];
            $dist_id = $form_values['combo2_edit'];

            $warehouses->setWarehouseName($form_values['store_name_update']);
            $province_id = $this->_em->find('Locations', $form_values['combo1_edit']);
            $warehouses->setProvince($province_id);
            $district_id = $this->_em->find('Locations', $dist_id);
            $warehouses->setDistrict($district_id);
            $stakeholder = $this->_em->find('Stakeholders', 1);
            $warehouses->setStakeholder($stakeholder);
            $stakeholder_office = $this->_em->find('Stakeholders', 6);
            $warehouses->setStakeholderOffice($stakeholder_office);
            $location_id = $this->_em->find('Locations', $parentId);
            $warehouses->setLocation($location_id);

            $warehouse_type = $this->_em->find('WarehouseTypes', $form_values['warehouse_type_update']);
            $warehouses->setWarehouseType($warehouse_type);
            $warehouses->setCcemId($form_values['ccm_warehouse_id_update']);


            $created_by = $this->_em->find('Users', $this->_userid);
            $warehouses->setModifiedBy($created_by);
            $warehouses->setModifiedDate(App_Tools_Time::now());
            $this->_em->persist($warehouses);
            $this->_em->flush();
        }
        $this->_redirect("/iadmin/manage-stores/routine");
    }

    /**
     * This method Updates store (Campaigns)
     */
    public function updateCampaignsAction() {

        if ($this->_request->isPost() && $this->_request->getPost()) {
            $form_values = $this->_request->getPost();

            $warehouses = $this->_em->find('Warehouses', $form_values['wh_id']);

            $parentId = $form_values['combo4_edit'];
            $dist_id = $form_values['combo2_edit'];

            $warehouses->setWarehouseName($form_values['store_name_update']);
            $province_id = $this->_em->find('Locations', $form_values['combo1_edit']);
            $warehouses->setProvince($province_id);
            $district_id = $this->_em->find('Locations', $dist_id);
            $warehouses->setDistrict($district_id);
            $stakeholder = $this->_em->find('Stakeholders', 1);
            $warehouses->setStakeholder($stakeholder);
            $stakeholder_office = $this->_em->find('Stakeholders', 10);
            $warehouses->setStakeholderOffice($stakeholder_office);
            $location_id = $this->_em->find('Locations', $parentId);
            $warehouses->setLocation($location_id);

            $created_by = $this->_em->find('Users', $this->_userid);
            $warehouses->setModifiedBy($created_by);
            $warehouses->setModifiedDate(App_Tools_Time::now());
            $this->_em->persist($warehouses);
            $this->_em->flush();
        }

        $this->_redirect("/iadmin/manage-stores/campaigns");
    }

    /**
     * This method Checks Stores
     */
    public function checkStoresAction() {
        $this->_helper->layout->disableLayout();
        $form_values = $this->_request->getPost();

        $warehouses = new Model_Warehouses();
        $warehouses->form_values = $form_values;
        $result = $warehouses->checkWarehouse();
        $this->view->result = $result;
    }

    /**
     * This method Check Stores Inventory
     */
    public function checkStoresInventoryAction() {
        $this->_helper->layout->disableLayout();
        $form_values = $this->_request->getPost();

        $warehouses = new Model_Warehouses();
        $warehouses->form_values = $form_values;
        $result = $warehouses->checkWarehouseInventory();
        $this->view->result = $result;
    }

    /**
     * This method Checks Stores Update
     */
    public function checkStoresUpdateAction() {
        $this->_helper->layout->disableLayout();
        $form_values = $this->_request->getPost();

        $warehouses = new Model_Warehouses();
        $warehouses->form_values = $form_values;
        $result = $warehouses->checkWarehouseUpdate();
        $this->view->result = $result;
    }

    /**
     * This method Checks Stores Update Inventory
     */
    public function checkStoresUpdateInventoryAction() {
        $this->_helper->layout->disableLayout();
        $form_values = $this->_request->getPost();

        $warehouses = new Model_Warehouses();
        $warehouses->form_values = $form_values;
        $result = $warehouses->checkWarehouseInventoryUpdate();
        $this->view->result = $result;
    }

    /**
     * This method Gets Warehouse Types
     */
    public function getWarehouseTypesAction() {
        $this->_helper->layout->disableLayout();

        $geo_level_id = $this->_request->geo_level_id;
        $warehouses = new Model_Warehouses();
        $warehouses->form_values = $geo_level_id;
        $result = $warehouses->getWarehouseType();
        $this->view->data = $result;
    }

    /**
     * This method Checks Ccm Warehouse
     */
    public function checkCcmWarehouseAction() {
        $this->_helper->layout->disableLayout();

        $form_values = $this->_request->getPost();
        $warehouse = new Model_Warehouses();
        $warehouse->form_values = $form_values;
        $result = $warehouse->checkCcmWarehouseId();

        $this->view->result = $result;
    }

    /**
     * This method Checks Ccm Warehouse Update
     */
    public function checkCcmWarehouseUpdateAction() {
        $this->_helper->layout->disableLayout();

        $form_values = $this->_request->getPost();
        $warehouse = new Model_Warehouses();
        $warehouse->form_values = $form_values;
        $result = $warehouse->checkCcmWarehouseIdUpdate();
        $this->view->result = $result;
    }

    /**
     * This method deletes store
     */
    public function deleteAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);

        $warehouse_id = $this->_request->getParam("warehouse_id");
        $warehouse_status = $this->_request->getParam("status");
        $warehouses = $this->_em->getRepository("Warehouses")->find($warehouse_id);

        $msg = "";
        if ($warehouse_status == 1) {
            $warehouses->setStatus(0);
            $msg = 'Store has been de-activated!';
        } else if ($warehouse_status == 0) {
            $warehouses->setStatus(1);
            $msg = 'Store has been activated!';
        }

        $created_by = $this->_em->find('Users', $this->_userid);
        $warehouses->setModifiedBy($created_by);
        $warehouses->setModifiedDate(App_Tools_Time::now());
        $this->_em->persist($warehouses);
        echo $msg;
        return $this->_em->flush();
    }

}
