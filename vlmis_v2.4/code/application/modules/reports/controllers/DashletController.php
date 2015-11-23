<?php

require_once 'FusionCharts/Code/PHP/Includes/FusionCharts.php';

class Reports_DashletController extends App_Controller_Base {

    public function init() {
        parent::init();
        $this->_helper->layout->setLayout("dashlets");
    }

    /**
     * Inventory Management Dashlet
     */
    public function stockStatusAction() {
        $params = array();
        $dashlet = new Model_Dashlets();
        $params["level"] = $this->_request->getParam("level");
        $params["prov_id"] = $this->_request->getParam("province");
        $params["loc_id"] = $this->_request->getParam("district");
        $params["date"] = $this->_request->getParam("date");
        list($yy, $mm) = explode("-", $this->_request->getParam("date"));

        $dashlet->form_values = $params;
        $this->view->result = $dashlet->stockStatus();
        $this->view->monthyear = date('F, Y', mktime(0, 0, 0, $mm, 1, $yy));
    }

    /**
     * Routine Immunization Dashlet Late
     */
    public function stockStatusRoutineAction() {
        $item = new Model_ItemPackSizes();
        $this->view->items = $item->getAllItems();

        $wh_data = new Model_WarehousesData();
        $params["date"] = "2014-05";
        $params["item"] = 3;
        $wh_data->form_values = $params;
        $xmlstore = $wh_data->stockStatusRoutine();
        $this->view->xmlstore = $xmlstore;
        $this->view->date = $params["date"];
        $this->view->item = $params["item"];
    }

    public function ajaxStockStatusRoutineAction() {
        $this->_helper->layout->disableLayout();

        $params = array();
        $date = $this->_request->getParam("date");
        $item = $this->_request->getParam("item");
        if (!empty($date)) {
            $params["date"] = $date;
        } else {
            $params["date"] = "2014-05";
        }
        $params["item"] = $item;

        $wh_data = new Model_WarehousesData();
        $wh_data->form_values = $params;
        $xmlstore = $wh_data->stockStatusRoutine();
        $this->view->xmlstore = $xmlstore;
    }

    /**
     * Main Dashboard Dashlet
     */
    public function reportedWastagesAction() {
        $item = new Model_ItemPackSizes();
        $this->view->items = $item->getAllItems();

        $level = $this->_request->getParam("level");
        $province = $this->_request->getParam("province");
        $district = $this->_request->getParam("district");
        $period = $this->_request->getParam("period");
        $date = $this->_request->getParam("date");
        $item = $this->_request->getParam("item");

        $wh_data = new Model_WarehousesData();
        $params["date"] = $date;
        $params["item"] = $item;
        $params["level"] = $level;

        $wh_data->form_values = $params;

        if ($level == 1) {
            $graphs = new Model_Graphs();
            $location = new Model_Locations();
            $provinces = $location->getPilotProvinces();
            foreach ($provinces as $row) {
                $graphs->form_values = array(
                    'products' => array($item),
                    'yearcomp' => array($date),
                    'all_provinces' => $row['pk_id'],
                    'all_districts' => '',
                    'period' => $period
                );
                $xmlstore[] = $graphs->MSGraphReportedWastage();
            }

            $this->view->xmlstore = $xmlstore;
        }
        if ($level == 2) {
            $xmlstore1 = $wh_data->getWastagesByDistricts($province);
            $this->view->xmlstore1 = $xmlstore1;
        }
        if ($level == 6) {
            $wh_data->form_values['prov_id'] = $province;
            $wh_data->form_values['dist_id'] = $district;

            $xmlstore61 = $wh_data->wastagesRate();
            $xmlstore62 = $wh_data->reportingRate();
            $this->view->xmlstore61 = $xmlstore61;
            $this->view->xmlstore62 = $xmlstore62;
        }

        $this->view->level = $level;
    }

    public function illegalWastagesAction() {
        $level = $this->_request->getParam("level");
        $province = $this->_request->getParam("province");
        $district = $this->_request->getParam("district");
        $period = $this->_request->getParam("period");
        $date = $this->_request->getParam("date");
        $item = $this->_request->getParam("item");

        $obj_item = new Model_ItemPackSizes();
        $items = $obj_item->getProductById($item);
        $allowed = $items->getWastageRateAllowed();

        $wh_data = new Model_WarehousesData();
        $params["date"] = $date;
        $params["item"] = $item;
        $params["allowed"] = $allowed;
        $params["province"] = $province;
        $wh_data->form_values = $params;

        $xmlstore = $wh_data->illegalWastages();
        $this->view->xmlstore = $xmlstore;
    }

    public function wastagesComparisonAction() {
        $province = $this->_request->getParam("province");
        $district = $this->_request->getParam("district");
        $date = $this->_request->getParam("date");
        $item = $this->_request->getParam("item");

        $obj_product = new Model_ItemPackSizes();
        $prod_result = $obj_product->getProductById($item);
        $allowed = $prod_result->getWastageRateAllowed();
        $first = round($allowed / 3);
        $second = round($first * 2);

        $combo = array(
            "0-$first" => "0 to $first%",
            "$first-$second" => "$first% to $second%",
            "$second-$allowed" => "$second% to $allowed%",
            "N" => "more then $allowed%"
        );

        $wh_data = new Model_WarehousesData();
        $wh_data->form_values = array(
            'prov_id' => $province,
            'dist_id' => $district,
            'date' => $date,
            'item' => $item,
            'option' => "N",
            'allowed' => $allowed
        );
        $xmlstore = $wh_data->wastagesComparison();
        $this->view->xmlstore = $xmlstore;
        $this->view->combo = $combo;
    }

