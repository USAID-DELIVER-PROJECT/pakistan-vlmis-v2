<?php

class DashboardController extends App_Controller_Base {

    public function init() {
        parent::init();
    }

    public function indexAction() {
        
        $auth = App_Auth::getInstance();
        $role_id = $auth->getRoleId();

        $campaign = new Model_Campaigns();
        $location = new Model_Locations();

        // National Level
        if ($role_id == 3 || $role_id == 23 || $role_id == 26 || $role_id == 27) {
            $this->view->level = 1;
        }

        // Provincial Level
        if ($role_id == 4 || $role_id == 23) {
            $this->view->level = 2;
            $province = $this->_identity->getProvinceId();
            $this->view->province = $province;
        }
        // 6 - District Level, 20 - Policy District User
        if ($role_id == 6 || $role_id == 7 || $role_id == 20 || $role_id == 21 || $role_id == 23) {
            $this->view->level = 6;
            $province = $this->_identity->getProvinceId();
            $district = $this->_identity->getDistrictId();
            $this->view->province = $province;
            $this->view->district = $district;
        }
        // National Campaign
        if ($role_id == 14 || $role_id == 23) {
            $province = 1;
            $this->view->province = $province;
            $district = 33;
            $this->view->district = $district;
        }
        // Provincial Campaign
        if ($role_id == 15 || $role_id == 23) {
            $province = $this->_identity->getUserLocationId();
            $this->view->province = $province;
        }
        // District Campaign
        if ($role_id == 16 || $role_id == 23) {
            $province = $this->_identity->getUserProvinceId();
            $district = $this->_identity->getUserLocationId();
            $this->view->province = $province;
            $this->view->district = $district;
        }
        if ($role_id == 17 || $role_id == 18 || $role_id == 23 || $role_id == 25 || $role_id == 26 || $role_id == 28 || $role_id == 29) {
            $province = 1;
            $district = 33;
            $this->view->province = $province;
            $this->view->district = $district;
            $this->view->level = 1;
        }
        if ($role_id == 27) {
            $province = 2;
            $district = 87;
            $this->view->province = $province;
            $this->view->district = $district;
            $this->view->level = 1;
        }
        if ($role_id == 30) {

            $province = $this->_identity->getProvinceId();
            $district = $this->_identity->getDistrictId();
            $this->view->province = $province;
            $this->view->district = $district;
            $this->view->level = 1;
        }

        if ($role_id == 31) {
            $province = 4;
            $district = 80;
            $this->view->province = $province;
            $this->view->district = $district;
            $this->view->level = 1;
        }
        $sel_lvl = $this->_request->getParam("office");
        if (!empty($sel_lvl)) {
            $level = $sel_lvl;
            $this->view->level = $level;
        }

        $sel_prov = $this->_request->getParam("combo1");
        if (!empty($sel_prov)) {
            $province = $sel_prov;
            $this->view->province = $province;
        }

        if ($role_id == 3 && empty($province)) {
            $province = 1;
            $this->view->province = $province;
        }

        $sel_dist = $this->_request->getParam("combo2");
        if (!empty($sel_dist)) {
            $district = $sel_dist;
            $this->view->district = $district;
        }

        if ($role_id == 3 && empty($district)) {
            $district = 33;
            $this->view->district = $district;
        }

        if ($role_id == 4 && empty($district)) {
            $location->form_values = array(
                'geo_level_id' => 4,
                'province_id' => $province
            );
            $res = $location->getLocationsByLevelByProvince();
            $district = $res[0]['key'];
            $this->view->district = $district;
        }

        switch ($level) {
            case 1:
                $this->view->campaigns = $campaign->getAllCampaigns();
                break;
            case 2:
                $location->form_values = array("province_id" => $province);
                $dists = $location->districtLocations();
                foreach ($dists as $dist) {
                    $arr_dist[] = $dist['pk_id'];
                }
                $campaign->form_values = array("districts" => implode(",", $arr_dist));
                $this->view->campaigns = $campaign->getCampaignsByDistrict();
                break;
            case 6:
                $campaign->form_values = array("districts" => $district);
                $this->view->campaigns = $campaign->getCampaignsByDistrict();
                break;
            default:
                $this->view->campaigns = $campaign->getAllCampaigns();
                break;
        }

        $this->view->provinces = $location->getProvincesName();
        $item = new Model_ItemPackSizes();
        $this->view->items = $item->getAllVaccines();

        // Default Filters for IM
        $this->view->item = 6;
        $this->view->date = Zend_Registry::get('report_month');

        // Default Filters for Campaign
        $this->view->camp = 23;

        $this->view->user_role = $role_id;
        $this->view->prov = $this->_identity->getProvinceId();

        $r = $this->_request->getParam("ri_btn", '');
        if ($r == 'ri') {
            $this->view->r = $r;
            $this->view->item = $this->_request->getParam("items", '');
            $this->view->date = $this->_request->getParam("date", '');
            $this->view->period = $this->_request->getParam("period", '');
        }
        $i = $this->_request->getParam("im_btn", '');
        if ($i == 'im') {
            $this->view->i = $i;
            $this->view->item = $this->_request->getParam("items", '');
            $this->view->date = $this->_request->getParam("date", '');
            $this->view->period = $this->_request->getParam("period", '');
        }
        $c = $this->_request->getParam("camp_btn", '');
        if ($c == 'camp') {
            $this->view->c = $c;
            $this->view->camp = $this->_request->getParam("camp", '');
            $this->view->prov = $this->_request->getParam("prov", '');
        }

        $role_resource = new Model_RoleResources();
        $role_resource->form_values = array('type_id' => 3, 'role_id' => $role_id);
        $dashboards = $role_resource->getRoleResourcesByType();

        $this->view->dashboards = $dashboards;
        $this->view->ri = 472;
        $this->view->im = 330;
        $this->view->campaign = 333;

        $period = new Model_Period();
        $time_intervals = $period->getTimeIntervals();

        $this->view->time_intervals = $time_intervals;
        $this->view->quarter = Model_Period::QUARTER;
        $this->view->halfyear = Model_Period::HALFYEAR;
        $this->view->annual = Model_Period::ANNUAL;

        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/all_level_area_combo.js');

        if ($role_id == 4 || $role_id == 5 || $role_id == 6 || $role_id == 7) {
            $stock_master = new Model_StockMaster();
            $this->view->pending_receive = $stock_master->getPendingReceive();
            $this->view->warehouse_name = $auth->getWarehouseName();
        }

        $this->view->id = $this->_request->getParam("id", $dashboards[0]->getResource()->getPkId());

        /* if ($role_id == 7) {
          $this->view->province = $this->_identity->getProvinceId();
          $this->renderScript("dashboard/user-tehsil.phtml");
          } */
    }

