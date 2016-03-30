<?php

/**
 * Model_DemandMaster
 *
 * 
 *
 *     Logistics Management Information System for Vaccines
 * @subpackage Inventory Management
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */

/**
 *  Model for Demand Master
 */
class Model_DemandMaster extends Model_Base {

    const STOCK_REQUISITION = 18;

    /**
     * __construct
     */
    public function __construct() {
        parent::__construct();
        $this->_table = $this->_em->getRepository('DemandMaster');
    }

    public function getLastID($from, $to, $wh_id = null) {

        if ($wh_id == null) {
            $wh_id = $this->_identity->getWarehouseId();
        }
        $str_sql = $this->_em_read->createQueryBuilder()
                ->select('MAX(dm.requisitionCounter) as Maxtr')
                ->from("DemandMaster", "dm")
                ->where("DATE_FORMAT(dm.fromDate,'%Y-%m-%d') = '" . $from . "' ")
                ->andwhere("DATE_FORMAT(dm.toDate,'%Y-%m-%d') = '" . $to . "' ")
                ->andWhere("dm.fromWarehouse = " . $wh_id);

        $row = $str_sql->getQuery()->getResult();
        if (count($row) > 0) {
            return $row[0]['Maxtr'];
        } else {
            return FALSE;
        }
    }

    public function getRequisitionNumber($from_date, $to_date, $wh_id = null, $trans_id = null) {

        $from_date_arr = explode("/", $from_date);

        $from_month = $from_date_arr[1];
        $from_year = $from_date_arr[2];

        $last_id = $this->getLastID($from_date, $to_date, $wh_id);

        if ($last_id == NULL) {
            $last_id = 0;
        }

        $last_id += 1;

        return array(
            "id" => $last_id,
            "req_no" => "RQ" . substr($from_year, -2) . $from_month . str_pad(($last_id), 4, "0", STR_PAD_LEFT)
        );
    }

