<?php

class Form_Iadmin_RoleResource extends Zend_Form {

    private $_fields = array(
        "role" => "Role Name",
        "resource" => "Resource Name",
        "permission" => "Permission"
    );
    private $_hidden = array(
        "pk_id" => "pkId"
    );
    private $_list = array(
        'role' => array(),
        'resource' => array(),
        'permission' => array(
            'ALLOW' => 'ALLOW',
            'DENY' => 'DENY'
        )
    );

    public function init() {

        $roles = new Model_Roles();
        $result = $roles->getRoles();
       
        if ($result) {
            foreach ($result as $row) {
                $this->_list["role"][$row->getPkId()] = $row->getRoleName();
            }
        }

        $resources = new Model_Resources();
        $result2 = $resources->getAllResources();
        if ($result2) {
            foreach ($result2 as $row2) {
                $resource = $row2->getResourceName();
                $arr_resources = explode("/", $resource);
                $second_name = (!empty($arr_resources[1])) ? ucfirst($arr_resources[1]) . " - " : "";
                $this->_list["resource"][$row2->getPkId()] = ucfirst($arr_resources[0]) . " - " . $second_name . $row2->getDescription();
            }
        }

        foreach ($this->_fields as $col => $name) {
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
