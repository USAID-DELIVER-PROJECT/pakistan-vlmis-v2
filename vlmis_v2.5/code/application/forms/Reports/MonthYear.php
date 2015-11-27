<?php

class Form_Reports_MonthYear extends Zend_Form {

    private $_fields = array(
        "month" => "Select Month",
        "year" => "Select Year"
    );
    private $_list = array(
        'month' => array(),
        'year' => array()
    );

    public function init() {

        $this->_list["month"][''] = "Select Month";
        for ($m = 1; $m <= 12; $m++) {
            $dateObj = DateTime::createFromFormat('!m', $m);
            $monthName = $dateObj->format('F');
            $this->_list["month"][$m] = $monthName;
        }

        $this->_list["year"][''] = "Select Year";
        for ($y = 2014; $y <= date("Y"); $y++) {
            $this->_list["year"][$y] = $y;
        }

        foreach ($this->_fields as $col => $name) {

            if (in_array($col, array_keys($this->_list))) {
                $this->addElement("select", $col, array(
                    "attribs" => array("class" => "form-control form-group"),
                    "filters" => array("StringTrim", "StripTags"),
                    "allowEmpty" => false,
                    "required" => true,
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
