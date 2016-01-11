<?php

class Form_Iadmin_Office extends Zend_Form {

    private $_fields = array(
        "office" => "office",
        "geo_level" => "geo_level",
        "stakeholder" => "stakeholder"
    );
    private $_hidden = array(
        "stakeholder_id" => "stakeholder_id"
    );
    private $_list = array(
        'geo_level' => array(),
        'stakeholder' => array()
    );

    public function init() {
        //Generate Asset Type Combo
        $geo_level = new Model_Locations();

        $result1 = $geo_level->getOfficeGeoLevels();
        $this->_list["geo_level"][''] = "Select";
        foreach ($result1 as $rs) {
            $this->_list["geo_level"][$rs['pkId']] = $rs['geoLevelName'];
        }
        $stakeholders = new Model_Stakeholders();

        $result2 = $stakeholders->getAllStakeholders();
        $this->_list["stakeholder"][''] = "Select";
        foreach ($result2 as $rs) {
            $this->_list["stakeholder"][$rs['pkId']] = $rs['stakeholderName'];
        }


        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "office":

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

                case "stakeholder_id":
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
