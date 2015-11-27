<?php

class Form_Iadmin_Roles extends Zend_Form {

    private $_fields = array(
        "role_name" => "UserName",
        "description" => "UserName",
        "category_id" => "Category",
        "status" => "Status"
    );
    private $_hidden = array(
        "pk_id" => "pkId"
    );
    private $_list = array(
        'category_id' => array(),
        'status' => array(
            '1' => 'Active',
            '0' => 'Deactive'
        )
    );

    public function init() {

        $list_detail = new Model_ListDetail();
        $list_detail->form_values = array('master_id' => Model_ListMaster::USER_ROLE_CATEGORIES);
        $result = $list_detail->getListDetailByMasterId();
        $this->_list["category_id"][''] = "Select";
        foreach ($result as $rs) {
            $this->_list["category_id"][$rs['pkId']] = $rs['listValue'];
        }

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "role_name":
                case "description":
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
                    "validators" => array()
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