    public function ajaxWastagesComparisonAction() {
        $province = $this->_request->getParam("province");
        $district = $this->_request->getParam("district");
        $date = $this->_request->getParam("date");
        $item = $this->_request->getParam("item");
        $option = $this->_request->getParam("allowed");

        $obj_product = new Model_ItemPackSizes();
        $prod_result = $obj_product->getProductById($item);
        $allowed = $prod_result->getWastageRateAllowed();

        $wh_data = new Model_WarehousesData();
        $wh_data->form_values = array(
            'prov_id' => $province,
            'dist_id' => $district,
            'date' => $date,
            'item' => $item,
            'option' => $option,
            'allowed' => $allowed
        );
        $xmlstore = $wh_data->wastagesComparison();
        $this->view->xmlstore = $xmlstore;
    }

    public function reportedWastageAction() {
        $item = new Model_ItemPackSizes();
        $this->view->items = $item->getAllItems();

        $level = $this->_request->getParam("level");
        $province = $this->_request->getParam("province");
        $district = $this->_request->getParam("district");
        $period = $this->_request->getParam("period");
        $date = $this->_request->getParam("date");
        $item = $this->_request->getParam("item");

        $wh_data = new Model_WarehousesData();
        $params["date"] = $date;
        $params["item"] = $item;
        $params["level"] = $level;

        $wh_data->form_values = $params;

        if ($level == 2) {
            $xmlstore1 = $wh_data->getWastagesByDistricts($province);
            $this->view->xmlstore1 = $xmlstore1;
        }
        if ($level == 6) {
            $wh_data->form_values['prov_id'] = $province;
            $wh_data->form_values['dist_id'] = $district;

            $xmlstore61 = $wh_data->wastagesRate();
            $xmlstore62 = $wh_data->reportingRate();
            $this->view->xmlstore61 = $xmlstore61;
            $this->view->xmlstore62 = $xmlstore62;
        }

        $this->view->level = $level;
    }

    public function reportedNonReportedAction() {
        $district = $this->_request->getParam("district");
        $date = $this->_request->getParam("date");
        $item = $this->_request->getParam("item");

        $wh_data = new Model_WarehousesData();
        $params["date"] = $date;
        $params["item"] = $item;

        $params["loc_id"] = $district;
        $wh_data->form_values = $params;
        $xmlstore = $wh_data->reportedNonReported();
        $data = $wh_data->getReportedLocation();
        $this->view->data = $data;
        $this->view->xmlstore = $xmlstore;
    }

    public function ajaxReportedNonReportedAction() {
        $data_arr = explode('|', $this->_request->getParam('param'));
        $district = $data_arr[0];
        $item = $data_arr[1];
        $date = $data_arr[2];
        $type = $data_arr[3];

        $wh_data = new Model_WarehousesData();
        $params["date"] = $date;
        $params["item"] = $item;
        $params["loc_id"] = $district;
        $wh_data->form_values = $params;

        if ($type == 1) {
            $data = $wh_data->getReportedLocation();
        } else {
            $data = $wh_data->getNonReportedLocation();
        }

        $this->view->data = $data;
        $this->view->type = $type;
    }

    public function stockStatusByItemAction() {
        $district = $this->_request->getParam("district");
        $province = $this->_request->getParam("province");
        $date = $this->_request->getParam("date");
        $item = $this->_request->getParam("item");
        $level = $this->_request->getParam("level");

        $warehouse = new Model_Locations();
        $warehouse->form_values = array(
            'level' => $level,
            'prov_id' => $province,
            'loc_id' => $district
        );
        $wh_id = $warehouse->getWarehouseByLevel();

        $wh_data = new Model_WarehousesData();
        $params["date"] = $date;
        $params["item"] = $item;
        $params["wh_id"] = $wh_id;

        $wh_data->form_values = $params;
        $xmlstore = $wh_data->stockStatusByItem();
        $this->view->xmlstore = $xmlstore;

        $data = $wh_data->getReceiveWarehouses();
        $this->view->data = $data;
    }

    public function ajaxStockStatusByItemAction() {
        $data_arr = explode('|', $this->_request->getParam('param'));
        $wh_id = $data_arr[0];
        $item = $data_arr[1];
        $date = $data_arr[2];
        $type = $data_arr[3];

        $wh_data = new Model_WarehousesData();
        $params["date"] = $date;
        $params["item"] = $item;
        $params["wh_id"] = $wh_id;
        $wh_data->form_values = $params;

        if ($type == 1) {
            $data = $wh_data->getReceiveWarehouses();
        } else {
            $data = $wh_data->getIssueWarehouses();
        }

        $this->view->data = $data;
        $this->view->type = $type;
    }

    public function vvmStageStatusAction() {
        $district = $this->_request->getParam("district");
        $province = $this->_request->getParam("province");
        $date = $this->_request->getParam("date");
        $item = $this->_request->getParam("item");
        $level = $this->_request->getParam("level");

        $warehouse = new Model_Locations();
        $warehouse->form_values = array(
            'level' => $level,
            'prov_id' => $province,
            'loc_id' => $district
        );
        $wh_id = $warehouse->getWarehouseByLevel();

        $wh_data = new Model_WarehousesData();
        $params["date"] = $date;
        $params["item"] = $item;
        $params["wh_id"] = $wh_id;
        $params["type"] = 1;

        $wh_data->form_values = $params;
        $xmlstore = $wh_data->vvmStageStatus();
        $this->view->xmlstore = $xmlstore;

        $data = $wh_data->vvmStageStatusByVvmStage();
        $this->view->data = $data;
    }

