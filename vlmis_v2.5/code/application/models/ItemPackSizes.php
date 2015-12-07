<?php

/**
 * Model_ItemPackSizes
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    Logistics Management Information System for Vaccines
 * @subpackage Inventory Management
 * @author     Ajmal Hussain <ajmaleyetii@gmail.com>
 * @version    2
 */
class Model_ItemPackSizes extends Model_Base {

    protected $_userid;
    public $month;
    public $year;
    public $wh_id;
    public $stkid;
    private $_table;

    const DILUENT = 3;

    public function __construct() {
        parent::__construct();
        $this->_table = $this->_em->getRepository('ItemPackSizes');
    }

    public function getAllItems() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select("DISTINCT ips.pkId, ips.itemName")
                ->from("ItemPackSizes", "ips")
                ->where("ips.status=1")
                ->orderBy("ips.listRank", "ASC");
        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function getAllVaccines() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select("DISTINCT ips.pkId, ips.itemName")
                ->from("StakeholderItemPackSizes", "i")
                ->join("i.stakeholder", "s")
                ->join("i.itemPackSize", "ips")
                ->where("s.pkId = 1")
                ->andWhere("ips.itemCategory =1")
                ->orderBy("ips.listRank", "ASC");
        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function getAllItemsNonDil() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select("DISTINCT i.pkId, i.itemName")
                ->from("ItemPackSizes", "i")
                ->andWhere("i.itemCategory <> " . self::DILUENT)
                ->orderBy("i.listRank", "ASC");
        // echo $str_sql->getQuery()->getSql();
        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function getAllItemsNonDilSummary() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select("DISTINCT i.pkId, i.itemName")
                ->from("ItemPackSizes", "i")
                ->andWhere("i.itemCategory <> " . self::DILUENT)
                ->groupBy('i.pkId')
                ->orderBy("i.listRank", "ASC");

        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function getAllPurposeItems() {
        $str_sql = "SELECT
                            item_pack_sizes.pk_id,
                            item_pack_sizes.item_name
                    FROM
                            item_pack_sizes
                    WHERE
                            item_pack_sizes.item_id IN (
                                    SELECT
                                            item_pack_sizes.item_id
                                    FROM
                                            items
                                    INNER JOIN item_pack_sizes ON items.pk_id = item_pack_sizes.item_id
                                    GROUP BY
                                            item_pack_sizes.item_id
                                    HAVING
                                            COUNT(item_pack_sizes.item_id) > 1
                            )
                    AND item_pack_sizes.item_category_id IN (1)
                    ORDER BY
                    item_pack_sizes.list_rank ASC,
                    item_pack_sizes.item_id ASC";

        $sql = $this->_em->getConnection()->prepare($str_sql);
        $sql->execute();
        $row = $sql->fetchAll();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return FALSE;
        }
    }

    public function getAllManageItems() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select("ip.pkId, ip.itemName")
                ->from("ItemPackSizes", "ip")
                ->orderBy("ip.listRank", "ASC");
        $row = $str_sql->getQuery()->getResult();
        return $row;
    }

    public function getProductDoses() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select('ips.itemName as item_name, ips.numberOfDoses as description')
                ->from('ItemPackSizes', 'ips')
                ->where("ips.pkId = " . $this->form_values['pk_id']);
        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row[0]['description'];
        } else {
            return FALSE;
        }
    }

    public function getProductCategory() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select("ic.pkId as item_category_id")
                ->from("ItemPackSizes", "ips")
                ->join("ips.itemCategory", "ic")
                ->where("ips.pkId = '" . $this->form_values['pk_id'] . "'");
        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row[0]['item_category_id'];
        } else {
            return FALSE;
        }
    }

    public function getAllWarehouseProducts() {
        $arr_data = array();
        $str_sql = $this->_em->createQueryBuilder()
                ->select('ips.pkId')
                ->from('StockBatch', 'sb')
                ->join("sb.itemPackSize", "ips")
                ->where("sb.warehouse = " . $this->_identity->getWarehouseId())
                ->andWhere("sb.status = '" . Model_StockBatch::RUNNING . "'")
                ->andWhere("sb.quantity > 0")
                ->orderBy("ips.listRank", "ASC");

        $rows = $str_sql->getQuery()->getResult();
        if (!empty($rows) && count($rows) > 0) {
            foreach ($rows as $row) {
                $item_ids[] = $row['pkId'];
            }
            $str_sql = $this->_em->createQueryBuilder()
                    ->select('DISTINCT itemps.pkId, itemps.itemName')
                    ->from('StakeholderItemPackSizes', 'si')
                    ->join("si.itemPackSize", 'itemps')
                    ->where("itemps.pkId IN (" . implode(",", $item_ids) . ") ")
                    ->andWhere("si.stakeholder = 1")
                    ->orderBy("itemps.listRank", "ASC");
            $rows = $str_sql->getQuery()->getResult();
            foreach ($rows as $row) {
                $arr_data[] = array(
                    'pk_id' => $row['pkId'],
                    'item_name' => $row['itemName']
                );
            }

            $this->_em->flush();
            return $arr_data;
        } else {
            return false;
        }
    }

    public function monthlyConsumtion() {
        $str_sql = "SELECT
                getMonthlyRcvQtyWH(" . $this->form_values['month'] . "," . $this->form_values['year'] . ",''," . $this->form_values['wh_id'] . ") as rcv,
                item_pack_sizes.pk_id,
                item_pack_sizes.item_name,
                item_pack_sizes.item_category_id,
                item_pack_sizes.number_of_doses as description
                FROM
                item_pack_sizes
                WHERE
                item_pack_sizes.`status` = 1 AND
                item_pack_sizes.item_category_id <> 3 AND
                item_pack_sizes.pk_id IN (SELECT si.item_pack_size_id FROM stakeholder_item_pack_sizes si WHERE si.stakeholder_id = 1)
                ORDER BY
                item_pack_sizes.list_rank ASC";

        $sql = $this->_em->getConnection()->prepare($str_sql);
        $sql->execute();
        $row = $sql->fetchAll();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return FALSE;
        }
    }

    public function monthlyConsumtion2() {

        $str_sql = "SELECT
                item_pack_sizes.pk_id,
                item_pack_sizes.item_name,
                item_pack_sizes.description,
                item_pack_sizes.number_of_doses as description,
                item_pack_sizes.item_category_id,
                 item_schedule.pk_id as vaccine_schedule_id,
                item_schedule.number_of_doses as no_of_doses,
                item_schedule.starting_no as start_no
                FROM
                item_pack_sizes
                INNER JOIN item_schedule ON item_pack_sizes.pk_id = item_schedule.item_pack_size_id
                WHERE
                item_pack_sizes.`status` = 1 AND
                item_pack_sizes.item_category_id <> 3 AND
                
                item_pack_sizes.pk_id IN (SELECT si.item_pack_size_id FROM stakeholder_item_pack_sizes si WHERE si.stakeholder_id = 1)
                ORDER BY
                item_schedule.pk_id ASC";
//echo $str_sql;

        $sql = $this->_em->getConnection()->prepare($str_sql);
        $sql->execute();
        $row = $sql->fetchAll();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return FALSE;
        }
    }

    public function monthlyConsumtion2Vaccines() {
        $str_sql = "SELECT
                item_pack_sizes.pk_id,
                item_pack_sizes.item_name,
                item_pack_sizes.description,
                item_pack_sizes.number_of_doses as description,
                item_pack_sizes.item_category_id,
                item_schedule.pk_id as vaccine_schedule_id,
                item_schedule.number_of_doses as no_of_doses,
                item_schedule.starting_no as start_no
                FROM
                item_pack_sizes
                INNER JOIN item_schedule ON item_pack_sizes.pk_id = item_schedule.item_pack_size_id
                WHERE
                item_pack_sizes.`status` = 1 AND
                item_pack_sizes.item_category_id <> 3 AND
                
                item_pack_sizes.pk_id IN (SELECT si.item_pack_size_id FROM stakeholder_item_pack_sizes si WHERE si.stakeholder_id = 1)
                ORDER BY
                item_schedule.pk_id ASC";
//echo $str_sql;

        $sql = $this->_em->getConnection()->prepare($str_sql);
        $sql->execute();
        $row = $sql->fetchAll();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return FALSE;
        }
    }

    public function monthlyConsumtion2_non_vaccinces() {
        $str_sql = "SELECT
                item_pack_sizes.pk_id,
                item_pack_sizes.item_name,
                item_pack_sizes.description
                FROM
                item_pack_sizes
                WHERE
                item_pack_sizes.item_category_id <> 1
                AND  item_pack_sizes.item_category_id <> 4
                AND  item_pack_sizes.pk_id NOT IN (36,37,39,22)
                ORDER BY list_rank";
//echo $str_sql;

        $sql = $this->_em->getConnection()->prepare($str_sql);
        $sql->execute();
        $row = $sql->fetchAll();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return FALSE;
        }
    }

    public function monthlyConsumtion2_tt() {
        $str_sql = "SELECT
                item_pack_sizes.pk_id,
                item_pack_sizes.item_name,
                item_pack_sizes.description
                FROM
                item_pack_sizes
                WHERE
                 item_pack_sizes.pk_id = 12";
//echo $str_sql;

        $sql = $this->_em->getConnection()->prepare($str_sql);
        $sql->execute();
        $row = $sql->fetchAll();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return FALSE;
        }
    }

    public function productsReport() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select('ips.itemName,ips.pkId')
                ->from('ItemPackSizes', 'ips')
                ->where("ips.status='1'")
                ->orderBy("ips.listRank", "ASC");
        //echo $str_sql->getQuery()->getSql();
        //exit;
        $rows = $str_sql->getQuery()->getResult();
        if (!empty($rows) && count($rows) > 0) {
            return $rows;
        } else {
            return FALSE;
        }
    }

    public function VaccineProductsReport() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select('ips.itemName,ips.pkId')
                ->from('ItemPackSizes', 'ips')
                ->where("ips.status='1'")
                ->andWhere("ips.itemCategory = 1")
                ->andWhere("ips.pkId NOT IN (23,24,25,28,30,31)")
                ->orderBy("ips.listRank", "ASC");
        $rows = $str_sql->getQuery()->getResult();
        if (!empty($rows) && count($rows) > 0) {
            return $rows;
        } else {
            return FALSE;
        }
    }

    public function getProductName() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select('ips.itemName as item_name')
                ->from('ItemPackSizes', 'ips')
                ->where("ips.pkId = " . $this->form_values['pk_id']);
        $rows = $str_sql->getQuery()->getResult();
        if (!empty($rows) && count($rows) > 0) {
            return $rows[0]['item_name'];
        } else {
            return FALSE;
        }
    }

    public function getProductById($id) {
        return $this->_table->find($id);
    }

