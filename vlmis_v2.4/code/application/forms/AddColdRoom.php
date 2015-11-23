<?php

class Form_AddColdRoom extends Zend_Form {

    private $_fields = array(
        "serial_number" => "Serial Number",
        "working_since" => "Working Since Year",
        "ccm_model_id" => "Model",
        "stakeholder_id" => "Stakeholder",
        "warehouse_id" => "Warehouse",
        "cooling_system" => "cooling_system",
        "has_voltage" => "Has Voltage regulator",
        "ccm_asset_sub_type_id" => "asset sub type id",
        "temperature_recording_system" => "temperature recording system",
        "type_recording_system" => "type recording system",
        "refrigerator_gas_type" => "refrigerator gas type",
        "backup_generator" => "backup generator",
        "ccm_model_name" => "ccm_model_name",
        "asset_dimension_length" => "Dimensions",
        "asset_dimension_width" => "Dimensions",
        "asset_dimension_height" => "Dimensions",
        "gross_capacity" => "Capacity",
        //"gross_capacity_20" => "Capacity",
        "net_capacity" => "Capacity",
        //"net_capacity_20" => "Capacity",
        "placed_at" => "placed at",
        "no_of_phases" => "No Of Phases",
        "n" => "No",
        "make" => "make"
    );
    private $_list = array(
        'ccm_model_id' => array('' => 'Select Make First'),
        'stakeholder_id' => array(),
        'ccm_asset_sub_type_id' => array(),
        'type_recording_system' => array(),
        'refrigerator_gas_type' => array(),
        'backup_generator' => array(),
        'make' => array(),
        'temperature_recording_system' => array()
    );
    private $_radio = array(
        'placed_at' => array(
            "1" => "Unallocated",
            "2" => "Select Store",
        ),
        'no_of_phases' => array(
            "1" => "One",
            "3" => "Three",
        ),
        'has_voltage' => array(
            "1" => "Yes",
            "0" => "No",
        )
    );
    private $_checkbox = array();
    
    private $_hidden = array(
        "ccm_id" => "pkId",
         "model_hidden" => "pkId"       
    );


    public function init() {
        //Generate Make Combo
        $makes = new Model_CcmMakes();
        $makes->form_values = array('type_id' => Model_CcmAssetTypes::COLDROOM);
        $result3 = $makes->getAllMakesByAssetType();
        $this->_list["make"][''] = "Select";
        foreach ($result3 as $rs) {
            $this->_list["make"][$rs['pkId']] = $rs['ccmMakeName'];
        }

        //Generate Asset Sub Type Combo
        $asset_type = new Model_CcmAssetTypes();
        $asset_type->form_values = array('parent_id' => Model_CcmAssetTypes::COLDROOM);
        $result4 = $asset_type->getAssetSubTypes();
        $this->_list["ccm_asset_sub_type_id"][''] = "Select";
        foreach ($result4 as $rs) {
            $this->_list["ccm_asset_sub_type_id"][$rs['pkId']] = $rs['assetTypeName'];
        }

        //Generate Type Rrecording System Combo
        $list_master = new Model_ListMaster();
        $list_master->form_values = array('pk_id' => Model_ListMaster::TYPE_OF_RECORDING_SYSTEM);
        $result5 = $list_master->getListDetailByType();
        $this->_list["type_recording_system"][''] = "Select";
        foreach ($result5 as $rs) {
            $this->_list["type_recording_system"][$rs['pkId']] = $rs['listValue'];
        }

        //Generate Refrigerator Gas Type Combo
        $list_master->form_values = array('pk_id' => Model_ListMaster::REFRRIGERATOR_GAS_TYPE);
        $result6 = $list_master->getListDetailByType();
        $this->_list["refrigerator_gas_type"][''] = "Select";
        foreach ($result6 as $rs) {
            $this->_list["refrigerator_gas_type"][$rs['pkId']] = $rs['listValue'];
        }

        //Generate Backup Generator Combo
        $list_master->form_values = array('pk_id' => Model_ListMaster::HAS_WORKING_BACKUP_GENERATOR);
        $result7 = $list_master->getListDetailByType();
        $this->_list["backup_generator"][''] = "Select";
        foreach ($result7 as $rs) {
            $this->_list["backup_generator"][$rs['pkId']] = $rs['listValue'];
        }

        //Generate Temperature Recording System Combo
        $list_master->form_values = array('pk_id' => Model_ListMaster::TEMPERATURE_RECORDING_SYSTEM);
        $result8 = $list_master->getListDetailByType();
        $this->_list["temperature_recording_system"][''] = "Select";
        foreach ($result8 as $rs) {
            $this->_list["temperature_recording_system"][$rs['pkId']] = $rs['listValue'];
        }

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "cooling_system":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "working_since":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "readonly" => "true"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                //case "gross_capacity_4":
                case "gross_capacity":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Gross Capacity"),
                        "allowEmpty" => true,
                        "required" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                /* case "gross_capacity_20":
                  $this->addElement("text", $col, array(
                  "attribs" => array("class" => "form-control", "placeholder" => "Gross Cap 20"),
                  "allowEmpty" => false,
                  "required" => true,
                  "filters" => array("StringTrim", "StripTags"),
                  "validators" => array(
                  array(
                  "validator" => "Float",
                  "breakChainOnFailure" => false,
                  "options" => array(
                  "messages" => array("notFloat" => $name . " must be a valid option")
                  )
                  )
                  )));
                  $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                  break; */

                case "net_capacity":
                    //case "net_capacity_4":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Net Capacity"),
                        "allowEmpty" => true,
                        "required" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                /* case "net_capacity_20":
                  $this->addElement("text", $col, array(
                  "attribs" => array("class" => "form-control", "placeholder" => "Net Cap 20"),
                  "allowEmpty" => false,
                  "required" => true,
                  "filters" => array("StringTrim", "StripTags"),
                  "validators" => array(
                  array(
                  "validator" => "Float",
                  "breakChainOnFailure" => false,
                  "options" => array(
                  "messages" => array("notFloat" => $name . " must be a valid option")
                  )
                  )
                  )));
                  $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                  break; */
                case "asset_dimension_length":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Length"),
                        "allowEmpty" => false,
                        "required" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                case "asset_dimension_width":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Width"),
                        "allowEmpty" => false,
                        "required" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                case "asset_dimension_height":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Height"),
                        "allowEmpty" => false,
                        "required" => false,
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
                    "multiOptions" => $this->_list[$col],
                    "validators" => array(
                    )
                ));
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
            }

            if (in_array($col, array_keys($this->_radio))) {
                $this->addElement("radio", $col, array(
                    "attribs" => array(),
                    "allowEmpty" => true,
                    'separator' => '',
                    "filters" => array("StringTrim", "StripTags"),
                    "validators" => array(),
                    "multiOptions" => $this->_radio[$col]
                ));
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag")->removeDecorator("<br>");
            }

            if (in_array($col, array_keys($this->_checkbox))) {
                $this->addElement("multiCheckbox", $col, array(
                    "attribs" => array(),
                    "allowEmpty" => true,
                    'separator' => '',
                    "filters" => array("StringTrim", "StripTags"),
                    "validators" => array(),
                    "multiOptions" => $this->_checkbox[$col]
                ));
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag")->removeDecorator("<br>");
            }
        }
       foreach ($this->_hidden as $col => $name) {
            switch ($col) {
                   case "ccm_id":
                   case "model_hidden":
                
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
            "allowEmpty" => false,
            "filters" => array("StringTrim"),
            "validators" => array()
        ));
        $this->getElement("id")->removeDecorator("Label")->removeDecorator("HtmlTag");
    }

}
