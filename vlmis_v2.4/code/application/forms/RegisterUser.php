<?php

class Form_RegisterUser extends Zend_Form {

    private $_fields = array(
        "e_mail" => "e_mail",
        "organization" => "organization",
        "country" => "country",
        "address" => "address"
    );
    private $_hidden = array(
        "id" => "ID"
    );
    private $_list = array(
        "country" => array()
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

        // Generate Country List Combo 
        $locations = new Model_Locations();
        $result = $locations->getCountryList();

        if ($result) {
            $this->_list["country"][''] = "Select";
            foreach ($result as $row) {
                $this->_list["country"][$row['country_id']] = $row['country_name'];
            }
            $this->_list["country"]['253'] = "other";
        }


        foreach ($this->_fields as $col => $name) {
            switch ($col) {

                case "organization":
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


                case "address":
                    $this->addElement("textarea", $col, array(
                        "attribs" => array("class" => "form-control", "rows" => "3"),
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
                    "multiOptions" => $this->_list[$col],
                    "validators" => array(
                        array(
                            "validator" => "Float",
                            "breakChainOnFailure" => false,
                            "options" => array(
                                "messages" => array("notFloat" => $name . " must be a valid option")
                            )
                        )
                    )
                ));
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
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