//    public function setupBarcode() {
//        $form_values = $this->form_values;
//        $item_packsizes = $this->_em->getRepository('ItemPackSizes')->find($form_values['item_pack_size_id']);
//        if (!empty($form_values['barcode_type'])) {
//            $barcode_type = $this->_em->find("ListDetail", $form_values['barcode_type']);
//            $item_packsizes->setBarcodeType($barcode_type);
//        }
////        $item_packsizes->setGtin($form_values['gtin']);
////        $item_packsizes->setBatch($form_values['batch']);
////        $item_packsizes->setExpiry($form_values['expiry']);
////        $item_packsizes->setGtinStartPosition($form_values['gtin_start_position']);
////        $item_packsizes->setBatchNoStartPosition($form_values['batch_no_start_position']);
////        $item_packsizes->setExpiryDateStartPosition($form_values['expiry_date_start_position']);
////        $item_packsizes->setGtinEndPosition($form_values['gtin_end_position']);
////        $item_packsizes->setBatchNoEndPosition($form_values['batch_no_end_position']);
////        $item_packsizes->setExpiryDateEndPosition($form_values['expiry_date_end_position']);
//        $item_packsizes->setPackSizeDescription($form_values['pack_size_description']);
//        $item_packsizes->setLength($form_values['length']);
//        $item_packsizes->setWidth($form_values['width']);
//        $item_packsizes->setHeight($form_values['height']);
////        if (!empty($form_values['expiry_date_format'])) {
////            $expiry_date_format = $this->_em->find("ListDetail", $form_values['expiry_date_format']);
////            $item_packsizes->setExpiryDateFormat($expiry_date_format);
////        }
//        $item_packsizes->setQuantityPerPack($form_values['quantity_per_pack']);
//        $item_packsizes->setVolumePerUnitNet($form_values['volume_per_unit_net']);
////        $item_packsizes->setPrePrintedBarcode($form_values['pre_printed_barcode']);
//
//        $user_id = $this->_em->find('Users', $this->_user_id);
//        $item_packsizes->setCreatedBy($user_id);
//        $item_packsizes->setCreatedDate(App_Tools_Time::now());
//        $item_packsizes->setModifiedBy($user_id);
//        $item_packsizes->setModifiedDate(App_Tools_Time::now());
//        $this->_em->persist($item_packsizes);
//        $this->_em->flush();
//    }

    public function detailBarcode() {
        $form_values = $this->form_values;
        $item_packsizes = $this->_table->find($form_values['barcode_id']);
        $item_packsizes->setItemName($form_values['item_pack_size_id']);
//        $item_packsizes->setGtin($form_values['gtin']);
//        $item_packsizes->setBatch($form_values['batch']);
//        $item_packsizes->setExpiry($form_values['expiry']);
//        $item_packsizes->setGtinStartPosition($form_values['gtin_start_position']);
//        $item_packsizes->setBatchNoStartPosition($form_values['batch_no_start_position']);
//        $item_packsizes->setExpiryDateStartPosition($form_values['expiry_date_start_position']);
//        $item_packsizes->setGtinEndPosition($form_values['gtin_end_position']);
//        $item_packsizes->setBatchNoEndPosition($form_values['batch_no_end_position']);
//        $item_packsizes->setExpiryDateEndPosition($form_values['expiry_date_end_position']);
        $item_packsizes->setPackSizeDescription($form_values['pack_size_description']);
        $item_packsizes->setLength($form_values['length']);
        $item_packsizes->setWidth($form_values['width']);
        $item_packsizes->setHeight($form_values['height']);
        //$expiry_date_format = $this->_em->find("ListDetail", $form_values['expiry_date_format']);
        //$item_packsizes->setExpiryDateFormat($expiry_date_format);
        $item_packsizes->setQuantityPerPack($form_values['quantity_per_pack']);
        $item_packsizes->setVolumPerVial($form_values['volume_per_unit_net']);
//        $item_packsizes->setPrePrintedBarcode($form_values['pre_printed_barcode']);

        $created_by = $this->_em->find('Users', $this->_user_id);
        $item_packsizes->setCreatedBy($created_by);
        $item_packsizes->setCreatedDate(App_Tools_Time::now());
        $item_packsizes->setModifiedBy($created_by);
        $item_packsizes->setModifiedDate(App_Tools_Time::now());

        $this->_em->persist($item_packsizes);
        return $this->_em->flush();
    }

    public function getItemPackSizesById() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select('ip.pkId, ip.itemName,ip.gtinStartPosition,ip.gtinEndPosition,ip.batchNoStartPosition,ip.batchNoEndPosition,ip.expiryDateStartPosition,ip.expiryDateEndPosition')
                ->from("ItemPackSizes", "ip");
        //->JOIN('ip.item', 'i');
        //->where(ip.pkId = " . $this->form_values['pk_id'])
        // echo $str_sql->getQuery()->getSql();
        //die();
        $result = $str_sql->getQuery()->getResult();
        return $result;
    }

    public function getItems() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select("i.pkId,i.itemName")
                ->from('Items', 'i');
        //echo $str_sql->getQuery()->getSql();die;
        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function getItemsAll() {
        return $this->_table->findBy(array(), array("listRank" => "asc"));
    }

    public function getItemsByCategory() {
        return $this->_table->findBy(array("itemCategory" => 2));
    }

    public function getAllProducts() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select("i.pkId,i.itemName,ic.itemCategoryName,iu.itemUnitName,item.description")
                ->from('ItemPackSizes', 'i')
                ->join('i.itemCategory', 'ic')
                ->join('i.itemUnit', 'iu')
                ->join('i.item', 'item');
        if (!empty($this->form_values['item_name'])) {
            $str_sql->AndWhere("i.itemName = '" . $this->form_values['item_name'] . "' ");
        }
        if (!empty($this->form_values['item_category'])) {
            $str_sql->AndWhere("ic.pkId = '" . $this->form_values['item_category'] . "' ");
        }
        if (!empty($this->form_values['item_unit'])) {
            $str_sql->AndWhere("iu.pkId = '" . $this->form_values['item_unit'] . "' ");
        }
        if (!empty($this->form_values['item'])) {
            $str_sql->AndWhere("item.pkId = '" . $this->form_values['item'] . "' ");
        }
        return $row = $str_sql->getQuery()->getResult();
    }

    public function checkProducts() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select("i.pkId,i.itemName")
                ->from('ItemPackSizes', 'i')
                ->join('i.itemCategory', 'ic')
                ->join('i.itemUnit', 'iu')
                ->join('i.item', 'item');
        if (!empty($this->form_values['item_name'])) {
            $str_sql->AndWhere("i.itemName = '" . $this->form_values['item_name'] . "' ");
        }
        if (!empty($this->form_values['item_category'])) {
            $str_sql->AndWhere("ic.pkId = '" . $this->form_values['item_category'] . "' ");
        }
        if (!empty($this->form_values['item_unit'])) {
            $str_sql->AndWhere("iu.pkId = '" . $this->form_values['item_unit'] . "' ");
        }
        if (!empty($this->form_values['item'])) {
            $str_sql->AndWhere("item.pkId = '" . $this->form_values['item'] . "' ");
        }
        return $row = $str_sql->getQuery()->getResult();
    }

    public function getAllItemsForClusterByStakeholder() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select("ips.pkId")
                ->from("StakeholderItemPackSizes", 'si')
                ->join('si.itemPackSize', 'ips')
                ->join('si.stakeholder', 's')
                ->where("s.pkId= '" . $this->form_values['stakeholder_id'] . "' ");

        return $row = $str_sql->getQuery()->getResult();
    }

    public function getAllItemsForCluster() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select("i.pkId,i.itemName")
                ->from('ItemPackSizes', 'i');

        return $row = $str_sql->getQuery()->getResult();
    }

    public function stockOnHandItems() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select('ips.itemName,ips.pkId')
                ->from('ItemPackSizes', 'ips')
                ->orderBy("ips.listRank", "ASC");
