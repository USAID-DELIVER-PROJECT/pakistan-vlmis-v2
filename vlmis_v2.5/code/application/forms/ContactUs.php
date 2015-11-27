<?php

class Form_ContactUs extends Zend_Form {

    private $_fields = array(
        "name" => "name",
        "e_mail" => "e_mail",
        "phone" => "phone",
        "department" => "department",
        "message" => "message"
    );
    private $_hidden = array(
        "id" => "ID"
    );
    private $_list = array(
    );
    private $_childlist = array(
    );

    public function init() {

        $this->addElement('captcha', 'captcha', array(
            "attribs" => array("class" => "form-control"),
            'required' => true,
            'captcha' => array(
                'captcha' => 'Image',
                'font' => PUBLIC_DIR . '/fonts/arial.ttf',
                'fontSize' => '24',
                'wordLen' => 5,
                'height' => '50',
                'width' => '150',
                'imgDir' => PUBLIC_DIR . '/captcha',
                'imgUrl' => Zend_Controller_Front::getInstance()->getBaseUrl() . '/captcha',
                'imgAlt' => "Captcha Image",
                //error message
                'messages' => array(
                    'badCaptcha' => 'Please enter the correct code'
                ),
                'dotNoiseLevel' => 50,
                'lineNoiseLevel' => 5)
        ));

        $this->getElement('captcha')->removeDecorator("Label")->removeDecorator("HtmlTag");

        foreach ($this->_fields as $col => $name) {
            switch ($col) {

                case "name":
                case "phone":
                case "department":
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


                case "message":
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
