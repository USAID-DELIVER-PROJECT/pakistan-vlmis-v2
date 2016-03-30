<?php

/**
 * Model_ItemPackSizes
 * 
 * 
 * 
 *     Logistics Management Information System for Vaccines
 * @subpackage Inventory Management
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */

/**
 *  Model for Item Pack Sizes
 */

class Model_ItemPackSizes extends Model_Base {

    /**
     * $_userid
     * @var type 
     */
    protected $_userid;

    /**
     * $month
     * @var type 
     */
    public $month;

    /**
     * $year
     * @var type 
     */
    public $year;

    /**
     * $wh_id
     * @var type 
     */
    public $wh_id;

    /**
     * $stkid
     * @var type 
     */
    public $stkid;

    /**
     * $_table
     * @var type 
     */
    private $_table;

   

    /**
     * __construct
     */
    public function __construct() {
        parent::__construct();
        $this->_table = $this->_em->getRepository('ItemPackSizes');
    }

    /**
     * Get All Items
     * 
     * @return boolean
     */
    public function getAllItems() {
        $str_sql = $this->_em_read->createQueryBuilder()
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

    /**
     * Get All Vaccines
     * 
     * @return boolean
     */
    public function getAllVaccines() {
        $str_sql = $this->_em_read->createQueryBuilder()
                ->select("DISTINCT ips.pkId, ips.itemName")
                ->from("ItemActivities", "ia")
                ->join("ia.itemPackSize", "ips")
                ->andWhere("ips.itemCategory =" . parent::VACCINECATEGORY)
                ->orderBy("ips.listRank", "ASC");
        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return false;
        }
    }

