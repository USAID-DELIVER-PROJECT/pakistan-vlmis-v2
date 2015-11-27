<?php

class Form_StatusWorkingUpdate extends Zend_Form {

    private $_fields = array(
        "working_status" => "Working Status",
        "reason_utilization" => "Reason Utilization",
        "quantity" => "Quantity",
        "comments" => "Comments",
        "temperature" => "Temperature"
    );
    private $_list = array(
        'working_status' => array()
    );

    public function init() {

        $status_list = new Model_CcmStatusList();

        $result3 = $status_list->getStatusLists();
        foreach ($result3 as $rs) {

            $this->_list["working_status"][''] = "Select";
            $this->_list["working_status"][$rs['pkId']] = $rs['ccmStatusListName'];
        }

        $result4 = $status_list->getAllReasons();
        foreach ($result4 as $rs1) {

            $this->_list["reason_utilization"][''] = "Select";
            $this->_list["reason_utilization"][$rs1['pkId']] = $rs1['ccmStatusListName'];
        }
        $i = 1;
        foreach ($this->_fields as $col => $name) {

            switch ($col) {
                case "quantity":
                case "comments":
                case "temperature":

                    $this->addElement("text", $col, array(
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

            if (in_array($col, array_keys($this->_list))) {
                $this->addElement("select", $col, array(
                    "attribs" => array("class" => ""),
                    "filters" => array("StringTrim", "StripTags"),
                    "allowEmpty" => true,
                    "required" => false,
                    "registerInArrayValidator" => false,
                    "multiOptions" => $this->_list[$col]
                        //. "belongsTo" => 
                ));
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
            }
            $i++;
        }
    }

}
