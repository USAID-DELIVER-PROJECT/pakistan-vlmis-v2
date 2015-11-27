<?php

class Form_Iadmin_Stores extends Zend_Form {

    private $_fields = array(
        "store_name_add" => "store/facility Name",
        "store_name_update" => "store/facility Name",
        "ccm_warehouse_id" => "CCEM Code",
        "ccm_warehouse_id_update" => "CCEM Code",
        "warehouse_type" => "warehouse_type",
        "warehouse_type_update" => "warehouse_type_update"
    );
    private $_hidden = array(
        "wh_id" => "pkId",
        "office_type" => "pkId",
        "province_id" => "pkId",
        "district_id" => "pkId",
        "tehsil_id" => "pkId",
        "parent_id" => "pkId",
        "office_id_edit" => "pkId",
        "province_id_edit" => "pkId",
        "district_id_edit" => "pkId",
        "tehsil_id_edit" => "pkId",
        "parent_id_edit" => "pkId",
        "warehouse_type_id_hidden" => "pkId"
    );
    private $_list = array(
        'warehouse_type' => array(),
        'warehouse_type_update' => array()
    );

    public function init() {

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "store_name_add":
                case "store_name_update":
                case "ccm_warehouse_id":
                case "ccm_warehouse_id_update":
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
        }

        foreach ($this->_hidden as $col => $name) {
            switch ($col) {


                case "wh_id":
                case "office_type":
                case "office_id_edit":
                case "province_id":
                case "district_id":
                case "tehsil_id":
                case "parent_id":
                case "province_id_edit":
                case "district_id_edit":
                case "tehsil_id_edit":
                case "parent_id_edit":
                case "warehouse_type_id_hidden":
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
