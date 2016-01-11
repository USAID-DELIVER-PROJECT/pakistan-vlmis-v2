<?php

/**
 * Model_CcmTransferHistory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    Logistics Management Information System for Vaccines
 * @subpackage Cold Chain
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */
class Model_CcmTransferHistory extends Model_Base {

    /**
     *
     * @var type 
     */
    private $_table;

    /**
     * 
     */
    public function __construct() {
        parent::__construct();
        $this->_table = $this->_em->getRepository('CcmTransferHistory');
    }

}