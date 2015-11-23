<?php

class Form_Cadmin_User extends Zend_Form {

    private $_fields = array(
        "login_id" => "Username",
        "role" => "User Role",
        "email" => "Email",
        "phone" => "Phone No",
        "password" => "Password",
        "confirm_password" => "Confirm Password",
        "old_password" => "Old Password",
        "new_password" => "New Password",
        "designation" => "Designation",
        "department" => "Department",
        "photo" => "Photo",
        "address" => "Address",
        "old_warehouse" => "Warehouse"
    );
    private $_hidden = array(
        "id" => "pkId"
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
                case "email":
                case "phone":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => true,
                        "required" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "password":
                case "confirm_password":
                    $this->addElement("password", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => true,
                        "required" => false,
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

    public function addHidden() {
        $this->addElement("hidden", "id", array(
            "attribs" => array("class" => "hidden"),
            "allowEmpty" => true,
            "required" => false,
            "filters" => array("StringTrim"),
            "validators" => array()
        ));
        $this->getElement("id")->removeDecorator("Label")->removeDecorator("HtmlTag");
    }

    public function addFields() {

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "designation":
                case "department":
                case "old_warehouse":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => true,
                        "required" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "photo":
                    $this->addElement("file", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "destination" => UPLOAD_PATH,
                        "allowEmpty" => true,
                        "required" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "old_password":
                case "new_password":
                    $this->addElement("password", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => true,
                        "required" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "address":
                    $this->addElement("textarea", $col, array(
                        "attribs" => array("class" => "form-control", "rows" => 1),
                        "allowEmpty" => true,
                        "required" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                default:
                    break;
            }
        }

        $this->getElement('login_id')->setAttrib("disabled", "true");
        $this->getElement('email')->setAttrib("disabled", "true");
        $this->getElement('old_warehouse')->setAttrib("disabled", "true");
    }

}
