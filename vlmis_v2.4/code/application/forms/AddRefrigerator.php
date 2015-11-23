<?php

class Form_AddRefrigerator extends Zend_Form {

    private $_fields = array(
        "catalogue_id" => "Catalogue ID",
        "ccm_make_id" => "Make",
        "ccm_model_id" => "Model",
        "ccm_asset_type_id" => "Asset Sub Type",
        "cfc_free" => "CFC Free Sticker",
        "is_pis_pqs" => "Is PIS/PQS",
        "asset_dimension_length" => "Dimensions",
        "asset_dimension_width" => "Dimensions",
        "asset_dimension_height" => "Dimensions",
        "gross_capacity_4" => "Capacity",
        "gross_capacity_20" => "Capacity",
        "net_capacity_4" => "Capacity",
        "net_capacity_20" => "Capacity",
        "serial_number" => "Serial Number",
        "working_since" => "Working Since Year",
        "catalogue_id_popup" => "Catalogue id",
        "ccm_make_popup" => "Make",
        "ccm_model_popup" => "Model",
        "ccm_asset_type_id_popup" => "Asset Sub Type",
        "asset_dimension_length_popup" => "Dimensions",
        "asset_dimension_width_popup" => "Dimensions",
        "asset_dimension_height_popup" => "Dimensions",
        "gross_capacity_4_popup" => "Capacity",
        "gross_capacity_20_popup" => "Capacity",
        "net_capacity_4_popup" => "Capacity",
        "net_capacity_20_popup" => "Capacity",
       
        "temperature_monitor" => "temperature_monitor",
        "refrigerator_gas_type" => "refrigerator_gas_type",
        "power_source" => "power_source",
        "product_price" => "product_price"
    );
    private $_list = array(
        'ccm_make_id' => array(),
        'ccm_model_id' => array(),
        'ccm_asset_type_id' => array(),
        
        'temperature_monitor' => array(),
        'refrigerator_gas_type' => array(),
        'power_source' => array()
    );
    private $_radio = array(
        'cfc_free' => array(
            "2" => "Not Applicable",
            "1" => "Yes",
            "0" => "No",
        ),
        'is_pis_pqs' => array(
            "1" => "Yes",
            "0" => "No",
        )
    );
    private $_hidden = array(
        "ccm_id" => "pkId",
        "ccm_make_id_hidden" => "",
        "ccm_model_id_hidden" => "",
    );

    public function init() {

        //Generate Asset Id Equipment Code Combo
        $models = new Model_CcmModels();
        
        $models->form_values['asset_type'] = Model_CcmAssetTypes::REFRIGERATOR;
        $result0 = $models->getAllAssetsByType();
        $this->_list["catalogue_id"][''] = "Select";
        foreach ($result0 as $row) {
            $this->_list["catalogue_id"][$row['pkId']] = $row['catalogueId'] . ' - ' . $row['ccmMakeName'] . ' - ' . $row['ccmModelName'];
        }

        //Generate Makes Combo
        $make = new Model_CcmMakes();
        $make->form_values = array('type_id' => Model_CcmAssetTypes::REFRIGERATOR);
        $result1 = $make->getAllMakesByAssetType();
        $this->_list["ccm_make_id"][''] = "Select Makes";
        foreach ($result1 as $make) {
            $this->_list["ccm_make_id"][$make['pkId']] = $make['ccmMakeName'];
        }


        //Generate Temperature Monitor  Combo
        $list_master = new Model_ListMaster();
        $list_master->form_values = array('pk_id' => Model_ListMaster::Temperature_Monitor);
        $result5 = $list_master->getListDetailByType();
        $this->_list["temperature_monitor"][''] = "Select";
        foreach ($result5 as $rs) {
            $this->_list["temperature_monitor"][$rs['pkId']] = $rs['listValue'];
        }

        //Generate Temperature Monitor  Combo
        $list_master = new Model_ListMaster();
        $list_master->form_values = array('pk_id' => Model_ListMaster::refrigerant_gas_type);
        $result5 = $list_master->getListDetailByType();
        $this->_list["refrigerator_gas_type"][''] = "Select";
        foreach ($result5 as $rs) {
            $this->_list["refrigerator_gas_type"][$rs['pkId']] = $rs['listValue'];
        }

        //Generate Temperature Monitor  Combo
        $list_master = new Model_ListMaster();
        $list_master->form_values = array('pk_id' => Model_ListMaster::power_source);
        $result5 = $list_master->getListDetailByType();
        $this->_list["power_source"][''] = "Select";
        foreach ($result5 as $rs) {
            $this->_list["power_source"][$rs['pkId']] = $rs['listValue'];
        }


        //Generate Models Combo
        $this->_list["ccm_model_id"][''] = "Select Make First";

        //Generate Asset Sub Type Combo
        $asset_types = new Model_CcmAssetTypes();
        $asset_types->form_values = array('parent_id' => 1);
        $result3 = $asset_types->getAssetSubTypes();
        $this->_list["ccm_asset_type_id"][''] = "Select";
        $this->_list["ccm_asset_type_id_popup"][''] = "Select";
        foreach ($result3 as $assetsubtype) {
            $this->_list["ccm_asset_type_id"][$assetsubtype['pkId']] = $assetsubtype['assetTypeName'];
            $this->_list["ccm_asset_type_id_popup"][$assetsubtype['pkId']] = $assetsubtype['assetTypeName'];
        }

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "gross_capacity_4":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Gross Cap 4"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                case "gross_capacity_4_popup":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Gross Cap 4"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                case "gross_capacity_20":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Gross Cap -20"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                case "gross_capacity_20_popup":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Gross Cap -20"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                case "gross_capacity_20":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Gross Cap -20"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                case "net_capacity_4_popup":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Net Cap 4"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                case "net_capacity_4":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Net Cap 4"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                case "net_capacity_20":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Net Cap -20"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                case "net_capacity_20_popup":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Net Cap -20"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                case "serial_number":
                case "product_price":
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
                        "attribs" => array("class" => "form-control", 'readonly' => 'true'),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                case "ccm_make_popup":
                case "ccm_model_popup":
                case "catalogue_id_popup":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                case "asset_dimension_length":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Length"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                case "asset_dimension_length_popup":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Length"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                case "asset_dimension_length":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Length"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                case "asset_dimension_width_popup":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Width"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                case "asset_dimension_width":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Length"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                case "asset_dimension_height":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Height"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                case "asset_dimension_height_popup":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Height"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                default:
                    break;
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
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
            }

            if ($col == "ccm_asset_type_id_popup") {
                $attribute_class = "form-control form-group";
            } elseif ($col == "catalogue_id") {
                $attribute_class = "col-md-2 form-control input-small form-group";
            } else {
                $attribute_class = "form-control form-group";
            }

            if (in_array($col, array_keys($this->_list))) {
                $this->addElement("select", $col, array(
                    "attribs" => array("class" => $attribute_class),
                    "filters" => array("StringTrim", "StripTags"),
                    "allowEmpty" => false,
                    "registerInArrayValidator" => false,
                    "multiOptions" => $this->_list[$col]
                ));
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
            }
        }

        foreach ($this->_hidden as $col => $name) {
            switch ($col) {
                case "ccm_id":
                case "ccm_make_id_hidden":
                case "ccm_model_id_hidden":

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