    public function ajaxVvmStageStatusAction() {
        $data_arr = explode('|', $this->_request->getParam('param'));
        $wh_id = $data_arr[0];
        $item = $data_arr[1];
        $date = $data_arr[2];
        $type = $data_arr[3];

        $wh_data = new Model_WarehousesData();
        $params["date"] = $date;
        $params["item"] = $item;
        $params["wh_id"] = $wh_id;
        $params["type"] = $type;
        $wh_data->form_values = $params;

        $data = $wh_data->vvmStageStatusByVvmStage();

        $this->view->data = $data;
        $this->view->type = $type;
    }

    public function reportedNonReportedProvinceAction() {

        $province = $this->_request->getParam("province");
        $date = $this->_request->getParam("date");
        $item = $this->_request->getParam("item");

        $wh_data = new Model_WarehousesData();
        $params["date"] = $date;
        $params["item"] = $item;
        $params["province"] = $province;

        $wh_data->form_values = $params;
        $xmlstore = $wh_data->reportedNonReportedByProvince();
        $this->view->xmlstore = $xmlstore;

        $caption = "Districts Reporting Rate By Union Councils";
        $xml = $wh_data->getReportedLocationProvince();
        $xmlstore2 = "<chart yAxisMaxValue='100' exportEnabled='1' exportAction='Download' caption='$caption' exportFileName='Reporting Status " . date('Y-m-d H:i:s') . "' numberSuffix='%' showValues='1' theme='fint'>";
        foreach ($xml as $row) {
            $xmlstore2 .= "<set label='$row[districtName]' value='$row[perVal]' />";
        }
        $xmlstore2 .= "</chart>";

        $this->view->xmlstore2 = $xmlstore2;
    }

    public function ajaxReportedNonReportedProvinceAction() {
        $data_arr = explode('|', $this->_request->getParam('param'));
        $province = $data_arr[0];
        $item = $data_arr[1];
        $date = $data_arr[2];
        $type = $data_arr[3];

        $wh_data = new Model_WarehousesData();
        $params["date"] = $date;
        $params["item"] = $item;
        $params["province"] = $province;
        $wh_data->form_values = $params;

        if ($type == 1) {
            $caption = "Districts Reporting Rate By Union Councils";
            $xml = $wh_data->getReportedLocationProvince();
        } else {
            $caption = "Districts Non Reporting Rate By Union Councils";
            $xml = $wh_data->getNonReportedLocationProvince();
        }

        $xmlstore = "<chart yAxisMaxValue='100' exportEnabled='1' exportAction='Download' caption='$caption' exportFileName='Reporting Status " . date('Y-m-d H:i:s') . "' numberSuffix='%' showValues='1' theme='fint'>";
        foreach ($xml as $row) {
            $xmlstore .= "<set label='$row[districtName]' value='$row[perVal]' />";
        }
        $xmlstore .= "</chart>";

        $this->view->xmlstore = $xmlstore;
    }

    public function consumptionAmcAction() {
        $item = new Model_ItemPackSizes();
        $this->view->items = $item->getAllItems();

        $period = $this->_request->getParam("period");
        $date = $this->_request->getParam("date");
        $item = $this->_request->getParam("item");

        $graphs = new Model_Graphs();
        $location = new Model_Locations();
        $provinces = $location->getPilotProvinces();
        foreach ($provinces as $row) {
            $graphs->form_values = array(
                'products' => array($item),
                'yearcomp' => array($date),
                'all_provinces' => $row['pk_id'],
                'all_districts' => '',
                'optvals' => 2,
                'period' => $period
            );
            $xmlstore[] = $graphs->MSGraphOptionYear();
        }

        $this->view->xmlstore = $xmlstore;
    }

    public function consumptionMosAction() {
        $item = new Model_ItemPackSizes();
        $this->view->items = $item->getAllItems();

        $period = $this->_request->getParam("period");
        $date = $this->_request->getParam("date");
        $item = $this->_request->getParam("item");

        $graphs = new Model_Graphs();
        $location = new Model_Locations();
        $provinces = $location->getPilotProvinces();
        foreach ($provinces as $row) {
            $graphs->form_values = array(
                'products' => array($item),
                'yearcomp' => array($date),
                'all_provinces' => $row['pk_id'],
                'all_districts' => '',
                'optvals' => 2,
                'period' => $period
            );
            $xmlstore[] = $graphs->getMSGraphConsMOS();
        }

        $this->view->xmlstore = $xmlstore;
    }

    public function getSohAction() {
        $item = new Model_ItemPackSizes();
        $this->view->items = $item->getAllItems();

        $wh_data = new Model_WarehousesData();
        $params["date"] = $this->_request->getParam("date");
        $params["item"] = $this->_request->getParam("item");
        $level = $this->_request->getParam("level");
        $province = $this->_request->getParam("province");

        $wh_data->form_values = $params;

        if ($level == 1) {
            $xmlstore = $wh_data->getSOH();
        } else {
            $xmlstore = $wh_data->getSOHByDistricts($province);
        }
        $this->view->xmlstore = $xmlstore;
    }

    public function getMosDistrictsAction() {
        $item = new Model_ItemPackSizes();
        $this->view->items = $item->getAllItems();

        $wh_data = new Model_WarehousesData();
        $params["date"] = $this->_request->getParam("date");
        $params["item"] = $this->_request->getParam("item");
        $wh_data->form_values = $params;
        $xmlstore = $wh_data->getMOSDistricts();
        $this->view->xmlstore = $xmlstore;
    }

    public function getSohDistrictsAction() {
        $item = new Model_ItemPackSizes();
        $this->view->items = $item->getAllItems();

        $wh_data = new Model_WarehousesData();
        $params["date"] = $this->_request->getParam("date");
        $params["item"] = $this->_request->getParam("item");
        $wh_data->form_values = $params;
        $xmlstore = $wh_data->getSOH();
        $this->view->xmlstore = $xmlstore;
    }

