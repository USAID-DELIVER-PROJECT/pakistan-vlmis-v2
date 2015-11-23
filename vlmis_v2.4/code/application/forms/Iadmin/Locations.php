<?php

class Form_Iadmin_Locations extends Zend_Form {

    private $_fields = array(
        "location_name_add" => "Locaiton Name",
        "location_name_update" => "Locaiton Name",
        "ccm_location_id" => "CCEM Code",
        "ccm_location_id_update" => "CCEM Code",
        "location_type_id" => "Location Type Id",
        "location_type_id_update" => "location_type_id",
        "not_used" => "not_used"
    );
    private $_hidden = array(
        "location_id" => "pkId",
        "location_type" => "pkId",
        "province_id" => "pkId",
        "district_id" => "pkId",
        "parent_id" => "pkId",
        "province_id_edit" => "pkId",
        "district_id_edit" => "pkId",
        "parent_id_edit" => "pkId",
        "location_type_id_update_hidden" => "pkId"
    );
    private $_list = array(
        'location_type_id' => array(),
        'location_type_id_update' => array()
    );
    private $_checkbox = array(
        'not_used' => array(
              "0" => "",
        )
    );

    public function init() {

        //  $location_type = new Model_locationTypes();
        //  $result = $location_type->getAdjusmentTypes();
        //  foreach ($result as $trans) {
        //  $this->_list["location_type"][''] = 'Select';
        // }

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "location_name_add":
                case "location_name_update":
                case "ccm_location_id":
                case "ccm_location_id_update":
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


                case "location_id":
                case "location_type":
                case "province_id":
                case "district_id":
                case "parent_id":
                case "province_id_edit":
                case "district_id_edit":
                case "parent_id_edit":
                case "location_type_id_update_hidden":
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
