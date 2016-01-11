<?php

class Form_DeleteIssue extends Zend_Form {

    private $_fields = array(
        "asset_id" => "Location",
        "non_ccm_location_id" => "Location",
        "quantity" => "Quantity"
    );
    private $_list = array(
        'non_ccm_location_id' => array(),
        'asset_id' => array()
    );
   
    /**
     * 
     */
    public function init() {

        $cold_chain = new Model_ColdChain();
        $result1 = $cold_chain->getLocationsName();

        $this->_list["asset_id"][''] = "Select Location";
        if ($result1) {
            foreach ($result1 as $row1) {
                $this->_list["asset_id"][$row1['pkId']] = $row1['assetId'];
            }
        }

        $non_ccm_loc = new Model_NonCcmLocations();
        $result2 = $non_ccm_loc->getLocationsName();

        $this->_list["non_ccm_location_id"][''] = "Select Location";
        if ($result2) {
            foreach ($result2 as $row2) {
                $this->_list["non_ccm_location_id"][$row2['pkId']] = $row2['locationName'];
            }
        }


        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "quantity":
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