    public function getMosAction() {
        $wh_data = new Model_WarehousesData();
        $params["date"] = $this->_request->getParam("date");
        $params["item"] = $this->_request->getParam("item");
        $level = $this->_request->getParam("level");
        $province = $this->_request->getParam("province");
        $district = $this->_request->getParam("district");

        $mos_scale = new Model_MosScale();
        $mos_scale->form_values = array(
            'item' => $this->_request->getParam("item"),
            'level' => 6
        );
        $combo = $mos_scale->getMosScaleByItem();

        $limit = $combo[0]['keyy'];
        list($start, $end) = explode("-", $limit);
        $params["start"] = $start;
        $params["end"] = $end;
        $wh_data->form_values = $params;

        switch ($level) {
            case 1:
                $xmlstore = $wh_data->getMOS();
                break;
            case 2:
                $xmlstore = $wh_data->getMOSByDistricts($province);
                break;
            case 6:
                $xmlstore = $wh_data->getMOSByUc($district);
                break;
        }

        $this->view->xmlstore = $xmlstore;
        $this->view->combo = $combo;
    }

    public function ajaxGetMosAction() {

        $wh_data = new Model_WarehousesData();
        $params["date"] = $this->_request->getParam("date");
        $params["item"] = $this->_request->getParam("item");
         $params["province"] = $this->_request->getParam("province");
        $level = $this->_request->getParam("level");
        $province = $this->_request->getParam("province");
        $district = $this->_request->getParam("district");
        $limit = $this->_request->getParam("limit");

        list($start, $end) = explode("-", $limit);
        $params["start"] = $start;
        $params["end"] = $end;
        $wh_data->form_values = $params;

        switch ($level) {
            case 1:
                $xmlstore = $wh_data->getMOS();
                break;
            case 2:
                $xmlstore = $wh_data->getMOSByDistricts($province);
                break;
            case 6:
                $xmlstore = $wh_data->getMOSByUc($district);
                break;
        }

        $this->view->xmlstore = $xmlstore;
    }

    public function getAmcAction() {
        $item = new Model_ItemPackSizes();
        $this->view->items = $item->getAllItems();

        $wh_data = new Model_WarehousesData();
        $params["date"] = $this->_request->getParam("date");
        $params["item"] = $this->_request->getParam("item");
        $level = $this->_request->getParam("level");
        $province = $this->_request->getParam("province");
        $district = $this->_request->getParam("district");

        $wh_data->form_values = $params;

        switch ($level) {
            case 1:
                $xmlstore = $wh_data->getAMC();
                break;
            case 2:
                $xmlstore = $wh_data->getAMCByDistricts($province);
                break;
            case 6:
                $xmlstore = $wh_data->getAMCByUc($district);
                break;
        }

        $this->view->xmlstore = $xmlstore;
    }

    public function getConsumptionAction() {
        $item = new Model_ItemPackSizes();
        $this->view->items = $item->getAllItems();

        $wh_data = new Model_WarehousesData();
        $params["date"] = $this->_request->getParam("date");
        $params["item"] = $this->_request->getParam("item");
        $params["province"] = $this->_request->getParam("province");
        $level = $this->_request->getParam("level");
        $province = $this->_request->getParam("province");
        $district = $this->_request->getParam("district");

        $locations = new Model_Locations();
        $locations->form_values = array(
            'parent_id' => $district,
            'geo_level_id' => 5
        );
        $combo = $locations->getLocationsByLevelByTehsil();

        $role_id = $this->_identity->getRoleId();

        if ($role_id == 7) {
            $params["teh_id"] = $this->_identity->getTehsilId();
        } else {
            $params["teh_id"] = $combo[0]['key'];
        }

        $wh_data->form_values = $params;

        switch ($level) {
            case 1:
                $xmlstore = $wh_data->getConsumption();
                $this->view->xmltype = "Column2D.swf";
                break;
            case 2:
                $xmlstore = $wh_data->getConsumptionByDistricts($province);
                $this->view->xmltype = "MSCombi2D.swf";
                break;
            case 6:
                $xmlstore = $wh_data->getConsumptionByUc($district);
                $this->view->xmltype = "MSCombi2D.swf";
                break;
        }

        $this->view->xmlstore = $xmlstore;
        $this->view->combo = $combo;
        $this->view->level = $level;
    }

    public function ajaxGetConsumptionAction() {
        $wh_data = new Model_WarehousesData();
        $params["date"] = $this->_request->getParam("date");
        $params["item"] = $this->_request->getParam("item");
        $level = $this->_request->getParam("level");
        $province = $this->_request->getParam("province");
        $district = $this->_request->getParam("district");
        $tehsil = $this->_request->getParam("teh_id");
        $params["teh_id"] = $tehsil;

        $wh_data->form_values = $params;

        switch ($level) {
            case 1:
                $xmlstore = $wh_data->getConsumption();
                $this->view->xmltype = "Column2D.swf";
                break;
            case 2:
                $xmlstore = $wh_data->getConsumptionByDistricts($province);
                $this->view->xmltype = "MSCombi2D.swf";
                break;
            case 6:
                $xmlstore = $wh_data->getConsumptionByUc($district);
                $this->view->xmltype = "MSCombi2D.swf";
                break;
        }

        $this->view->xmlstore = $xmlstore;
    }

    /**
     * Inventory Management Dashlet
     */
    public function stockIssueAction() {
        $item = new Model_ItemPackSizes();
        $this->view->items = $item->getAllItems();

        $wh_data = new Model_WarehousesData();

        $date = $this->_request->getParam("date");
        $item = $this->_request->getParam("item");
        $params["level"] = $this->_request->getParam("level");
        $params["loc_id"] = $this->_request->getParam("district");
        $params["prov_id"] = $this->_request->getParam("province");

        if (!empty($date)) {
            $params["date"] = $date;
        } else {
            $params["date"] = Zend_Registry::get('report_month');
        }
        if (!empty($item)) {
            $params["item"] = $item;
        } else {
            $params["item"] = 6;
        }

        $wh_data->form_values = $params;
        $xmlstore = $wh_data->stockIssue();
        $this->view->xmlstore = $xmlstore;
        $this->view->date = $params["date"];
        $this->view->item = $params["item"];
    }

