<?php

class Form_GatepassList extends Zend_Form {

    private $_fields = array(
        "date_from" => "Date From",
        "date_to" => "Date To",
        "vehicle_type_id" => "Vehicle Type",
        "item_pack_size_id" => "Item",
        "stock_batch_id" => "Batch",     
    );
    private $_list = array(
        'vehicle_type_id' => array(),
        'item_pack_size_id' => array(),
        'stock_batch_id' => array(),
    );
    public function init() {
        //Generate Vehicle Type Combo
        $list = new Model_ListDetail();
        $list->form_values = array('listMaster' => Model_ListMaster::VEHICLE_TYPE);
        $result1 = $list->getListDetail();
        $this->_list["vehicle_type_id"][''] = "Select Vehicle Type";
        if ($result1) {
            foreach ($result1 as $row) {
                $this->_list["vehicle_type_id"][$row->getPkId()] = $row->getListValue();
            }
        }
         //Generate Item Combo
        $item_pack_size = new Model_ItemPackSizes();
        $result = $item_pack_size->getItemsAll();
        $this->_list["item_pack_size_id"][''] = "Select Product";
        if ($result) {
            foreach ($result as $row) {
                $this->_list["item_pack_size_id"][$row->getPkId()] = $row->getItemName();
            }
        }
        
         //Generate Batch Number Combo  
        $this->_list["stock_batch_id"][''] = "Select Item First";

        //$date_from = date('Y-m' . '-01');
        //$date_to = date('Y-m-d');

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "vehicle_type_id":
                case "item_pack_size_id":
                  case "stock_batch_id":   
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => true,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "date_from":
                case "date_to":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", 'readonly' => 'true'),
                        "allowEmpty" => true,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array(),
                        //"value" => $date_from
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

}
