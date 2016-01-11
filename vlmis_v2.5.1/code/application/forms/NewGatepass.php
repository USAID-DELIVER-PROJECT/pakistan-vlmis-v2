<?php

class Form_NewGatepass extends Zend_Form {

    private $_fields = array(
        "date_from" => "Date From",
        "date_to" => "Date To",
        "vehicle_type_id" => "Vehicle Type",
        "gatepass_vehicle_id" => "Vehicle",
        "vehicle_other" => "Vehicle Number",
        "other" => "Other",
        "stock_master_id" => "Issue No",
        "transaction_date" => "Date",
        "quantity" => "Quantity",
    );
    private $_list = array(
        'vehicle_type_id' => array(),
        'gatepass_vehicle_id' => array(),
        'stock_master_id' => array(),
    );
    private $_checkbox = array(
    );

    public function init() {
        //Generate Vehicle Type Combo
        $list = new Model_ListDetail();
        $list->form_values = array('listMaster' => Model_ListMaster::VEHICLE_TYPE);
        $result1 = $list->getListDetail();
        $this->_list["vehicle_type_id"][''] = "Select Vehicle Type";
        if ($result1) {
            foreach ($result1 as $row) {
                $this->_list["vehicle_type_id"][$row->getPkId()] = $row->getListValue();
            }
        }

        $this->_list["number"][''] = "Select Vehicle Type First";

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "vehicle_type_id":
                case "gatepass_vehicle_id":
                case "vehicle_other":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => true,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "stock_master_id":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => true,
                        "multiple" => "multiple",
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "date_from":
                case "date_to":
                case "transaction_date":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", 'readonly' => 'true'),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array(),
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "transaction_number":
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
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "other":
                    $this->addElement("checkbox", $col, array(
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
    }

    public function readFields() {
        $this->getElement('vehicle_type_id')->setAttrib("disabled", "true");
        $this->getElement('gatepass_vehicle_id')->setAttrib("disabled", "true");
        $this->getElement('transaction_date')->setAttrib("disabled", "true");
        $this->getElement('vehicle_other')->setAttrib("disabled", "true");
    }

}
