<?php

class Form_Iadmin_UpdateCluster extends Zend_Form {

    private $_fields = array(
        "province" => "Product",
        "district" => "District",
        "user" => "User",
        "warehouses" => "Warehouses",
        "users" => "Users",
        "starting_on" => "starting_on",
        "working_uptil" => "working_uptil",
        "from_edit" => "from_edit",
        "status" => "Status"
    );
    private $_list = array(
        'province' => array(),
        'district' => array(),
        'user' => array(),
        'warehouses' => array(),
        'users' => array()
    );
    private $_hidden = array(
        "province_hidden" => "pkId",
        "district_hidden" => "pkId",
        "user_hidden" => "pkId",
    );

     private $_radio = array(
        'status' => array(
            "0" => "Active",
            "1" => "In Active"
        )
    );
    public function init() {


        $locations = new Model_Locations();
        $result2 = $locations->getAllProvinces();

        foreach ($result2 as $item) {

            $this->_list["province"][''] = 'Select';
            $this->_list["province"][$item['pkId']] = $item['locationName'];
        }
        $this->_list["district"][''] = 'Select';
        $this->_list["user"][''] = 'Select';


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
            switch ($col) {

                case "starting_on":
                case "working_uptil":
                case "from_edit":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", 'readonly' => 'true'),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                default:
                    break;
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
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
            } 
            
        }
        foreach ($this->_hidden as $col => $name) {
            switch ($col) {


                case "user_hidden":
                case "district_hidden":
                case "province_hidden":

                    $this->addElement("hidden", $col);
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                default:
                    break;
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
