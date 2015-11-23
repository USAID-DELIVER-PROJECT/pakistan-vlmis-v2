<?php

class Form_AddGenerator extends Zend_Form {

    private $_fields = array(
        "make" => "Make",
        "ccm_model_id" => "Model",
        "serial_number" => "Serial Number",
        "working_since" => "Working Since Year",
        "no_of_phases" => "No Of Phases",
        "power_rating" => "Power Rating",
        "power_source" => "Power Source",
        "automatic_start" => "Automatic Start Mechanism",
        "use_for" => "Use for",
        "equipment_utilizations" => "Equipment Utilizations"
    );
    private $_list = array(
        'make' => array(),
        'ccm_model_id' => array('' => 'Select Make First'),
        'power_source' => array(),
        'use_for' => array(),
        'equipment_utilizations' => array()
    );
    private $_radio = array(
        'no_of_phases' => array(
            "1" => "One",
            "3" => "Three",
        ),
        'automatic_start' => array(
            "1" => "Yes",
            "2" => "No",
        ),
        'placed_at' => array(
            "1" => "Unallocated",
            "2" => "Select Warehouse",
        )
    );
    private $_checkbox = array();
    
     private $_hidden = array(
        "ccm_id" => "pkId",
         "model_hidden" => "pkId" 
    );


    public function init() {
        //Generate Make Combo
        $makes = new Model_CcmMakes();
        $makes->form_values = array('type_id' => Model_CcmAssetTypes::GENERATOR);
        $result3 = $makes->getAllMakesByAssetType();
        $this->_list["make"][''] = "Select";
        if ($result3 != false) {
            foreach ($result3 as $wh) {
                $this->_list["make"][$wh['pkId']] = $wh['ccmMakeName'];
            }
        }

        //Generate Power Source Combo
        $list_master = new Model_ListMaster();
        $list_master->form_values = array('pk_id' => Model_ListMaster::FUEL_TYPE);
        $result1 = $list_master->getListDetailByType();
        $this->_list["power_source"][''] = "Select";
        if ($result1 != false) {
            foreach ($result1 as $rs) {
                $this->_list["power_source"][$rs['pkId']] = $rs['listValue'];
            }
        }

        //Generate Used For Combo
        $list_master = new Model_ListMaster();
        $list_master->form_values = array('pk_id' => Model_ListMaster::USE_FOR);
        $result2 = $list_master->getListDetailByType();
        $this->_list["use_for"][''] = "Select";
        if ($result2 != false) {
            foreach ($result2 as $rs) {
                $this->_list["use_for"][$rs['pkId']] = $rs['listValue'];
            }
        }

        //Generate Utilizations Combo
        //not decided yet from which table it will populate
         $list_master = new Model_ListMaster();
          $list_master->form_values = array('pk_id' => Model_ListMaster::USE_FOR);
          $result2 = $list_master->getListDetailByType();
          $this->_list["equipment_utilizations"][''] = "Select";
          foreach ($result2 as $rs) {
          $this->_list["equipment_utilizations"][$rs['pkId']] = $rs['listValue'];
          } 

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "power_rating":
                case "serial_number":
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

    public
            function addHidden() {
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
