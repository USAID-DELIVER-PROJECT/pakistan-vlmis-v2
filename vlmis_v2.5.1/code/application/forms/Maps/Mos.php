<?php

class Form_Maps_Mos extends Zend_Form {

    private $_fields = array(
        "month" => "Month",
        "year" => "Year",
        "product" => "Product",
        "reporting_product" => "Product",
        "level" => "Level",
        "amc_type" => "Type",
        "district_level" => "Level",
        "coldchain_type"=> "Type",
        "status"=> "Status",
        "vvm_level"=> "Level",
        "province" => "Province/Region",
        "product_item"=> "Product",
        "map_type" => "Level",
        "batch_no"=> "Batch No",
        "prov" => "Province/Region",
        "dist" => "District",
        "cc_type"=> "Type",
    );


    private $_year = array(
        "year" => array()
    );
    
    private $_list = array(
        "product" => array()
    );

    private $_reporting_list = array(
        "reporting_product" => array()
    );
    
    private $_province = array(
        "prov" => array()
    );
    
    private $_province_list = array(
        "province" => array()
    );
    
    private $_product_item = array(
        "product_item" => array()
    );
   

    public function init() {

        $items = new Model_Item();
        $result = $items->getProductList();
        $productItem = $items->getProductByCategory();
       
                                 
        for ($j = date('Y'); $j >= 2010; $j--) {
            $this->_year["year"][$j] = $j;
        }

        foreach ($result as $item) {
            $this->_list["product"][$item['pkId']] = $item['itemName'];
        }
        
         foreach ($productItem as $item) {
             $this->_product_item["product_item"][$item['pkId']] = $item['itemName'];
        }
        

        $locations = new Model_Locations();
        $res = $locations->getProvinceName();
        $this->_province_list["province"]['all'] = "Select";
        foreach ($res as $loc) {
            $this->_province_list["province"][$loc['pk_id']] = $loc['location_name'];
            $this->_province["prov"][$loc['pk_id']] = $loc['location_name'];
        }
        
       
        
       
        $this->_reporting_list["reporting_product"]['%'] = "All Product";
        foreach ($result as $item) {
            $this->_reporting_list["reporting_product"][$item['pkId']] = $item['itemName'];
        }

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "month":
                    $this->addElement("select", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "multiOptions" => array(
                            '1'=>'Jan',
                            '2'=>'Feb',
                            '3'=>'Mar',
                            '4'=>'Apr',
                            '5'=>'May',
                            '6'=>'Jun',
                            '7'=>'Jul',
                            '8'=>'Aug',
                            '9'=>'Sep',
                            '10'=>'Oct',
                            '11'=>'Nov',
                            '12'=>'Dec'
                        )
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "dist":
                    $this->addElement("select", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags")
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                break;
                case "batch_no":
                $this->addElement("text", $col, array(
                    "attribs" => array("class" => "form-control"),
                    "allowEmpty" => false
                ));
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                break;
                case "year":
                    $this->addElement("select", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "multiOptions" => array(
                            '2014'=>'2014',
                            '2013'=>'2013',
                            '2012'=>'2012',
                            '2011'=>'2011',
                            '2010'=>'2010'
                        )
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "coldchain_type":
                    $this->addElement("select", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "multiOptions" => array(
                            '1'=>'ILR/Refrigerators at District + Field Level',
                            '3'=>'Cold Rooms at District Level'
                        )
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                 case "cc_type":
                    $this->addElement("select", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "multiOptions" => array(
                            '1'=>'ILR/Refrigerators at Tehsil + Field Level'
                        )
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "level":
                    $this->addElement("select", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "multiOptions" => array(
                            'all'=>'District + Field',
                            '4'=>'District',
                            '6'=> 'Field'
                        )
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                  break;
                   case "map_type":
                    $this->addElement("select", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "multiOptions" => array(
                            '2'=>'Provincial',
                            '4'=>'District'
                        )
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "district_level":
                    $this->addElement("select", $col, array(
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "multiOptions" => array(
                            '4'=>'District'
                        )
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "amc_type":
                    $this->addElement("select", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "multiOptions" => array(
                            'C'=>'Consumption',
                            'A'=>'Avg.Consumption'
                        )
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "status":
                    $this->addElement("select", $col, array(
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "multiOptions" => array(
                            '1'=>'Functional',
                            '2'=>'Non-Functional'
                        )
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "vvm_level":
                    $this->addElement("select", $col, array(
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "multiOptions" => array(
                            '3'=>'Provincial',
                            '4'=>'District'
                        )
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
            if (in_array($col, array_keys($this->_reporting_list))) {
                $this->addElement("select", $col, array(
                    "attribs" => array("class" => "form-control"),
                    "filters" => array("StringTrim", "StripTags"),
                    "allowEmpty" => false,
                    "required" => true,
                    "registerInArrayValidator" => false,
                    "multiOptions" => $this->_reporting_list[$col]
                ));
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
            }
            
              if (in_array($col, array_keys($this->_province_list))) {
                $this->addElement("select", $col, array(
                    "attribs" => array("class" => "form-control"),
                    "filters" => array("StringTrim", "StripTags"),
                    "allowEmpty" => false,
                    "required" => true,
                    "registerInArrayValidator" => false,
                    "multiOptions" => $this->_province_list[$col]
                ));
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
            }
              if (in_array($col, array_keys($this->_province))) {
                $this->addElement("select", $col, array(
                    "attribs" => array("class" => "form-control"),
                    "filters" => array("StringTrim", "StripTags"),
                    "allowEmpty" => false,
                    "required" => true,
                    "registerInArrayValidator" => false,
                    "multiOptions" => $this->_province[$col]
                ));
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
            }
            
             if (in_array($col, array_keys($this->_year))) {
                $this->addElement("select", $col, array(
                    "attribs" => array("class" => "form-control"),
                    "filters" => array("StringTrim", "StripTags"),
                    "allowEmpty" => false,
                    "required" => true,
                    "registerInArrayValidator" => false,
                    "multiOptions" => $this->_year[$col]
                ));
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
            }
            
             if (in_array($col, array_keys($this->_product_item))) {
                $this->addElement("select", $col, array(
                    "attribs" => array("class" => "form-control"),
                    "filters" => array("StringTrim", "StripTags"),
                    "allowEmpty" => false,
                    "required" => true,
                    "registerInArrayValidator" => false,
                    "multiOptions" => $this->_product_item[$col]
                ));
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
            }
            
            
        }
    }

}
