<?php

class Form_MonthlyConsumption extends Zend_Form {

    private $_fields = array(
        "uc" => "Uc",
        "uc_center" => "uc_center",
        "monthly_report" => "monthly_report"
    );
    private $_list = array(
        'uc' => array(),
        'uc_center' => array(),
        'monthly_report' => array(
            '' => 'Month - Year'
        )
    );

    public function init() {

        $locations = new Model_Locations();
        $uc_warehouses = $locations->getAllUCByUserId();
        foreach ($uc_warehouses as $locations) {

            $this->_list["uc"][''] = 'Select';
            $this->_list["uc"][$locations['pk_id']] = $locations['location_name'];
        }

        foreach ($this->_fields as $col => $name) {

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
