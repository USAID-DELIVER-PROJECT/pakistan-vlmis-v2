<?php

class Form_SearchColdRoom extends Zend_Form {

    private $_fields = array(
        "asset_id" => "Asset Id",
        "serial_number" => "Serial Number",
        "working_since_from" => "Working Since Year from",
        "working_since_to" => "Working Since Year to",
        "ccm_model_id" => "Model",
        "stakeholder_id" => "Stakeholder",
        "warehouse_id" => "Warehouse",
        "ccm_status_list_id" => "Working Status",
        "source_id" => "Source of supply",
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
        "capacity_from" => "Capacity from",
        "net_capacity" => "Capacity",
        "capacity_to" => "Capacity to",
        "placed_at" => "placed at",
        "no_of_phases" => "No Of Phases",
        "n" => "No",
        "make" => "make",
        "year_supply_from" => "Year of Supply from",
        "year_supply_to" => "Year of Supply to",
        "report_type" => "Report Type"
    );
    private $_list = array(
        'ccm_model_id' => array('' => 'Select Make First'),
        'ccm_status_list_id' => array(),
        'source_id' => array(),
        'stakeholder_id' => array(),
        'ccm_asset_sub_type_id' => array(),
        'type_recording_system' => array(),
        'refrigerator_gas_type' => array(),
        'backup_generator' => array(),
        'make' => array(),
        'temperature_recording_system' => array()
    );
    private $_hidden = array(
        "office_id" => "",
        "combo1_id" => "",
        "warehouse_id" => "",
        "model_id" => ""
    );
    private $_radio = array(
        'placed_at' => array(
            "1" => "Select Warehouse",
            "0" => "Unallocated",
        ),
        'no_of_phases' => array(
            "1" => "One",
            "3" => "Three",
        ),
        'has_voltage' => array(
            "1" => "Yes",
            "0" => "No",
        ),
        'report_type' => array(
            "0" => "Detail View",
            "1" => "Summary View",
        )
    );
    private $_checkbox = array();

    public function init() {
        //Generate working status Combo
        $ccm_status_list = new Model_CcmStatusList();
        $result1 = $ccm_status_list->getStatusLists();
        $this->_list["ccm_status_list_id"][''] = "Select working status";
        foreach ($result1 as $row) {
            $this->_list["ccm_status_list_id"][$row['pkId']] = $row['ccmStatusListName'];
        }
        //Generate source of supply Combo
        $stakeholder = new Model_Stakeholders();
        $stakeholder->form_values['type'] = 1;
        $result2 = $stakeholder->getAllStakeholders();
        $this->_list["source_id"][''] = "Select Source Of Supply";
        foreach ($result2 as $row2) {
            $this->_list["source_id"][$row2['pkId']] = $row2['stakeholderName'];
        }

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
        foreach ($this->_hidden as $col => $name) {
            switch ($col) {


                case "office_id":
                case "combo1_id":
                case "warehouse_id":
                case "model_id":

                    $this->addElement("hidden", $col);
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                default:
                    break;
            }
        }
        foreach ($this->_fields as $col => $name) {
            switch ($col) {

                case "year_supply_from":
                case "year_supply_to":
                case "cooling_system":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "capacity_from":

                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Gross Capacity"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                case "capacity_to":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Gross Capacity"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "asset_id":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => true,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "working_since_from":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "readonly" => "true"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                case "working_since_to":
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
                        "validators" => array()));
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
                        array(
                            "validator" => "Float",
                            "breakChainOnFailure" => false,
                            "options" => array(
                                "messages" => array("notFloat" => $name . " must be a valid option")
                            )
                        )
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
    }

    public function addHidden() {
        $this->addElement("hidden", "id", array(
            "attribs" => array("class" => "hidden"),
            "allowEmpty" => false,
            "filters" => array("StringTrim"),
            "validators" => array(
                array(
                    "validator" => "NotEmpty",
                    "breakChainOnFailure" => true,
                    "options" => array("messages" => array("isEmpty" => "ID cannot be blank"))
                ),
                array(
                    "validator" => "Digits",
                    "breakChainOnFailure" => false,
                    "options" => array("messages" => array("notDigits" => "ID must be numeric")
                    )
                )
            )
        ));
        $this->getElement("id")->removeDecorator("Label")->removeDecorator("HtmlTag");
    }

}
