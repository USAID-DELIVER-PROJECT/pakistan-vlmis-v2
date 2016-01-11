<?php

class Reports_CcemController extends App_Controller_Base {

    public function init() {
        parent::init();
    }

    public function indexAction() {
        // action body
    }

    public function totalPopulationByFacilityTypeAction() {
        //ccem 4.4.1
        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        $ccm_warehouse = new Model_CcmWarehouses();
        if ($this->_request->isPost()) {
            if ($search_form->isValid($this->_request->getPost())) {
                //$ccm_warehouse->form_values['office'] = (!empty($this->_request->combo1))?($this->_request->combo1):($this->_request->office);
                $ccm_warehouse->form_values['office'] = (!empty($this->_request->combo1)) ? ($this->_request->combo1) : 0;
                $data_arr = $ccm_warehouse->getTotalPopulationByFacilityType();
            }
        }

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell>Federal</cell>";
            $xmlstore .= "<cell><![CDATA[" . $sub_arr['FacilityType'] . "]]></cell>";
            $xmlstore .= "<cell>" . $sub_arr['NoOfFacilities'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Minimum'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Maximum'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Mean1'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Total population by facility type";
        $this->view->headers = 'Area,Facility Type,No. of Facilities,Minimum,Maximum,Mean';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '120,*,150,150,150,150';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->data = $data_arr;
        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/all_level_area_combo_report_graph.js');
    }

    public function refrigeratorByModelFacilityTypeAction() {
        //ccem 4.4.15

        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        //$ccm_warehouse = new Model_CcmWarehouses();
        //$data_arr = $ccm_warehouse->getTotalPopulationByFacilityType();
        $data_arr = array(
            0 => array(
                'FacilityType' => 'National Vaccine Store',
                'Total' => '4',
                'CFCFree' => '0',
                'CFCFreePer' => '0.00',
                'NonCFCFree' => '4',
                'NonCFCFreePer' => '100.00',
                'Unknown' => '0',
                'UnknownPer' => '0.00',
            )
        );

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell>Federal</cell>";
            $xmlstore .= "<cell><![CDATA[" . $sub_arr['FacilityType'] . "]]></cell>";
            $xmlstore .= "<cell>" . $sub_arr['Total'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['CFCFree'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['CFCFreePer'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['NonCFCFree'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['NonCFCFreePer'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Unknown'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['UnknownPer'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Distribution of CFC-free equipment by facility type";
        $this->view->headers = 'Area,Facility Type,Total,CFC Free #,CFC Free %,Non CFC Free #,Non CFC Free %,Unknown #, Unknown %';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '120,*,120,120,120,120,120,120,120';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->data = $data_arr;
    }

    public function annualCCCostsByFacilityTypeAction() {
        //ccem 4.4.16

        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        //$ccm_warehouse = new Model_CcmWarehouses();
        //$data_arr = $ccm_warehouse->getTotalPopulationByFacilityType();
        $data_arr = array(
            0 => array(
                'FacilityType' => 'National Vaccine Store',
                'Total' => '4',
                'GasCost' => '0',
                'AvgGasCost' => '0.00',
                'KeroseneCost' => '4',
                'AvgKeroseneCost' => '100.00',
                'ElectricityCost' => '0',
                'AvgElectricityCost' => '0.00',
            )
        );

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell><![CDATA[" . $sub_arr['FacilityType'] . "]]></cell>";
            $xmlstore .= "<cell>" . $sub_arr['Total'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['GasCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['AvgGasCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['KeroseneCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['AvgKeroseneCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['ElectricityCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['AvgElectricityCost'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Annual cold chain running costs by facility type";
        $this->view->headers = 'Facility Type,No of Facilities,Gas Cost,Gas Average Cost,Kerosene Cost,Kerosene Average Cost,Electricity Cost,Electricity Average Cost';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*,*,*,*,*,*,*,*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->data = $data_arr;
    }

    public function storageCapacityByArea4cAction() {
        //ccem 4.4.4
        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        $ccm_warehouse = new Model_CcmWarehouses();
        $form_values['facility_type'] = $this->_request->getParam('facility_type', '');
        $form_values['office'] = $this->_request->getParam('office', '');
        $form_values['combo1'] = $this->_request->getParam('combo1', '');
        $form_values['combo2'] = $this->_request->getParam('combo2', '');
        if ($this->_request->isPost()) {
            if ($search_form->isValid($this->_request->getPost())) {
                $form_values = array_merge($form_values, $search_form->getValues());
                $ccm_warehouse->form_values = $form_values;
                $data_arr = $ccm_warehouse->getStorageCapacityByArea4c();
            }
        }

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell>" . $sub_arr['Province'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['District'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['warehouse_type_name'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['cap4'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['req4'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['diff4'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['surplus30'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['surplus1030'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['match10'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['shortage1030'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['shortage30'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Capacity shortages 4c by area";
        $this->view->headers = 'Province,District,Facility Type,Net Storage (Ltr) Actual,Net Storage (Ltr) Required,Net Storage (Ltr) Difference, Surplus > 30%, Surplus 10-30%,Match +/- 10%, Shortage 10-30%,Shortage >30%';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*,*,*,*,*,*,*,*,*,*,*';
        $this->view->aligns = 'left,left,left,right,right,right,right,right,right,right,right,right';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro';
        $this->view->aligns = 'left,left,left,right,right,right,right,right,right,right,right,right';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->data = $data_arr;
        $search_form->facility_type->setValue($form_values['facility_type']);
        $this->view->form_values = $form_values;

        $this->view->inlineScript()->appendFile(Zend_Registry::get('baseurl') . '/js/all_level_area_combo_report_graph.js');
    }

    public function storageCapacityByArea20cAction() {
        //ccem 4.4.6
        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        $ccm_warehouse = new Model_CcmWarehouses();
        $form_values['facility_type'] = $this->_request->getParam('facility_type', '');
        $form_values['office'] = $this->_request->getParam('office', '');
        $form_values['combo1'] = $this->_request->getParam('combo1', '');
        $form_values['combo2'] = $this->_request->getParam('combo2', '');
        if ($this->_request->isPost()) {
            if ($search_form->isValid($this->_request->getPost())) {
                $form_values = array_merge($form_values, $search_form->getValues());
                $ccm_warehouse->form_values = $form_values;
                $data_arr = $ccm_warehouse->getStorageCapacityByArea20c();
            }
        }

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell>" . $sub_arr['Province'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['District'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['warehouse_type_name'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['cap20'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['req20'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['diff20'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['surplus30'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['surplus1030'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['match10'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['shortage1030'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['shortage30'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Capacity Shortages -20c by area";
        $this->view->headers = 'Province,District,Facility Type,Net Storage (Ltr) Actual,Net Storage (Ltr) Required,Net Storage (Ltr) Difference, Surplus > 30%, Surplus 10-30%,Match +/- 10%, Shortage 10-30%,Shortage >30%';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*,*,*,*,*,*,*,*,*,*,*';
        $this->view->aligns = 'left,left,left,right,right,right,right,right,right,right,right,right';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->data = $data_arr;
        $search_form->facility_type->setValue($form_values['facility_type']);
        $this->view->form_values = $form_values;
        $this->view->inlineScript()->appendFile(Zend_Registry::get('baseurl') . '/js/all_level_area_combo_report_graph.js');
    }

    public function icepackFreezingShortageRiByAreaAction() {
        //ccem 4.4.5

        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        //$ccm_warehouse = new Model_CcmWarehouses();
        //$data_arr = $ccm_warehouse->getTotalPopulationByFacilityType();
        $data_arr = array(
            0 => array(
                'Area' => 'Federal',
                'FacilityType' => 'National Vaccine Store',
                'Total' => '4',
                'NumberOfFacilitiesShortage' => '3',
                'PerOfFacilitiesShortage' => '75.00'
            ),
            1 => array(
                'Area' => 'Federal',
                'FacilityType' => 'DHQ Hospital',
                'Total' => '1',
                'NumberOfFacilitiesShortage' => '1',
                'PerOfFacilitiesShortage' => '100.00'
            )
        );

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell>" . $sub_arr['Area'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['FacilityType'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Total'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['NumberOfFacilitiesShortage'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['PerOfFacilitiesShortage'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Icepack Freezing Capacity Shortages for Routine Immunization by Area";
        $this->view->headers = 'Area,Facility Type,Total No of Facilities,No of Facilities with more than 30% shortage,% of Facilities with more than 30% shortage';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->data = $data_arr;
    }

    public function icepackStorageShortageSIAByAreaAction() {
        //ccem 4.4.7

        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        //$ccm_warehouse = new Model_CcmWarehouses();
        //$data_arr = $ccm_warehouse->getTotalPopulationByFacilityType();
        $data_arr = array(
            0 => array(
                'Area' => 'Federal',
                'FacilityType' => 'National Vaccine Store',
                'Total' => '4',
                'NumberOfFacilitiesShortage' => '3',
                'PerOfFacilitiesShortage' => '75.00'
            ),
            1 => array(
                'Area' => 'Federal',
                'FacilityType' => 'DHQ Hospital',
                'Total' => '1',
                'NumberOfFacilitiesShortage' => '1',
                'PerOfFacilitiesShortage' => '100.00'
            )
        );

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell>" . $sub_arr['Area'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['FacilityType'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Total'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['NumberOfFacilitiesShortage'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['PerOfFacilitiesShortage'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Icepack storage capacity shortages for SIA by area";
        $this->view->headers = 'Area,Facility Type,Total No of Facilities,No of Facilities with more than 30% shortage,% of Facilities with more than 30% shortage';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->data = $data_arr;
    }

    public function facilitiesWithInsufficientColdBoxByAreaAction() {
        //ccem 4.4.8

        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        //$ccm_warehouse = new Model_CcmWarehouses();
        //$data_arr = $ccm_warehouse->getTotalPopulationByFacilityType();
        $data_arr = array(
            0 => array(
                'Area' => 'Federal',
                'FacilityType' => 'National Vaccine Store',
                'Total' => '4',
                'NumberOfFacilitiesShortage' => '3',
                'PerOfFacilitiesShortage' => '75.00'
            ),
            1 => array(
                'Area' => 'Federal',
                'FacilityType' => 'DHQ Hospital',
                'Total' => '1',
                'NumberOfFacilitiesShortage' => '1',
                'PerOfFacilitiesShortage' => '100.00'
            )
        );

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell>" . $sub_arr['Area'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['FacilityType'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Total'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['NumberOfFacilitiesShortage'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['PerOfFacilitiesShortage'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Facilities with insufficient cold box transport capacity for vaccines resupply by area";
        $this->view->headers = 'Area,Facility Type,Total No of Facilities,No of Facilities with more than 30% shortage,% of Facilities with more than 30% shortage';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->data = $data_arr;
    }

    public function shortagesOfColdBoxTransportCapacityByAreaAction() {
        //ccem 4.4.9

        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        //$ccm_warehouse = new Model_CcmWarehouses();
        //$data_arr = $ccm_warehouse->getTotalPopulationByFacilityType();
        $data_arr = array(
            0 => array(
                'Area' => 'Federal',
                'Total' => '40780',
                'ModeOfVaccineSupplyDelivered' => '30',
                'ModeOfVaccineSupplyCollected' => '75',
                'ModeOfVaccineSupplyCD' => '254',
                'ModeOfVaccineSupplyUnknown' => '4567',
                'NumberOfFacilitiesShortage' => '10',
                'PerOfFacilitiesShortage' => '46.00'
            )
        );

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell>" . $sub_arr['Area'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Total'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['ModeOfVaccineSupplyDelivered'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['ModeOfVaccineSupplyCollected'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['ModeOfVaccineSupplyCD'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['ModeOfVaccineSupplyUnknown'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['NumberOfFacilitiesShortage'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['PerOfFacilitiesShortage'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Shortages of cold box transport capacity for resupply by area";
        $this->view->headers = 'Area,Total Facilities,Mode of Vaccine Supply Delivered,Mode of Vaccine Supply Collected,Mode of Vaccine Supply Collected/Delivered,Mode of Vaccine Supply Unknown,No of Facilities with more than 10% shortage,% of Facilities with more than 10% shortage';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->data = $data_arr;
    }

    public function refrigeratorByWorkingStatusFTypeAreaAction() {
        //ccem 4.4.10
        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        $ccm_warehouse = new Model_CcmWarehouses();
        $form_values['facility_type'] = $this->_request->getParam('facility_type', '');
        $form_values['office'] = $this->_request->getParam('office', '');
        $form_values['combo1'] = $this->_request->getParam('combo1', '');
        $form_values['combo2'] = $this->_request->getParam('combo2', '');
        if ($this->_request->isPost()) {
            if ($search_form->isValid($this->_request->getPost())) {
                $form_values = array_merge($form_values, $search_form->getValues());
                $ccm_warehouse->form_values = $form_values;
                $data_arr = $ccm_warehouse->refrigeratorByWorkingStatusFTypeArea();
            }
        }

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell>" . $sub_arr['Province'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['District'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['FacilityType'] . "</cell>";
            $xmlstore .= "<cell><![CDATA[" . $sub_arr['asset_type_name'] . "]]></cell>";
            $xmlstore .= "<cell>" . $sub_arr['Total'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Working'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['WorkingPer'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['NeedsService'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['NeedsServicePer'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['NotWorking'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['NotWorkingPer'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Refrigerator/Freezers by Working Status Facility Type and Area";
        $this->view->headers = 'Province,District,Facility Type,Equipment Type,Total Refs/Freezers,Working #,Working %,Working Needs Service #,Working Needs Service %,Not Working #,Not Working %';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*,*,*,*,*,*,*,*,*,*,*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $search_form->facility_type->setValue($form_values['facility_type']);
        $this->view->form_values = $form_values;
        $this->view->data = $data_arr;
        $this->view->inlineScript()->appendFile(Zend_Registry::get('baseurl') . '/js/all_level_area_combo_report_graph.js');
    }

    public function refrigeratorModelsByWorkingStatusAction() {
        //ccem 4.4.11
        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        $ccm_models = new Model_CcmModels();
        $form_values['facility_type'] = $this->_request->getParam('facility_type', '');
        $form_values['office'] = $this->_request->getParam('office', '');
        $form_values['combo1'] = $this->_request->getParam('combo1', '');
        $form_values['combo2'] = $this->_request->getParam('combo2', '');
        if ($this->_request->isPost()) {
            if ($search_form->isValid($this->_request->getPost())) {
                $form_values = array_merge($form_values, $search_form->getValues());
                $ccm_models->form_values = $form_values;
                $data_arr = $ccm_models->refrigeratorModelsByWorkingStatusReport();
            }
        }

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell>" . $sub_arr['ccm_model_name'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Total'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Working'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['WorkingPer'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['NeedsService'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['NeedsServicePer'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['NotWorking'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['NotWorkingPer'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Refrigerator/Freezers Models by Working Status";
        $this->view->headers = 'Model,Total #,Working Well #,Working Well %,Working Needs Service #,Working Needs Service %,Not Working #,Not Working %';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*,*,*,*,*,*,*,*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $search_form->facility_type->setValue($form_values['facility_type']);
        $this->view->form_values = $form_values;
        $this->view->data = $data_arr;
        $this->view->inlineScript()->appendFile(Zend_Registry::get('baseurl') . '/js/all_level_area_combo_report_graph.js');
    }

    public function refrigeratorModelsByAgeGroupAction() {
        //ccem 4.4.12
        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        $ccm_models = new Model_CcmModels();
        $form_values['facility_type'] = $this->_request->getParam('facility_type', '');
        $form_values['office'] = $this->_request->getParam('office', '');
        $form_values['combo1'] = $this->_request->getParam('combo1', '');
        $form_values['combo2'] = $this->_request->getParam('combo2', '');
        if ($this->_request->isPost()) {
            if ($search_form->isValid($this->_request->getPost())) {
                $form_values = array_merge($form_values, $search_form->getValues());
                $ccm_models->form_values = $form_values;
                $data_arr = $ccm_models->getRefrigeratorModelsByAgeGroupReport();
            }
        }

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell><![CDATA[" . $sub_arr['ccm_model_name'] . "]]></cell>";
            $xmlstore .= "<cell>" . $sub_arr['total'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['0-2 Years'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['0-2 Years Per'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['3-5 Years'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['3-5 Years Per'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['6-10 Years'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['6-10 Years Per'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['>10 Years'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['>10 Years Per'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Unknown'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Unknown Per'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Refrigerator/Freezers Models by Age Group";
        $this->view->headers = 'Model,Total #,0-2 Years #,0-2 Years %,3-5 Years #,3-5 Years %,6-10 Years #,6-10 Years %,>10 Years #,>10 Years %,Unknown #,Unknown %';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*,*,*,*,*,*,*,*,*,*,*,*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->form_values = $form_values;
        $search_form->facility_type->setValue($form_values['facility_type']);
        $this->view->data = $data_arr;
        $this->view->inlineScript()->appendFile(Zend_Registry::get('baseurl') . '/js/all_level_area_combo_report_graph.js');
    }

    public function refrigeratorFreezersUtilizationAction() {
        //ccem 4.4.13
        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        $ccm_models = new Model_CcmModels();
        $form_values['facility_type'] = $this->_request->getParam('facility_type', '');
        $form_values['office'] = $this->_request->getParam('office', '');
        $form_values['combo1'] = $this->_request->getParam('combo1', '');
        $form_values['combo2'] = $this->_request->getParam('combo2', '');
        if ($this->_request->isPost()) {
            if ($search_form->isValid($this->_request->getPost())) {
                $form_values = array_merge($form_values, $search_form->getValues());
                $ccm_models->form_values = $form_values;
                $data_arr = $ccm_models->refrigeratorFreezersUtilizationReport();
            }
        }

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";
        foreach ($data_arr as $sub_arr) {
            //App_Controller_Functions::pr($sub_arr);
            $xmlstore .= "<row>";
            $xmlstore .= "<cell><![CDATA[" . $sub_arr['ccm_model_name'] . "]]></cell>";
            $xmlstore .= "<cell>" . $sub_arr['Total'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['inUse'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['inUsePer'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['inStore'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['inStorePer'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['notUsed'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['notUsedPer'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['unknown'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['unknownPer'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Refrigerator/Freezers Utilization";
        $this->view->headers = 'Model,Total #,In Use #,In Use %,In Store #,In Store %,Not Used #,Not Used %, Unknown Status #,Unknown Status %';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*,*,*,*,*,*,*,*,*,*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $search_form->facility_type->setValue($form_values['facility_type']);
        $this->view->form_values = $form_values;
        $this->view->data = $data_arr;
        $this->view->inlineScript()->appendFile(Zend_Registry::get('baseurl') . '/js/all_level_area_combo_report_graph.js');
    }

    public function distributionRefrigeratorByModelByFTypeAction() {
        ini_set('memory_limit', '128M');
        $this->_helper->layout->setLayout('reports');
        $header = '';
        $header .= 'Model';
        //$header1 = '#rspan';
        $cspan = '#cspan';
        $width = '60';
        $ro = 'ro';
        $align = "left";

        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        $cold_chain = new Model_ColdChain();
        $form_values['facility_type'] = $this->_request->getParam('facility_type', '');
        $form_values['office'] = $this->_request->getParam('office', '');
        $form_values['combo1'] = $this->_request->getParam('combo1', '');
        $form_values['combo2'] = $this->_request->getParam('combo2', '');
        if ($this->_request->isPost()) {
            if ($search_form->isValid($this->_request->getPost())) {
                $form_values = array_merge($form_values, $search_form->getValues());
                $cold_chain->form_values = $form_values;
                $qry_res = $cold_chain->getColdchainModelsByFacilityType();

                $warehouse = new Model_Warehouses();
                $warehouse_asset_types = $warehouse->getWarehouseByAssetType();
                foreach ($qry_res as $row) {
                    $data_arr[$row['pk_id']][] = $row['ccm_model_name'];
                    $count = 1;
                    foreach ($warehouse_asset_types as $warehouse_asset_type) {
                        $data_arr[$row['pk_id']][$warehouse_asset_type['warehouse_type_id']] = 0;
                    }
                }

                foreach ($warehouse_asset_types as $row2) {
                    $header .= ',' . $row2['warehouse_type_name'];
                    //$header1 .= ',#rspan';

                    $cspan .= ',#cspan';
                    $width .= ',*';
                    $ro .= ',ro';
                    $align .= ',right';

                    $warehouse_warehouse_types = $cold_chain->getColdChainByWarehouseType($row2['warehouse_type_id']);
                    $count = 1;
                    foreach ($warehouse_warehouse_types as $warehouse_warehouse_type) {
                        if ($data_arr[$warehouse_warehouse_type['pk_id']][0] && $data_arr[$warehouse_warehouse_type['pk_id']][0] != "") {
                            $data_arr[$warehouse_warehouse_type['pk_id']][$row2['warehouse_type_id']] = $warehouse_warehouse_type['TotalAssets'];
                        }
                    }
                }
            }
        }
        if ($data_arr && count($data_arr) > 0) {
            $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
            $xmlstore .= "<rows>";

            foreach ($data_arr as $item => $sub_arr) {
                $xmlstore .= "<row>";
                if (array_key_exists('0', $sub_arr)) {
                    $xmlstore .= "<cell>" . $sub_arr[0] . "</cell>";
                } else {
                    $xmlstore .= "<cell> - </cell>";
                }

                foreach ($sub_arr as $key => $value) {
                    if ($key > 0) {
                        $xmlstore .= "<cell style=\"text-align:right\">" . number_format($value) . "</cell>";
                    }
                }
                $xmlstore .="</row>";
            }
            $xmlstore .="</rows>";
        } else {
            $xmlstore = "";
        }

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Distribution of Refrigerators/Freezers by Model and Facility Type";
        $this->view->data = $data_arr;
        $this->view->headers = $header;
        $this->view->width = $width;
        $this->view->ro = $ro;
        $this->view->cspan = $cspan;
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->form_values = $form_values;
        $this->view->inlineScript()->appendFile(Zend_Registry::get('baseurl') . '/js/all_level_area_combo_report_graph.js');
    }

    public function distributionCfcFreeEquipmentByFTypeAction() {
        //ccem 4.4.15
        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        $ccm_models = new Model_CcmModels();
        $form_values['office'] = $this->_request->getParam('office', '');
        $form_values['combo1'] = $this->_request->getParam('combo1', '');
        $form_values['combo2'] = $this->_request->getParam('combo2', '');
        if ($this->_request->isPost()) {
            if ($search_form->isValid($this->_request->getPost())) {
                $form_values = array_merge($form_values, $search_form->getValues());
                $ccm_models->form_values = $form_values;
                $data_arr = $ccm_models->distributionCFCFreeEquipmentByFType();
            }
        }

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell>" . $sub_arr['warehouse_type_name'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Total'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['CFCFree'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['CFCFreePer'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['notCFCFree'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['NeedsServicePer'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['unknown'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['unknownPer'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Distribution of CFC-Free Equipment by Facility Type";
        $this->view->headers = 'Facility Type,Total #,CFC Free #,CFC Free %,Not CFC Free #,Not CFC Free %, Unknown #,Unknown %';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '200,*,*,*,*,*,*,*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->data = $data_arr;
        $search_form->facility_type->setValue($form_values['facility_type']);
        $this->view->form_values = $form_values;
        $this->view->inlineScript()->appendFile(Zend_Registry::get('baseurl') . '/js/all_level_area_combo_report_graph.js');
    }

    public function equipmentByAvailabilityOfElectricityAction() {
        // action body
    }

    public function annualColdChainRunningCostsByFTypeAction() {
        //ccem 4.4.16

        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        //$ccm_warehouse = new Model_CcmWarehouses();
        //$data_arr = $ccm_warehouse->getTotalPopulationByFacilityType();
        $data_arr = array(
            0 => array(
                'FacilityType' => 'National Vaccine Store',
                'Total' => '4',
                'GasCost' => '0',
                'AvgGasCost' => '0.00',
                'KeroseneCost' => '4',
                'AvgKeroseneCost' => '100.00',
                'ElectricityCost' => '0',
                'AvgElectricityCost' => '0.00',
            )
        );

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell>Federal</cell>";
            $xmlstore .= "<cell>" . $sub_arr['FacilityType'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Total'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['GasCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['AvgGasCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['KeroseneCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['AvgKeroseneCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['ElectricityCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['AvgElectricityCost'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Summary of absorption refrigerators existing in facilities with >8/24";
        $this->view->headers = 'Area,Facility Type,No of Facilities,Gas Cost, Gas Average Cost,Kerosene Cost,Kerosene Average Cost,Electricity Cost,Electricity Average Cost';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->data = $data_arr;
    }

    public function summaryOfAbsorptionRefrigeratorsExistFacilitiesAction() {
        //ccem 4.4.17

        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        //$ccm_warehouse = new Model_CcmWarehouses();
        //$data_arr = $ccm_warehouse->getTotalPopulationByFacilityType();
        $data_arr = array(
            0 => array(
                'FacilityType' => 'National Vaccine Store',
                'Total No of Refrigerators' => '60',
                'Absorption Refrigerators #' => '0',
                'Absorption Refrigerators %' => '0'
            )
        );

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell>Federal</cell>";
            $xmlstore .= "<cell>" . $sub_arr['FacilityType'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Total'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['AbsorptionRef'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['AbsorptionRefPer'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Summary of absorption refrigerators existing in facilities with >8/24";
        $this->view->headers = 'Area,Facility Type,Total No of Refrigerators #,Refrigerators %';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*';
        $this->view->ro = 'ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->data = $data_arr;
    }

    public function annualEnergyCostsForRefrigeratorEnergyTypesAction() {
        //ccem 4.4.18

        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        //$ccm_warehouse = new Model_CcmWarehouses();
        //$data_arr = $ccm_warehouse->getTotalPopulationByFacilityType();
        $data_arr = array(
            0 => array(
                'FacilityType' => 'National Vaccine Store',
                'Total' => '4',
                'GasCost' => '0',
                'AvgGasCost' => '0.00',
                'KeroseneCost' => '4',
                'AvgKeroseneCost' => '100.00',
                'ElectricityCost' => '0',
                'AvgElectricityCost' => '0.00',
            )
        );

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell>Federal</cell>";
            $xmlstore .= "<cell>" . $sub_arr['FacilityType'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Total'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['GasCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['AvgGasCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['KeroseneCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['AvgKeroseneCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['ElectricityCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['AvgElectricityCost'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Annual cold chain running costs by facility type";
        $this->view->headers = 'Area,Facility Type,No of Facilities,Gas Cost, Gas Average Cost,Kerosene Cost,Kerosene Average Cost,Electricity Cost,Electricity Average Cost';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->data = $data_arr;
    }

    public function energyAvailabilityAtFacilitiesAction() {
        //ccem 4.4.19

        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        //$ccm_warehouse = new Model_CcmWarehouses();
        //$data_arr = $ccm_warehouse->getTotalPopulationByFacilityType();
        $data_arr = array(
            0 => array(
                'FacilityType' => 'National Vaccine Store',
                'Total' => '4',
                'CostGasConsumption' => '0',
                'CostKeroseneConsumption' => '0.00',
                'CostKeroseneConsumption' => '4',
                'AvgKeroseneCost' => '100.00',
                'ElectricityCost' => '0',
                'AvgElectricityCost' => '0.00',
            )
        );

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell>Federal</cell>";
            $xmlstore .= "<cell>" . $sub_arr['FacilityType'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Total'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['GasCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['AvgGasCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['KeroseneCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['AvgKeroseneCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['ElectricityCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['AvgElectricityCost'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Energy availability at facilities";
        $this->view->headers = 'Area,Facility Type,No of Facilities,Gas Cost, Gas Average Cost,Kerosene Cost,Kerosene Average Cost,Electricity Cost,Electricity Average Cost';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->data = $data_arr;
    }

    /*     * ********************************************* *///////////////
    /*
     * NEW REPORTS
     * AS PER LIST
     * 
     * ***********************************************************
     * 
     * THIS IS PROPOSED LIST
     * 
     * ********************************************* *///////////////
    /*     * */

    public function vaccineResupplyIntervalsAndReserveStocksByFacilityTypeAction() {
        //ccem proposed list 1.6 (3)

        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        //$ccm_warehouse = new Model_CcmWarehouses();
        //$data_arr = $ccm_warehouse->getTotalPopulationByFacilityType();
        $data_arr = array(
            0 => array(
                'FacilityType' => 'National Vaccine Store',
                'Total' => '4',
                'CostGasConsumption' => '0',
                'CostKeroseneConsumption' => '0.00',
                'CostKeroseneConsumption' => '4',
                'AvgKeroseneCost' => '100.00',
                'ElectricityCost' => '0',
                'AvgElectricityCost' => '0.00',
            )
        );

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell>Federal</cell>";
            $xmlstore .= "<cell>" . $sub_arr['FacilityType'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Total'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['GasCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['AvgGasCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['KeroseneCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['AvgKeroseneCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['ElectricityCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['AvgElectricityCost'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Vaccine Resupply Intervals And Reserve Stocks By Facility Type";
        $this->view->headers = 'Area,Facility Type,No of Facilities,Gas Cost, Gas Average Cost,Kerosene Cost,Kerosene Average Cost,Electricity Cost,Electricity Average Cost';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->data = $data_arr;
    }

    public function electricityAvailabilityAction() {
        //ccem proposed list 1.7 (4)

        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        //$ccm_warehouse = new Model_CcmWarehouses();
        //$data_arr = $ccm_warehouse->getTotalPopulationByFacilityType();
        $data_arr = array(
            0 => array(
                'FacilityType' => 'National Vaccine Store',
                'Total' => '4',
                'CostGasConsumption' => '0',
                'CostKeroseneConsumption' => '0.00',
                'CostKeroseneConsumption' => '4',
                'AvgKeroseneCost' => '100.00',
                'ElectricityCost' => '0',
                'AvgElectricityCost' => '0.00',
            )
        );

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell>Federal</cell>";
            $xmlstore .= "<cell>" . $sub_arr['FacilityType'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Total'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['GasCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['AvgGasCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['KeroseneCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['AvgKeroseneCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['ElectricityCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['AvgElectricityCost'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Electricity Availability";
        $this->view->headers = 'Area,Facility Type,No of Facilities,Gas Cost, Gas Average Cost,Kerosene Cost,Kerosene Average Cost,Electricity Cost,Electricity Average Cost';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->data = $data_arr;
    }

    public function facilitiesSuitableForSolarEquipmentByAreaAction() {
        //ccem proposed list 1.11 (6)
        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        $ccm_warehouse = new Model_CcmWarehouses();
        $form_values['facility_type'] = $this->_request->getParam('facility_type', '');
        $form_values['office'] = $this->_request->getParam('office', '');
        $form_values['combo1'] = $this->_request->getParam('combo1', '');
        $form_values['combo2'] = $this->_request->getParam('combo2', '');
        if ($this->_request->isPost()) {
            if ($search_form->isValid($this->_request->getPost())) {
                $form_values = array_merge($form_values, $search_form->getValues());
                $ccm_warehouse->form_values = $form_values;
                $data_arr = $ccm_warehouse->facilitiesSuitableForSolarEquipmentByAreaReport();
            }
        }

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell>" . $sub_arr['Province'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['District'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['FacilityType'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Total'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['FacilitiesSuitableForSolarEquipmentNo'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['FacilitiesSuitableForSolarEquipmentPer'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Facilities Suitable For Solar Equipment By Area";
        $this->view->headers = 'Province,District,Facility Type,No of Facilities,Facilities Suitable For Solar Equipment #,Facilities Suitable For Solar Equipment %';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*,*,*,*,*,*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $search_form->facility_type->setValue($form_values['facility_type']);
        $this->view->form_values = $form_values;
        $this->view->data = $data_arr;
        $this->view->inlineScript()->appendFile(Zend_Registry::get('baseurl') . '/js/all_level_area_combo_report_graph.js');
    }

    public function averagePopulationPerVaccinatorAction() {
        //ccem proposed list 1.21 (7)

        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        //$ccm_warehouse = new Model_CcmWarehouses();
        //$data_arr = $ccm_warehouse->getTotalPopulationByFacilityType();
        $data_arr = array(
            0 => array(
                'FacilityType' => 'National Vaccine Store',
                'Total' => '4',
                'CostGasConsumption' => '0',
                'CostKeroseneConsumption' => '0.00',
                'CostKeroseneConsumption' => '4',
                'AvgKeroseneCost' => '100.00',
                'ElectricityCost' => '0',
                'AvgElectricityCost' => '0.00',
            )
        );

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell>Federal</cell>";
            $xmlstore .= "<cell>" . $sub_arr['FacilityType'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Total'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['GasCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['AvgGasCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['KeroseneCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['AvgKeroseneCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['ElectricityCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['AvgElectricityCost'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Average Population Per Vaccinator";
        $this->view->headers = 'Area,Facility Type,No of Facilities,Gas Cost, Gas Average Cost,Kerosene Cost,Kerosene Average Cost,Electricity Cost,Electricity Average Cost';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->data = $data_arr;
    }

    public function vaccineStorageCapacityAt2to8Action() {
        //ccem proposed list 2.1b (11)
        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        $ccm_warehouse = new Model_CcmWarehouses();
        $form_values['facility_type'] = $this->_request->getParam('facility_type', '');
        $form_values['office'] = $this->_request->getParam('office', '');
        $form_values['combo1'] = $this->_request->getParam('combo1', '');
        $form_values['combo2'] = $this->_request->getParam('combo2', '');
        if ($this->_request->isPost()) {
            if ($search_form->isValid($this->_request->getPost())) {
                $form_values = array_merge($form_values, $search_form->getValues());
                $ccm_warehouse->form_values = $form_values;
                $data_arr = $ccm_warehouse->vaccineStorageCapacityAt2to8Report();
            }
        }

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell>" . $sub_arr['Province'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['District'] . "</cell>";
            $xmlstore .= "<cell><![CDATA[" . $sub_arr['FacilityName'] . "]]></cell>";
            $xmlstore .= "<cell>" . $sub_arr['FacilityType'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['ActualCap'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Required'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Difference'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['surplus30'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['surplus1030'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['match10'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['shortage1030'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['shortage30'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Vaccine storage capacity at +2c to +8c against requirements";
        $this->view->headers = 'Province,District,Facility Name,Facility Type,Actual Capacity (Ltr),Required Capacity (Ltr),Difference (Ltr), Surplus > 30%,Surplus 10-30%,Match +/- 10%, Shortage 10-30%, Shortage >30%';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*,*,*,*,*,*,*,*,*,*,*,*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro';
        $this->view->aligns = 'left,left,left,left,right,right,right,right,right,right,right,right';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $search_form->facility_type->setValue($form_values['facility_type']);
        $this->view->form_values = $form_values;
        $this->view->data = $data_arr;
        $this->view->inlineScript()->appendFile(Zend_Registry::get('baseurl') . '/js/all_level_area_combo_report_graph.js');
    }

    public function vaccineStorageCapacityAt20Action() {
        //ccem proposed list 2.1b (11)
        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        $ccm_warehouse = new Model_CcmWarehouses();
        $form_values['facility_type'] = $this->_request->getParam('facility_type', '');
        $form_values['office'] = $this->_request->getParam('office', '');
        $form_values['combo1'] = $this->_request->getParam('combo1', '');
        $form_values['combo2'] = $this->_request->getParam('combo2', '');
        if ($this->_request->isPost()) {
            if ($search_form->isValid($this->_request->getPost())) {
                $form_values = array_merge($form_values, $search_form->getValues());
                $ccm_warehouse->form_values = $form_values;
                $data_arr = $ccm_warehouse->vaccineStorageCapacityAt20Report();
            }
        }

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell>" . $sub_arr['Province'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['District'] . "</cell>";
            $xmlstore .= "<cell><![CDATA[" . $sub_arr['FacilityName'] . "]]></cell>";
            $xmlstore .= "<cell>" . $sub_arr['FacilityType'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['ActualCap'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Required'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Difference'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['surplus30'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['surplus1030'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['match10'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['shortage1030'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['shortage30'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Vaccine storage capacity at -20c against requirements";
        $this->view->headers = 'Province,District,Facility Name,Facility Type,Actual Capacity (Ltr),Required Capacity (Ltr),Difference (Ltr), Surplus > 30%,Surplus 10-30%,Match +/- 10%, Shortage 10-30%, Shortage >30%';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*,*,*,*,*,*,*,*,*,*,*,*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro';
        $this->view->aligns = 'left,left,left,left,right,right,right,right,right,right,right,right';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $search_form->facility_type->setValue($form_values['facility_type']);
        $this->view->form_values = $form_values;
        $this->view->data = $data_arr;
        $this->view->inlineScript()->appendFile(Zend_Registry::get('baseurl') . '/js/all_level_area_combo_report_graph.js');
    }

    public function icepackFreezingCapacityAgainstRoutineAndSIAAction() {
        //ccem proposed list 2.3c (16)

        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        $ccm_models = new Model_CcmModels();
        $form_values['facility_type'] = $this->_request->getParam('facility_type', '');
        $form_values['office'] = $this->_request->getParam('office', '');
        $form_values['combo1'] = $this->_request->getParam('combo1', '');
        $form_values['combo2'] = $this->_request->getParam('combo2', '');
        if ($this->_request->isPost()) {
            if ($search_form->isValid($this->_request->getPost())) {
                $form_values = array_merge($form_values, $search_form->getValues());
                $ccm_models->form_values = $form_values;
                $data_arr = $ccm_models->icepackFreezingCapacityAgainstRoutineAndSIA();
            }
        }

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell>" . $sub_arr['Province'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Distirct'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Tehsil'] . "</cell>";
            $xmlstore .= "<cell><![CDATA[" . $sub_arr['UC'] . "]]></cell>";
            $xmlstore .= "<cell>" . $sub_arr['FacilityType'] . "</cell>";
            $xmlstore .= "<cell><![CDATA[" . $sub_arr['FacilityName'] . "]]></cell>";
            $xmlstore .= "<cell>" . $sub_arr['Required'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Capacity'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Balance'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Icepack Freezing Capacity";
        $this->view->headers = 'Province,Distirct,Tehsil,UC,Facility Type,Facility Name,Required,Capacity,Balance';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*,*,*,*,*,*,*,*,*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->data = $data_arr;
        $search_form->facility_type->setValue($form_values['facility_type']);
        $this->view->form_values = $form_values;
        $this->view->inlineScript()->appendFile(Zend_Registry::get('baseurl') . '/js/all_level_area_combo_report_graph.js');
    }

    public function coldboxAndVaccineCarrierCapacityByFacilityAction() {
        //ccem proposed list 2.3c (16)
        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        $ccm_models = new Model_CcmModels();
        $form_values['facility_type'] = $this->_request->getParam('facility_type', '');
        $form_values['office'] = $this->_request->getParam('office', '');
        $form_values['combo1'] = $this->_request->getParam('combo1', '');
        $form_values['combo2'] = $this->_request->getParam('combo2', '');
        if ($this->_request->isPost()) {
            if ($search_form->isValid($this->_request->getPost())) {
                $form_values = array_merge($form_values, $search_form->getValues());
                $ccm_models->form_values = $form_values;
                $data_arr = $ccm_models->coldboxAndVaccineCarrierCapacityByFacility();
            }
        }

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell>" . $sub_arr['Province'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Distirct'] . "</cell>";

            $xmlstore .= "<cell><![CDATA[" . $sub_arr['FacilityName'] . "]]></cell>";
            $xmlstore .= "<cell>" . $sub_arr['FacilityType'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['NetStorage'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['QuantityPresent'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['QuantityNotWorking'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Coldbox And Vaccine Carrier Capacity By Facility";
        $this->view->headers = 'Province,Distirct,Facility Name,Facility Type,Net Storage,Quantity Present,Quantity Not Working';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*,*,*,*,*,*,*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro,ro';
        $this->view->aligns = 'left,left,left,left,right,right,right';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        //$this->view->data = $data_arr;
        $search_form->facility_type->setValue($form_values['facility_type']);
        $this->view->form_values = $form_values;
        $this->view->inlineScript()->appendFile(Zend_Registry::get('baseurl') . '/js/all_level_area_combo_report_graph.js');
    }

    public function nonPQSRefrigeratorsByModelAndFacilityTypeAction() {
        //ccem proposed list 3.9 (31)

        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        //$ccm_warehouse = new Model_CcmWarehouses();
        //$data_arr = $ccm_warehouse->getTotalPopulationByFacilityType();
        $data_arr = array(
            0 => array(
                'FacilityType' => 'National Vaccine Store',
                'Total' => '4',
                'CostGasConsumption' => '0',
                'CostKeroseneConsumption' => '0.00',
                'CostKeroseneConsumption' => '4',
                'AvgKeroseneCost' => '100.00',
                'ElectricityCost' => '0',
                'AvgElectricityCost' => '0.00',
            )
        );

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell>Federal</cell>";
            $xmlstore .= "<cell>" . $sub_arr['FacilityType'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Total'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['GasCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['AvgGasCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['KeroseneCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['AvgKeroseneCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['ElectricityCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['AvgElectricityCost'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Non PQS Refrigerators / Freezers By Model And Facility Type";
        $this->view->headers = 'Area,Facility Type,No of Facilities,Gas Cost, Gas Average Cost,Kerosene Cost,Kerosene Average Cost,Electricity Cost,Electricity Average Cost';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->data = $data_arr;
    }

    public function lineListOfEquipmentWithWorkingStatusAction() {
        //ccem proposed list 3.22 (32)
        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        $ccm_models = new Model_CcmModels();
        $form_values['facility_type'] = $this->_request->getParam('facility_type', '');
        $form_values['office'] = $this->_request->getParam('office', '');
        $form_values['combo1'] = $this->_request->getParam('combo1', '');
        $form_values['combo2'] = $this->_request->getParam('combo2', '');
        if ($this->_request->isPost()) {
            if ($search_form->isValid($this->_request->getPost())) {
                $form_values = array_merge($form_values, $search_form->getValues());
                $ccm_models->form_values = $form_values;
                $data_arr = $ccm_models->lineListOfEquipmentWithWorkingStatus();
            }
        }

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell>" . $sub_arr['Province'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Distirct'] . "</cell>";
//            $xmlstore .= "<cell>" . $sub_arr['Tehsil'] . "</cell>";
//            $xmlstore .= "<cell><![CDATA[" . $sub_arr['UC'] . "]]></cell>";
            $xmlstore .= "<cell><![CDATA[" . $sub_arr['FacilityName'] . "]]></cell>";
            $xmlstore .= "<cell>" . $sub_arr['FacilityType'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['LibraryID'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Model'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Make'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['SerialNumber'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['NetVol4'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['NetVol20'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['WorkingSince'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['WorkingStatus'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Utilization'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Refrigerators/Freezers not working or needs service";
        $this->view->headers = 'Province,District,Facility Name,Facility Type,Catalog ID,Model,Make,'
                . 'Serial No,Net Vol +4,Net Vol -20,Year of Supply,Working Status,Equipment Utilization';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*,*,*,*,*,*,*,*,*,*,*,*,*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->data = $data_arr;
        $search_form->facility_type->setValue($form_values['facility_type']);
        $this->view->form_values = $form_values;
        $this->view->inlineScript()->appendFile(Zend_Registry::get('baseurl') . '/js/all_level_area_combo_report_graph.js');
    }

    public function lineListOfEquipmentWithEquipmentUtilizationAction() {
        //ccem proposed list 3.23 (33)

        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        $ccm_models = new Model_CcmModels();
        $form_values['office'] = $this->_request->getParam('office', '');
        $form_values['combo1'] = $this->_request->getParam('combo1', '');
        $form_values['combo2'] = $this->_request->getParam('combo2', '');
        if ($this->_request->isPost()) {
            if ($search_form->isValid($this->_request->getPost())) {
                $form_values = array_merge($form_values, $search_form->getValues());
                $ccm_models->form_values = $form_values;
                $data_arr = $ccm_models->lineListOfEquipmentWithEquipmentUtilization();
            }
        }

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell>" . $sub_arr['Province'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Distirct'] . "</cell>";
            // $xmlstore .= "<cell>" . $sub_arr['Tehsil'] . "</cell>";
            // $xmlstore .= "<cell><![CDATA[" . $sub_arr['UC'] . "]]></cell>";
            $xmlstore .= "<cell><![CDATA[" . $sub_arr['FacilityName'] . "]]></cell>";
            $xmlstore .= "<cell>" . $sub_arr['FacilityType'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['LibraryID'] . "</cell>";
            $xmlstore .= "<cell><![CDATA[" . $sub_arr['Model'] . "]]></cell>";
            $xmlstore .= "<cell><![CDATA[" . $sub_arr['Make'] . "]]></cell>";
            $xmlstore .= "<cell>" . $sub_arr['SerialNumber'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['NetVol4'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['NetVol20'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['WorkingSince'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['WorkingStatus'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Refrigerators/Freezers not in use";
        $this->view->headers = 'Province,District,Facility Name,Facility Type,Catalog ID,Model,Make,'
                . 'Serial No,Net Vol +4,Net Vol -20,Year of Supply,Working Status';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*,*,*,*,*,*,*,*,*,*,*,*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->data = $data_arr;
        $search_form->facility_type->setValue($form_values['facility_type']);
        $this->view->form_values = $form_values;
        $this->view->inlineScript()->appendFile(Zend_Registry::get('baseurl') . '/js/all_level_area_combo_report_graph.js');
    }

    public function coldRooms4to20ByModelAndWorkingStatusAction() {
        //ccem proposed list 3.10 (34)
        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        $ccm_models = new Model_CcmModels();
        $form_values['facility_type'] = $this->_request->getParam('facility_type', '');
        $form_values['office'] = $this->_request->getParam('office', '');
        $form_values['combo1'] = $this->_request->getParam('combo1', '');
        $form_values['combo2'] = $this->_request->getParam('combo2', '');
        if ($this->_request->isPost()) {
            if ($search_form->isValid($this->_request->getPost())) {
                $form_values = array_merge($form_values, $search_form->getValues());
                $ccm_models->form_values = $form_values;
                $data_arr = $ccm_models->coldRooms4to20ByModelAndWorkingStatus();
            }
        }

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell>" . $sub_arr['FacilityType'] . "</cell>";
            $xmlstore .= "<cell><![CDATA[" . $sub_arr['Model'] . "]]></cell>";
            $xmlstore .= "<cell><![CDATA[" . $sub_arr['Manufacturer'] . "]]></cell>";
            $xmlstore .= "<cell><![CDATA[" . $sub_arr['EquipmentType'] . "]]></cell>";
            $xmlstore .= "<cell>" . $sub_arr['Total'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Working'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['WorkingPer'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['NeedsService'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['NeedsServicePer'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['NotWorking'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['NotWorkingPer'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Cold Rooms +4C and -20C By Model And Working Status";
        $this->view->headers = 'Facility Type,Model Name,Manufacturer,Equipment Type,Total,Working #,Working %,Working Needs Service #,Working Needs Service %,Not Working #,Not Working %';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*,*,*,*,*,*,*,*,*,*,*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->data = $data_arr;
        $search_form->facility_type->setValue($form_values['facility_type']);
        $this->view->form_values = $form_values;
        $this->view->inlineScript()->appendFile(Zend_Registry::get('baseurl') . '/js/all_level_area_combo_report_graph.js');
    }

    public function listingOfColdRoomFacilitiesAndWorkingStatusAction() {
        //ccem proposed list 3.11 (35)
        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        $ccm_models = new Model_CcmModels();
        $form_values['facility_type'] = $this->_request->getParam('facility_type', '');
        $form_values['office'] = $this->_request->getParam('office', '');
        $form_values['combo1'] = $this->_request->getParam('combo1', '');
        $form_values['combo2'] = $this->_request->getParam('combo2', '');
        if ($this->_request->isPost()) {
            if ($search_form->isValid($this->_request->getPost())) {
                $form_values = array_merge($form_values, $search_form->getValues());
                $ccm_models->form_values = $form_values;
                $data_arr = $ccm_models->listingOfColdRoomFacilitiesAndWorkingStatus();
            }
        }

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell><![CDATA[" . $sub_arr['warehouse_type_name'] . "]]></cell>";
            $xmlstore .= "<cell><![CDATA[" . $sub_arr['ccm_model_name'] . "]]></cell>";
            $xmlstore .= "<cell><![CDATA[" . $sub_arr['ccm_make_name'] . "]]></cell>";
            $xmlstore .= "<cell><![CDATA[" . $sub_arr['asset_type_name'] . "]]></cell>";
            $xmlstore .= "<cell>" . $sub_arr['serial_number'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['total'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['working'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['working_per'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['needs_service'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['needs_service_per'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['not_working'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['not_working_per'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Listing Of Cold Room Facilities And Working Status";
        $this->view->headers = 'Facility Type,Model Name,Manufacturer,Equipment Type,Serial No,Total,Working #,Working %,Working Needs Service #,Working Needs Service %,Not Working #,Not Working %';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*,*,*,*,*,*,*,*,*,*,*,*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->data = $data_arr;
        $search_form->facility_type->setValue($form_values['facility_type']);
        $this->view->form_values = $form_values;
        $this->view->inlineScript()->appendFile(Zend_Registry::get('baseurl') . '/js/all_level_area_combo_report_graph.js');
    }

    public function coldRoomQualityAttributesAction() {
        //ccem proposed list 3.12 (36)

        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        //$ccm_warehouse = new Model_CcmWarehouses();
        //$data_arr = $ccm_warehouse->getTotalPopulationByFacilityType();
        $data_arr = array(
            0 => array(
                'FacilityType' => 'National Vaccine Store',
                'Total' => '4',
                'CostGasConsumption' => '0',
                'CostKeroseneConsumption' => '0.00',
                'CostKeroseneConsumption' => '4',
                'AvgKeroseneCost' => '100.00',
                'ElectricityCost' => '0',
                'AvgElectricityCost' => '0.00',
            )
        );

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell>Federal</cell>";
            $xmlstore .= "<cell>" . $sub_arr['FacilityType'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['Total'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['GasCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['AvgGasCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['KeroseneCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['AvgKeroseneCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['ElectricityCost'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['AvgElectricityCost'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Cold Room Quality Attributes";
        $this->view->headers = 'Area,Facility Type,No of Facilities,Gas Cost, Gas Average Cost,Kerosene Cost,Kerosene Average Cost,Electricity Cost,Electricity Average Cost';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->data = $data_arr;
    }

    public function coldboxAndVaccineCarriersByWorkingStatusAction() {
        //ccem proposed list 3.13b (38)

        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        $ccm_models = new Model_CcmModels();
        $form_values['facility_type'] = $this->_request->getParam('facility_type', '');
        $form_values['office'] = $this->_request->getParam('office', '');
        $form_values['combo1'] = $this->_request->getParam('combo1', '');
        $form_values['combo2'] = $this->_request->getParam('combo2', '');
        if ($this->_request->isPost()) {
            if ($search_form->isValid($this->_request->getPost())) {
                $form_values = array_merge($form_values, $search_form->getValues());
                $ccm_models->form_values = $form_values;
                $data_arr = $ccm_models->coldboxAndVaccineCarriersByWorkingStatusReport();
            }
        }

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $total = $sub_arr['workingQuantity'] + $sub_arr['notWorkingQuantity'];
            $xmlstore .= "<row>";
            $xmlstore .= "<cell><![CDATA[" . $sub_arr['warehouse_type_name'] . "]]></cell>";
            $xmlstore .= "<cell><![CDATA[" . $sub_arr['ccm_model_name'] . "]]></cell>";
            $xmlstore .= "<cell><![CDATA[" . $sub_arr['ccm_make_name'] . "]]></cell>";
            $xmlstore .= "<cell>" . $sub_arr['asset_type_name'] . "</cell>";
            $xmlstore .= "<cell>" . $total . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['workingQuantity'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['notWorkingQuantity'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Coldbox And Vaccine Carriers By Working Status";
        $this->view->headers = 'Facility Type,Model Name,Manufacturer,Equipment Type,Total,Working,Not Working';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*,*,*,*,*,*,*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->data = $data_arr;
        $search_form->facility_type->setValue($form_values['facility_type']);
        $this->view->form_values = $form_values;
        $this->view->inlineScript()->appendFile(Zend_Registry::get('baseurl') . '/js/all_level_area_combo_report_graph.js');
    }

    public function quantityOfColdBoxesCarriersAction() {
        //ccem proposed list 3.14 (40)

        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        $ccm_models = new Model_CcmModels();
        $form_values['facility_type'] = $this->_request->getParam('facility_type', '');
        $form_values['office'] = $this->_request->getParam('office', '');
        $form_values['combo1'] = $this->_request->getParam('combo1', '');
        $form_values['combo2'] = $this->_request->getParam('combo2', '');
        if ($this->_request->isPost()) {
            if ($search_form->isValid($this->_request->getPost())) {
                $form_values = array_merge($form_values, $search_form->getValues());
                $ccm_models->form_values = $form_values;
                $data_arr = $ccm_models->quantityOfColdBoxesCarriersReport();
            }
        }

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell><![CDATA[" . $sub_arr['warehouse_type_name'] . "]]></cell>";
            $xmlstore .= "<cell>" . $sub_arr['min'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['max'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['avg'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Quantity Of Cold Boxes Carriers";
        $this->view->headers = 'Facility Type,Vaccine Carriers (Min),Vaccine Carriers (Max),Vaccine Carriers (Mean)';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan';
        $this->view->width = '*,*,*,*';
        $this->view->ro = 'ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->data = $data_arr;
        $search_form->facility_type->setValue($form_values['facility_type']);
        $this->view->form_values = $form_values;
        $this->view->inlineScript()->appendFile(Zend_Registry::get('baseurl') . '/js/all_level_area_combo_report_graph.js');
    }

    public function standbyGeneratorsByFacilityTypeAndWorkingStatusAction() {
        //ccem proposed list 3.15 (41)

        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        $ccm_models = new Model_CcmModels();
        $form_values['facility_type'] = $this->_request->getParam('facility_type', '');
        $form_values['office'] = $this->_request->getParam('office', '');
        $form_values['combo1'] = $this->_request->getParam('combo1', '');
        $form_values['combo2'] = $this->_request->getParam('combo2', '');
        if ($this->_request->isPost()) {
            if ($search_form->isValid($this->_request->getPost())) {
                $form_values = array_merge($form_values, $search_form->getValues());
                $ccm_models->form_values = $form_values;
                $data_arr = $ccm_models->standbyGeneratorsByFacilityTypeAndWorkingStatusReport();
            }
        }
        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell><![CDATA[" . $sub_arr['warehouse_type_name'] . "]]></cell>";
            $xmlstore .= "<cell>" . $sub_arr['Total'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['working'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['working_per'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['needs_service'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['needs_service_per'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['not_working'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['not_working_per'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Standby Generators By Facility Type And Working Status";
        $this->view->headers = 'Facility Type,Total,Working #,Working %,Working Needs Service #,Working Needs Service %,Not Working #,Not Working %';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*,*,*,*,*,*,*,*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->data = $data_arr;
        $search_form->facility_type->setValue($form_values['facility_type']);
        $this->view->form_values = $form_values;
        $this->view->inlineScript()->appendFile(Zend_Registry::get('baseurl') . '/js/all_level_area_combo_report_graph.js');
    }

    public function voltageStabilizersAndRegulatorsWorkingStatusAction() {
        //ccem proposed list 3.15 (41)

        $this->_helper->layout->setLayout('reports');
        $data_arr = array();
        $search_form = new Form_ReportsSearch();
        $ccm_models = new Model_CcmModels();
        $form_values['facility_type'] = $this->_request->getParam('facility_type', '');
        $form_values['office'] = $this->_request->getParam('office', '');
        $form_values['combo1'] = $this->_request->getParam('combo1', '');
        $form_values['combo2'] = $this->_request->getParam('combo2', '');
        if ($this->_request->isPost()) {
            if ($search_form->isValid($this->_request->getPost())) {
                $form_values = array_merge($form_values, $search_form->getValues());
                $ccm_models->form_values = $form_values;
                $data_arr = $ccm_models->voltageStabilizersAndRegulatorsWorkingStatus();
            }
        }

        $xmlstore = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xmlstore .= "<rows>";

        foreach ($data_arr as $sub_arr) {
            $xmlstore .= "<row>";
            $xmlstore .= "<cell><![CDATA[" . $sub_arr['warehouse_type_name'] . "]]></cell>";
            $xmlstore .= "<cell><![CDATA[" . $sub_arr['ccm_model_name'] . "]]></cell>";
            $xmlstore .= "<cell><![CDATA[" . $sub_arr['ccm_make_name'] . "]]></cell>";
            $xmlstore .= "<cell>" . $sub_arr['asset_type_name'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['total'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['working'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['working_per'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['needs_service'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['needs_service_per'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['not_working'] . "</cell>";
            $xmlstore .= "<cell>" . $sub_arr['not_working_per'] . "</cell>";
            $xmlstore .="</row>";
        }
        $xmlstore .="</rows>";

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Voltage Stabilizers And Regulators Working Status";
        $this->view->headers = 'Facility Type,Model Name,Manufacturer,Equipment Type,Total,Working #,Working %,Working Needs Service #,Working Needs Service %,Not Working #,Not Working %';
        $this->view->rspan = '';
        $this->view->cspan = '#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan,#cspan';
        $this->view->width = '*,*,*,*,*,*,*,*,*,*,*';
        $this->view->ro = 'ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro';
        $this->view->xmlstore = $xmlstore;
        $this->view->search_form = $search_form;
        $this->view->data = $data_arr;
        $search_form->facility_type->setValue($form_values['facility_type']);
        $this->view->form_values = $form_values;
        $this->view->inlineScript()->appendFile(Zend_Registry::get('baseurl') . '/js/all_level_area_combo_report_graph.js');
    }

    public function inventoryListOfAllColdChainEquipmentByFacilityAction() {
        //ccem proposed list 3.21 (46)

        $this->_helper->layout->setLayout('reports');
        $search_form = new Form_ReportsSearch();
        $refrigerator_list = array();
        $coldroom_list = array();
        $coldbox_list = array();
        $icepack_list = array();
        $voltageregulator_list = array();
        $generator_list = array();

        $cold_chain = new Model_ColdChain();
        $form_values['office'] = $this->_request->getParam('office', '');
        $form_values['combo1'] = $this->_request->getParam('combo1', '');
        $form_values['combo2'] = $this->_request->getParam('combo2', '');
        $form_values['warehouse'] = $this->_request->getParam('warehouse', '');
        if ($this->_request->isPost()) {
            if ($search_form->isValid($this->_request->getPost())) {
                $form_values = array_merge($form_values, $search_form->getValues());
                $cold_chain->form_values = $form_values;
                $refrigerator_list = $cold_chain->getAllNonQuantityRefAsets();
                $coldroom_list = $cold_chain->getAllNonQuantityColdRoomAsets();
                $coldbox_list = $cold_chain->getAllNonQuantityColdBoxAsets();
                $icepack_list = $cold_chain->getAllNonQuantityIcePackAsets();
                $voltageregulator_list = $cold_chain->getAllNonQuantityVoltageRegulatorAsets();
                $generator_list = $cold_chain->getAllNonQuantityGeneratorAsets();
            }
        }

        $this->view->main_heading = "CCEM Reports";
        $this->view->report_title = "Inventory List of All Cold Chain Equipment By Facility";
        $this->view->refrigerator_list = $refrigerator_list;
        $this->view->coldroom_list = $coldroom_list;
        $this->view->coldbox_list = $coldbox_list;
        $this->view->icepack_list = $icepack_list;
        $this->view->voltageregulator_list = $voltageregulator_list;
        $this->view->generator_list = $generator_list;
        $this->view->form_values = $form_values;

        /* switch ($this->_user_level) {
          case 1:
          case 2:
          case 3:
          case 4:
          case 5:
          case 6:
          $this->view->inlineScript()->appendFile(Zend_Registry::get('baseurl') . '/js/all_level_area_combo_all_coldchain_equipment.js');
          break;
          } */
        $this->view->inlineScript()->appendFile(Zend_Registry::get('baseurl') . '/js/all_level_area_combo_all_coldchain_equipment.js');
    }

}
