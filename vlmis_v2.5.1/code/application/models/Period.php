<?php

/**
 * Model_Placements
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    Logistics Management Information System for Vaccines
 * @subpackage Inventory Management
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */
class Model_Period extends Model_Base {

    /**
     *
     * @var type 
     */
    private $_table;

    const QUARTER = 3;
    const HALFYEAR = 6;
    const ANNUAL = 12;

    /**
     * 
     */
    public function __construct() {
        parent::__construct();
        $this->_table = $this->_em->getRepository('Period');
    }

    /**
     * 
     * @return type
     */
    public function getPeriodById() {
        return $this->_table->find($this->form_values['id']);
    }

    /**
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
