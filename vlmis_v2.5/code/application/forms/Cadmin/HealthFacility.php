<?php

class Form_Cadmin_HealthFacility extends Zend_Form {

    private $_fields = array(
        "types" => "Type of Health Facility",
        "types_services_provided" => "Type of Services Provided",
        "routine_immunization_ice_pack" => "Routine Immunization Ice Pack Requirements",
        "snid_nid_ice_pack" => "SNID / NID Ice Pack Requirements",
        "epi_vaccination_staff" => "EPI Vaccination Staff",
        "grid_electricity_availibility" => "Grid Electricity Availibility",
        "solar_energy" => "Solar Energy",
        "old_warehouse" => "Warehouse",
        "vaccine_supply_mode" => "vaccine_supply_mode",
        "health_facility_type" => "health_facility_type",
        "services_type" => "services_type",
        "facility_total_population" => "facility_total_population",
        "live_birth_per_year" => "live_birth_per_year",
        "pregnant_women_per_year" => "pregnant_women_per_year",
        "women_of_child_bearing_age" => "women_of_child_bearing_age",
        "estimation_year" => "estimation_year"
    );
    private $_hidden = array(
        "id" => "pkId",
        "old_warehouse_val" => "Warehouse",
        "office_level" => "office"
    );
    private $_list = array(
        "grid_electricity_availibility" => array(),
        "vaccine_supply_mode" => array(),
        "health_facility_type" => array()
    );
    private $_checkbox = array(
        "epi_vaccination_staff" => array(),
        "solar_energy" => array(),
        "services_type" => array()
    );

    public function init() {

        $list_detail = new Model_ListDetail();
        $list_detail->form_values['master_id'] = Model_ListMaster::GRID_ELECTRICITY_AVAL;
        $result = $list_detail->getListDetailByMasterId();

        foreach ($result as $list) {
            $this->_list["grid_electricity_availibility"][''] = 'Select';
            $this->_list["grid_electricity_availibility"][$list['pkId']] = $list['listValue'];
        }

        $warehouse = new Model_Warehouses();
        $res_warehouse = $warehouse->getHealthFacilityTypes();
        foreach ($res_warehouse as $row) {

            //  $this->_checkbox["vaccine_supply_mode"][$list12['pkId']] = $list12['listValue'];
            $this->_list["health_facility_type"][''] = 'Select';
            $this->_list["health_facility_type"][$row['pkId']] = $row['warehouseTypeName'];
        }
        $list_detail->form_values['master_id'] = Model_ListMaster::VACCINATION_STAFF;
        $result1 = $list_detail->getListDetailByMasterId();

        foreach ($result1 as $list1) {

            $this->_checkbox["epi_vaccination_staff"][$list1['pkId']] = $list1['listValue'];
        }
        $list_detail->form_values['master_id'] = Model_ListMaster::Service_Types;
        $result13 = $list_detail->getListDetailByMasterId();

        foreach ($result13 as $list13) {


            $this->_checkbox["services_type"][$list13['pkId']] = $list13['listValue'];
        }

        $list_detail->form_values['master_id'] = Model_ListMaster::Vaccine_Supply_Mode;
        $result12 = $list_detail->getListDetailByMasterId();

        foreach ($result12 as $list12) {

            //  $this->_checkbox["vaccine_supply_mode"][$list12['pkId']] = $list12['listValue'];
            $this->_list["vaccine_supply_mode"][''] = 'Select';
            $this->_list["vaccine_supply_mode"][$list12['pkId']] = $list12['listValue'];
        }

        $list_detail->form_values['master_id'] = Model_ListMaster::SOLAR_ENERGY;
        $result2 = $list_detail->getListDetailByMasterId();

        foreach ($result2 as $list2) {

            $this->_checkbox["solar_energy"][$list2['pkId']] = $list2['listValue'];
        }


        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "routine_immunization_ice_pack":
                case "snid_nid_ice_pack":
                case "vaccine_supply_mode":
                case "facility_total_population":
                case "live_birth_per_year":
                case "pregnant_women_per_year":
                case "women_of_child_bearing_age":

                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => true,
                        "required" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                case "estimation_year":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", 'readonly' => 'true'),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                default:
                    break;
            }

            if (in_array($col, array_keys($this->_list))) {
                $this->addElement("select", $col, array(
                    "attribs" => array("class" => "form-control"),
                    "filters" => array("StringTrim", "StripTags"),
                    "allowEmpty" => true,
                    "required" => false,
                    "registerInArrayValidator" => false,
                    "multiOptions" => $this->_list[$col]
                ));
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
            }
            if (in_array($col, array_keys($this->_checkbox))) {
                $this->addElement("checkbox", $col, array(
                    "attribs" => array(),
                    "allowEmpty" => true,
                    'separator' => '',
                    "filters" => array("StringTrim", "StripTags"),
                    "validators" => array(),
                    "multiOptions" => $this->_checkbox[$col]
                ));
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
            }
        }

        foreach ($this->_hidden as $col => $name) {
            switch ($col) {
                case "old_warehouse_val":
                case "office_level":
                    $this->addElement("hidden", $col);
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                default:
                    break;
            }
        }
    }

    public function addHidden() {
        $this->addElement("hidden", "id", array(
            "attribs" => array("class" => "hidden"),
            "allowEmpty" => true,
            "required" => false,
            "filters" => array("StringTrim"),
            "validators" => array()
        ));
        $this->getElement("id")->removeDecorator("Label")->removeDecorator("HtmlTag");
    }

    public function addFields() {

        foreach ($this->_fields as $col => $name) {
            switch ($col) {

                case "old_warehouse":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => true,
                        "required" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                default:
                    break;
            }
        }
        $this->getElement('old_warehouse')->setAttrib("disabled", "true");
    }

}
