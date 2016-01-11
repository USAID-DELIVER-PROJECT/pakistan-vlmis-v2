<?php

class Form_PlannedIssueFilters extends Zend_Form {

    private $_fields = array(
        "to_warehouse_id" => "To Warehouse",
        "item_pack_size_id" => "Product Id",
        "from_date" => "From Date",
        "to_date" => "To Date",
        "status" => "Status"
    );
    private $_hidden = array(
        "id" => "ID"
    );
    private $_list = array(
        'from_warehouse_id' => array(),
        'item_pack_size_id' => array(),
        'status' => array('Planned' => 'Planned', 'Receiving' => 'Picking', 'Received' => 'Issued')
    );

    public function init() {
        //Generate WareHouses Combo
        $pc = new Model_PipelineConsignments();
        $result1 = $pc->getPipelineToWarehouses();
        $this->_list["to_warehouse_id"][""] = 'Select';
        foreach ($result1 as $wh) {
            $this->_list["to_warehouse_id"][$wh['pkId']] = $wh['warehouseName'];
        }

        //Generate Item Combo
        $item_pack_size = new Model_ItemPackSizes();
        $result = $item_pack_size->getItemsAll();
        $this->_list["item_pack_size_id"][''] = "Select";
        if ($result) {
            $item_id = $result[0]->getPkId();
            foreach ($result as $row) {
                $this->_list["item_pack_size_id"][$row->getPkId()] = $row->getItemName();
            }
        }
 $date_from = date('01/m/Y');
        $date_to = date('d/m/Y');
        
        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "from_date":
               
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", 'readonly' => 'true'),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array(),
                        "value" => $date_from
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "to_date":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", 'readonly' => 'true'),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array(),
                        "value" => $date_to
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
