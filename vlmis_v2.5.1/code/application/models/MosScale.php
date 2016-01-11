<?php

/**
 * Model_Locations
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    Logistics Management Information System for Vaccines
 * @subpackage Inventory Management
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */
class Model_MosScale extends Model_Base {

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
        $this->_table = $this->_em->getRepository('MosScale');
    }

    /**
     * 
     * @return boolean
     */
    public function getMosScaleByItem() {
        $item = $this->form_values['item'];
        $level = $this->form_values['level'];

        $str_sql = "SELECT
            CONCAT(mos_scale.long_term,' (',mos_scale.scale_start,' - ',mos_scale.scale_end,' months)') as vall,
            CONCAT(mos_scale.scale_start,'-',mos_scale.scale_end) as keyy
            FROM
            mos_scale
            WHERE
            mos_scale.geo_level_id = $level and item_id = $item";
        $sql = $this->_em->getConnection()->prepare($str_sql);
        $sql->execute();
        $row = $sql->fetchAll();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return FALSE;
        }
    }

}