<?php

/**
 * Model_ReportOptions
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    Logistics Management Information System for Vaccines
 * @subpackage Inventory Management
 * @author     Ajmal Hussain <ajmaleyetii@gmail.com>
 * @version    2
 */
class Model_ReportOptions extends Model_Base {

    private $_table;

    public function __construct() {
        parent::__construct();
        $this->_table = $this->_em->getRepository('ReportOptions');
    }

    public function getReportDataSql() {
        return $this->_table->findOneBy(
                        array(
                            'reportStakeholder' => $this->form_values['stakeholder'],
                            'reportId' => $this->form_values['report_id'],
                            'reportComparision' => $this->form_values['report_comp']
                        )
        );
    }

}
