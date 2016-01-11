<?php

class Form_EditUserProfile extends Zend_Form {

    // User Name Designation Department Email Mobile Number Phone Number Address
    private $_fields = array(
        "name" => "name",
        "designation" => "designation",
        "department" => "department",
        "e_mail" => "e_mail",
        "mobile" => "mobile",
        "phone" => "phone",
        "address" => "address"
    );

    /**
     * 
     */
    public function init() {


        foreach ($this->_fields as $col => $name) {
            switch ($col) {

                case "name":
                case "designation":
                case "department":
                case "mobile":
                case "phone":
                case "address":

                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "e_mail":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;


                case "":
                    $this->addElement("textarea", $col, array(
                        "attribs" => array("class" => "form-control", "rows" => "5"),
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

    /**
     * 
     */
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