    public function getTempRequisitionList() {
        $wh_id = $this->_identity->getWarehouseId();
        $str_sql = "SELECT
                        item.item_name,
                        item.pk_id AS item_id,
                        item_units.item_unit_name,
                        to_warehouse.warehouse_name AS to_warehouse_name,
                        demand_detail.demand_quantity,
                        demand_master.suggested_date,
                        demand_master.from_date,
                        demand_master.to_date,
                        demand_master.from_warehouse_id,
                        demand_master.created_by
                    FROM
                        demand_detail
                        INNER JOIN demand_master ON demand_detail.demand_master_id = demand_master.pk_id
                        INNER JOIN item_pack_sizes AS item ON demand_detail.product_id = item.pk_id
                        INNER JOIN item_units ON item.item_unit_id = item_units.pk_id
                        INNER JOIN warehouses AS to_warehouse ON demand_master.to_warehouse_id = to_warehouse.pk_id
                    WHERE
                        demand_master.draft = 1
                        AND demand_master.from_warehouse_id = $wh_id
                        AND demand_master.created_by = $wh_id";
        $rec = $this->_em_read->getConnection()->prepare($str_sql);
        $rec->execute();
        $result = $rec->fetchAll();
        if (count($result) > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function getDemandRequisitionDetails($master_id) {
        $wh_id = $this->_identity->getWarehouseId();
        $str_sql = "SELECT
demand_master.pk_id,
demand_master.from_date,
demand_master.to_date,
demand_master.suggested_date,
demand_master.approved_date,
demand_master.requisition_number,
demand_master.requisition_counter,
demand_master.requisition_reference,
demand_master.transaction_type_id,
demand_master.draft,
demand_master.`status`,
demand_master.comments,
demand_master.from_warehouse_id,
demand_master.to_warehouse_id,
demand_master.stock_master_id,
demand_master.modified_by,
demand_master.modified_date,
demand_master.stakeholder_activity_id,
demand_detail.pk_id,
demand_detail.demand_quantity,
demand_detail.approved_quantity,
demand_detail.demand_master_id,
demand_detail.product_id,
demand_detail.pair_product_id,
demand_detail.draft,
item_pack_sizes.item_name,
item_units.item_unit_name,
warehouses.warehouse_name AS to_warehouse_name
FROM
demand_master
INNER JOIN demand_detail ON demand_detail.demand_master_id = demand_master.pk_id
INNER JOIN item_pack_sizes ON demand_detail.product_id = item_pack_sizes.pk_id
INNER JOIN item_units ON item_pack_sizes.item_unit_id = item_units.pk_id
INNER JOIN demand_warehouses_logic ON demand_master.to_warehouse_id = demand_warehouses_logic.to_warehouse_id
INNER JOIN warehouses ON demand_warehouses_logic.to_warehouse_id = warehouses.pk_id
WHERE
	demand_master.pk_id = $master_id AND demand_warehouses_logic.from_warehouse_id = $wh_id"
        ;

        $rec = $this->_em_read->getConnection()->prepare($str_sql);
        $rec->execute();
        $result = $rec->fetchAll();
        if (count($result) > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function getTempRequisition() {
        $wh_id = $this->_identity->getWarehouseId();
        $str_sql = "SELECT
                        demand_master.requisition_number,
                        demand_master.requisition_reference,
                        demand_master.created_by,
                        demand_master.from_warehouse_id
                    FROM
                        demand_master
                        INNER JOIN warehouses ON demand_master.from_warehouse_id = warehouses.pk_id
                    WHERE
                        demand_master.draft = 1
                        AND demand_master.from_warehouse_id = $wh_id";
        $rec = $this->_em_read->getConnection()->prepare($str_sql);
        $rec->execute();
        $result = $rec->fetchAll();
        if (count($result) > 0) {
            return $result;
        } else {
            return false;
        }
    }

    //getTempStock

    public function getTempStock() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select('sm.transactionNumber AS transaction_number,
                        sm.transactionReference AS transaction_reference,
                        sm.transactionDate AS transaction_date,
                        sm.pkId AS pk_id,
                        ws.pkId AS from_warehouse_id,
                        ws.warehouseName AS warehouse_name
                        ')
                ->from("StockMaster", "sm")
                ->join("sm.fromWarehouse", "ws")
                ->where("sm.createdBy = " . $this->_user_id)
                ->andWhere("ws.status = 1");

        if ($this->form_values['transaction_type_id'] == 1) {
            $str_sql->andWhere("sm.toWarehouse =  " . $this->_identity->getWarehouseId());
        } else {
            $str_sql->andWhere("sm.fromWarehouse = " . $this->_identity->getWarehouseId());
        }

        $str_sql->andWhere("sm.transactionType = " . $this->form_values['transaction_type_id'])
                ->andWhere("sm.draft = 1 ");

        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            $warehouses = new Model_Warehouses();
            $arr_data['warehouse_name'] = $warehouses->getWarehouseNameByWarehouseId($row[0]['from_warehouse_id']);
            $arr_data['transaction_date'] = App_Controller_Functions::dateToUserFormat($row[0]['transaction_date']);
            $arr_data['transaction_number'] = $row[0]['transaction_number'];
            $arr_data['transaction_reference'] = $row[0]['transaction_reference'];
            $arr_data['stock_id'] = $row[0]['pk_id'];
            return $arr_data;
        } else {
            return false;
        }
    }

    public function getTempDemandList() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select('
                        dm.fromDate AS from_date,
                        dm.toDate AS to_date,
                        dm.pkId, 
                        dm.requisitionNumber AS req_no
                        ')
                ->from("DemandDetail", "dd")
                ->join("dd.demandMaster", "dm")
                ->where("dm.draft =  1")
                ;

        
        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return FALSE;
        }
    }

    public function addDemandMaster($array) {
        if ($array['rcvedit'] == "Yes") {
            $demand_master = $this->_em->getRepository("DemandMaster")->find($array['demand_master_id']);
        } else {
            $demand_master = new DemandMaster();
        }
        $type = $array['transaction_type_id'];

        $period_arr = explode('-', $array['period']);
        $from_date = $period_arr['0'];
        $to_date = $period_arr['1'];

        $demand_master->setFromDate(new \DateTime(App_Controller_Functions::dateToDbFormat($from_date)));
        $demand_master->setToDate(new \DateTime(App_Controller_Functions::dateToDbFormat($to_date)));
        $demand_master->setToDate(new \DateTime(App_Controller_Functions::dateToDbFormat($array['suggested_date'])));
        $trans_type = $this->_em->getRepository("TransactionTypes")->find(18);
        $demand_master->setTransactionType($trans_type);
        $demand_master->setRequisitionReference($array['requisition_reference']);
        $created_by = $this->_em->getRepository('Users')->find($this->_user_id);
        $demand_master->setCreatedBy($created_by);
        $demand_master->setModifiedBy($created_by);
        $demand_master->setCreatedDate(App_Tools_Time::now());
        $demand_master->setModifiedDate(App_Tools_Time::now());
        $activity_id = $this->_em->getRepository('StakeholderActivities')->find($array['activity_id']);
        $demand_master->setStakeholderActivity($activity_id);
        $from_wh = $this->_em->getRepository("Warehouses")->find($this->_identity->getWarehouseId());
        $demand_master->setFromWarehouse($from_wh);
        $to_wh = $this->_em->getRepository("Warehouses")->find(159);
        $demand_master->setToWarehouse($to_wh);
       
        $demand_master->setComments($array['comments']);
       
        $requisition_number = $this->getRequisitionNumber($from_date, $to_date);
        $demand_master->setDraft(1);
        $demand_master->setRequisitionCounter($requisition_number['id']);
        $demand_master->setRequisitionNumber($requisition_number['req_no']);



        $this->_em->persist($demand_master);
        $this->_em->flush();

        return $demand_master->getPkId();
    }
    
        
     public function updateDemandMasterTemp($id, $comments = null) {
        $stock = $this->_table->find($id);
        $trans = $this->getTransactionNumber($stock->getTransactionType()->getPkId(), $stock->getTransactionDate()->format("d/m/Y"), $this->_identity->getWarehouseId(), $stock->getPkId());
        $stock->setDraft(0);
        $stock->setTransactionCounter($trans['id']);
        $stock->setTransactionNumber($trans['trans_no']);
        $stock->setComments($comments);

        $user = $this->_em->getRepository('Users')->find($this->_user_id);
        $stock->setModifiedBy($user);
        $stock->setModifiedDate(App_Tools_Time::now());

        $this->_em->persist($stock);
        $this->_em->flush();
        return $trans['trans_no'];
    }
    

}
