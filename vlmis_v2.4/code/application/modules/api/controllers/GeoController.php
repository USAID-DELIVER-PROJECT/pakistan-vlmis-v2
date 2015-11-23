<?php

class Api_GeoController extends App_Controller_Base {

    public function init() {
        parent::init();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        $this->_helper->layout()->disableLayout();
    }

    public function indexAction() {
        echo "Hello";
    }

    public function getMosMapDataAction() {

        $year = $this->_request->getParam('year', '');
        $month = $this->_request->getParam('month', '');
        $province = $this->_request->getParam('province', '');
        $district = $this->_request->getParam('district', '');
        $product = $this->_request->getParam('product', '');
        $level = $this->_request->getParam('level', '');
        $type = $this->_request->getParam('type', '');

        $geoModel = new Model_Geo();
        if ($type == 4) {
            $result = $geoModel->getDistrictMos($year, $month, $province, $product, $level);
        } else {
            $result = $geoModel->getTehsilMos($year, $month, $province, $district, $product);
        }

        echo Zend_Json::encode($result);
    }

    public function getAmcMapDataAction() {


        $year = $this->_request->getParam('year', '');
        $month = $this->_request->getParam('month', '');
        $product = $this->_request->getParam('product', '');
        $province = $this->_request->getParam('province', '');
        $district = $this->_request->getParam('district', '');
        $amctype = $this->_request->getParam('type', '');
        $level = $this->_request->getParam('level', '');

        $geoModel = new Model_Geo();
        if ($level == 4) {
            $result = $geoModel->getAmcMapData($year, $month, $product, $province, $amctype);
        } else {
            $result = $geoModel->getAmcTehsilMapData($year, $month, $province, $district, $product, $amctype);
        }

        echo Zend_Json::encode($result);
    }

    public function getReportingRateAction() {


        $year = $this->_request->getParam('year', '');
        $month = $this->_request->getParam('month', '');
        $province = $this->_request->getParam('province', '');
        $district = $this->_request->getParam('district', '');
        $level = $this->_request->getParam('level', '');

        $geoModel = new Model_Geo();

        if ($level == 4) {
            $return = $geoModel->getReportingDistrict($year, $month, $province);
        } else {
            $return = $geoModel->getReportingTehsil($year, $month, $province, $district);
        }


        echo Zend_Json::encode($return);
    }

    public function getWastageMapDataAction() {

        $return = array();
        $year = $this->_request->getParam('year', '');
        $month = $this->_request->getParam('month', '');
        $province = $this->_request->getParam('province', '');
        $district = $this->_request->getParam('district', '');
        $product = $this->_request->getParam('product', '');
        $level = $this->_request->getParam('level', '');

        $geoModel = new Model_Geo();
        $return[0] = $geoModel->getAcceptableWastages($product);
        if ($level == 4) {
            $return[1] = $geoModel->getWastagesDistrict($year, $month, $province, $product);
        } else {
            $return[1] = $geoModel->getWastagesTehsil($year, $month, $province, $district, $product);
        }


        echo Zend_Json::encode($return);
    }

    public function getWastagesVsReportingAction() {

        $return = array();

        $year = $this->_request->getParam('year', '');
        $month = $this->_request->getParam('month', '');
        $province = $this->_request->getParam('province', '');
        $product = $this->_request->getParam('product', '');

        $geoModel = new Model_Geo();
        $return[0] = $geoModel->getWastagesDistrict($year, $month, $province, $product);
        $return[1] = $geoModel->getReportingDistrict($year, $month, $province);

        echo Zend_Json::encode($return);
    }

    public function getExpiryAlertAction() {

        $province = $this->_request->getParam('province', '');
        $product = $this->_request->getParam('product', '');
        $district = $this->_request->getParam('district', '');
        $level = $this->_request->getParam('level', '');

        $geoModel = new Model_Geo();

        if ($level == 4) {
            $return = $geoModel->getExpiryDistrict($province, $product);
        } else {
            $return = $geoModel->getExpiryTehsil($province, $district, $product);
        }

        echo Zend_Json::encode($return);
    }

    public function getVaccineCoverageAction() {


        $year = $this->_request->getParam('year', '');
        $month = $this->_request->getParam('month', '');
        $province = $this->_request->getParam('province', '');
        $district = $this->_request->getParam('district', '');
        $product = $this->_request->getParam('product', '');

        $geoModel = new Model_Geo();
        if ($district != "") {
            $return = $geoModel->getVaccineCoverageTehsil($year, $month, $province, $district, $product);
        } else {
            $return = $geoModel->getVaccineCoverage($year, $month, $province, $product);
        }

        echo Zend_Json::encode($return);
    }

    public function getColdchainCapacityAction() {

        $province = $this->_request->getParam('province', '');
        $district = $this->_request->getParam('district', '');
        $type = $this->_request->getParam('type', '');
        $level = $this->_request->getParam('level', '');

        $geoModel = new Model_Geo();
        if ($level == 4) {
            $return = $geoModel->getColdChainDistrict($province, $type);
        } else {
            $return = $geoModel->getColdchainTehsil($province, $district, $type);
        }



        echo Zend_Json::encode($return);
    }

