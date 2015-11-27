<?php

class Form_ProductLocation extends Zend_Form {

    private $_fields = array(
        "item_pack_size_id" => "Product",
        "stock_batch_id" => "Batch No",
        "unallocated_quantity" => "Unallocated Quantity",
        "total_quantity" => "Product Quantity",
        "quantity" => "Carton Quantity",
        "estimated_pallet_filled" => "Estimated Pallet Filled",
         "quantity1" => "Quantity",
         "location" => "Location",
        
    );
  //  private $_list = array(
     //   'item_pack_size_id' => array(),
      //  'stock_batch_id' => array(),
   // );
    
    private $_list = array(
       'location' => array()
    );
    
    
    
    
    private $_hidden = array(
       "placement_location_id" => "",
       "itemId" => "",
       "batchId" => "",
    );

    public function init() {
        //Generate Item Combo
        $item_pack_size = new Model_ItemPackSizes();
        $result = $item_pack_size->getItemsByCategory();
        $this->_list["item_pack_size_id"][''] = "Select Product";
        if ($result) {
            foreach ($result as $row) {
                $this->_list["item_pack_size_id"][$row->getPkId()] = $row->getItemName();
            }
        }

        //Generate Batch Number Combo  
         $stock_batch = new Model_StockBatch();
        $result = $stock_batch->getBatches();
        $this->_list["stock_batch_id"][''] = "Select Stock Batch";
        if ($result) {
            foreach ($result as $row) {
                $this->_list["stock_batch_id"][$row->getPkId()] = $row->getNumber();
            }
        }
        
        //Generate Location Combo 
        $non_ccm_loc = new Model_NonCcmLocations();
        $result = $non_ccm_loc->getLocationsName();
      //  print_r($result);exit;
        $this->_list["location"][''] = "Select Location";
        if ($result) {
            foreach ($result as $row) {
                $this->_list["location"][$row['pkId']] = $row['locationName'];
            }
        }
        
        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "item_pack_size_id":
                case "stock_batch_id":
                case "number":
                case "unallocated_quantity":
                case "total_quantity":
                case "quantity":
                case "estimated_pallet_filled":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => true,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                 case "location":
                     case "quantity1": 
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
            
             foreach ($this->_hidden as $col => $name) {
            switch ($col) {

                case "placement_location_id":
                case "itemId":
                case "batchId" :  
                    $this->addElement("hidden", $col);
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                default:
                    break;
            }
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

    public function readFields() {
        $this->getElement('item_pack_size_id')->setAttrib("readonly", "true");
       $this->getElement('stock_batch_id')->setAttrib("readonly", "true");
        $this->getElement('unallocated_quantity')->setAttrib("disabled", "true");
        $this->getElement('total_quantity')->setAttrib("disabled", "true");
    }

    public function addHidden() {
        $this->addElement("hidden", "placement_location_id", array(
            "attribs" => array("class" => "hidden"),
            "allowEmpty" => false,
            "filters" => array("StringTrim"),
            "validators" => array()
        ));
        $this->getElement("placement_location_id")->removeDecorator("Label")->removeDecorator("HtmlTag");
    }
    
    
//     public function addHidden() {
//        $this->addElement("hidden", "id", array(
//            "attribs" => array("class" => "hidden"),
//            "allowEmpty" => false,
//            "filters" => array("StringTrim"),
//            "validators" => array(
//                array(
//                    "validator" => "NotEmpty",
//                    "breakChainOnFailure" => true,
//                    "options" => array("messages" => array("isEmpty" => "ID cannot be blank"))
//                ),
//                array(
//                    "validator" => "Digits",
//                    "breakChainOnFailure" => false,
//                    "options" => array("messages" => array("notDigits" => "ID must be numeric")
//                    )
//                )
//            )
//        ));
//        $this->getElement("id")->removeDecorator("Label")->removeDecorator("HtmlTag");
//    }

}
