<?php

class Form_AddBatch extends Zend_Form {

    private $_fields = array(
        "product_id" => "Product",
        "batch" => "Batch Id",
        "production_date" => "Production Date",
        "expiry_date" => "Expiry Date",
        "unit_price" => "Unit Price",
        "manufacturer" => "Manufacturer",
        "vvm_type_id" => "VVM Type"
    );
    private $_list = array(
        "product_id" => array(),
        "manufacturer" => array(),
        "vvm_type_id" => array(),
    );
    private $_radio = array(
    );

    public function init() {

        //Generate VVM Type Combo
        $vvmtypes = new Model_VvmTypes();
        $result3 = $vvmtypes->getAll();
        $this->_list["vvm_type_id"][''] = 'Select';
        foreach ($result3 as $vvmtype) {
            $this->_list["vvm_type_id"][$vvmtype['pk_id']] = $vvmtype['vvm_type_name'];
        }

        $item_pack_sizes = new Model_ItemPackSizes();
        $result1 = $item_pack_sizes->getAllManageItems();
        $this->_list["product_id"][''] = 'Select';
        if ($result1 && count($result1) > 0) {
            foreach ($result1 as $whs) {
                $this->_list["product_id"][$whs['pkId']] = $whs['itemName'];
            }
        }

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "batch":
                case "production_date":
                case "expiry_date":
                case "unit_price":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => true,
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
            )
        ));
        $this->getElement("id")->removeDecorator("Label")->removeDecorator("HtmlTag");
    }

}