    public function ajaxStockIssueAction() {
        $this->_helper->layout->disableLayout();

        $params = array();
        $date = $this->_request->getParam("date");
        $item = $this->_request->getParam("item");
        $params["level"] = $this->_request->getParam("level");
        $params["loc_id"] = $this->_request->getParam("district");
        $params["prov_id"] = $this->_request->getParam("province");

        if (!empty($date)) {
            $params["date"] = $date;
        } else {
            $params["date"] = Zend_Registry::get('report_month');
        }
        if (!empty($item)) {
            $params["item"] = $item;
        } else {
            $params["item"] = 6;
        }

        $wh_data = new Model_WarehousesData();
        $wh_data->form_values = $params;
        $xmlstore = $wh_data->stockIssue();
        $this->view->xmlstore = $xmlstore;
    }

    /**
     * Inventory Management Dashlet Late
     */
    public function stockReceiveAction() {
        $item = new Model_ItemPackSizes();
        $this->view->items = $item->getAllItems();

        $wh_data = new Model_WarehousesData();
        $params["date"] = "2014-05";
        $params["item"] = 6;
        $params["loc_id"] = $this->_request->getParam("district");

        $wh_data->form_values = $params;
        $xmlstore = $wh_data->stockReceive();
        $this->view->xmlstore = $xmlstore;
        $this->view->date = $params["date"];
        $this->view->item = $params["item"];
    }

    public function ajaxStockReceiveAction() {
        $this->_helper->layout->disableLayout();

        $params = array();
        $date = $this->_request->getParam("date");
        $item = $this->_request->getParam("item");
        $params["loc_id"] = $this->_request->getParam("district");

        if (!empty($date)) {
            $params["date"] = $date;
        } else {
            $params["date"] = "2014-05";
        }
        $params["item"] = $item;

        $wh_data = new Model_WarehousesData();
        $wh_data->form_values = $params;
        $xmlstore = $wh_data->stockReceive();
        $this->view->xmlstore = $xmlstore;
    }

    /**
     * Routine Immunization Dashlet Late
     */
    public function wastagesRateAction() {
        $item = new Model_ItemPackSizes();
        $this->view->items = $item->getAllItems();

        $wh_data = new Model_WarehousesData();
        $params["date"] = "2014-05";
        $params["item"] = 6;
        $wh_data->form_values = $params;
        $xmlstore = $wh_data->wastagesRate();
        $this->view->xmlstore = $xmlstore;
        $this->view->date = $params["date"];
        $this->view->item = $params["item"];
    }

    public function ajaxWastagesRateAction() {
        $this->_helper->layout->disableLayout();

        $params = array();
        $date = $this->_request->getParam("date");
        $item = $this->_request->getParam("item");
        if (!empty($date)) {
            $params["date"] = $date;
        } else {
            $params["date"] = "2014-05";
        }
        $params["item"] = $item;

        $wh_data = new Model_WarehousesData();
        $wh_data->form_values = $params;
        $xmlstore = $wh_data->wastagesRate();
        $this->view->xmlstore = $xmlstore;
    }

    /**
     * Routine Immunization Dashlet Late
     */
    public function reportingRateAction() {
        for ($i = 1; $i <= 6; $i++) {
            $months[] = date("Y-m", strtotime(date('Y-m-01') . " -$i months"));
        }

        $dashlet = new Model_Dashlets();
        $dashlet->form_values = array_reverse($months);
        $this->view->result = $dashlet->reportingRate();
        $this->view->months = array_reverse($months);
        //  App_Controller_Functions::pr($this->view->result);
    }

    /**
     * Routine Immunization Dashlet Late
     */
    public function stockPositionAction() {
        $wh_data = new Model_WarehousesData();
        $xmlstore = $wh_data->stockPosition();
        $this->view->xmlstore = $xmlstore;
    }

    /**
     * Campaign Management Dashlet
     */
    public function dayWiseCoverageAction() {
        $campaign = new Model_Campaigns();
        $this->view->campaigns = $campaign->getAllCampaigns();
        $location = new Model_Locations();
        $this->view->provinces = $location->getProvincesName();

        $wh_data = new Model_WarehousesData();
        $params["level"] = $this->_request->getParam("level");
        $params["loc_id"] = $this->_request->getParam("district");
        $params["prov_id"] = $this->_request->getParam("province");
        $params["camp"] = $this->_request->getParam('camp');
        $wh_data->form_values = $params;
        $xmlstore = $wh_data->dayWiseCoverage();
        $this->view->xmlstore = $xmlstore;
        $this->view->camp = $params["camp"];
        $this->view->prov = $params["prov"];
    }

    /**
     * Campaign Management Dashlet
     */
    public function differentMissedTypesAction() {
        $campaign = new Model_Campaigns();
        $this->view->campaigns = $campaign->getAllCampaigns();

        $wh_data = new Model_WarehousesData();
        $params["level"] = $this->_request->getParam("level");
        $params["loc_id"] = $this->_request->getParam("district");
        $params["prov_id"] = $this->_request->getParam("province");
        $params["camp"] = $this->_request->getParam('camp');
        $wh_data->form_values = $params;
        $xmlstore = $wh_data->differentMissedTypes();
        $this->view->xmlstore = $xmlstore;
        $this->view->camp = $params["camp"];
    }

