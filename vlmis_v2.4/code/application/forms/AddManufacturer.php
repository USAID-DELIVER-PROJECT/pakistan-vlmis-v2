<?php

class Form_AddManufacturer extends Zend_Form {

    private $_fields = array(
        'manufacturer_name' => 'Manufacturer Name',
        'quantity_per_pack' => 'Quantity Per Pack'
    );

    public function init() {
        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "manufacturer_name":
                case "quantity_per_pack":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "required" => true,
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
