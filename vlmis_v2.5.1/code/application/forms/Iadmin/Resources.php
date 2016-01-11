<?php

class Form_Iadmin_Resources extends Zend_Form {

    private $_fields = array(
        "resource_name" => "Resource Name",
        "description" => "Description",
        "resource_type" => "Resource Type",
        "parent_id" => "Parent",
        "rank" => "Rank",
        "level" => "Level",
        "page_title" => "Page Title",
        "meta_title" => "Meta Title",
        "meta_desc" => "Meta Description"
    );
    private $_hidden = array(
        "pk_id" => "pkId"        
    );
    private $_list = array(
        'resource_type' => array(),
        'rank' => array(),
        'level' => array(),
        'parent_id' => array()
    );

    public function init() {

        $em = Zend_Registry::get("doctrine");
        $result = $em->getRepository("ResourceTypes")->findAll();
        $this->_list["resource_type"][''] = "Select";
        foreach ($result as $rs) {
            $this->_list["resource_type"][$rs->getPkId()] = $rs->getResourceType();
        }
        
        $resources = new Model_Resources();
        $result2 = $resources->getResources('resource_name','ASC');
        $this->_list["parent_id"][''] = "Select";
        if ($result2) {
            foreach ($result2 as $row2) {                
                $resource = $row2->getResourceName();
                $arr_resources = explode("/", $resource);
                $second_name = (!empty($arr_resources[1]))? ucfirst($arr_resources[1])." - " : "";
                $this->_list["parent_id"][$row2->getPkId()] = ucfirst($arr_resources[0])." - ".$second_name . $row2->getDescription();
            }
        }
        
        for ($a=1; $a<=20; $a++) {
            $this->_list["rank"][$a] = $a;
        }
        
        for ($b=1; $b<=10; $b++) {
            $this->_list["level"][$b] = $b;
        }

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "resource_name":
                case "description":
                case "page_title":
                case "meta_title":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "meta_desc":
                    $this->addElement("textarea", $col, array(
                        "attribs" => array("class" => "form-control", "rows" => "4"),
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