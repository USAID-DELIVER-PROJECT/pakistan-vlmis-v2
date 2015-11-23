<?php

class Form_Iadmin_MessagesSearch extends Zend_Form {

    private $_fields = array(
        "page_name" => "Page Name",
        "search_text" => "Page Name Description",
        "status" => "Status",
        "deleted" => "Deleted"
    );
    private $_list = array(
        'page_name' => array(),
        'status' => array(
            '0' => 'Disable',
            '1' => 'Enable',
            '2' => 'Deleted'
        )
    );
    private $_checkbox = array(
        "deleted" => array(
            '1' => 'deleted'
        ),
    );

    public function init() {
        $resources = new Model_Resources();
        $resources->form_values['only_childs'] = 1;
        $result2 = $resources->getResources('resource_name', 'ASC');
        $this->_list["page_name"][''] = "Select";
        if ($result2) {
            foreach ($result2 as $row2) {
                $resource = $row2->getResourceName();
                $arr_resources = explode("/", $resource);
                $second_name = (!empty($arr_resources[1])) ? ucfirst($arr_resources[1]) . " - " : "";
                $this->_list["page_name"][$row2->getPkId()] = ucfirst($arr_resources[0]) . " - " . $second_name . $row2->getDescription();
            }
        }
        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "search_text":
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
            
            if (in_array($col, array_keys($this->_checkbox))) {
                $this->addElement("checkbox", $col, array(
                    "attribs" => array(),
                    "allowEmpty" => true,
                    'separator' => '',
                    "filters" => array("StringTrim", "StripTags"),
                    "validators" => array(),
                    "multiOptions" => $this->_checkbox[$col]
                ));
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
            }
        }
    }

}
