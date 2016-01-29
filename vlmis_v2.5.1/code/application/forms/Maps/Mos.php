<?php

/**
 * Form_Maps_Mos
 *
 * 
 *
 *     Logistics Management Information System for Vaccines
 * @subpackage Maps
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */

/**
 *  Form for Maps MOS
 */
class Form_Maps_Mos extends Form_Base {

    /**
     * $_fields
     * @var type 
     */
    private $_fields = array(
        "month" => "Month",
        "year" => "Year",
        "product" => "Product",
        "reporting_product" => "Product",
        "level" => "Level",
        "amc_type" => "Type",
        "district_level" => "Level",
        "coldchain_type" => "Type",
        "status" => "Status",
        "vvm_level" => "Level",
        "province" => "Province/Region",
        "product_item" => "Product",
        "map_type" => "Level",
        "batch_no" => "Batch No",
        "prov" => "Province/Region",
        "dist" => "District",
        "cc_type" => "Type",
    );

    /**
     * $_year
     * @var type 
     */
    private $_year = array(
        "year" => array()
    );

    /**
     * $_list
     * @var type 
     */
    private $_list = array(
        "product" => array()
    );

    /**
     * $_reporting_list
     * @var type 
     */
    private $_reporting_list = array(
        "reporting_product" => array()
    );

    /**
     * $_province
     * @var type 
     */
    private $_province = array(
        "prov" => array()
    );

    /**
     * $_province_list
     * @var type 
     */
    private $_province_list = array(
        "province" => array()
    );

    /**
     * $_product_item
     * @var type 
     */
    private $_product_item = array(
        "product_item" => array()
    );

    /**
     * Initializes Form Fields
     */
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
                    $multioptions = array(
                        '1' => 'Jan',
                        '2' => 'Feb',
                        '3' => 'Mar',
                        '4' => 'Apr',
                        '5' => 'May',
                        '6' => 'Jun',
                        '7' => 'Jul',
                        '8' => 'Aug',
                        '9' => 'Sep',
                        '10' => 'Oct',
                        '11' => 'Nov',
                        '12' => 'Dec'
                    );
                    parent::createSelect($col, $multioptions);
                    break;
                case "dist":
                    parent::createSelectWithoutMultioptions($col);
                    break;
                case "batch_no":
                    parent::createText($col);
                    break;
                case "year":
                    $multioptions = array(
                        '2014' => '2014',
                        '2013' => '2013',
                        '2012' => '2012',
                        '2011' => '2011',
                        '2010' => '2010'
                    );
                    parent::createSelect($col, $multioptions);
                    break;
                case "coldchain_type":
                    $multioptions = array(
                        '1' => 'ILR/Refrigerators at District + Field Level',
                        '3' => 'Cold Rooms at District Level'
                    );
                    parent::createSelect($col, $multioptions);
                    break;
                case "cc_type":
                    $multioptions = array(
                        '1' => 'ILR/Refrigerators at Tehsil + Field Level'
                    );
                    parent::createSelect($col, $multioptions);
                    break;
                case "level":
                    $multioptions = array(
                        'all' => 'District + Field',
                        '4' => 'District',
                        '6' => 'Field'
                    );
                    parent::createSelect($col, $multioptions);
                    break;
                case "map_type":
                    $multioptions = array(
                        '2' => 'Provincial',
                        '4' => 'District'
                    );
                    parent::createSelect($col, $multioptions);
                    break;
                case "district_level":
                    $multioptions = array(
                        '4' => 'District'
                    );
                    parent::createSelect($col, $multioptions);
                    break;
                case "amc_type":
                    $multioptions = array(
                        'C' => 'Consumption',
                        'A' => 'Avg.Consumption'
                    );
                    parent::createSelect($col, $multioptions);
                    break;
                case "status":
                    $multioptions = array(
                        '1' => 'Functional',
                        '2' => 'Non-Functional'
                    );
                    parent::createSelect($col, $multioptions);
                    break;
                case "vvm_level":
                    $multioptions = array(
                        '3' => 'Provincial',
                        '4' => 'District'
                    );
                    parent::createSelect($col, $multioptions);
                    break;
                default:
                    break;
            }

            if (in_array($col, array_keys($this->_list))) {
                parent::createSelect($col, $this->_list[$col]);
            }
            if (in_array($col, array_keys($this->_reporting_list))) {
                parent::createSelect($col, $this->_reporting_list[$col]);
            }

            if (in_array($col, array_keys($this->_province_list))) {
                parent::createSelect($col, $this->_province_list[$col]);
            }
            if (in_array($col, array_keys($this->_province))) {
                parent::createSelect($col, $this->_province[$col]);
            }

            if (in_array($col, array_keys($this->_year))) {
                parent::createSelect($col, $this->_year[$col]);
            }

            if (in_array($col, array_keys($this->_product_item))) {
                parent::createSelect($col, $this->_product_item[$col]);
            }
        }
    }

}
