<?php

class Form_PlacementArea extends Zend_Form {

    private $_fields = array(
        "area" => "Area",
        "row" => "Row From",
        "row_to" => "Row To",
        "rack" => "Rack From",
        "rack_to" => "Rack To",
        "rack_information_id" => "Rack Type",
        "pallet" => "Pallet From",
        "pallet_to" => "Pallet To",
        "level" => "Level From",
        "level_to" => "Level To",
        "location_name" => "Label", 
    );
    private $_list = array(
        'area' => array(),
        'row' => array(),
        'row_to' => array(),
        'rack' => array(),
        'rack_to' => array(),
        'rack_information_id' => array(),
        'pallet' => array(),
        'pallet_to' => array(),
        'level' => array(),
        'level_to' => array(),  
    ); 
      private $_hidden = array(
        "placement_area_id" => ""
    );

    public function init() {
        
        //Generate Area Combo
        $list = new Model_ListDetail();
        $list->form_values = array('listMaster' => Model_ListMaster::AREA);
        $result1= $list->getListDetail();
        //print_r($result1);
        $this->_list["area"][''] = "Select Area";
        if ($result1) {
            foreach ($result1 as $area) {
                $this->_list["area"][$area->getListValue()] = $area->getListValue();
            }
        }
        
        //Generate Row From Combo
        $list = new Model_ListMaster();
        $list->form_values = array('pk_id' => Model_ListMaster::ROW);
        $result2= $list->getListDetailByType();
        $this->_list["row"][''] = "Select Row";
        if ($result2) {
            foreach ($result2 as $row) {
                $this->_list["row"][$row['pkId']] = $row['listValue'];
            }
        }
        
        //Generate Row To Combo
        $list = new Model_ListMaster();
        $list->form_values = array('pk_id' => Model_ListMaster::ROW);
        $list->form_values['order'] = "desc";
        $result3= $list->getListDetailByType();
        $this->_list["row_to"][''] = "Select Row To";
        if ($result3) {
            foreach ($result3 as $row) {
                $this->_list["row_to"][$row['pkId']] = $row['listValue'];
            }
        }
        
        //Generate Rack Combo
        $list = new Model_ListMaster();
        $list->form_values = array('pk_id' => Model_ListMaster::RACK);
        $result7= $list->getListDetailByType();
        $this->_list["rack"][''] = "Select Rack";
        if ($result7) {
            foreach ($result7 as $rack) {
                $this->_list["rack"][$rack['pkId']] = $rack['listValue'];
            }
        }
        
        //Generate Rack To Combo
        $list = new Model_ListDetail();
        $list->form_values = array('listMaster' => Model_ListMaster::RACK);
        $result3= $list->getListDetail();
        $this->_list["rack_to"][''] = "Select Rack To";
        if ($result3) {
            foreach ($result3 as $rack) {
                $this->_list["rack_to"][$rack->getListValue()] = $rack->getListValue();
            }
        }

        //Generate Rack Type Combo
        $rack_information = new Model_RackInformation();
        $result4 = $rack_information->getRackInformation();
        $this->_list["rack_information_id"][''] = "Select Rack Type";
        if ($result4) {
            foreach ($result4 as $rackinformation) {
                $this->_list["rack_information_id"][$rackinformation['pkId']] = $rackinformation['dimType'];
            }
        }
          
        //Generate Pallet Combo
        $list = new Model_ListDetail();
        $list->form_values = array('listMaster' => Model_ListMaster::PALLET);
        $result5= $list->getListDetail();  
        $this->_list["pallet"][''] = "Select Pallet";
        if ($result5) {
            foreach ($result5 as $pallet) {
                $this->_list["pallet"][$pallet->getListValue()] = $pallet->getListValue();
            }
        }
        
        //Generate Pallet To Combo
        $list = new Model_ListDetail();
        $list->form_values = array('listMaster' => Model_ListMaster::PALLET);
        $result5= $list->getListDetail();  
        $this->_list["pallet_to"][''] = "Select Pallet To";
        if ($result5) {
            foreach ($result5 as $pallet) {
                $this->_list["pallet_to"][$pallet->getListValue()] = $pallet->getListValue();
            }
        }
        
        //Generate Level Combo
        $list = new Model_ListDetail();
        $list->form_values = array('listMaster' => Model_ListMaster::LEVEL);
        $result6= $list->getListDetail();
        $this->_list["level"][''] = "Select Level";
        if ($result6) {
            foreach ($result6 as $level) {
                $this->_list["level"][$level->getListValue()] = $level->getListValue();
            }
        }
        
        //Generate Level To Combo
        $list = new Model_ListDetail();
        $list->form_values = array('listMaster' => Model_ListMaster::LEVEL);
        $result6= $list->getListDetail();
        $this->_list["level_to"][''] = "Select Level To";
        if ($result6) {
            foreach ($result6 as $level) {
                $this->_list["level_to"][$level->getListValue()] = $level->getListValue();
            }
        }
        
        foreach ($this->_hidden as $col => $name) {
            switch ($col) {
                case "placement_area_id":   
                    $this->addElement("hidden", $col);
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                 default:
                    break;
            }
        }

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "area":
                case "row":
                case "row_to":
                case "rack":
                case "rack_to":
                case "rack_information_id":
                case "pallet":
                case "pallet_to":
                case "level":
                case "level_to":
                case "location_name":
                 $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => true,
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
