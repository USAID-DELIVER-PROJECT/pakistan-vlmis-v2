<?php

class Form_BatchTracking extends Zend_Form {

    private $_fields = array(
        "product" => "Product",
        "from_wh" => "Comments",
        "to_wh" => "Adjustment type"
    );
    private $_hidden = array(
    );
    private $_list = array(
        'from_wh' => array(),
        'to_wh' => array(),
        'product' => array()
    );

    public function init() {

        $item_pack_sizes = new Model_ItemPackSizes();
        $result1 = $item_pack_sizes->getAllManageItems();
        $this->_list["product"][''] = 'Select';
        if ($result1 && count($result1) > 0) {
            foreach ($result1 as $whs) {
                $this->_list["product"][$whs['pkId']] = $whs['itemName'];
            }
        }

        foreach ($this->_fields as $col => $name) {

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
