<?php

class Form_AddVoltageRegulator extends Zend_Form {

    private $_fields = array(
        "placed_at" => "Placed At",
        "no_of_phases" => "no_of_phases",
        "catalogue_id" => "Catalogue ID",
        "quantity" => "Quantity",
        "ccm_make_id" => "Make",
        "ccm_model_id" => "Model",
        "catalogue_id_popup" => "Catalogue id",
        "ccm_make_popup" => "Make",
        "ccm_model_popup" => "Model",
        "nominal_voltage" => "nominal_voltage",
        "continous_power" => "continous_power",
        "frequency" =>  "frequency",
        "product_price" => "product_price",
        "input_voltage_range" => "input_voltage_range",
        "output_voltage_range" => "output_voltage_range"
     );
    private $_list = array(
        'ccm_make_id' => array(),
        'ccm_model_id' => array()
    );
    private $_radio = array(
        'placed_at' => array(
            "0" => "Unallocated",
            "1" => "Select Warehouse",
        ),
        'no_of_phases' => array(
            "1" => "one",
            "3" => "three",
        )
    );
    


    public function init() {
        //Generate Asset Id Equipment Code Combo
        $models = new Model_CcmModels();
        $models->form_values['asset_type'] = Model_CcmAssetTypes::VOLTAGEREGULATOR;
        $result0 = $models->getAllAssetsByType();
        $this->_list["catalogue_id"][''] = "Select asset";
        foreach ($result0 as $row) {
            $this->_list["catalogue_id"][$row['pkId']] = $row['catalogueId'] . ' - ' . $row['ccmMakeName'] . ' - ' . $row['ccmModelName'];
        }

        //Generate Makes Combo
        $make = new Model_CcmMakes();
        $make->form_values = array('type_id' => Model_CcmAssetTypes::VOLTAGEREGULATOR);
        $result1 = $make->getAllMakesByAssetType();
        $this->_list["ccm_make_id"][''] = "Select Makes";
        foreach ($result1 as $make) {
            $this->_list["ccm_make_id"][$make['pkId']] = $make['ccmMakeName'];
        }

        //Generate Models Combo
        $this->_list["ccm_model_id"][''] = "Select Make First";

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
                case "nominal_voltage":
                case "continous_power":
                case "frequency":
                case "product_price":
                case "input_voltage_range":
                case "output_voltage_range":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
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
