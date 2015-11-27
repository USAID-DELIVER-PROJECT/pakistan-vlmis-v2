<?php

class Form_Login extends Zend_Form {

    public function init() {
        $this->addElement("text", "login_id", array(
            "attribs" => array("class" => "text form-control", "placeholder" => "Username..."),
            "allowEmpty" => false,
            'filters' => array(
                array('filter' => 'StringTrim'),
                array('filter' => 'StripTags'),
                array(
                    'filter' => 'PregReplace',
                    'options' => array('match' => '#[^0-9\w,.!@$&()\[\]\-_;:\\\/\s]#', 'replace' => '')
                )
            ),
            "validators" => array(
                array(
                    "validator" => "NotEmpty",
                    "breakChainOnFailure" => true,
                    "options" => array("messages" => array("isEmpty" => "Username cannot be blank"))
                )
            )
        ));
        $this->getElement("login_id")->removeDecorator("Label")->removeDecorator("HtmlTag");

        $this->addElement("password", "password", array(
            "attribs" => array("class" => "password form-control", "placeholder" => "Password..."),
            "allowEmpty" => false,
            'filters' => array(
                array('filter' => 'StringTrim'),
                array('filter' => 'StripTags'),
                array(
                    'filter' => 'PregReplace',
                    'options' => array('match' => '#[^0-9\w,.!@$&()\[\]\-_;:\\\/\s]#', 'replace' => '')
                )
            ),
            "validators" => array(
                array(
                    "validator" => "NotEmpty",
                    "breakChainOnFailure" => true,
                    "options" => array("messages" => array("isEmpty" => "Password cannot be blank"))
                )
            )
        ));
        $this->getElement("password")->removeDecorator("Label")->removeDecorator("HtmlTag");
    }

}

?>