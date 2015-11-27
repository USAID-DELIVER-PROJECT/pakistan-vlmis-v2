<?php

class Form_BatchShelfLife extends Zend_Form {

    private $_fields = array(
        "time_period" => "Time Period"
    );
    private $_hidden = array(
    );

    public function init() {



        foreach ($this->_fields as $col => $name) {

            switch ($col) {

                case "time_period":

                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", 'readonly' => 'true'),
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
