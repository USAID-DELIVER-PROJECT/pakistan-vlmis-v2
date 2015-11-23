<?php

class Form_StockBatch extends Zend_Form {

    private $_fields = array(
        "item_pack_size_id" => "Vaccine",
        "status" => "Status",
        "searchby" => "Search By",
        "searchinput" => "Search Input"
    );
    private $_list = array(
        'item_pack_size_id' => array(),
        'searchby' => array(
            '' => 'Select',
            'number' => 'Batch Number',
            'expired_before' => 'Expired on or before',
            'expired_after' => 'Expired on or after'
        )
    );

    public function init() {
        //Generate Products(items) Combo
        $items = new Model_ItemPackSizes();
        $result2 = $items->getAllItems();
        foreach ($result2 as $item) {
            $this->_list["item_pack_size_id"][$item['pkId']] = $item['itemName'];
        }

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "searchinput":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "status":
                    $this->addElement("radio", $col, array(
                        "attribs" => array(),
                        "allowEmpty" => true,
                        'separator' => '',
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array(),
                        "multiOptions" => array(  
                            "6" => "All Priorities",
                            "1" => "Priority 1",
                            "2" => "Priority 2",
                            "3" => "Priority 3",                            
                            "4" => "Finished",
                            "5" => "Expired by date",
                            "7" => "Expired by VVM"
                        ),
                        'options' => array(
                            'label' => 'Title',
                            'labelAttributes' => array(
                                'class' => 'radio-inline',
                            ),
                        ),
                    ));
                    //$this->getElement($col)->setAttrib("label_class", "radio-inline");
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag")->removeDecorator("<br>");
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