    /**
     * Campaign Management Dashlet
     */
    public function dataEntryStatusAction() {
        $wh_data = new Model_WarehousesData();
        $params["level"] = $this->_request->getParam("level");
        $params["loc_id"] = $this->_request->getParam("district");
        $params["prov_id"] = $this->_request->getParam("province");
        $params["camp"] = $this->_request->getParam('camp');
        $wh_data->form_values = $params;
        $xmlstore = $wh_data->dataEntryStatus();
        $this->view->xmlstore = $xmlstore;
    }

    /**
     * Campaign Management Dashlet
     */
    public function campaignVaccinesAction() {
        $dashlet = new Model_Dashlets();
        $params["level"] = $this->_request->getParam("level");
        $params["loc_id"] = $this->_request->getParam("district");
        $params["prov_id"] = $this->_request->getParam("province");
        $params["camp"] = $this->_request->getParam('camp');
        $dashlet->form_values = $params;
        $this->view->result = $dashlet->campaignVaccines();
    }

    /**
     * Cold Chain Equipment Management Dashlet
     */
    public function facilityStatsAction() {
        echo "Dashlet five display here";
    }

    /**
     * Cold Chain Equipment Management Dashlet
     */
    public function refrigeratorFreezerTypeAction() {
        echo "Dashlet five display here";
    }

    /**
     * Cold Chain Equipment Management Dashlet
     */
    public function assetsStatsAction() {
        echo "Dashlet five display here";
    }

    /**
     * Cold Chain Equipment Management Dashlet
     */
    public function modeOfVaccineSuppliesAction() {
        echo "Dashlet five display here";
    }

    /**
     * Cold Chain Equipment Management Dashlet
     */
    public function healthFacilityStatsAction() {
        echo "Dashlet five display here";
    }

    /**
     * Maps Dashlet
     */
    public function monthOfStockAction() {
        $base_url = Zend_Registry::get('baseurl');
        $this->view->headScript()->appendFile($base_url . '/js/OpenLayers-2.13/OpenLayers.js');
        $form = new Form_Maps_Mos();
        $form->province->setValue($this->_identity->getProvinceId());
        $prov_id = $this->_identity->getProvinceId();
        $form->product->setValue('6');
        $this->view->form = $form;
        $baseurl = Zend_Registry::get('baseurl');

        $this->view->inlineScript()->prependScript('var prov_id = "' . $prov_id . '"');
        $this->view->inlineScript()->appendFile($baseurl . '/js/reports/dashlet/month-of-stock2.js');
        //  $this->view->inlineScript()->appendFile($baseurl . '/js/reports/dashlet/FilterArea.js');
    }

    public function expiryScheduleAction() {

        $level = $this->_request->getParam('level');
        $this->view->level = $level;

        switch ($level) {
            case 2:
                $params["loc_id"] = $this->_request->getParam('province');
                break;
            case 6:
                $params["loc_id"] = $this->_request->getParam('district');
                break;
        }
        $item = $this->_request->getParam('item');

        $wh_data = new Model_WarehousesData();
        $params["item"] = $item;
        $params["level"] = $level;
        $wh_data->form_values = $params;
        $xmlstore = $wh_data->getExpirySchedule();
        $this->view->xmlstore = $xmlstore;

        $title = "Stock Expiring in <= 6 Months";
        $wh_data = new Model_WarehousesData();
        $params["level"] = $level;
        $params["item_id"] = $item;
        $params["type"] = 1;
        $wh_data->form_values = $params;
        $data = $wh_data->getExpiryScheduleByType();

        $this->view->data = $data;
        $this->view->title = $title;
    }

    public function ajaxExpiryScheduleAction() {
        $data_arr = explode('|', $this->_request->getParam('param'));
        $location = $data_arr[0];
        $item = $data_arr[1];
        $level = $data_arr[2];
        $type = $data_arr[3];

        if ($type == 1) {
            $title = "Stock Expiring in <= 6 Months";
        } else if ($type == 2) {
            $title = "Stock Expiring in <= 12 Months";
        } else if ($type == 3) {
            $title = "Stock Expiring in <= 18 Months";
        } else if ($type == 4) {
            $title = "Stock Expiring in > 18 Months";
        }

        $wh_data = new Model_WarehousesData();
        $params["level"] = $level;
        $params["item_id"] = $item;
        $params["loc_id"] = $location;
        $params["type"] = $type;
        $wh_data->form_values = $params;
        $data = $wh_data->getExpiryScheduleByType();

        $this->view->data = $data;
        $this->view->type = $type;
        $this->view->title = $title;
    }

    public function ccCapacityAction() {
        $base_url = Zend_Registry::get('baseurl');
        $this->view->headScript()->appendFile($base_url . '/js/OpenLayers-2.13/OpenLayers.js');
        $form = new Form_Maps_Mos();
        $form->province->setValue($this->_identity->getProvinceId());
        $form->coldchain_type->setValue("1");
        $prov_id = $this->_identity->getProvinceId();
        $this->view->form = $form;

        $baseurl = Zend_Registry::get('baseurl');

        $this->view->inlineScript()->prependScript('var prov_id = "' . $prov_id . '"');
        $this->view->inlineScript()->appendFile($baseurl . '/js/reports/dashlet/cc-capacity2.js');
    }