    /**
     * Get All Items Non Dil
     * 
     * @return boolean
     */
    public function getAllItemsNonDil() {
        $str_sql = $this->_em_read->createQueryBuilder()
                ->select("DISTINCT i.pkId, i.itemName")
                ->from("ItemPackSizes", "i")
                ->andWhere("i.itemCategory <> " . parent::DILUENT)
                ->orderBy("i.listRank", "ASC");
        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return false;
        }
    }
    
     /**
     * Get All Items Non Dil
     * 
     * @return boolean
     */
    public function getAllNonVaccineItems() {
        $str_sql = $this->_em_read->createQueryBuilder()
                ->select("DISTINCT i.pkId, i.itemName")
                ->from("ItemPackSizes", "i")
                ->andWhere("i.itemCategory IN (2,3)")
                ->orderBy("i.listRank", "ASC");
        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return false;
        }
    }
    
    

    /**
     * Get All Items Non Dil Summary
     * 
     * @return boolean
     */
    public function getAllItemsNonDilSummary() {
        $str_sql = $this->_em_read->createQueryBuilder()
                ->select("DISTINCT i.pkId, i.itemName")
                ->from("ItemPackSizes", "i")
                ->andWhere("i.itemCategory <> " . parent::DILUENT)
                ->groupBy('i.pkId')
                ->orderBy("i.listRank", "ASC");

        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return false;
        }
    }

    /**
     * Get All Purpose Items
     * 
     * @return boolean
     */
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
                    AND item_pack_sizes.item_category_id IN (1,3)
                    ORDER BY
                    item_pack_sizes.list_rank ASC,
                    item_pack_sizes.item_id ASC";

        $sql = $this->_em_read->getConnection()->prepare($str_sql);
        $sql->execute();
        $row = $sql->fetchAll();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return FALSE;
        }
    }

    /**
     * Get All Manage Items
     * 
     * @return type
     */
    public function getAllManageItems() {
        $str_sql = $this->_em_read->createQueryBuilder()
                ->select("ip.pkId, ip.itemName")
                ->from("ItemPackSizes", "ip")
                ->orderBy("ip.listRank", "ASC");
        return $str_sql->getQuery()->getResult();
    }

    /**
     * Get Product Doses
     * 
     * @return boolean
     */
    public function getProductDoses() {
        $str_sql = $this->_em_read->createQueryBuilder()
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

    /**
     * Get Product Category
     * 
     * @return boolean
     */
    public function getProductCategory() {
        $str_sql = $this->_em_read->createQueryBuilder()
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

    /**
     * Monthly Consumtion
     * 
     * @return boolean
     */
    public function monthlyConsumtion() {
        $str_sql = "SELECT
                getMonthlyRcvQtyWH(" . $this->form_values['month'] . "," . $this->form_values['year'] . ",''," . $this->form_values['wh_id'] . ") as rcv,
                item_pack_sizes.pk_id,
                item_pack_sizes.item_name,
                item_pack_sizes.item_category_id,
                item_pack_sizes.number_of_doses as description
                FROM
                item_pack_sizes
                INNER JOIN item_activities ON item_activities.item_pack_size_id = item_pack_sizes.pk_id
                WHERE
                item_pack_sizes.`status` = 1 AND
                item_pack_sizes.item_category_id <> 3 AND
                item_activities.stakeholder_activity_id = 1
                ORDER BY
                item_pack_sizes.list_rank ASC";

        $sql = $this->_em_read->getConnection()->prepare($str_sql);
        $sql->execute();
        $row = $sql->fetchAll();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return FALSE;
        }
    }

    /**
     * Monthly Consumtion 2
     * 
     * @return boolean
     */
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
                INNER JOIN item_activities ON item_activities.item_pack_size_id = item_pack_sizes.pk_id
                WHERE
                item_pack_sizes.`status` = 1 AND
                item_pack_sizes.item_category_id <> 3 AND
                item_activities.stakeholder_activity_id = 1
                ORDER BY
                item_schedule.pk_id ASC";

        $sql = $this->_em_read->getConnection()->prepare($str_sql);
        $sql->execute();
        $row = $sql->fetchAll();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return FALSE;
        }
    }

    /**
     * Monthly Consumtion 2 Vaccines
     * 
     * @return boolean
     */
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
                item_pack_sizes.pk_id.stakeholder_activity_id = 1
                ORDER BY
                item_schedule.pk_id ASC";

        $sql = $this->_em_read->getConnection()->prepare($str_sql);
        $sql->execute();
        $row = $sql->fetchAll();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return FALSE;
        }
    }

    /**
     * Monthly Consumtion 2 non vaccinces
     * 
     * @return boolean
     */
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

        $sql = $this->_em_read->getConnection()->prepare($str_sql);
        $sql->execute();
        $row = $sql->fetchAll();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return FALSE;
        }
    }

    /**
     * Monthly Consumtion 2 tt
     * 
     * @return boolean
     */
    public function monthlyConsumtion2_tt() {
        $str_sql = "SELECT
                item_pack_sizes.pk_id,
                item_pack_sizes.item_name,
                item_pack_sizes.description
                FROM
                item_pack_sizes
                WHERE
                 item_pack_sizes.pk_id = 12";

        $sql = $this->_em_read->getConnection()->prepare($str_sql);
        $sql->execute();
        $row = $sql->fetchAll();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return FALSE;
        }
    }

    /**
     * Products Report
     * 
     * @return boolean
     */
    public function productsReport() {
        $str_sql = $this->_em_read->createQueryBuilder()
                ->select('ips.itemName,ips.pkId')
                ->from('ItemPackSizes', 'ips')
                ->where("ips.status='1'")
                ->orderBy("ips.listRank", "ASC");

        $rows = $str_sql->getQuery()->getResult();
        if (!empty($rows) && count($rows) > 0) {
            return $rows;
        } else {
            return FALSE;
        }
    }

    /**
     * Vaccine Products Report
     * 
     * @return boolean
     */
    public function VaccineProductsReport() {
        $str_sql = $this->_em_read->createQueryBuilder()
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

    /**
     * Get Product Name
     * 
     * @return boolean
     */
    public function getProductName() {
        $str_sql = $this->_em_read->createQueryBuilder()
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

    /**
     * Get Product By Id
     * 
     * @param type $id
     * @return type
     */
    public function getProductById($id) {
        return $this->_table->find($id);
    }

    /**
     * Detail Barcode
     * 
     * @return type
     */
    public function detailBarcode() {
        $form_values = $this->form_values;
        $item_packsizes = $this->_table->find($form_values['barcode_id']);
        $item_packsizes->setItemName($form_values['item_pack_size_id']);

        $item_packsizes->setPackSizeDescription($form_values['pack_size_description']);
        $item_packsizes->setLength($form_values['length']);
        $item_packsizes->setWidth($form_values['width']);
        $item_packsizes->setHeight($form_values['height']);

        $item_packsizes->setQuantityPerPack($form_values['quantity_per_pack']);
        $item_packsizes->setVolumPerVial($form_values['volume_per_unit_net']);

        $created_by = $this->_em->find('Users', $this->_user_id);
        $item_packsizes->setCreatedBy($created_by);
        $item_packsizes->setCreatedDate(App_Tools_Time::now());
        $item_packsizes->setModifiedBy($created_by);
        $item_packsizes->setModifiedDate(App_Tools_Time::now());

        $this->_em->persist($item_packsizes);
        return $this->_em->flush();
    }

    /**
     * Get Item Pack Sizes By Id
     * 
     * @return type
     */
    public function getItemPackSizesById() {
        $str_sql = $this->_em_read->createQueryBuilder()
                ->select('ip.pkId, ip.itemName,ip.gtinStartPosition,ip.gtinEndPosition,ip.batchNoStartPosition,ip.batchNoEndPosition,ip.expiryDateStartPosition,ip.expiryDateEndPosition')
                ->from("ItemPackSizes", "ip");

        return $str_sql->getQuery()->getResult();
    }

    /**
     * Get Items
     * 
     * @return boolean
     */
    public function getItems() {
        $str_sql = $this->_em_read->createQueryBuilder()
                ->select("i.pkId,i.itemName")
                ->from('Items', 'i');
        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return false;
        }
    }

    /**
     * Get Items All
     * 
     * @return type
     */
    public function getItemsAll() {
        return $this->_table->findBy(array(), array("listRank" => "asc"));
    }

    /**
     * Get Items By Category
     * 
     * @return type
     */
    public function getItemsByCategory() {
        return $this->_table->findBy(array("itemCategory" => 2));
    }

    /**
     * Get All Products
     * 
     * @return type
     */
    public function getAllProducts() {
        $str_sql = $this->_em_read->createQueryBuilder()
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
        return $str_sql->getQuery()->getResult();
    }

    /**
     * Check Products
     * 
     * @return type
     */
    public function checkProducts() {
        $str_sql = $this->_em_read->createQueryBuilder()
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
        return $str_sql->getQuery()->getResult();
    }

    /**
     * Get All Items For Cluster By Stakeholder
     * 
     * @return type
     */
    public function getAllItemsForClusterByStakeholder() {
        $str_sql = $this->_em_read->createQueryBuilder()
                ->select("ips.pkId")
                ->from("StakeholderItemPackSizes", 'si')
                ->join('si.itemPackSize', 'ips')
                ->join('si.stakeholder', 's')
                ->where("s.pkId= '" . $this->form_values['stakeholder_id'] . "' ");

        return $str_sql->getQuery()->getResult();
    }

    /**
     * Get All Items For Cluster
     * 
     * @return type
     */
    public function getAllItemsForCluster() {
        $str_sql = $this->_em_read->createQueryBuilder()
                ->select("i.pkId,i.itemName")
                ->from('ItemPackSizes', 'i');

        return $str_sql->getQuery()->getResult();
    }

    /**
     * Stock On Hand Items
     * 
     * @return boolean
     */
    public function stockOnHandItems() {
        $str_sql = $this->_em_read->createQueryBuilder()
                ->select('ips.itemName,ips.pkId')
                ->from('ItemPackSizes', 'ips')
                ->orderBy("ips.listRank", "ASC");

        $rows = $str_sql->getQuery()->getResult();
        if (!empty($rows) && count($rows) > 0) {
            return $rows;
        } else {
            return FALSE;
        }
    }

    /**
     * Get Products By Wh Transactions
     * 
     * @return type
     */
    public function getProductsByWhTransactions() {
        $warehouse = $this->form_values['wh_id'];

        $str_sql = $this->_em_read->createQueryBuilder()
                ->select('DISTINCT ips.itemName as item_name, ips.pkId as item_pack_size_id')
                ->from("StockDetail", "sd")
                ->join("sd.stockMaster", "sm")
                ->join("sd.stockBatchWarehouse", "sbw")
                ->join("sbw.stockBatch", "sb")
                ->join("sb.packInfo", "pi")
                ->join("pi.stakeholderItemPackSize", "sip")
                ->join("sip.itemPackSize", "ips")
                ->andWhere("(sm.fromWarehouse = " . $warehouse . " AND sd.adjustmentType >= 2) OR (sm.toWarehouse = " . $warehouse . " AND sd.adjustmentType = 1 )")
                ->orderBy("ips.listRank");
        return $str_sql->getQuery()->getResult();
    }

    /**
     * Log Book Item Pack Size
     * 
     * @return boolean
     */
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

        $sql = $this->_em_read->getConnection()->prepare($str_sql);
        $sql->execute();
        $row = $sql->fetchAll();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return FALSE;
        }
    }

    /**
     * Get Item For Consumption Report
     * 
     * @return boolean
     */
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

        $sql = $this->_em_read->getConnection()->prepare($str_sql);
        $sql->execute();
        $row = $sql->fetchAll();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return FALSE;
        }
    }

    /**
     * Get All Items By Category And Activity
     * 
     * @param type $activityIds
     * @param type $categoriesIds
     * @return boolean
     */
    public function getAllItemsByCategoryAndActivity($activityIds, $categoriesIds) {
        $str_sql = $this->_em_read->createQueryBuilder()
                ->select("DISTINCT ips.pkId, ips.itemName")
                ->from("ItemActivities", "ia")
                ->join("ia.itemPackSize", "ips")
                ->andWhere("ia.stakeholderActivity IN (" . $activityIds . ")")
                ->andWhere("ips.itemCategory IN (" . $categoriesIds . ")")
                ->orderBy("ips.listRank", "ASC");
        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return false;
        }
    }

}
