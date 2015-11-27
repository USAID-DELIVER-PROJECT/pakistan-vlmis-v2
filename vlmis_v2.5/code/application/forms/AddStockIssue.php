<?php

class Form_AddStockIssue extends Zend_Form {

    private $_fields = array(
        "status" => "Status",
        "transaction_date" => "Transaction Date",
        "comments" => "Comments",
        "transaction_reference" => "Transaction Reference",
        "hdn_available_quantity" => "hdn_available_quantity",
        "hdn_vvm_stage" => "hdn_vvm_stage"
    );
    private $_hidden = array(
        "id" => "ID",
        "hdn_activity_id" => "",
        "hdn_receive_warehouse_id" => "",
        "hdn_stock_master_id" => "",
    );
    private $_list = array(
    );
    private $_childlist = array(
        'item_pack_size_id' => array(),
        'number' => array("Select")
    );

    public function init() {


        //Generate Item Combo
        $sips = new Model_StakeholderItemPackSizes();
        $sips->form_values['stakeholder_id'] = '1';

        $result = $sips->getAllProductsByStakeholderType();

        $this->_childlist["item_pack_size_id"][''] = "Select";


        foreach ($result as $row) {
            $this->_childlist["item_pack_size_id"][$row['item_pack_size_id']] = $row['item_name'];
        }

        foreach ($this->_fields as $col => $name) {
            switch ($col) {

                case "transaction_reference":

                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                case "transaction_number":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", 'readonly' => 'true'),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "transaction_date":

                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "readonly" => "true"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "comments":
                    $this->addElement("textarea", $col, array(
                        "attribs" => array("class" => "form-control", "rows" => "2"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));

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
        foreach ($this->_hidden as $col => $name) {
            switch ($col) {


                case "hdn_activity_id":
                case "hdn_receive_warehouse_id":
                case "hdn_stock_master_id":

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

    /**
     * Adds extra rows to the form
     *
     * @access public
     * @param mixed $data. (default: null)
     * @return void
     */
    public function addRows($start, $end) {

        for ($i = $start; $i < $end; $i++) {
            $rows = new Zend_Form_SubForm();
            $rows->setIsArray(true);
            $rows->setOrder($i);

            foreach ($this->_childlist as $col => $name) {
                switch ($col) {
                    case "item_pack_size_id":
                        $rows->addElement("select", $col, array(
                            "attribs" => array("class" => "form-control products"),
                            "filters" => array("StringTrim", "StripTags"),
                            "allowEmpty" => true,
                            "required" => false,
                            "registerInArrayValidator" => false,
                            "multiOptions" => $this->_childlist[$col],
                            "validators" => array(),
                            "belongsTo" => "rows$i"
                        ));
                        break;
                    case "number":
                        $rows->addElement("select", $col, array(
                            "attribs" => array("class" => "form-control manufaturers"),
                            "filters" => array("StringTrim", "StripTags"),
                            "allowEmpty" => true,
                            "required" => false,
                            "registerInArrayValidator" => false,
                            "multiOptions" => $this->_childlist[$col],
                            "validators" => array(),
                            "belongsTo" => "rows$i"
                        ));
                        break;
                    default:
                        $rows->addElement("select", $col, array(
                            "attribs" => array("class" => "form-control"),
                            "filters" => array("StringTrim", "StripTags"),
                            "allowEmpty" => true,
                            "required" => false,
                            "registerInArrayValidator" => false,
                            "multiOptions" => $this->_childlist[$col],
                            "validators" => array(),
                            "belongsTo" => "rows$i"
                        ));
                        break;
                }
            }



            $rows->addElement("text", "expiry_date", array(
                "attribs" => array("class" => "form-control", 'readonly' => 'true'),
                "allowEmpty" => false,
                "filters" => array("StringTrim", "StripTags"),
                "validators" => array(),
                "belongsTo" => "rows$i"
            ));
            $rows->addElement("hidden", "hdn_vvm_stage", array(
                "attribs" => array("class" => "form-control", 'readonly' => 'true'),
                "allowEmpty" => false,
                "filters" => array("StringTrim", "StripTags"),
                "validators" => array(),
                "belongsTo" => "rows$i"
            ));
            $rows->addElement("hidden", "hdn_available_quantity", array(
                "attribs" => array("class" => "form-control", 'readonly' => 'true'),
                "allowEmpty" => false,
                "filters" => array("StringTrim", "StripTags"),
                "validators" => array(),
                "belongsTo" => "rows$i"
            ));

            $rows->addElement("text", "quantity", array(
                "attribs" => array("class" => "form-control"),
                "allowEmpty" => false,
                "filters" => array("StringTrim", "StripTags"),
                "validators" => array(),
                "belongsTo" => "rows$i"
            ));

            foreach ($rows->getElements() as $element) {
                $element->removeDecorator("Label");
                $element->removeDecorator("HtmlTag");
            }

            $this->addSubForm($rows, "rows$i");
        }
    }

    public function populateManufacturer($item_id, $rows) {

        $batch = array();
        $stock_batch = new Model_StockBatch();
        $stock_batch->form_values['item_id'] = $item_id;
        $stock_batch->form_values['item_pack_size_id'] = $item_id;
        $stock_batch->form_values['transaction_date'] = $this->_request->transaction_date;

        $wh_id = $this->_identity->getWarehouseId();
        $wh = $this->_em->getRepository("Warehouses")->find($wh_id);
        $itm = $this->_em->getRepository("ItemPackSizes")->find($this->_request->item_id);

        if ($itm->getItemCategory()->getPkId() == 1 || $itm->getItemCategory()->getPkId() == 4) {
            $associated = $stock_batch->getAllPriorityBatches();
        } else {
            $associated = $stock_batch->getAllRunningBatches();
        }

        if ($associated) {
            foreach ($associated as $row) {
                $batch[$row['pkId']] = $row['stakeholderName'];
            }
        }

        $this->$rows->number->setMultiOptions($batch);
    }

}
