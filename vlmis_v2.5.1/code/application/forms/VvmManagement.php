<?php

/**
 * 
 */
class Form_VvmManagement extends Zend_Form {

    private $_fields = array(
        "product" => "Product",
        "batch" => "Batch"
    );
    
    private $_list = array(
        'product' => array(),
        'batch' => array()
    );

    /**
     * Initialize data members and controls.
     */
    public function init() {

        //Generate Products(items) Combo
        $item_pack_sizes = new Model_ItemPackSizes();
        $result2 = $item_pack_sizes->getAllVaccines();
        $this->_list["product"][''] = "Select";
        foreach ($result2 as $item) {
            $this->_list["product"][$item['pkId']] = $item['itemName'];
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