//echo $str_sql->getQuery()->getSql();

        $rows = $str_sql->getQuery()->getResult();
        if (!empty($rows) && count($rows) > 0) {
            return $rows;
        } else {
            return FALSE;
        }
    }

    public function getProductsByWhTransactions() {
        $warehouse = $this->form_values['wh_id'];

        $str_sql = $this->_em->createQueryBuilder()
                ->select('DISTINCT ips.itemName as item_name, ips.pkId as item_pack_size_id')
                ->from("StockDetail", "sd")
                ->join("sd.stockMaster", "sm")
                ->join("sd.stockBatch", "sb")
                ->join("sb.itemPackSize", "ips")
                ->andWhere("(sm.fromWarehouse = " . $warehouse . " AND sd.adjustmentType >= 2) OR (sm.toWarehouse = " . $warehouse . " AND sd.adjustmentType = 1 )")
                ->orderBy("ips.listRank");
        $row = $str_sql->getQuery()->getResult();
        return $row;
    }

    public function logBookItemPackSize() {
        $str_sql = "SELECT
                        item_pack_sizes.pk_id,
                        item_pack_sizes.item_name,
                        item_pack_sizes.description,
                        item_schedule.number_of_doses,
                        item_schedule.starting_no
                        FROM
                        item_pack_sizes
                        INNER JOIN item_schedule ON item_schedule.item_pack_size_id = item_pack_sizes.pk_id
                    WHERE
                        item_pack_sizes.pk_id IN (6, 7, 8, 9, 26)
                    ORDER BY pk_id";
//echo $str_sql;

        $sql = $this->_em->getConnection()->prepare($str_sql);
        $sql->execute();
        $row = $sql->fetchAll();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return FALSE;
        }
    }

    public function getItemForConsumptionReport() {
        $item = $this->form_values;
        $str_sql = "SELECT
                item_pack_sizes.pk_id,
                item_pack_sizes.item_name,
                item_pack_sizes.description
                FROM
                item_pack_sizes
                WHERE
                 item_pack_sizes.pk_id = $item";

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
