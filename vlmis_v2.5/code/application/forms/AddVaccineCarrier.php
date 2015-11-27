<?php

class Form_AddVaccineCarrier extends Zend_Form {

    private $_fields = array(
        "placed_at" => "Placed At",
        "catalogue_id" => "Catalogue Id",
        "ccm_make_id" => "Make",
        "ccm_model_id" => "Model",
        "asset_dimension_length" => "Asset Dimension Length",
        "asset_dimension_width" => "Asset Dimension Width",
        "asset_dimension_height" => "Asset Dimension Height",
        "quantity" => "Quantity",
        "catalogue_id_popup" => "Catalogue id",
        "ccm_make_popup" => "Make",
        "ccm_model_popup" => "Model",
        "asset_dimension_length_popup" => "Dimensions",
        "asset_dimension_width_popup" => "Dimensions",
        "asset_dimension_height_popup" => "Dimensions",
        "internal_dimension_length_popup" => "Dimensions",
        "internal_dimension_width_popup" => "Dimensions",
        "internal_dimension_height_popup" => "Dimensions",
        "storage_dimension_length_popup" => "Dimensions",
        "storage_dimension_width_popup" => "Dimensions",
        "storage_dimension_height_popup" => "Dimensions",
        "ccm_asset_type_id_popup" => "ccm_asset_type_id_popup",
        "net_capacity_4" => "net_capacity_4",
        "cold_life" => "cold_life",
        "product_price" => "product_price"
    );
    private $_list = array(
    );
    private $_radio = array(
        'placed_at' => array(
            "0" => "Unallocated",
            "1" => "Select Warehouse",
        )
    );
    private $_hidden = array(
        "ccm_make_id_hidden" => "",
        "ccm_model_id_hidden" => "",
    );

    public function init() {
        //Generate Asset Id Equipment Code Combo
        $models = new Model_CcmModels();
        $models->form_values['asset_type'] = Model_CcmAssetTypes::VACCINECARRIER;
        $result0 = $models->getAllAssetsByType();
        $this->_list["catalogue_id"][''] = "Select";
        foreach ($result0 as $row) {
            $this->_list["catalogue_id"][$row['pkId']] = $row['catalogueId'] . ' - ' . $row['ccmMakeName'] . ' - ' . $row['ccmModelName'];
        }

        //Generate Makes Combo
        $make = new Model_CcmMakes();
        $make->form_values = array('type_id' => Model_CcmAssetTypes::VACCINECARRIER);
        $result1 = $make->getAllMakesByAssetType();
        $this->_list["ccm_make_id"][''] = "Select Makes";
        foreach ($result1 as $make) {
            $this->_list["ccm_make_id"][$make['pkId']] = $make['ccmMakeName'];
        }

        //Generate Asset Sub Type Combo
        $asset_types = new Model_CcmAssetTypes();
        $asset_types->form_values = array('parent_id' => 2);
        $result3 = $asset_types->getAssetSubTypes();

        $this->_list["ccm_asset_type_id_popup"][''] = "Select";
        foreach ($result3 as $assetsubtype) {

            $this->_list["ccm_asset_type_id_popup"][$assetsubtype['pkId']] = $assetsubtype['assetTypeName'];
        }



        //Generate Models Combo
        $this->_list["ccm_model_id"][''] = "Select Make First";
        foreach ($this->_hidden as $col => $name) {
            switch ($col) {
                case "ccm_make_id_hidden":
                case "ccm_model_id_hidden":
                    $this->addElement("hidden", $col);
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                default:
                    break;
            }
        }
        foreach ($this->_fields as $col => $name) {
            switch ($col) {
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

                case "quantity":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control input-small"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                case "net_capacity_4":
                case "cold_life":
                case "product_price":
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
                        "required" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                case "asset_dimension_length_popup":
                case "internal_dimension_length_popup":
                case "storage_dimension_length_popup":
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

                case "asset_dimension_width_popup":
                case "internal_dimension_width_popup":
                case "storage_dimension_width_popup":
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

                case "asset_dimension_height_popup":
                case "internal_dimension_height_popup":
                case "storage_dimension_height_popup":
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

            if ($col == "catalogue_id") {
                $attribute_class = "col-md-2 form-control input-small form-group";
            } else {
                $attribute_class = "form-control";
            }

            if (in_array($col, array_keys($this->_list))) {
                $this->addElement("select", $col, array(
                    "attribs" => array("class" => $attribute_class),
                    "filters" => array("StringTrim", "StripTags"),
                    "allowEmpty" => true,
                    "required" => false,
                    "registerInArrayValidator" => false,
                    "multiOptions" => $this->_list[$col],
                    "validators" => array()
                ));
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
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
