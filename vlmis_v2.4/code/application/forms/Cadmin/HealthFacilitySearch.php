<?php

class Form_Cadmin_HealthFacilitySearch extends Zend_Form {

    private $_fields = array(
       
    );
    private $_hidden = array(
        "office_id" => "",
        "combo1_id" => "",
        "combo2_id" => "",
        "warehouse_id" => "",
    );
    private $_list = array(
        
    );

    public function init() {

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
               
                default:
                    break;                
            }
        }
            foreach ($this->_hidden as $col => $name) {
            switch ($col) {

                case "office_id":
                case "combo1_id":
                case "combo2_id":
                case "warehouse_id" :
                    
                    $this->addElement("hidden", $col);
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                default:
                    break;
            }
        }
        
    }

}
