<?php

class Form_Cadmin_List extends Zend_Form {

    private $_fields = array(
        "list_master" => "List Master",
        "list_value" => "List Detail Value",
        "description" => "Description"
    );
    private $_hidden = array(
    );
    private $_list = array(
        "list_master" => array()
    );

    public function init() {

        $list = new Model_ListMaster();
        $result = $list->getMasterList();
        
        foreach ($result as $lst) {
            $this->_list["list_master"][''] = 'Select';
            $this->_list["list_master"][$lst->getPkId()] = $lst->getListMasterName();
        }

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "list_value":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "description":
                    $this->addElement("textarea", $col, array(
                        "attribs" => array("class" => "form-control","rows" => "8"),
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
                    "allowEmpty" => false,
                    "required" => true,
                    "registerInArrayValidator" => false,
                    "multiOptions" => $this->_list[$col]
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


    public function addFields() {
        $this->getElement('list_master')->setAttrib("disabled", "true");
    }

}
