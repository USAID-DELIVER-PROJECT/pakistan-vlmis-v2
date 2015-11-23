<?php

class Form_Iadmin_TransactionTypeSearch extends Zend_Form {

    private $_fields = array(
        "transaction_type_name" => "Transaction Type Name",
        "nature" => "Nature"
    );
    private $_radio = array(
        'nature' => array(  
            "+" => "Positive",
            "-" => "Negative"
        )
    );

    public function init() {

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "transaction_type_name":
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

            if (in_array($col, array_keys($this->_radio))) {
                $this->addElement("radio", $col, array(
                    "attribs" => array(),
                    "allowEmpty" => true,
                    'separator' => '',
                    "filters" => array("StringTrim", "StripTags"),
                    "validators" => array(),
                    "multiOptions" => $this->_radio[$col]
                ));
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag")->removeDecorator("<br>");
            }
        }
    }
}
