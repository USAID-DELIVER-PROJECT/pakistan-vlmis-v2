<?php

class Form_Iadmin_RoleComboSearch extends Zend_Form {

    private $_fields = array(
        "role" => "Role name",
        "description" => "Description",
        "resource_name" => "Resource name",
        "resource_type" => "Resource type"
    );
    private $_hidden = array(
        "pk_id" => "pkId"
    );
    private $_list = array(
        'role' => array()
    );

    public function init() {

        $roles = new Model_Roles();
        $result = $roles->getRoles();
        $action = Zend_Registry::get("action");

        if ($action == 'role-resources') {
            $this->_list["role"][""] = 'Select';
        }
        if ($result) {
            foreach ($result as $row) {
                $this->_list["role"][$row->getPkId()] = $row->getRoleName();
            }
        }
        $em = Zend_Registry::get("doctrine");

        $result = $em->getRepository("ResourceTypes")->findAll();
        $this->_list["resource_type"][''] = "Select";
        foreach ($result as $rs) {
            $this->_list["resource_type"][$rs->getPkId()] = $rs->getResourceType();
        }


        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "description":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "resource_name":
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

}
