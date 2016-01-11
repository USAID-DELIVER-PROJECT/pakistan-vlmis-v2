<?php

class Form_SearchTransport extends Zend_Form {

    private $_fields = array(
        "ccm_asset_sub_type_id" => "Transport Type",
        "ccm_status_list_id" => "Working Status",
        "source_id" => "Source of supply",
        "fuel_type_id" => "Fuel Type",
        "registration_no" => "Registration No",
        "ccm_make_id" => "Make",
        "ccm_model_id" => "Model",
        "manufacture_year_from" => "Manufacture Year",
        "manufacture_year_to" => "Manufacture Year",
        "placed_at"=>"Placed At",
        "report_type" => "Report Type"
    );
    private $_hidden = array(
        "office_id" => "",
        "combo1_id" => "",
        "warehouse_id" => "",
        "model_id" => ""
    );
    private $_list = array(
        'ccm_asset_sub_type_id' => array(),
        'ccm_status_list_id' => array(),
        'source_id' => array(),
        'ccm_make_id' => array(),
        'ccm_model_id' => array(),
        'fuel_type_id' => array()
    );

    private $_radio = array(
        'placed_at' => array(
            "1" => "Select Warehouse",
            "0" => "Unallocated",
        ),
        'report_type' => array(
            "0" => "Detail View",
            "1" => "Summary View",
        )
    );
    
    public function init() {
        //Generate working status Combo
        $ccm_status_list = new Model_CcmStatusList();
        $result1 = $ccm_status_list->getStatusLists();
        $this->_list["ccm_status_list_id"][''] = "Select working status";
        foreach ($result1 as $row) {
            $this->_list["ccm_status_list_id"][$row['pkId']] = $row['ccmStatusListName'];
        }

        //Generate Makes Combo
        $makes = new Model_CcmMakes();
        $makes->form_values = array('type_id' => Model_CcmAssetTypes::TRANSPORT);
        $result1 = $makes->getAllMakesByAssetType();
        $this->_list["ccm_make_id"][''] = "Select Makes";
        if ($result1) {
            foreach ($result1 as $row) {
                $this->_list["ccm_make_id"][$row['pkId']] = $row['ccmMakeName'];
            }
        }

        //Generate Models Combo
        $this->_list["ccm_model_id"][''] = "Select Make First";

        //Generate Asset Sub Type Combo
        $asset_types = new Model_CcmAssetTypes();
        $asset_types->form_values = array('parent_id' => Model_CcmAssetTypes::TRANSPORT);
        $result3 = $asset_types->getAssetSubTypes();
        $this->_list["ccm_asset_sub_type_id"][''] = "Select Asset Sub Types";
        if ($result3) {
            foreach ($result3 as $assetsubtype) {
                $this->_list["ccm_asset_sub_type_id"][$assetsubtype['pkId']] = $assetsubtype['assetTypeName'];
            }
        }
        //Generate Fuel Type Combo
        $list = new Model_ListDetail();
        $list->form_values = array('fuel_type_id' => Model_ListMaster::FUEL_TYPE);
        $result4 = $list->getFuelTypes();
        $this->_list["fuel_type_id"][''] = "Select Fuel Types";
        if ($result4) {
            foreach ($result4 as $fueltype) {
                $this->_list["fuel_type_id"][$fueltype['pkId']] = $fueltype['listValue'];
            }
        }
        
        //Generate source of supply Combo
        $stakeholder = new Model_Stakeholders();
          $stakeholder->form_values['type'] = 1;
        $result2 = $stakeholder->getAllStakeholders();
        $this->_list["source_id"][''] = "Select Source Of Supply";
        foreach ($result2 as $row2) {
            $this->_list["source_id"][$row2['pkId']] = $row2['stakeholderName'];
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
                case "registration_no":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => true,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "manufacture_year_from":
                case "manufacture_year_to":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", 'readonly' => 'true'),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                default:
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
