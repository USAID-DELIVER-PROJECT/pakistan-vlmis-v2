<?php

class Form_LocationStatus extends Zend_Form {

    private $_fields = array(
        "area" => "Area",
        "level" => "level",
    );
    private $_list = array(
        'area' => array(),
        'level' => array(),
    ); 
     private $_hidden = array(
        "location_id" => ""
    );

    public function init() {
        
        //Generate Area Combo
        $list = new Model_ListDetail();
        $list->form_values = array('listMaster' => Model_ListMaster::AREA);
        $result1= $list->getListDetail();
        //print_r($result1);
        $this->_list["area"][''] = "Select";
        if ($result1) {
            foreach ($result1 as $area) {
                $this->_list["area"][$area->getPkId()] = $area->getListValue();
            }
        }
        
        //Generate Level Combo
        $list = new Model_ListDetail();
        $list->form_values = array('listMaster' => Model_ListMaster::ROW);
        $result2= $list->getListDetail();
        $this->_list["level"][''] = "Select";
        if ($result2) {
            foreach ($result2 as $row) {
                $this->_list["level"][$row->getPkId()] = $row->getListValue();
            }
        }
        
        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "area":
                case "level":
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
}
