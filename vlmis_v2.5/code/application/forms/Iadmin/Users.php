<?php

class Form_Iadmin_Users extends Zend_Form {

    private $_fields = array(
        "user_name_add" => "UserName",
        "user_name_update" => "UserName",
        "email" => "Email",
        "phone" => "Phone No",
        "email_update" => "Email",
        "phone_update" => "Phone No",
        "old_password" => "Old Password",
        "new_password" => "New Password",
        "user_type" => "User Type",
        "password" => "Password",
        "confirm_password" => "Confirm_Password",
        "search_policy_users" => "loginId",
        "policy_users_add" => "loginId",
        "role" => "role",
        "default_warehouse" => "default_warehouse",
        "default_warehouse_update" => "default_warehouse_update"
    );
    private $_hidden = array(
        "user_id" => "pkId",
        "office_type" => "pkId",
        "province_id" => "pkId",
        "district_id" => "pkId",
        "tehsil_id" => "pkId",
        "parent_id" => "pkId",
        "office_id_edit" => "pkId",
        "province_id_edit" => "pkId",
        "district_id_edit" => "pkId",
        "tehsil_id_edit" => "pkId",
        "parent_id_edit" => "pkId",
        "warehouse_users_id_edit" => "pkId",
        "default_warehouse_update_hidden" => "default_warehouse_update_hidden"
    );
    private $_list = array(
        'user_type' => array(),
        'default_warehouse' => array(),
        'default_warehouse_update' => array(),
        'role' => array()
    );

    
    public function init() {

        
            $this->_list["role"]['6'] = 'Supplier';
            $this->_list["role"]['21'] = 'Non-Supplier';
        
        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "email":
                case "phone":
                case "email_update":
                case "phone_update":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => true,
                        "required" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                case "user_name_add":
                case "user_name_update":
                case "search_policy_users":
                case "policy_users_add":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
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
                    "validators" => array()
                ));
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
            }
        }

        foreach ($this->_hidden as $col => $name) {
            switch ($col) {


                case "user_id":
                case "office_type":
                case "office_id_edit":
                case "province_id":
                case "district_id":
                case "tehsil_id":
                case "parent_id":
                case "province_id_edit":
                case "district_id_edit":
                case "tehsil_id_edit":
                case "parent_id_edit":
                case "warehouse_users_id_edit":
                case "default_warehouse_update_hidden":
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
