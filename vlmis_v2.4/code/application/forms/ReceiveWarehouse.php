<?php

class Form_ReceiveWarehouse extends Zend_Form {

    private $_fields = array(
        "issue_no" => "Issue No",
    );

    public function init() {
        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "issue_no":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "required" => "required"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                default:
                    break;
            }
        }
    }

}
