<?php

/**
 * Model_CcmMakes
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    Logistics Management Information System for Vaccines
 * @subpackage Cold Chain
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */
class Model_GatepassVehicles extends Model_Base {

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
        $this->_table = $this->_em->getRepository('GatepassVehicles');
    }

    /**
     * 
     * @return type
     */
    public function getVehicleNumberByType() {

        $str_sql = $this->_em->createQueryBuilder()
                ->select('gpv.pkId', 'gpv.number')
                ->from("GatepassVehicles", "gpv")
                ->where("gpv.vehicleType = " . $this->form_values['vehicle_type_id']);

        $result = $str_sql->getQuery()->getResult();

        return $result;
    }

}