<?php

class Form_PurposeTransfer extends Zend_Form {

    private $_fields = array(
        "product" => "Product",
        "batch" => "Batch"
    );
    private $_hidden = array(
    );
    private $_list = array(
        'product' => array(),
        'batch' => array()
    );

    public function init() {

        //Generate Products(items) Combo
        $item_pack_sizes = new Model_ItemPackSizes();
        $result2 = $item_pack_sizes->getAllPurposeItems();
        $this->_list["product"][''] = "Select";
        foreach ($result2 as $item) {
            $this->_list["product"][$item['pk_id']] = $item['item_name'];
        }
        $this->_list["batch"][''] = "Select";

        foreach ($this->_fields as $col => $name) {
            if (in_array($col, array_keys($this->_list))) {
                $this->addElement("select", $col, array(
                    "attribs" => array("class" => "form-control"),
                    "filters" => array("StringTrim", "StripTags"),
                    "allowEmpty" => true,
                    "required" => false,
                    "registerInArrayValidator" => false,
                    "multiOptions" => $this->_list[$col],
                    "validators" => array(
                    )
                ));
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
            }
        }
    }

}
