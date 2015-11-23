<?php

class Form_Placement extends Zend_Form {

    private $_fields = array(
        "area" => "Area",
        "row" => "Row",
        "rack" => "Rack",
        //"rack_information_id" => "Rack Type",
        "pallet" => "Pallet",
        "level" => "Level",
        //"location_name" => "Label",
    );
    private $_list = array(
        'area' => array(),
        'row' => array(),
        'rack' => array(),
        //'rack_information_id' => array(),
        'pallet' => array(),
        'level' => array(),
    );
    private $_hidden = array(
        "placement_id" => ""
    );

    public function init() {

        //Generate Area Combo
        $list = new Model_ListDetail();
        $list->form_values = array('listMaster' => Model_ListMaster::AREA);
        $result1 = $list->getListDetail();
        $this->_list["area"][''] = "Select Store";
        if ($result1) {
            foreach ($result1 as $area) {
                $this->_list["area"][$area->getPkId()] = $area->getListValue();
            }
        }

        //Generate Row Combo
        $list = new Model_ListDetail();
        $list->form_values = array('listMaster' => Model_ListMaster::ROW);
        $result2 = $list->getListDetail();
        $this->_list["row"][''] = "Select Row";
        if ($result2) {
            foreach ($result2 as $row) {
                $this->_list["row"][$row->getPkId()] = $row->getListValue();
            }
        }

        //Generate Rack Combo
        $list = new Model_ListDetail();
        $list->form_values = array('listMaster' => Model_ListMaster::RACK);
        $result3 = $list->getListDetail();
        $this->_list["rack"][''] = "Select Rack";
        if ($result3) {
            foreach ($result3 as $rack) {
                $this->_list["rack"][$rack->getPkId()] = $rack->getListValue();
            }
        }

        //Generate Rack Type Combo
        $rack_information = new Model_RackInformation();
        $result4 = $rack_information->getRackInformation();
        $this->_list["rack_information_id"][''] = "Select Rack Type";
        if ($result4) {
            foreach ($result4 as $rackinformation) {
                $this->_list["rack_information_id"][$rackinformation['pkId']] = $rackinformation['rackType'];
            }
        }

        //Generate Pallet Combo
        $list = new Model_ListDetail();
        $list->form_values = array('listMaster' => Model_ListMaster::PALLET);
        $result5 = $list->getListDetail();
        $this->_list["pallet"][''] = "Select Bin";
        if ($result5) {
            foreach ($result5 as $pallet) {
                $this->_list["pallet"][$pallet->getPkId()] = $pallet->getListValue();
            }
        }

        //Generate Level Combo
        $list = new Model_ListDetail();
        $list->form_values = array('listMaster' => Model_ListMaster::LEVEL);
        $result6 = $list->getListDetail();
        $this->_list["level"][''] = "Select Shelf";
        if ($result6) {
            foreach ($result6 as $level) {
                $this->_list["level"][$level->getPkId()] = $level->getListValue();
            }
        }

        foreach ($this->_hidden as $col => $name) {
            switch ($col) {
                case "placement_id":
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
                case "rack":
                case "rack_information_id":
                case "pallet":
                case "level":
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