    public function getColorClassesAction() {
        $id = $this->_request->getParam('id', '');

        $geoModel = new Model_Geo();
        $result = $geoModel->getColorClasses($id);

        echo Zend_Json::encode($result);
    }

    public function getMonthRangeAction() {
        $id = $this->_request->getParam('month', '');
        $geoModel = new Model_Geo();
        $result = $geoModel->getMonthRange($id);
        echo Zend_Json::encode($result);
    }

    public function getReportingRateTrendAction() {

        $year = $this->_request->getParam('year', '');
        $month = $this->_request->getParam('month', '');
        $province = $this->_request->getParam('province', '');
        $district = $this->_request->getParam('district', '');

        $geoModel = new Model_Geo();
        $return = $geoModel->getReportingRateTrend($year, $month, $district);

        echo Zend_Json::encode($return);
    }

    public function getWastagesUcsListAction() {

        $year = $this->_request->getParam('year', '');
        $month = $this->_request->getParam('month', '');
        $product = $this->_request->getParam('product', '');
        $district = $this->_request->getParam('district', '');
        $tehsil = $this->_request->getParam('tehsil', '');
        $province = $this->_request->getParam('province', '');
        $limit = $this->_request->getParam('limit', '');

        $geoModel = new Model_Geo();
        $return = $geoModel->getWastagesUcsList($year, $month, $district, $province, $tehsil, $product, $limit);

        echo Zend_Json::encode($return);
    }

    public function getBatchMapDataAction() {
        $batch = $this->_request->getParam('batch', '');

        $geoModel = new Model_Geo();
        $result = $geoModel->getBatchMapData($batch);

        echo Zend_Json::encode($result);
    }

    public function getStockBatchDetailAction() {

        $product = $this->_request->getParam('product', '');
        $district = $this->_request->getParam('district', '');
        $tehsil = $this->_request->getParam('tehsil', '');

        $geoModel = new Model_Geo();
        if ($district != "") {
            $return = $geoModel->getDistrictStockBatch($district, $product);
        } else {
            $return = $geoModel->getTehsilStockBatch($tehsil, $product);
        }


        echo Zend_Json::encode($return);
    }

    public function getColdChainAssetDetailAction() {

        $district = $this->_request->getParam('district', '');
        $tehsil = $this->_request->getParam('tehsil', '');
        $type = $this->_request->getParam('type', '');

        $geoModel = new Model_Geo();
        if ($district != "") {
            $return = $geoModel->getColdChainAssetDistrict($district, $type);
        } else {
            $return = $geoModel->getColdChainAssetTehsil($tehsil, $type);
        }


        echo Zend_Json::encode($return);
    }

    public function getDemographicMapDataAction() {

        $id = $this->_request->getParam('id', '');
        $district_id = $this->_request->getParam('districtId', '');

        if ($id != "" && $district_id != "") {
            $geoModel = new Model_Geo();
            $return = $geoModel->getDemographicAssests($id, $district_id);
            echo Zend_Json::encode($return);
        } else {
            $return = array();
            $geoModel = new Model_Geo();
            $return[0] = $geoModel->getDemographicMapData();
            $return[1] = $geoModel->getDemographicDetail();

            echo Zend_Json::encode($return);
        }
    }

    public function getDistrictListAction() {

        $province = $this->_request->getParam('province', '');
        $geoModel = new Model_Geo();
        $return = $geoModel->getDistrictList($province);
        echo $return;
    }

    public function getNonReportedUcsAction() {

        $year = $this->_request->getParam('year', '');
        $month = $this->_request->getParam('month', '');
        $province = $this->_request->getParam('province', '');
        $district = $this->_request->getParam('district', '');
        $tehsil = $this->_request->getParam('tehsil', '');

        $geoModel = new Model_Geo();
        if ($district != "") {
            $return = $geoModel->getNonReportedUcsByDistrict($month, $year, $province, $district);
        } else {
            $return = $geoModel->getNonReportedUcsByTehsil($month, $year, $province, $tehsil);
        }

        echo Zend_Json::encode($return);
    }

    public function getUcWiseMosAction() {

        $year = $this->_request->getParam('year', '');
        $month = $this->_request->getParam('month', '');
        $product = $this->_request->getParam('product', '');
        $tehsilId = $this->_request->getParam('tehsilId', '');
        $param = $this->_request->getParam('param', '');
        $type = $this->_request->getParam('type', '');

        $geoModel = new Model_Geo();
        if ($param == 'mos') {
            $return = $geoModel->getUcWiseMos($year, $month, $product, $tehsilId);
        } else {
            $return = $geoModel->getUcWiseConsumption($year, $month, $product, $tehsilId, $type);
        }
        echo Zend_Json::encode($return);
    }

}
