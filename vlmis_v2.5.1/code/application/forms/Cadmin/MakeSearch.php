<?php

class Form_Cadmin_MakeSearch extends Zend_Form {

    private $_fields = array(
        "name" => "Make Name",
        "status" => "Status"
    );
    private $_radio = array(
        'status' => array(
            "3" => "All",
            "1" => "Active",
            "2" => "Inactive"
        )
    );

    public function init() {

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "name":
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
        }
    }

}
