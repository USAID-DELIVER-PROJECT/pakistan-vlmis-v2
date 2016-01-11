<?php

class Form_Iadmin_Stakeholders extends Zend_Form {

    private $_fields = array(
        "stakeholder_name" => "stakeholder",
        "geo_level" => "geo_level",
        "sector" => "sector",
        "activity" => "activity",
        "stakeholder_activity" => "stakeholder_activity",
        "stakeholder_type" => "stakeholder_type",
        "stakeholder_sector" => "stakeholder_sector"
    );
    private $_hidden = array(
        "stakeholder_id" => "stakeholder_id",
        "stakeholder_activity_id" => "stakeholder_activity_id",
        "stakeholder_type_id" => "stakeholder_type_id",
        "stakeholder_sector_id" => "stakeholder_sector_id"
    );
    private $_list = array(
        'geo_level' => array(),
        'sector' => array(),
        'activity' => array()
    );

    public function init() {
        //Generate Asset Type Combo
        $geo_level = new Model_Locations();

        $result1 = $geo_level->getStakeholderGeoLevel();
        $this->_list["geo_level"][''] = "Select";
        foreach ($result1 as $rs) {
            $this->_list["geo_level"][$rs['pkId']] = $rs['geoLevelName'];
        }
        $stakeholder_sectors = new Model_Stakeholders();

        $result2 = $stakeholder_sectors->getAllSectors();
        $this->_list["sector"][''] = "Select";
        foreach ($result2 as $rs) {
            $this->_list["sector"][$rs['pkId']] = $rs['stakeholderSectorName'];
        }

        $stakeholder_activities = new Model_Stakeholders();

        $result3 = $stakeholder_activities->getAllActivities();
        $this->_list["activity"][''] = "Select";
        foreach ($result3 as $rs) {
            $this->_list["activity"][$rs['pkId']] = $rs['activity'];
        }

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "stakeholder_name":
                case "stakeholder_activity":
                case "stakeholder_type":
                case "stakeholder_sector":
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
                case "stakeholder_activity_id":
                case "stakeholder_type_id" :
                case "stakeholder_sector_id":
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