    public function vaccineStorageCapacityAt2to8Action() {
        $this->_helper->layout->disableLayout();
        $ccm_warehouse = new Model_CcmWarehouses();

        $form_values['office'] = $this->_request->getParam('level', '');
        $form_values['combo1'] = $this->_request->getParam('province', '');
        $form_values['combo2'] = $this->_request->getParam('district', '');

        $ccm_warehouse->form_values = $form_values;
        $data_arr = $ccm_warehouse->vaccineStorageCapacityAt2to8Graph();

        $main_heading = "Vaccine storage capacity at +2c to +8c";
        $str_sub_heading = "";
        $number_prefix = "";
        $number_suffix = "%";
        $s_number_prefix = "";

        $xmlstore = "<?xml version=\"1.0\"?>";
        $xmlstore .='<chart caption="' . $main_heading . '" numberprefix="' . $number_prefix . '" showvalues="0" exportEnabled="1" rotateValues="1" theme="fint">';

        $categories = '<categories>';
        $dataset_1 = '<dataset seriesname="Surplus > 30%" >';
        $dataset_2 = '<dataset seriesname="Surplus 10-30%" >';
        $dataset_3 = '<dataset seriesname="Match +/- 30%" >';
        $dataset_4 = '<dataset seriesname="Shortage 10-30%" >';
        $dataset_5 = '<dataset seriesname="Shortage > 30%" >';

        foreach ($data_arr as $sub_arr) {
            $categories .='<category label="' . $sub_arr['FacilityType'] . '" />';
            $dataset_1 .= '<set value="' . $sub_arr['surplus30'] . '" />';
            $dataset_2 .= '<set value="' . $sub_arr['surplus1030'] . '" />';
            $dataset_3 .= '<set value="' . $sub_arr['match10'] . '" />';
            $dataset_4 .= '<set value="' . $sub_arr['shortage1030'] . '" />';
            $dataset_5 .= '<set value="' . $sub_arr['shortage30'] . '" />';
        }

        $categories .='</categories>';
        $dataset_1 .= '</dataset>';
        $dataset_2 .= '</dataset>';
        $dataset_3 .= '</dataset>';
        $dataset_4 .= '</dataset>';
        $dataset_5 .= '</dataset>';

        $xmlstore .= $categories;
        $xmlstore .= $dataset_1;
        $xmlstore .= $dataset_2;
        $xmlstore .= $dataset_3;
        $xmlstore .= $dataset_4;
        $xmlstore .= $dataset_5;

        $xmlstore .="</chart>";

        $this->view->main_heading = $main_heading;
        $this->view->str_sub_heading = $str_sub_heading;
        $this->view->chart_type = "StackedColumn2DLine";
        $this->view->xmlstore = $xmlstore;
        $this->view->width = '100%';
        $this->view->height = '400';
    }

    public function vaccineStorageCapacityAt20Action() {
        $this->_helper->layout->disableLayout();
        $ccm_warehouse = new Model_CcmWarehouses();

        $form_values['office'] = $this->_request->getParam('level', '');
        $form_values['combo1'] = $this->_request->getParam('province', '');
        $form_values['combo2'] = $this->_request->getParam('district', '');

        $ccm_warehouse->form_values = $form_values;
        $data_arr = $ccm_warehouse->vaccineStorageCapacityAt20Graph();

        $main_heading = "Vaccine storage capacity at -20c";
        $str_sub_heading = "";
        $number_prefix = "";
        $number_suffix = "%";
        $s_number_prefix = "";

        $xmlstore = "<?xml version = \"1.0\"?>";
        $xmlstore = "<?xml version=\"1.0\"?>";
        $xmlstore .='<chart caption="' . $main_heading . '" numberprefix="' . $number_prefix . '" showvalues="0" exportEnabled="1" rotateValues="1" theme="fint">';

        $categories = '<categories>';
        $dataset_1 = '<dataset seriesname="Surplus > 30%" >';
        $dataset_2 = '<dataset seriesname="Surplus 10-30%" >';
        $dataset_3 = '<dataset seriesname="Match +/- 30%" >';
        $dataset_4 = '<dataset seriesname="Shortage 10-30%" >';
        $dataset_5 = '<dataset seriesname="Shortage > 30%" >';

        foreach ($data_arr as $sub_arr) {
            $categories .='<category label="' . $sub_arr['FacilityType'] . '" />';
            $dataset_1 .= '<set value="' . $sub_arr['surplus30'] . '" />';
            $dataset_2 .= '<set value="' . $sub_arr['surplus1030'] . '" />';
            $dataset_3 .= '<set value="' . $sub_arr['match10'] . '" />';
            $dataset_4 .= '<set value="' . $sub_arr['shortage1030'] . '" />';
            $dataset_5 .= '<set value="' . $sub_arr['shortage30'] . '" />';
        }

        $categories .='</categories>';
        $dataset_1 .= '</dataset>';
        $dataset_2 .= '</dataset>';
        $dataset_3 .= '</dataset>';
        $dataset_4 .= '</dataset>';
        $dataset_5 .= '</dataset>';

        $xmlstore .= $categories;
        $xmlstore .= $dataset_1;
        $xmlstore .= $dataset_2;
        $xmlstore .= $dataset_3;
        $xmlstore .= $dataset_4;
        $xmlstore .= $dataset_5;

        $xmlstore .="</chart>";

        $this->view->xmlstore = $xmlstore;
        $this->view->main_heading = $main_heading;
        $this->view->str_sub_heading = $str_sub_heading;
        $this->view->chart_type = 'StackedColumn2DLine';
        $this->view->width = '100%';
        $this->view->height = '400';
    }

