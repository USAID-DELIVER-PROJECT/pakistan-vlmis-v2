<?php

/**
 * Model_Placements
 * 
 * 
 * 
 *     Logistics Management Information System for Vaccines
 * @subpackage Inventory Management
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */

/**
 *  Model for Period
 */

class Model_Period extends Model_Base {

    /**
     * $_table
     * @var type 
     */
    private $_table;

    const QUARTER = 3;
    const HALFYEAR = 6;
    const ANNUAL = 12;

    /**
     * __construct
     */
    public function __construct() {
        parent::__construct();
        $this->_table = $this->_em->getRepository('Period');
    }

    /**
     * Get Period By Id
     * 
     * @return type
     */
    public function getPeriodById() {
        return $this->_table->find($this->form_values['id']);
    }

    /**
     * Get Time Intervals
     * 
     * @return boolean
     */
    public function getTimeIntervals() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select("p.periodName,p.pkId,p.monthCount")
                ->from("Period", "p")
                ->where("p.monthCount > 1");

        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return false;
        }
    }

}