    public function provinceAction() {

        $auth = App_Auth::getInstance();
        $role_id = $auth->getRoleId();

        $this->view->level = 2;
        $this->view->province = $this->_identity->getProvinceId();


        $province = $this->_request->getParam("combo1", 1);
        if (!empty($province) && $province != 'null') {
            $this->view->province = $province;
        }

        $campaign = new Model_Campaigns();
        $location = new Model_Locations();

        $location->form_values = array("province_id" => $province);
        $dists = $location->districtLocations();
        foreach ($dists as $dist) {
            $arr_dist[] = $dist['pk_id'];
        }
        $campaign->form_values = array("districts" => implode(",", $arr_dist));
        $this->view->campaigns = $campaign->getCampaignsByDistrict();

        $this->view->provinces = $location->getProvincesName();
        $item = new Model_ItemPackSizes();
        $this->view->items = $item->getAllItems();

        // Default Filters for IM
        $this->view->item = 6;
        $this->view->date = Zend_Registry::get('report_month');

        // Default Filters for Campaign
        $this->view->camp = 23;

        $this->view->user_role = $role_id;
        $this->view->prov = $this->_identity->getProvinceId();

        $r = $this->_request->getParam("ri_btn", '');
        if ($r == 'ri') {
            $this->view->r = $r;
            $this->view->item = $this->_request->getParam("items", '');
            $this->view->date = $this->_request->getParam("date", '');
            $this->view->period = $this->_request->getParam("period", '');
        }
        $i = $this->_request->getParam("im_btn", '');
        if ($i == 'im') {
            $this->view->i = $i;
            $this->view->item = $this->_request->getParam("items", '');
            $this->view->date = $this->_request->getParam("date", '');
            $this->view->period = $this->_request->getParam("period", '');
        }
        $c = $this->_request->getParam("camp_btn", '');
        if ($c == 'camp') {
            $this->view->c = $c;
            $this->view->camp = $this->_request->getParam("camp", '');
            $this->view->prov = $this->_request->getParam("prov", '');
        }

        $role_resource = new Model_RoleResources();
        $role_resource->form_values = array('type_id' => 3, 'role_id' => $role_id);
        $dashboards = $role_resource->getRoleResourcesByType();

        $this->view->dashboards = $dashboards;
        $this->view->ri = 472;
        $this->view->im = 330;
        $this->view->campaign = 333;

        $period = new Model_Period();
        $time_intervals = $period->getTimeIntervals();

        $this->view->time_intervals = $time_intervals;
        $this->view->quarter = Model_Period::QUARTER;
        $this->view->halfyear = Model_Period::HALFYEAR;
        $this->view->annual = Model_Period::ANNUAL;

        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/all_level_area_combo.js');
    }

}