    public function icepackFreezingCapacityAgainstRoutineRequirementsAction() {
        $this->_helper->layout->disableLayout();
        $ccm_warehouse = new Model_CcmWarehouses();
        $form_values['office'] = $this->_request->getParam('level', '');
        $form_values['combo1'] = $this->_request->getParam('province', '');
        $form_values['combo2'] = $this->_request->getParam('district', '');

        $ccm_warehouse->form_values = $form_values;
        $data_arr = $ccm_warehouse->icepackFreezingCapacityAgainstSIARequirementsGraph();

        $main_heading = "Icepack freezing capacity";
        $str_sub_heading = "";
        $number_prefix = "";
        $number_suffix = "%";
        $s_number_prefix = "";

        $xmlstore = "<?xml version = \"1.0\"?>";
        $xmlstore = "<?xml version=\"1.0\"?>";
        $xmlstore .='<chart caption="' . $main_heading . '" numberprefix="' . $number_prefix . '" showvalues="0" exportEnabled="1" rotateValues="1" theme="fint">';

        $categories = '<categories>';
        $dataset_1 = '<dataset seriesname="Surplus > 30%" >';
        $dataset_2 = '<dataset seriesname="Surplus 10-30%" >';
        $dataset_3 = '<dataset seriesname="Match +/- 30%" >';
        $dataset_4 = '<dataset seriesname="Shortage 10-30%" >';
        $dataset_5 = '<dataset seriesname="Shortage > 30%" >';
        //App_Controller_Functions::pr($data_arr );
        foreach ($data_arr as $sub_arr) {
            $categories .='<category label="' . $sub_arr['FacilityType'] . '" />';
            $dataset_1 .= '<set value="' . $sub_arr['surplus30'] . '" />';
            $dataset_2 .= '<set value="' . $sub_arr['surplus1030'] . '" />';
            $dataset_3 .= '<set value="' . $sub_arr['match10'] . '" />';
            $dataset_4 .= '<set value="' . $sub_arr['shortage1030'] . '" />';
            $dataset_5 .= '<set value="' . $sub_arr['shortage30'] . '" />';
        }

        $categories .='</categories>';
        $dataset_1 .= '</dataset>';
        $dataset_2 .= '</dataset>';
        $dataset_3 .= '</dataset>';
        $dataset_4 .= '</dataset>';
        $dataset_5 .= '</dataset>';

        $xmlstore .= $categories;
        $xmlstore .= $dataset_1;
        $xmlstore .= $dataset_2;
        $xmlstore .= $dataset_3;
        $xmlstore .= $dataset_4;
        $xmlstore .= $dataset_5;

        $xmlstore .="</chart>";

        $this->view->xmlstore = $xmlstore;

        $this->view->main_heading = $main_heading;
        $this->view->str_sub_heading = $str_sub_heading;
        $this->view->chart_type = 'StackedColumn2DLine';
        $this->view->width = '100%';
        $this->view->height = '400';
    }

    /**
     * Cold Chain Equipment Management Dashlet
     */
    public function coldChainCapacityAction() {
        $this->_helper->layout->setLayout("layout");
        $graphs = new Model_Graphs();
        $to_date = $this->_request->getPost('to_date');
        if (empty($to_date)) {
            $to_date = $this->_request->getParam('to_date', date("d/m/Y"));
        }
        $graphs->form_values['to_date'] = $to_date;
        $this->view->to_date = $to_date;
        $xmlstore1 = $graphs->coldChainCapacity(1);
        $this->view->xmlstore1 = $xmlstore1;
        $xmlstore2 = $graphs->coldChainCapacity(3);
        $this->view->xmlstore2 = $xmlstore2;
        $this->view->data = $graphs->coldChainCapacity(2);
        $this->view->warehousename = $this->_identity->getWarehouseName();
    }

    public function coldChainCapacityPrintAction() {
        $this->_helper->layout->setLayout("print");
        $graphs = new Model_Graphs();
        $to_date = $this->_request->getPost('to_date');
        if (empty($to_date)) {
            $to_date = $this->_request->getParam('to_date', date("d/m/Y"));
        }
        $graphs->form_values['to_date'] = $to_date;
        $this->view->data = $graphs->coldChainCapacity(2);
        $this->view->warehousename = $this->_identity->getWarehouseName();
    }

    public function coldChainCapacityProductAction() {
        $this->_helper->layout->setLayout("layout");
        $graphs = new Model_Graphs();
        $to_date = $this->_request->getPost('to_date');
        if (empty($to_date)) {
            $to_date = $this->_request->getParam('to_date', date("d/m/Y"));
        }
        $graphs->form_values['to_date'] = $to_date;
        $this->view->to_date = $to_date;
        $xmlstore1 = $graphs->coldChainCapacityProduct(1);
        $this->view->xmlstore1 = $xmlstore1;
        //$xmlstoresummary = $graphs->coldChainCapacityProductSummary(16);
        //$this->view->xmlstoresummary = $xmlstoresummary;
        $xmlstore2 = $graphs->coldChainCapacityProduct(3);
        $this->view->xmlstore2 = $xmlstore2;
        $this->view->warehousename = $this->_identity->getWarehouseName();
        $this->view->data = $graphs->coldChainCapacityProduct(2);

        $base_url = Zend_Registry::get("baseurl");
        $this->view->inlineScript()->appendFile($base_url . '/js/reports/dashlet/cold-chain-capacity.js');
    }

    public function coldChainCapacityVvmAction() {
        $this->_helper->layout->setLayout("layout");
        $graphs = new Model_Graphs();
        $to_date = $this->_request->getPost('to_date');
        if (empty($to_date)) {
            $to_date = $this->_request->getParam('to_date', date("d/m/Y"));
        }
        $graphs->form_values['to_date'] = $to_date;
        $this->view->to_date = $to_date;
        $xmlstore1 = $graphs->coldChainCapacityVvm(1);
        $this->view->xmlstore1 = $xmlstore1;
        $xmlstore2 = $graphs->coldChainCapacityVvm(3);
        $this->view->xmlstore2 = $xmlstore2;
        $this->view->warehousename = $this->_identity->getWarehouseName();
        $this->view->data = $graphs->coldChainCapacityVvm(2);

        $base_url = Zend_Registry::get("baseurl");
        $this->view->inlineScript()->appendFile($base_url . '/js/reports/dashlet/cold-chain-capacity.js');
    }

}
