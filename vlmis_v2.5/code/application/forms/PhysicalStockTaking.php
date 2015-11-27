<?php

class Form_PhysicalStockTaking extends Zend_Form {

    private $_fields = array(
        "product" => "Product",
        "from_date" => "From Date",
        "to_date" => "To Date",
        "description" => "Description"
    );
    private $_hidden = array(
    );
    private $_list = array(
        'product' => array(),
        'description' => array()
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
        
       $physical_stock_taking = new Model_PhysicalStockTaking();
        $result2 = $physical_stock_taking->getAllDescripiton();
        $this->_list["description"][''] = 'Select';
        if ($result2 && count($result2) > 0) {
            foreach ($result2 as $whs) {
                $this->_list["description"][$whs->getPkId()] = $whs->getDescription()." - ".$whs->getFromDate()->format("d M Y")." - ".$whs->getToDate()->format("d M Y");
            }
        }  
        

        foreach ($this->_fields as $col => $name) {

            switch ($col) {
                case "from_date":
                case "to_date":
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
