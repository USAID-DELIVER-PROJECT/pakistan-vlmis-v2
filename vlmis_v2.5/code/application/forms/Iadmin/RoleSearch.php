<?php

class Form_Iadmin_RoleSearch extends Zend_Form {

    private $_fields = array(
        "role_name" => "Role name",
        "description" => "Description"
    );
    private $_hidden = array(
        "pk_id" => "pkId"
    );
    private $_list = array();

    public function init() {
        
        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "role_name":
                case "description":
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
        }
    }

}
