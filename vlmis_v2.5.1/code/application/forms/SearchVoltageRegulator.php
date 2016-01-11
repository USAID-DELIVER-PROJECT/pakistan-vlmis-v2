<?php

class Form_SearchVoltageRegulator extends Zend_Form {

    private $_fields = array(
        "placed_at" => "Placed At",
        "catalogue_id" => "Catalogue ID",
        "quantity" => "Quantity",
        "ccm_make_id" => "Make",
        "ccm_model_id" => "Model",
        "ccm_status_list_id" => "Working Status",
        "report_type" => "Report Type"
    );
    private $_list = array(
        'ccm_make_id' => array(),
        'ccm_model_id' => array()
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
        $make = new Model_CcmMakes();
        $make->form_values = array('type_id' => Model_CcmAssetTypes::VOLTAGEREGULATOR);
        $result1 = $make->getAllMakesByAssetType();
        $this->_list["ccm_make_id"][''] = "Select Makes";
        foreach ($result1 as $make) {
            $this->_list["ccm_make_id"][$make['pkId']] = $make['ccmMakeName'];
        }

        //Generate Models Combo
        $this->_list["ccm_model_id"][''] = "Select Make First";
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
                case "catalogue_id":
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

            if (in_array($col, array_keys($this->_list))) {
                $this->addElement("select", $col, array(
                    "attribs" => array("class" => 'form-control'),
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
