<?php

/**
 * Model_StockMaster
 *
 * 
 *
 *     Logistics Management Information System for Vaccines
 * @subpackage Inventory Management
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */

/**
 *  Model for Demand Detail
 */
class Model_DemandDetail extends Model_Base {

    /**
     * __construct
     */
    public function __construct() {
        parent::__construct();
        $this->_table = $this->_em->getRepository('DemandDetail');
    }

    public function addDemandDetail($array) {
        $action = Zend_Registry::get("action");
        if ($array['rcvedit'] == "Yes") {
            $demand_detail = $this->_em->getRepository("DemandDetail")->find($array['demand_detail_id']);
        } else {
            $demand_detail = new DemandDetail();
        }
        $type = $array['transaction_type_id'];

        if (!empty($array['hdn_stock_id'])) {
            $stock_id = $array['hdn_stock_id'];
        } else {
            $stock_id = $array['stock_master_id'];
        }
        $demand_master_id = $this->_em->getRepository('DemandMaster')->find($stock_id);
        $demand_detail->setDemandMaster($demand_master_id);

        $product = $this->_em->getRepository("ItemPackSizes")->find($array['item_id']);
        $demand_detail->setProduct($product);
        $demand_detail->setPairProductId($array['usage']);
        if (!empty($array['item_unit_id'])) {
            $item_unit_id = $this->_em->getRepository('ItemUnits')->find($array['item_unit_id']);
            $demand_detail->setItemUnit($item_unit_id);
        }
        if ($array['type'] != 's') {
            $demand_detail->setDraft(1);
        }
//        $quantity = str_replace(",", "", $array['quantity']);
//        if ($action == 'issue') {
//            list($location, $vvm, $placd_qty) = explode("|", $array['vvm_stage']);
//            if ($vvm == 0) {
//                $array['vvm_stage'] = 5;
//            } else if (!empty($vvm)) {
//                $array['vvm_stage'] = 5;
//            } else {
//                $array['vvm_stage'] = $location;
//            }
//            if ($quantity > $placd_qty) {
//                throw new RangeException('PLCD_QTY_GREATER_THAN_ISSUE_QTY');
//            }
//        }
//        $vvms = $this->_em->getRepository("VvmStages")->find(5);
//        $demand_detail->setVvmStage($vvms);
//        if ($type == Model_TransactionTypes::TRANSACTION_ISSUE) {
//            $quantity = "-" . $quantity;
//        }
        $demand_detail->setDemandQuantity($array['quantity']);
//        $demand_detail->setAdjustmentType("$type");
//        if ($type == 1) {
//            $str_sql = $this->_em->createQueryBuilder()
//                    ->select("sbw.pkId")
//                    ->from('StockBatchWarehouses', 'sbw')
//                    ->join('sbw.stockBatch', 'sb')
//                    ->join('sb.packInfo', 'pi')
//                    ->join('pi.stakeholderItemPackSize', 'sip')
//                    ->where("sip.itemPackSize = '" . $array['item_id'] . "' ")
//                    ->andWhere("sb.number = '" . $array['number'] . "'  ")
//                    ->andWhere("sbw.warehouse =  '" . $this->_identity->getWarehouseId() . "' ");
//
//            //this IF is for stock receive
//            $row = $str_sql->getQuery()->getResult();
//            $stock_batch_id = $this->_em->getRepository('StockBatchWarehouses')->find($row['0']['pkId']);
//            $demand_detail->setStockBatchWarehouse($stock_batch_id);
//
//            $demand_detail->setIsReceived(1);
//        } else if ($type == 2) {
//            //this ELSE IF is for stock issue
//            $stock_batch_id = $this->_em->getRepository('StockBatchWarehouses')->find($array['stock_batch_id']);
//            $demand_detail->setStockBatchWarehouse($stock_batch_id);
//            $demand_detail->setIsReceived(0);
//        }
        $created_by = $this->_em->getRepository('Users')->find($this->_user_id);
        $demand_detail->setModifiedBy($created_by);
        $demand_detail->setModifiedDate(App_Tools_Time::now());
        $demand_detail->setCreatedBy($created_by);
        $demand_detail->setCreatedDate(App_Tools_Time::now());

//        $demand_detail->setDistributionPlan($array['dtl']);
//        $demand_detail->setPhysicalInspection($array['physical_inspection']);
//        $demand_detail->setDtl($array['distribution_plan']);

        $this->_em->persist($demand_detail);
        $this->_em->flush();
//        if ($action == 'issue' && !empty($location)) {
//            $placements = new Model_Placements();
//            $placements->form_values['placement_loc_id'] = $location;
//            $placements->form_values['batch_id'] = $array['number'];
//            $placements->form_values['vvmstage'] = 5;
//            $placements->form_values['is_placed'] = 1;
//            $placements->form_values['quantity'] = $quantity;
//            $placements->form_values['placement_loc_type_id'] = 115;
//            $placements->form_values['detail_id'] = $demand_detail->getPkId();
//            $placements->form_values['user_id'] = $this->_user_id;
//            $placements->form_values['created_date'] = date("Y-m-d");
//            $placements->add();
//        }
        return $demand_detail->getPkId();
    }
    
     public function updateDemandDetailTemp($id) {
        $row = $this->_em->getConnection()->prepare("UPDATE demand_detail SET `temporary` = 0 WHERE demand_master_id = $id");
        $row->execute();
    }

}
