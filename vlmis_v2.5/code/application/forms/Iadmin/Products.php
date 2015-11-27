<?php

class Form_Iadmin_Products extends Zend_Form {

    private $_fields = array(
        "item_name" => "item_name",
        "description" => "description",
        "number_of_doses" => "number_of_doses",
        "list_rank" => "list_rank",
        "item_category" => "item_category",
        "item_unit" => "item_unit",
        "item" => "group",
        "item_category_name" => "item_category_name",
        "item_unit_name" => "item_unit_name",
        "item_description" => "item_description",
        "percent_population_covered" => "percent_population_covered"
    );
    private $_hidden = array(
        "item_id" => "item_id",
        "item_category_id" => "item_category_id",
        "item_unit_id" => "item_unit_id",
        "item_group_id" => "item_group_id"
    );
    private $_list = array(
        'list_rank' => array(
        ),
        'item_category' => array(),
        'item_unit' => array(),
        'item' => array()
    );

    public function init() {

        $this->_list["list_rank"][''] = "Select";
        $this->_list["list_rank"]['1'] = "1";
        $this->_list["list_rank"]['2'] = "2";
        $this->_list["list_rank"]['3'] = "3";
        $this->_list["list_rank"]['4'] = "4";
        $this->_list["list_rank"]['5'] = "5";
        //Generate Combos
        $item_category = new Model_ItemCategories();

        $result1 = $item_category->getAllCategories();
        $this->_list["item_category"][''] = "Select";
        foreach ($result1 as $rs) {
            $this->_list["item_category"][$rs['pkId']] = $rs['itemCategoryName'];
        }
        $item_units = new Model_ItemUnits();

        $result2 = $item_units->getAllItemUnits();
        $this->_list["item_unit"][''] = "Select";
        foreach ($result2 as $rs) {
            $this->_list["item_unit"][$rs['pkId']] = $rs['itemUnitName'];
        }

        $item = new Model_Item();

        $result3 = $item->getAllItems();
        $this->_list["item"][''] = "Select";
        foreach ($result3 as $rs) {
            $this->_list["item"][$rs['pkId']] = $rs['description'];
        }




        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "item_name":
                case "description":
                case "number_of_doses":
                case "item_category_name":
                case "item_unit_name":
                case "item_description":
                case "percent_population_covered";
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
                    "multiOptions" => $this->_list[$col]
                ));
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
            }
        }

        foreach ($this->_hidden as $col => $name) {
            switch ($col) {

                case "item_id":
                case "item_category_id":
                case "item_unit_id":
                case "item_group_id":
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
