<?php

/**
 * Model_Shipment
 * 
 * 
 * 
 *     Logistics Management Information System for Vaccines
 * @subpackage Inventory Management
 * @author    Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */

/**
 *  Model for Shipments
 * 
 * Inherits:
 * Model Base
 */

class Model_Shipments extends Model_Base {

    /**
     * $_table
     * 
     * Table
     * 
     * @var type 
     */
    private $_table;

    /**
     * __construct
     * 
     * Constructor for Shipments
     */
    public function __construct() {
        //calling parent constructor
        parent::__construct();
        $this->_table = $this->_em->getRepository('Shipments');
    }

    /**
     * Get Min Date
     * 
     * @param type $date
     * @return string
     */
    public function getMinDate($date) {
        $str_sql = $this->_em->createQueryBuilder()
                ->select("MIN(sh.shipmentDate) sh_date")
                ->from("Shipments", "sh")
                ->where("sh.shipmentDate > '" . $date . "'");

        $result = $str_sql->getQuery()->getResult();
        if (count($result) > 0) {
            return $result[0]['sh_date'];
        } else {
            return '';
        }
    }

    /**
     * Get Max Date
     * 
     * @param type $date
     * @return string
     */
    public function getMaxDate($date) {
        $str_sql = $this->_em->createQueryBuilder()
                ->select("MAX(sh.shipmentDate) sh_date")
                ->from("Shipments", "sh")
                ->where("sh.shipmentDate > '" . $date . "'");

        $result = $str_sql->getQuery()->getResult();
        if (count($result) > 0) {
            return $result[0]['sh_date'];
        } else {
            return '';
        }
    }

    /**
     * addProcurements
     * 
     * Add Procurements
     * 
     * @return type
     */
    public function addProcurements() {

        $data = $this->form_values;
        $shipments = new Shipments();
        $shipmentHistory = new ShipmentHistory();

        $shipments->setReferenceNumber($data['transaction_reference']);

        $item_id = $this->_em->getRepository('ItemPackSizes')->find($data['item_id']);
        $shipments->setItemPackSize($item_id);
        $shipments->setShipmentDate(new \DateTime(App_Controller_Functions::dateToDbFormat($data['shipment_date'])));
        $shipments->setShipmentQuantity(str_replace(",", "", $data['quantity']));
        $funding_source_id = $this->_em->getRepository('Warehouses')->find($data['from_warehouse_id']);
        $shipments->setFundingSource($funding_source_id);
        $activity_id = $this->_em->getRepository('StakeholderActivities')->find($data['activity_id']);
        $shipments->setStakeholderActivity($activity_id);
        $warhouse_id = $this->_em->getRepository('Warehouses')->find($this->_identity->getWarehouseId());
        $shipments->setWarehouse($warhouse_id);
        $shipments->setCreatedDate(new \DateTime(date("Y-m-d")));
        $created_by = $this->_em->getRepository('Users')->find($this->_user_id);
        $shipments->setCreatedBy($created_by);
        $shipments->setModifiedBy($created_by);
        $shipments->setModifiedDate(App_Tools_Time::now());

        $this->_em->persist($shipments);
        $this->_em->flush();

        $id = $shipments->getPkId();

        $shipment_id = $this->_em->getRepository('Shipments')->find($id);
        
        //sets Shipment Id
        $shipmentHistory->setShipment($shipment_id);
        
        //sets Shipment Status
        $shipmentHistory->setStatus($data['status']);
        
        //sets Reference Number
        $shipmentHistory->setReferenceNumber($data['transaction_reference']);
        
        //sets Created Date
        $shipmentHistory->setCreatedDate(new \DateTime(date("Y-m-d")));
        
        //sets Created By
        $shipmentHistory->setCreatedBy($created_by);
        
        //sets Modified By
        $shipmentHistory->setModifiedBy($created_by);
        
        //sets Modified Date
        $shipmentHistory->setModifiedDate(App_Tools_Time::now());
        
        $this->_em->persist($shipmentHistory);
        $this->_em->flush();
        
        //returns Pk Id of Shipment History
        return $shipmentHistory->getPkId();
    }

    /**
     * getProcurements
     * 
     * Get Procurements
     * 
     * @return type
     */
    public function getProcurements() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select("DISTINCT s.referenceNumber, s.pkId, warehouse.warehouseName, "
                        . "s.shipmentDate,s.shipmentQuantity as quantity,sh.status,ips.itemName,sa.activity")
                ->from("ShipmentHistory", "sh")
                ->join("sh.shipment", "s")
                ->join("s.itemPackSize", "ips")
                ->join("s.stakeholderActivity", "sa")
                ->join("s.fundingSource", 'warehouse')
                ->join("s.warehouse", 'w')
                ->andWhere("w.pkId = " . $this->_identity->getWarehouseId());

        if (!empty($this->form_values['from_date']) && !empty($this->form_values['to_date'])) {
            $str_sql->andWhere("DATE_FORMAT(s.shipmentDate,'%Y-%m-%d') BETWEEN '" . App_Controller_Functions::dateToDbFormat($this->form_values['from_date']) . "' AND '" . App_Controller_Functions::dateToDbFormat($this->form_values['to_date']) . "'");
        } else {
            $date_from = date('Y-m' . '-01');
            $date_to = date('Y-m-d');
            $str_sql->andWhere("DATE_FORMAT(s.shipmentDate,'%Y-%m-%d') BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
        }
        if (!empty($this->form_values['item_pack_size_id'])) {
            $str_sql->andWhere("ips.pkId = '" . $this->form_values['item_pack_size_id'] . "'");
        }
        if (!empty($this->form_values['from_warehouse_id'])) {
            $str_sql->andWhere("warehouse.pkId = '" . $this->form_values['from_warehouse_id'] . "'");
        }
        if (!empty($this->form_values['status'])) {
            $str_sql->andWhere("sh.status = '" . $this->form_values['status'] . "'");
        }

        $str_sql->orderBy("s.pkId", "DESC");
        
        //returns result
        return $str_sql->getQuery()->getResult();
    }

}
