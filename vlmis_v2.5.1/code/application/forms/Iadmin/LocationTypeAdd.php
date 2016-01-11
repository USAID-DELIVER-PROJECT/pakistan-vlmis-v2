<?php

class Form_Iadmin_LocationTypeAdd extends Zend_Form {

    private $_fields = array(
        "location_type_name" => "Location Type Name",
        "geo_level_id" => "Geo Level",
        "status" => "Status"
    );
    private $_list = array(
        'geo_level_id' => array(),
    );
    private $_radio = array(
        'status' => array(
            "1" => "Active",
            "0" => "In Active"
        )
    );
    private $_hidden = array(
        "location_type_id" => "pkId"
    );
    
    public function init() {  
       //Generate Item Combo
        $geo_level = new Model_GeoLevels();
        $result = $geo_level->getGeosAll();
        $this->_list["geo_level_id"][''] = "Select Geo Levels";
        if ($result) {
            foreach ($result as $row) {
                $this->_list["geo_level_id"][$row->getPkId()] = $row->getGeoLevelName();
            }
        }
           foreach ($this->_hidden as $col => $name) {
            switch ($col) {
                case "location_type_id":
                    $this->addElement("hidden", $col);
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                default:
                    break;
            }
        }
        
        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "location_type_name":
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
