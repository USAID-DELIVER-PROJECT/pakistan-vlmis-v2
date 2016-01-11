<?php

class Form_AddTransport extends Zend_Form {

    private $_fields = array(
        "ccm_asset_sub_type_id" => "Transport Type",
        "registration_no" => "Registration No",
        "ccm_make_id" => "Make",
        "ccm_model_id" => "Model",
        "manufacture_year" => "Manufacture Year",
        "used_for_epi" => "% Used For EPI",
        "fuel_type_id" => "Fuel Type",
        "comments" => "Comments",
    );
    private $_list = array(
        'ccm_asset_sub_type_id' => array(),
        'ccm_make_id' => array(),
        'ccm_model_id' => array(),
        'fuel_type_id' => array()
    );
    private $_hidden = array(
        "ccm_id" => "pkId",
        "model_hidden" => "pkId" 
    );

    public function init() {
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


        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "registration_no":
                
                case "used_for_epi":
                case "comments":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => true,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "manufacture_year":
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
