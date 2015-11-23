<?php

class Iadmin_ManageUsersController extends App_Controller_Base {

    public function init() {
        parent::init();
    }

    public function routineUsersAction() {

        $form = new Form_Iadmin_Users();

        $user = new Model_Users();
        $params = array();
        if ($this->_request->isPost()) {

            $form_values = $this->_request->getPost();
            $this->view->combos = $this->_request->getPost();
            $form->province_id->setValue($form_values['combo1']);
            $form->district_id->setValue($form_values['combo2']);
            $form->tehsil_id->setValue($form_values['combo3']);
            $form->parent_id->setValue($form_values['combo4']);

            $sort = $this->_getParam("sort", "asc");
            $order = $this->_getParam("order", "users");
            $user->form_values = $this->_request->getPost();
            $user->form_values['office_type'] = '6';
            $params['office_type'] = '6';
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
            $user->form_values['page'] = 'routine';
            $user->form_values['loc_id'] = $form_values['combo4'];
            $result = $user->getRIUsers($order, $sort);

            //Paginate the contest results
            $paginator = Zend_Paginator::factory($result);
            $page = $this->_getParam("page", 1);
            $counter = $this->_getParam("counter", 10);
            $paginator->setCurrentPageNumber((int) $page);
            $paginator->setItemCountPerPage((int) $counter);
            $this->view->combos_1 = 'routine';
            $this->view->form = $form;
            $this->view->paginator = $paginator;
            $this->view->sort = $sort;
            $this->view->order = $order;
            $this->view->counter = $counter;
            $this->view->pagination_params = $params;
        } else {

            $sort = $this->_getParam("sort", "asc");
            $order = $this->_getParam("order", "asset_sub_type");
            $user->form_values = $this->_request->getParams();
            $params = $this->_request->getParams();
            $this->view->combos = $this->_request->getParams();
            $form->province_id->setValue($this->_getParam('combo1'));
            $form->district_id->setValue($this->_getParam('combo2'));
            $form->tehsil_id->setValue($this->_getParam('combo3'));
            $form->parent_id->setValue($this->_getParam('combo4'));

            $user->form_values['page'] = 'routine';
            $user->form_values['office_type'] = '6';
            $result = $user->getRIUsers($order, $sort);

            //Paginate the contest results
            $paginator = Zend_Paginator::factory($result);
            $page = $this->_getParam("page", 1);
            $counter = $this->_getParam("counter", 10);
            $paginator->setCurrentPageNumber((int) $page);
            $paginator->setItemCountPerPage((int) $counter);
            $this->view->combos_1 = 'routine';
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

    public function updateClusterAction() {

        $form = new Form_Iadmin_UpdateCluster;

        $user = new Model_Users();

        if ($this->_request->isPost()) {
            $form_values = $this->_request->getPost();

            $user_id = $form_values['user'];
            $warehouse = new Model_Warehouses();
            $warehouse_users_id = $warehouse->getWharehouseUsersId($user_id);
            foreach ($warehouse_users_id as $wh_users) {
                $wh_users = $this->_em->find('WarehouseUsers', $wh_users);

                $this->_em->remove($wh_users);
                $this->_em->flush();
            }
            foreach ($form_values['wh'] as $whId) {


                $warehouse_users = new WarehouseUsers();
                $user_id_find = $this->_em->find('Users', $user_id);
                $warehouse_users->setUser($user_id_find);
                $wh_id_find = $this->_em->find('Warehouses', $whId);

                $warehouse_users->setWarehouse($wh_id_find);
                $warehouse_users->setIsDefault('1');
                $this->_em->persist($warehouse_users);
                $this->_em->flush();
            }
            $this->_redirect("/iadmin/manage-users/update-cluster?e=1");
        }

        $this->view->form = $form;
    }

    public function campaignsUsersAction() {

        $form = new Form_Iadmin_Users();
        $user = new Model_Users();
        $params = array();
        if ($this->_request->isPost()) {

            $form_values = $this->_request->getPost();
            // print_r($form_values);
            // exit;
            $this->view->combos = $this->_request->getPost();

            if (!empty($form_values['combo1'])) {
                $form->province_id->setValue($form_values['combo1']);
            }
            if (!empty($form_values['combo2'])) {
                $form->district_id->setValue($form_values['combo2']);
            }
            if (!empty($form_values['combo3'])) {
                $form->tehsil_id->setValue($form_values['combo3']);
            }
            if (!empty($form_values['combo4'])) {
                $form->parent_id->setValue($form_values['combo4']);
            }
            if (!empty($form_values['office_type'])) {
                $params['office_type'] = $form_values['office_type'];
            }
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
            $order = $this->_getParam("order", "username");
            $user->form_values = $this->_request->getPost();
            $user->form_values['page'] = 'campaigns';
            $result = $user->getCampaignUsers($order, $sort);

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
            $order = $this->_getParam("order", "user");

            $user->form_values = $this->_request->getParams();
            $params = $this->_request->getParams();
            $this->view->combos = $this->_request->getParams();
            $form->province_id->setValue($this->_getParam('combo1'));
            $form->district_id->setValue($this->_getParam('combo2'));
            $form->tehsil_id->setValue($this->_getParam('combo3'));
            $form->parent_id->setValue($this->_getParam('combo4'));

            $user->form_values['page'] = 'campaigns';
            //$user->form_values['office_type'] = '4';
            $result = $user->getCampaignUsers($order, $sort);

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
        $this->view->inlineScript()->appendFile($base_url . '/js/stores_combos.js');
        $this->view->inlineScript()->appendFile($base_url . '/js/stores_add_combos.js');
        $this->view->headLink()->appendStylesheet($base_url . '/common/theme/scripts/plugins/tables/DataTables/media/css/DT_bootstrap.css');
    }

    public function imUsersAction() {

        $form = new Form_Iadmin_Users();
        $user = new Model_Users();
        $params = array();
        if ($this->_request->isPost()) {

            $form_values = $this->_request->getPost();
            $this->view->combos = $this->_request->getPost();

            $form->province_id->setValue($form_values['combo1']);
            $form->district_id->setValue($form_values['combo2']);
            $form->tehsil_id->setValue($form_values['combo3']);
            $form->parent_id->setValue($form_values['combo4']);

            $sort = $this->_getParam("sort", "asc");
            $order = $this->_getParam("order", "user");
            $user->form_values = $this->_request->getPost();
            $user->form_values['page'] = 'im';
            $result = $user->getAllImUsers($order, $sort);

            //Paginate the contest results
            $paginator = Zend_Paginator::factory($result);
            $page = $this->_getParam("page", 1);
            $counter = $this->_getParam("counter", 10);
            $paginator->setCurrentPageNumber((int) $page);
            $paginator->setItemCountPerPage((int) $counter);
            $this->view->combos_1 = 'im';
            $this->view->form = $form;
            $this->view->paginator = $paginator;
            $this->view->sort = $sort;
            $this->view->order = $order;
            $this->view->counter = $counter;
        } else {

            $sort = $this->_getParam("sort", "asc");
            $order = $this->_getParam("order", "user");
            $user->form_values = $this->_request->getParams();
            $params = $this->_request->getParams();
            $this->view->combos = $this->_request->getParams();
            $form->province_id->setValue($this->_getParam('combo1'));
            $form->district_id->setValue($this->_getParam('combo2'));
            $form->tehsil_id->setValue($this->_getParam('combo3'));
            $form->parent_id->setValue($this->_getParam('combo4'));
            $user->form_values['page'] = 'im';
            $result = $user->getAllImUsers($order, $sort);

            //Paginate the contest results
            $paginator = Zend_Paginator::factory($result);
            $page = $this->_getParam("page", 1);
            $counter = $this->_getParam("counter", 10);
            $paginator->setCurrentPageNumber((int) $page);
            $paginator->setItemCountPerPage((int) $counter);
            $this->view->combos_1 = 'im';
            $this->view->form = $form;
            $this->view->paginator = $paginator;
            $this->view->sort = $sort;
            $this->view->order = $order;
            $this->view->counter = $counter;
        }
        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/stores_combos.js');
        $this->view->inlineScript()->appendFile($base_url . '/js/stores_add_combos.js');
        $this->view->headLink()->appendStylesheet($base_url . '/common/theme/scripts/plugins/tables/DataTables/media/css/DT_bootstrap.css');
    }

    public function policyUsersAction() {

        $form = new Form_Iadmin_Users();
        $user = new Model_Users();

        if ($this->_request->isPost()) {

            $form_values = $this->_request->getPost();
            $this->view->combos = $this->_request->getPost();

            $form->province_id->setValue($form_values['combo1']);
            $form->district_id->setValue($form_values['combo2']);
            $form->tehsil_id->setValue($form_values['combo3']);
            $form->parent_id->setValue($form_values['combo4']);

            $form->search_policy_users->setValue($form_values['search_policy_users']);
            $sort = $this->_getParam("sort", "asc");
            $order = $this->_getParam("order", "asset_sub_type");
            $user->form_values = $this->_request->getPost();
            $user->form_values['page'] = 'policy';
            $result = $user->getAllPolicyUsers($order, $sort);

            //Paginate the contest results
            $paginator = Zend_Paginator::factory($result);
            $page = $this->_getParam("page", 1);
            $counter = $this->_getParam("counter", 10);
            $paginator->setCurrentPageNumber((int) $page);
            $paginator->setItemCountPerPage((int) $counter);
            $this->view->combos_1 = 'policy';
            $this->view->form = $form;
            $this->view->paginator = $paginator;
            $this->view->sort = $sort;
            $this->view->order = $order;
            $this->view->counter = $counter;
        }


        $sort = $this->_getParam("sort", "asc");
        $order = $this->_getParam("order", "asset_sub_type");
        $user->form_values['page'] = 'policy';
        $result = $user->getAllPolicyUsers($order, $sort);

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

        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/stores_combos.js');
        $this->view->inlineScript()->appendFile($base_url . '/js/stores_add_combos.js');
        $this->view->headLink()->appendStylesheet($base_url . '/common/theme/scripts/plugins/tables/DataTables/media/css/DT_bootstrap.css');
    }

    public function ajaxEditRoutineAction() {
        $this->_helper->layout->setLayout("ajax");
        $wh_id = $this->_request->getParam('wh_id', '');

        $warehouse = new Model_Warehouses();
        $warehouse_users_id = $warehouse->getWharehouseUsersId($wh_id);

        $wh_user_id = $this->_em->find('WarehouseUsers', $warehouse_users_id['0']['pkId']);
        $warehouse_id = $wh_user_id->getWarehouse()->getPkId();
        $whare_id = $this->_em->find('Warehouses', $warehouse_id);

        $users = $this->_em->find('Users', $wh_id);

        $form = new Form_Iadmin_Users();
        $this->view->combos_1 = 'routine';
        $form->warehouse_users_id_edit->setValue($wh_user_id->getPkId());
        $form->default_warehouse_update_hidden->setValue($wh_user_id->getWarehouse()->getPkId());
        $form->user_name_update->setValue($users->getLoginId());
        $form->user_id->setValue($wh_id);
        $form->office_id_edit->setValue($whare_id->getStakeholderOffice()->getPkId());
        if ($whare_id->getStakeholderOffice()->getPkId() != 1) {
            $location_id = $users->getLocation()->getPkId();
            $loc = $this->_em->find('Locations', $location_id);
            $form->province_id_edit->setValue($loc->getProvince()->getPkId());
        }
        $form->district_id_edit->setValue($whare_id->getDistrict()->getPkId());
        if ($whare_id->getStakeholderOffice()->getPkId() == 5) {
            $form->tehsil_id_edit->setValue($whare_id->getLocation()->getPkId());
        }
        if ($whare_id->getStakeholderOffice()->getPkId() == 6) {

            $form->parent_id_edit->setValue($whare_id->getLocation()->getPkId());
            $locations = $this->_em->find('Locations', $whare_id->getLocation()->getPkId());
            $form->tehsil_id_edit->setValue($locations->getParent()->getPkId());
        }
        $this->view->form = $form;

        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/locations_edit_combos.js');
    }

    public function ajaxEditCampaignsAction() {
        $this->_helper->layout->setLayout("ajax");
        $wh_id = $this->_request->getParam('wh_id', '');

        $form = new Form_Iadmin_Users();

        $users = $this->_em->find('Users', $wh_id);
        $locations = $this->_em->find('Locations', $users->getLocation()->getPkId());
        if ($users->getLocation()->getPkId() == 10) {
            $this->view->combos_1 = 'campaigns';
            $form->office_id_edit->setValue('1');
            $form->user_name_update->setValue($users->getLoginId());
            $form->user_id->setValue($wh_id);
        } else if ($locations->getGeoLevel()->getPkId() == 2) {
            $this->view->combos_1 = 'campaigns';
            $form->office_id_edit->setValue('2');
            $form->province_id_edit->setValue($users->getLocation()->getPkId());
            $form->user_name_update->setValue($users->getLoginId());
            $form->user_id->setValue($wh_id);
        } else if ($locations->getGeoLevel()->getPkId() == 4) {

            $this->view->combos_1 = 'campaigns';
            $form->office_id_edit->setValue('4');
            $form->province_id_edit->setValue($locations->getProvince()->getPkId());
            $form->district_id_edit->setValue($users->getLocation()->getPkId());
            $form->user_name_update->setValue($users->getLoginId());
            $form->user_id->setValue($wh_id);
        }
        $this->view->form = $form;

        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/locations_edit_combos.js');
    }

    public function ajaxEditImAction() {
        $this->_helper->layout->setLayout("ajax");
        $wh_id = $this->_request->getParam('wh_id', '');

        $warehouse = new Model_Warehouses();
        $warehouse_users_id = $warehouse->getWharehouseUsersId($wh_id);

        $wh_user_id = $this->_em->find('WarehouseUsers', $warehouse_users_id['0']['pkId']);
        $warehouse_id = $wh_user_id->getWarehouse()->getPkId();
        $whare_id = $this->_em->find('Warehouses', $warehouse_id);

        $users = $this->_em->find('Users', $wh_id);

        $form = new Form_Iadmin_Users();
        $this->view->combos_1 = 'im';
        $form->warehouse_users_id_edit->setValue($wh_user_id->getPkId());
        $form->user_name_update->setValue($users->getLoginId());
        $form->default_warehouse_update_hidden->setValue($wh_user_id->getWarehouse()->getPkId());
        $form->user_id->setValue($wh_id);
        $form->office_id_edit->setValue($whare_id->getStakeholderOffice()->getPkId());
        if ($whare_id->getStakeholderOffice()->getPkId() != 1) {
            $form->province_id_edit->setValue($whare_id->getProvince()->getPkId());
        }
        $form->district_id_edit->setValue($whare_id->getDistrict()->getPkId());
        if ($whare_id->getStakeholderOffice()->getPkId() == 5) {
            $form->tehsil_id_edit->setValue($whare_id->getLocation()->getPkId());
        }
        if ($whare_id->getStakeholderOffice()->getPkId() == 6) {

            $form->parent_id_edit->setValue($whare_id->getLocation()->getPkId());
            $locations = $this->_em->find('Locations', $whare_id->getLocation()->getPkId());
            $form->tehsil_id_edit->setValue($locations->getParent()->getPkId());
        }

        $this->view->form = $form;

        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/locations_edit_combos.js');
    }

    public function ajaxEditImRoleAction() {
        $this->_helper->layout->setLayout("ajax");
        $wh_id = $this->_request->getParam('wh_id', '');

        $warehouse = new Model_Warehouses();
        $warehouse_users_id = $warehouse->getWharehouseUsersId($wh_id);

        $wh_user_id = $this->_em->find('WarehouseUsers', $warehouse_users_id['0']['pkId']);
        $warehouse_id = $wh_user_id->getWarehouse()->getPkId();
        $whare_id = $this->_em->find('Warehouses', $warehouse_id);

        $users = $this->_em->find('Users', $wh_id);

        $form = new Form_Iadmin_Users();
        $form->user_id->setValue($wh_id);
        $this->view->combos_1 = 'im';
        // echo $users->getRole()->getPkId();
        $form->role->setValue($users->getRole()->getPkId());


        $this->view->form = $form;

        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/locations_edit_combos.js');
    }

    public function ajaxEditPolicyAction() {
        $this->_helper->layout->setLayout("ajax");
        $wh_id = $this->_request->getParam('wh_id', '');

        $form = new Form_Iadmin_Users();

        $users = $this->_em->find('Users', $wh_id);
        $locations = $this->_em->find('Locations', $users->getLocation()->getPkId());
        if ($users->getLocation()->getPkId() == 10) {
            $this->view->combos_1 = 'campaigns';
            $form->office_id_edit->setValue('1');
            $form->user_name_update->setValue($users->getLoginId());
            $form->email_update->setValue($users->getEmail());
            $form->phone_update->setValue($users->getCellNumber());
            $form->user_id->setValue($wh_id);
        } else if ($locations->getGeoLevel()->getPkId() == 2) {
            $this->view->combos_1 = 'campaigns';
            $form->office_id_edit->setValue('2');
            $form->province_id_edit->setValue($users->getLocation()->getPkId());
            $form->user_name_update->setValue($users->getLoginId());
            $form->email_update->setValue($users->getEmail());
            $form->phone_update->setValue($users->getCellNumber());
            $form->user_id->setValue($wh_id);
        } else if ($locations->getGeoLevel()->getPkId() == 4) {
            $this->view->combos_1 = 'campaigns';
            $form->office_id_edit->setValue('4');
            $form->province_id_edit->setValue($locations->getProvince()->getPkId());
            $form->district_id_edit->setValue($users->getLocation()->getPkId());
            $form->user_name_update->setValue($users->getLoginId());
            $form->email_update->setValue($users->getEmail());
            $form->phone_update->setValue($users->getCellNumber());
            $form->user_id->setValue($wh_id);
        }
        $form->user_name_update->setAttribs(array('disable' => 'disable'));
        $this->view->form = $form;

        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/locations_edit_combos.js');
    }

    public function addRoutineAction() {

        if ($this->_request->isPost()) {
            if ($this->_request->getPost()) {
                $form_values = $this->_request->getPost();

                $users = new Users();

                $users->setUserName($form_values['user_name_add']);
                $users->setEmail($form_values['email']);
                $users->setCellNumber($form_values['phone']);
                $users->setLoginId($form_values['user_name_add']);
                $users->setPassword(base64_encode($form_values['password']));
                if ($form_values['office_type_add'] != '1') {
                    $location_id = $this->_em->find('Locations', $form_values['combo4_add']);
                    $users->setLocation($location_id);
                }
                $role = $this->_em->find('Roles', 8);
                $users->setRole($role);
                $stakeholder = $this->_em->find('Stakeholders', 1);
                $users->setStakeholder($stakeholder);
                $user = $this->_em->find('Users', $this->_userid);
                $users->setCreatedBy($user);
                $this->_em->persist($users);
                $this->_em->flush();

                $user_id = $users->getPkId();

                $warehouse_users = new WarehouseUsers();
                $wh_id = $this->_em->find('Warehouses', $form_values['default_warehouse']);
                $warehouse_users->setWarehouse($wh_id);
                $user_id_i = $this->_em->find('Users', $user_id);
                $warehouse_users->setUser($user_id_i);
                $warehouse_users->setIsDefault('1');
                $this->_em->persist($warehouse_users);
                $this->_em->flush();
            }
        }
        $this->_redirect("/iadmin/manage-users/routine-users");
    }

    public function addCampaignsAction() {

        if ($this->_request->isPost()) {
            if ($this->_request->getPost()) {
                $form_values = $this->_request->getPost();

                $users = new Users();

                $users->setUserName($form_values['user_name_add']);
                $users->setEmail($form_values['user_name_add']);
                $users->setCellNumber('03423423423');
                $users->setLoginId($form_values['user_name_add']);
                $users->setPassword(base64_encode($form_values['password']));
                if ($form_values['office_type_add'] == '1') {
                    $location_id = '10';
                    $role = $this->_em->find('Roles', 14);
                    $stk_id = Model_Stakeholders::CAMPAIGN;
                }
                if ($form_values['office_type_add'] == '2') {
                    $location_id = $form_values['combo1_add'];
                    $role = $this->_em->find('Roles', 15);
                    $stk_id = Model_Stakeholders::CAMPAIGN;
                }
                if ($form_values['office_type_add'] == '4') {
                    $location_id = $form_values['combo2_add'];
                    $role = $this->_em->find('Roles', 16);
                    $stk_id = 45;
                }

                $loc_id = $this->_em->find('Locations', $location_id);
                $users->setLocation($loc_id);
                $users->setRole($role);
                $stakeholder = $this->_em->find('Stakeholders', $stk_id);
                $users->setStakeholder($stakeholder);
                $user = $this->_em->find('Users', $this->_userid);
                $users->setCreatedBy($user);
                $this->_em->persist($users);
                $this->_em->flush();
                $user_id = $users->getPkId();
                if ($form_values['office_type_add'] == '4') {
                    $warehouses = new Model_Warehouses();
                    $warehouses->form_values = $form_values;
                    $warehouses->form_values['page'] = "campaigns";
                    $warehouse_id = $warehouses->getWarehouseIdByUcId();

                    $count = 1;
                    foreach ($warehouse_id as $wh_id_w) {
                        if ($count == 1) {
                            $default = 1;
                        } else {
                            $default = 0;
                        }
                        $warehouse_users = new WarehouseUsers();
                        $wh_id = $this->_em->find('Warehouses', $wh_id_w);
                        $warehouse_users->setWarehouse($wh_id);
                        $user_id_i = $this->_em->find('Users', $user_id);
                        $warehouse_users->setUser($user_id_i);
                        $warehouse_users->setIsDefault($default);
                        $this->_em->persist($warehouse_users);
                        $this->_em->flush();
                        $count++;
                    }
                }
            }
        }
        $this->_redirect("/iadmin/manage-users/campaigns-users");
    }

    public function addInventoryAction() {

        if ($this->_request->isPost()) {
            if ($this->_request->getPost()) {
                $form_values = $this->_request->getPost();

                $users = new Users();

                $users->setUserName($form_values['user_name_add']);
                $users->setEmail($form_values['email']);
                $users->setCellNumber($form_values['phone']);
                $users->setLoginId($form_values['user_name_add']);
                $users->setPassword(base64_encode($form_values['password']));
                if ($form_values['office_type_add'] == '1') {
                    $location_id = '10';
                    $role_id = '3';
                }
                if ($form_values['office_type_add'] == '2') {
                    $location_id = $form_values['combo1_add'];
                    $role_id = '4';
                }
                if ($form_values['office_type_add'] == '3') {
                    $location_id = $form_values['combo1_add'];
                    $role_id = '5';
                }
                if ($form_values['office_type_add'] == '4') {
                    $location_id = $form_values['combo2_add'];
                    $role_id = '6';
                }
                if ($form_values['office_type_add'] == '5') {
                    $location_id = $form_values['combo3_add'];
                    $role_id = '7';
                }
                $province_id = $this->_em->find('Locations', $location_id);
                $users->setLocation($province_id);
                $role = $this->_em->find('Roles', $role_id);
                $users->setRole($role);
                $stakeholder = $this->_em->find('Stakeholders', 1);
                $users->setStakeholder($stakeholder);
                $user = $this->_em->find('Users', $this->_userid);
                $users->setCreatedBy($user);
                $this->_em->persist($users);
                $this->_em->flush();
                $user_id = $users->getPkId();

                $warehouse_users = new WarehouseUsers();
                $wh_id = $this->_em->find('Warehouses', $form_values['default_warehouse']);
                $warehouse_users->setWarehouse($wh_id);
                $warehouse_users->setIsDefault('1');
                $user_id_i = $this->_em->find('Users', $user_id);
                $warehouse_users->setUser($user_id_i);
                $this->_em->persist($warehouse_users);
                $this->_em->flush();
            }
        }
        $this->_redirect("/iadmin/manage-users/im-users");
    }

    public function addPolicyAction() {

        if ($this->_request->isPost()) {
            if ($this->_request->getPost()) {
                $form_values = $this->_request->getPost();

                $users = new Users();

                if ($form_values['office_type_add'] == '1') {
                    $location_id = '10';
                    $role_id = 17;
                }
                if ($form_values['office_type_add'] == '2' || $form_values['office_type_add'] == '3') {
                    $location_id = $form_values['combo1_add'];
                    $role_id = 19;
                }
                if ($form_values['office_type_add'] == '4') {
                    $location_id = $form_values['combo2_add'];
                    $role_id = 20;
                }
                $province_id = $this->_em->find('Locations', $location_id);
                $users->setLocation($province_id);

                $users->setUserName($form_values['user_name_add']);
                $users->setEmail($form_values['email']);
                $users->setCellNumber($form_values['phone']);
                $users->setLoginId($form_values['user_name_add']);
                $users->setPassword(base64_encode($form_values['password']));
                $role = $this->_em->find('Roles', $role_id);
                $users->setRole($role);
                $stakeholder = $this->_em->find('Stakeholders', 1);
                $users->setStakeholder($stakeholder);
                $user = $this->_em->find('Users', $this->_userid);
                $users->setCreatedBy($user);
                $this->_em->persist($users);
                $this->_em->flush();
            }
        }
        $this->_redirect("/iadmin/manage-users/policy-users");
    }

    public function updateRoutineAction() {

        if ($this->_request->isPost()) {
            if ($this->_request->getPost()) {
                $form_values = $this->_request->getPost();

                $users = $this->_em->find('Users', $form_values['user_id']);

                $users->setUserName($form_values['user_name_update']);
                $users->setEmail($form_values['user_name_update']);
                //$users->setCellNumber('03423423423');
                $users->setLoginId($form_values['user_name_update']);
                if ($form_values['office_type_edit'] != '1') {
                    $province_id = $this->_em->find('Locations', $form_values['combo4_edit']);
                    $users->setLocation($province_id);
                }
                $stakeholder = $this->_em->find('Stakeholders', 9);
                $users->setStakeholder($stakeholder);
                $user = $this->_em->find('Users', $this->_userid);
                $users->setCreatedBy($user);
                $this->_em->persist($users);
                $this->_em->flush();


                $warehouses = new Model_Warehouses();

                $warehouse_users = $this->_em->find('WarehouseUsers', $form_values['warehouse_users_id_edit']);
                $wh_id = $this->_em->find('Warehouses', $form_values['default_warehouse_update']);
                $warehouse_users->setWarehouse($wh_id);
                $user_id_i = $this->_em->find('Users', $form_values['user_id']);
                $warehouse_users->setUser($user_id_i);
                $warehouse_users->setIsDefault('1');
                $this->_em->persist($warehouse_users);
                $this->_em->flush();
            }
        }
        $this->_redirect("/iadmin/manage-users/routine-users");
    }

    public function updateCampaignsAction() {

        if ($this->_request->isPost()) {
            if ($this->_request->getPost()) {
                $form_values = $this->_request->getPost();

                $users = $this->_em->find('Users', $form_values['user_id']);

                $users->setUserName($form_values['user_name_update']);
                $users->setEmail($form_values['user_name_update']);
                $users->setCellNumber('03423423423');
                $users->setLoginId($form_values['user_name_update']);

                if ($form_values['office_type_edit'] == '1') {
                    $role = $this->_em->find('Roles', 14);
                    $location_id = '10';
                }
                if ($form_values['office_type_edit'] == '2') {
                    $role = $this->_em->find('Roles', 15);
                    $location_id = $form_values['combo1_edit'];
                }
                if ($form_values['office_type_edit'] == '4') {
                    $role = $this->_em->find('Roles', 16);
                    $location_id = $form_values['combo2_edit'];
                }

                $loc_id = $this->_em->find('Locations', $location_id);
                $users->setLocation($loc_id);
                $users->setRole($role);
                $stakeholder = $this->_em->find('Stakeholders', 10);
                $users->setStakeholder($stakeholder);
                $user = $this->_em->find('Users', $this->_userid);
                $users->setCreatedBy($user);
                $this->_em->persist($users);
                $this->_em->flush();
                $user_id = $users->getPkId();
                if ($form_values['office_type_edit'] == '4') {

                    $warehouse_users = $this->_em->getRepository("WarehouseUsers")->findBy(array('user' => $form_values['user_id']));

                    foreach ($warehouse_users as $warehouse_users_a) {
                        $wh_id = $this->_em->find('WarehouseUsers', $warehouse_users_a->getPkId());
                        $this->_em->remove($wh_id);
                        $this->_em->flush();
                    }

                    $warehouses = new Model_Warehouses();
                    $warehouses->form_values = $form_values;
                    $warehouses->form_values['page'] = "campaigns";
                    $warehouse_id = $warehouses->getWarehouseIdByUcIdUpdate();

                    foreach ($warehouse_id as $wh_id_w) {
                        $warehouse_users = new WarehouseUsers();
                        $wh_id = $this->_em->find('Warehouses', $wh_id_w);
                        $warehouse_users->setWarehouse($wh_id);
                        $user_id_i = $this->_em->find('Users', $user_id);
                        $warehouse_users->setUser($user_id_i);
                        $this->_em->persist($warehouse_users);
                        $this->_em->flush();
                    }
                }
            }
        }
        $this->_redirect("/iadmin/manage-users/campaigns-users");
    }

    public function updateInventoryAction() {

        if ($this->_request->isPost()) {
            if ($this->_request->getPost()) {
                $form_values = $this->_request->getPost();

                $users = $this->_em->find('Users', $form_values['user_id']);

                $users->setUserName($form_values['user_name_update']);
                $users->setEmail($form_values['user_name_update']);
                $users->setCellNumber('03423423423');
                $users->setLoginId($form_values['user_name_update']);
                if ($form_values['office_type_edit'] == '1') {
                    $location_id = '10';
                }
                if ($form_values['office_type_edit'] == '2' || $form_values['office_type_edit'] == '3') {
                    $location_id = $form_values['combo1_edit'];
                }
                if ($form_values['office_type_edit'] == '4') {
                    $location_id = $form_values['combo2_edit'];
                }
                if ($form_values['office_type_edit'] == '5') {
                    $location_id = $form_values['combo3_edit'];
                }


                $province_id = $this->_em->find('Locations', $location_id);
                $users->setLocation($province_id);

                $stakeholder = $this->_em->find('Stakeholders', 1);
                $users->setStakeholder($stakeholder);
                $user = $this->_em->find('Users', $this->_userid);
                $users->setCreatedBy($user);
                $this->_em->persist($users);
                $this->_em->flush();


                $warehouses = new Model_Warehouses();

                $warehouse_users = $this->_em->find('WarehouseUsers', $form_values['warehouse_users_id_edit']);
                $wh_id = $this->_em->find('Warehouses', $form_values['default_warehouse_update']);
                $warehouse_users->setWarehouse($wh_id);
                $user_id_i = $this->_em->find('Users', $form_values['user_id']);
                $warehouse_users->setUser($user_id_i);
                $warehouse_users->setIsDefault('1');
                $this->_em->persist($warehouse_users);
                $this->_em->flush();
            }
        }
        $this->_redirect("/iadmin/manage-users/im-users");
    }

    public function updateInventoryRoleAction() {

        if ($this->_request->isPost()) {
            if ($this->_request->getPost()) {
                $form_values = $this->_request->getPost();

                $users = $this->_em->find('Users', $form_values['user_id']);

                $role = $this->_em->find('Roles', $form_values['role']);
                $users->setRole($role);

                $this->_em->persist($users);
                $this->_em->flush();
            }
        }
        $this->_redirect("/iadmin/manage-users/im-users");
    }

    public function updatePolicyAction() {

        if ($this->_request->isPost()) {
            $form_values = $this->_request->getPost();
            $users = $this->_em->find('Users', $form_values['user_id']);
            $users->setUserName($form_values['user_name_update']);
            $users->setEmail($form_values['user_name_update']);
            //$users->setCellNumber('03423423423');
            $users->setLoginId($form_values['user_name_update']);
            //$users->setPassword(base64_encode($form_values['password']));

            if ($form_values['office_type_edit'] == '1') {
                $location_id = '10';
            }
            if ($form_values['office_type_edit'] == '2' || $form_values['office_type_edit'] == '3') {
                $location_id = $form_values['combo1_edit'];
            }
            if ($form_values['office_type_edit'] == '4') {
                $location_id = $form_values['combo2_edit'];
            }
            if ($form_values['office_type_edit'] == '5') {
                $location_id = $form_values['combo3_edit'];
            }

            $province_id = $this->_em->find('Locations', $location_id);
            $users->setLocation($province_id);

            $role = $this->_em->find('Roles', 17);
            $users->setRole($role);
            $stakeholder = $this->_em->find('Stakeholders', 1);
            $users->setStakeholder($stakeholder);
            $user = $this->_em->find('Users', $this->_userid);
            $users->setCreatedBy($user);
            $this->_em->persist($users);
            $this->_em->flush();
        }
        $this->_redirect("/iadmin/manage-users/policy-users");
    }

    public function ajaxGetDistrictAction() {
        $this->_helper->layout->disableLayout();
        if (isset($this->_request->province_id) && !empty($this->_request->province_id)) {
            $locations = new Model_Locations();
            $locations->form_values['province_id'] = $this->_request->province_id;
            $array = $locations->districtLocations();
            $this->view->data = $array;
        }
    }

    public function ajaxGetUsersAction() {
        $this->_helper->layout->disableLayout();
        if (isset($this->_request->district_id) && !empty($this->_request->district_id)) {
            $users = new Model_Users();
            $users->form_values['district_id'] = $this->_request->district_id;
            $array = $users->getAllUsersForCluster();
            $this->view->data = $array;
        }
    }

    public function ajaxGetWarehousesAction() {
        $this->_helper->layout->setLayout("ajax");

        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/iadmin/manage-users/ajax-get-warehouses.js');

        $this->view->inlineScript()->appendFile($base_url . '/js/jquery.multi-select.min.js');
        $this->view->headLink()->appendStylesheet($base_url . '/common/theme/css/select.css');
        $this->view->headLink()->appendStylesheet($base_url . '/common/theme/css/multiselect.css');

        $this->view->inlineScript()->appendFile($base_url . '/js/select2.min.js');
        if (isset($this->_request->userId) && !empty($this->_request->userId)) {
            $warehouse = new Model_Warehouses();
            $warehouse->form_values['user_id'] = $this->_request->userId;
            $array = $warehouse->getAllUsersForClusterByUser();
            $this->view->data = $array;
        }

        if (isset($this->_request->district) && !empty($this->_request->district)) {
            $warehouse = new Model_Warehouses();
            $warehouse->form_values['district_id'] = $this->_request->district;
            $array_1 = $warehouse->getAllUsersForClusterByDistrict();
            $this->view->data_district = $array_1;
        }
    }

    public function checkUsersUpdateAction() {
        $this->_helper->layout->disableLayout();
        $form_values = $this->_request->getPost();
        $users = new Model_Users();
        $users->form_values = $form_values;
        $result = $users->checkUsersUpdate();
        $this->view->result = $result;
    }

    public function checkUsersAction() {
        $this->_helper->layout->disableLayout();
        $form_values = $this->_request->getPost();
        $users = new Model_Users();
        $users->form_values = $form_values;
        $result = $users->checkUsers();
        $this->view->result = $result;
    }

    public function checkUsersPolicyAction() {
        $this->_helper->layout->disableLayout();
        $form_values = $this->_request->getPost();
        $users = new Model_Users();
        $users->form_values = $form_values;
        $result = $users->checkUsersPolicy();
        $this->view->result = $result;
    }

    public function checkUsersUpdatePolicyAction() {
        $this->_helper->layout->disableLayout();
        $form_values = $this->_request->getPost();
        $users = new Model_Users();
        $users->form_values = $form_values;
        $result = $users->checkUsersUpdatePolicy();
        $this->view->result = $result;
    }

    public function getDefaultWarehouseAction() {
        $this->_helper->layout->disableLayout();
        $form_values = $this->_request->getPost();
        $warehouse = new Model_Warehouses();
        $warehouse->form_values = $form_values;
        $result = $warehouse->getDefaultWarehouse();
        $this->view->data = $result;
    }

    public function getDefaultWarehouseByLevelAction() {
        $this->_helper->layout->disableLayout();
        $form_values = $this->_request->getPost();
        $warehouse = new Model_Warehouses();
        $warehouse->form_values = $form_values;
        $result = $warehouse->getDefaultWarehouseByLevel();
        $this->view->data = $result;
    }

    public function deleteAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        $user_id = $this->_request->getParam("user_id");
        $users = $this->_em->getRepository("Users")->find($user_id);
        $this->_em->remove($users);
        return $this->_em->flush();
    }

    public function checkOldPasswordAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        $old_password = base64_encode($this->_request->old_password);
        $str_sql = $this->_em->createQueryBuilder()
                ->select("u.password")
                ->from('Users', 'u')
                ->where("u.password ='" . $old_password . "'")
                ->AndWhere("u.pkId='" . $this->_request->user_id . "'");


        $result = $str_sql->getQuery()->getResult();

        if (!empty($result) && count($result) > 0) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function userFeedbackAction() {
        $users = new Model_Users();
        $user_feeadback = $users->getUserFeedback();
        $this->view->result = $user_feeadback;
    }

    public function editUserProfileAction(){

    }

    public function userLoginLogAction() {
        //$this->_helper->layout->setLayout('main');
        $users = new Model_Users();
        $doc_user_log = $users->getUserLoginLog();
        $this->view->result = $doc_user_log;
    }

}
