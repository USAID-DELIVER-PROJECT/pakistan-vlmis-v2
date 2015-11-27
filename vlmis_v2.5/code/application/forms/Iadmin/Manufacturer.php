<?php

class Form_Iadmin_Manufacturer extends Zend_Form {

    private $_fields = array(
        "manufacturer" => "manufacturer",
        "sector" => "sector"
       
    );
    private $_hidden = array(
        "stakeholder_id" => "stakeholder_id"
    );
    private $_list = array(
       
        'sector' => array()
      
    );

    public function init() {
      $stakeholder_sectors = new Model_Stakeholders();
        $result2 = $stakeholder_sectors->getAllSectors();
        $this->_list["sector"][''] = "Select";
        foreach ($result2 as $rs) {
            $this->_list["sector"][$rs['pkId']] = $rs['stakeholderSectorName'];
        }

       
        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "manufacturer":

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
