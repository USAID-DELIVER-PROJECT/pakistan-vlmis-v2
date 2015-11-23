<?php

class Form_Cadmin_UserSearch extends Zend_Form {

    private $_fields = array(
        "login_id" => "Username",
        "role" => "User Role"
    );
    private $_hidden = array(
    );
    private $_list = array(
        "role" => array()
    );

    public function init() {

        $roles = new Model_Roles();
        $result = $roles->getRoleByCat(Model_Roles::COLDCHAIN);
        
        foreach ($result as $role) {
            $this->_list["role"][''] = 'Select';
            $this->_list["role"][$role->getPkId()] = $role->getRoleName();
        }
        
        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                 case "login_id":
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
    }

}
