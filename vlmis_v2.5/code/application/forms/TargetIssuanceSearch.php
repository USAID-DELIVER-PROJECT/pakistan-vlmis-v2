<?php

class Form_TargetIssuanceSearch extends Zend_Form {

    private $_fields = array(
        "month" => "Month",
        "year" => "Year",
        "province_region" => "Province/Region",
        "product" => "Product"
    );
    private $_list = array(
        'month' => array(),
        'year' => array(),
        'province_region' => array(),
        'product' => array()
    );

    public function init() {

        //Generate month Combo
        $this->_list["month"][''] = 'Select';
        $this->_list["month"]['01'] = 'January';
        $this->_list["month"]['02'] = 'February';
        $this->_list["month"]['03'] = 'March';
        $this->_list["month"]['04'] = 'April';
        $this->_list["month"]['05'] = 'May';
        $this->_list["month"]['06'] = 'June';
        $this->_list["month"]['07'] = 'July';
        $this->_list["month"]['08'] = 'August';
        $this->_list["month"]['09'] = 'September';
        $this->_list["month"]['10'] = 'October';
        $this->_list["month"]['11'] = 'November';
        $this->_list["month"]['12'] = 'December';

        //Generate year Combo
        $this->_list["year"][''] = 'Select';
//        for ($y = 2013; $y <= date("Y"); $y++) {
//            $this->_list["year"][$y] = $y;
//        }
        $this->_list["year"][date("Y")] = date("Y");


        //Generate Province/Region Combo
        $locations = new Model_Locations();
        $result = $locations->getAllProvinces();
        if ($result) {
            $this->_list["province_region"][''] = "Select";
            foreach ($result as $row) {
                $this->_list["province_region"][$row['pkId']] = $row['locationName'];
            }
        }


        //Generate Antigen(items) Combo
        $item_pack_sizes = new Model_ItemPackSizes();
        $result2 = $item_pack_sizes->getAllVaccines();

        foreach ($result2 as $item) {

            $this->_list["product"][''] = 'Select';
            $this->_list["product"][$item['pkId']] = $item['itemName'];
        }


        foreach ($this->_fields as $col => $name) {
//            switch ($col) {
//
//                case "year":
//                    $this->addElement("text", $col, array(
//                        "attribs" => array("class" => "form-control", 'readonly' => 'true', 'style' => 'position: relative; z-index: 100000;'),
//                        "allowEmpty" => false,
//                        "filters" => array("StringTrim", "StripTags"),
//                        "validators" => array(),
//                        "value" => date("Y")
//                    ));
//                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
//                    break;
//            }

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
