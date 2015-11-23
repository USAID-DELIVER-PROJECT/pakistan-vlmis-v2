<?php

class Form_Iadmin_TransactionTypeAdd extends Zend_Form {

    private $_fields = array(
        "transaction_type_name" => "Transaction Type Name",
        "nature" => "Nature",
        "is_adjustment" => "Adjustment",
         "status" => "Status"
    );
    private $_radio = array(
        'nature' => array(
            "+" => "Positive",
            "-" => "Negative"
        ),
         'status' => array(
            "1" => "Active",
            "0" => "In Active"
        )
    );
        private $_checkbox = array(
        'is_adjustment' => array(
            "1" => "Status recieve from warehouse adjustment.",
            "0" => "Status not recieve from warehouse adjustment."
        )
    );
    private $_hidden = array(
        "transaction_type_id" => "pkId"
    );
    
    public function init() {  
           foreach ($this->_hidden as $col => $name) {
            switch ($col) {
                case "transaction_type_id":
                    $this->addElement("hidden", $col);
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                default:
                    break;
            }
        }
        
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
                case "nature":
                    $this->addElement("radio", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                 case "is_adjustment":
                    $this->addElement("checkbox", $col, array(
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
            
//            if (in_array($col, array_keys($this->_list))) {
//                $this->addElement("select", $col, array(
//                    "attribs" => array("class" => "form-control"),
//                    "filters" => array("StringTrim", "StripTags"),
//                    "allowEmpty" => true,
//                    "required" => false,
//                    "registerInArrayValidator" => false,
//                    "multiOptions" => $this->_list[$col],
//                    "validators" => array(
//                        array(
//                            "validator" => "Float",
//                            "breakChainOnFailure" => false,
//                            "options" => array(
//                                "messages" => array("notFloat" => $name . " must be a valid option")
//                            )
//                        )
//                    )
//                ));
//                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
//            }

            if (in_array($col, array_keys($this->_radio))) {
                $this->addElement("radio", $col, array(
                    "attribs" => array(),
                    "allowEmpty" => true,
                    'separator' => '',
                    "filters" => array("StringTrim", "StripTags"),
                    "validators" => array(),
                    "multiOptions" => $this->_radio[$col]
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
                array(
                    "validator" => "NotEmpty",
                    "breakChainOnFailure" => true,
                    "options" => array("messages" => array("isEmpty" => "ID cannot be blank"))
                ),
                array(
                    "validator" => "Digits",
                    "breakChainOnFailure" => false,
                    "options" => array("messages" => array("notDigits" => "ID must be numeric")
                    )
                )
            )
        ));
        $this->getElement("id")->removeDecorator("Label")->removeDecorator("HtmlTag");
    }

}
