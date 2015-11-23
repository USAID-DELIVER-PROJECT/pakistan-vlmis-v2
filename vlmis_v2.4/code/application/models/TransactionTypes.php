<?php

/**
 * Model_TransactionTypes
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    Logistics Management Information System for Vaccines
 * @subpackage Inventory Management
 * @author     Ajmal Hussain <ajmaleyetii@gmail.com>
 * @version    2
 */
class Model_TransactionTypes extends Model_Base {

    protected $_table;

    const TRANSACTION_RECIEVE = 1;
    const TRANSACTION_ISSUE = 2;
    const LOST_RECOVERED = 8;
    const PHYSICALLY_FOUND = 12;
    const PHYSICALLY_NOT_FOUND = 13;
    const OPENING_BALANCE = 15;
    const CHANGE_PURPOSE_POSITIVE = 16;

    public function __construct() {
        parent::__construct();
        $this->_table = $this->_em->getRepository('CcmEquipmentTypes');
    }

    public function getAdjusmentTypes() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select("tt.transactionTypeName,tt.pkId")
                ->from("TransactionTypes", "tt")
                ->where("tt.isAdjustment > 0 ")
                ->andWhere("tt.status = 1 ");
        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function findById($id = 0) {
        $str_sql = $this->_em->createQueryBuilder()
                ->select("t.nature")
                ->from("TransactionTypes", "t")
                ->where("t.pkId = $id")
                ->setMaxResults(1);

        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function findAll() {

        $str_sql = $this->_em->createQueryBuilder()
                ->select("t.pkId,t.transactionTypeName")
                ->from("TransactionTypes", "t")
                ->where("t.isAdjustment = 1");

        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function getAll() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select("t.pkId,t.transactionTypeName,t.nature")
                ->from("TransactionTypes", "t");

        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return false;
        }
    }
    
    public function getAllTransactionTypes($order = null, $sort = null) {
      
       
        $str_sql = $this->_em->createQueryBuilder()
                ->select("t.pkId,t.transactionTypeName,t.nature,t.status,u.userName")
                ->from('TransactionTypes', 't')
                ->join('t.createdBy', 'u');
      //  ->where("t.isAdjustment ! = 0");
        if (!empty($this->form_values['transactionTypeName'])) {
            $str_sql->where("t.transactionTypeName = '".$this->form_values['transactionTypeName']."'  ");
        }
        
        if ( $this->form_values['nature'] =='+') {
            $str_sql->where("t.nature = '+'  ");
        }
        if ( $this->form_values['nature'] =='-') { 
            $str_sql->where("t.nature = '-'  ");
        }
     // echo $str_sql->getQuery()->getSql();exit;
        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return false;
        }
    }

}
