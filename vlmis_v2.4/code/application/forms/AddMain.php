<?php

class Form_AddMain extends Zend_Form {

    private $_fields = array(
        //"asset_type" => "Asset Type",
        "asset_id" => "Asset Id",
        "ccm_status_list_id" => "Working Status",
        "source_id" => "Source of supply",
        "reason" => "Reason",
        "utilization" => "Utilization",
        "placed_at" => "Placed At",
    );
    private $_list = array(
        'ccm_status_list_id' => array(),
        'source_id' => array(),
        'reason' => array(),
        'utilization' => array()
    );
    private $_radio = array(
        'placed_at' => array(
            "0" => "Unallocated",
            "1" => "Select Warehouse",
        )
    );

    public function init() {
        //Generate working status Combo
        $ccm_status_list = new Model_CcmStatusList();
        $result1 = $ccm_status_list->getStatusLists();
        $this->_list["ccm_status_list_id"][''] = "Select working status";
        foreach ($result1 as $row) {
            $this->_list["ccm_status_list_id"][$row['pkId']] = $row['ccmStatusListName'];
        }

        //Generate source of supply Combo
        $stakeholder = new Model_Stakeholders();
        $stakeholder->form_values['type'] = 1;
        $result2 = $stakeholder->getAllStakeholders();
        $this->_list["source_id"][''] = "Select Source Of Supply";
        foreach ($result2 as $row2) {
            $this->_list["source_id"][$row2['pkId']] = $row2['stakeholderName'];
        }

        //Generate Utilizations Combo
        $ccm_status_list1 = new Model_CcmStatusList();
        $data = $ccm_status_list1->getAllUtilizations();
         $this->_list["utilization"][''] = "Select ";
        foreach ($data as $utilization) {
            $this->_list["utilization"][$utilization['pkId']] = $utilization['ccmStatusListName'];
        }

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "asset_id":
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

            /* if ($col == "reason" || $col == "utilization") {
              $str_style_hidden = "hidden";
              } */

            if (in_array($col, array_keys($this->_list))) {
                $this->addElement("select", $col, array(
                    "attribs" => array("class" => "form-control form-group"),
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

            if (in_array($col, array_keys($this->_radio))) {
                $this->addElement("radio", $col, array(
                    "attribs" => array(),
                    "allowEmpty" => true,
                    'separator' => '',
                    "filters" => array("StringTrim", "StripTags"),
                    "validators" => array(),
                    "multiOptions" => $this->_radio[$col]
                ));
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag")->removeDecorator("<br>");
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
