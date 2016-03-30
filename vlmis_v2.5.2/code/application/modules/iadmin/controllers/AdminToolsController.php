<?php

/**
 * Iadmin_AdminToolsController
 *
 * 
 *
 * Logistics Management Information System for Vaccines
 * @subpackage Iadmin
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */

/**
 *  Controller for Iadmin Index
 */
class Iadmin_AdminToolsController extends App_Controller_Base {

    /**
     * Iadmin_IndexController index
     */
    public function fixPlacementDifferenceAction() {
        $model = new Model_AdminTools();
        $data = $model->getDifferentStockPlacementByProduct();

        $this->view->result = $data;
    }

    /**
     * Iadmin_ index
     */
    public function fixStockPlacementQtyAction() {
        $this->_helper->layout->disableLayout();
        $wh_id = $this->_request->getParam('wh_id');
        $item_id = $this->_request->getParam('item_id');

        $items = $this->_em->getRepository("ItemPackSizes")->find($item_id);
        $item_cat = $items->getItemCategory()->getPkId();

        $transactions = array();
        $batch = array();
        $data = array();

        $model = new Model_AdminTools();
        $data = $model->getDifferentStockPlacement($wh_id, $item_id);

        if (count($data) > 0) {
            $batch = array();
            foreach ($data as $row) {
                $batch[$row['BatchId']] = $row['BatchNumber'];
            }

            if ($this->_request->isPost()) {
                $batch_id = $this->_request->getPost('batch_id');
                $transactions = $model->getBatchTransactions(array($batch_id), $item_cat);
            } else {
                $transactions = $model->getBatchTransactions(array_keys($batch), $item_cat);
            }
        }

        if ($item_cat == 1) {
            //Generate Asset Sub Type Combo
            $cold_chain = new Model_ColdChain();
            $cold_chain->form_values = array('type_id' => '1,3', 'wh_id' => $wh_id);
            $locations = $cold_chain->getColdchainByAssetType();
        } else {
            $non_ccm_loc = new Model_NonCcmLocations();
            $non_ccm_loc->form_values = array('wh_id' => $wh_id);
            $locations = $non_ccm_loc->getDryStoreLocationsName();
        }

        $this->view->placement_locations = $locations;

        $this->view->result = $data;
        $this->view->transactions = $transactions;
        $this->view->batches = $batch;
        $this->view->wh_id = $wh_id;
        $this->view->item_id = $item_id;
        $this->view->item_cat = $item_cat;
        $this->view->batch_id = $batch_id;
    }

    public function addPickPlaceAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);

        $wh_id = $this->_request->getPost('wh_id');
        $item_id = $this->_request->getPost('item_id');

        $trans_type = $this->_request->getPost('trans_type');

        if ($trans_type == 114) {
            $is_placed = 1;
        } else {
            $is_placed = 0;
        }

        $updateplc = $this->_request->getPost('updateplc');

        if (isset($updateplc)) {
            $plc_id = $this->_request->getPost('plc_id');
            $loc_id = $this->_request->getPost('location_id');
            $placements = $this->_em->getRepository("Placements")->find($plc_id);
            $placement_loc = $this->_em->getRepository("PlacementLocations")->find($loc_id);
            $placements->setPlacementLocation($placement_loc);
            $placements->setQuantity($this->_request->getPost('trans_qty'));
            $this->_em->persist($placements);
            $this->_em->flush();
        } else {
            $placements = new Model_Placements();
            $placements->form_values = array(
                'quantity' => $this->_request->getPost('trans_qty'),
                'placement_loc_id' => $this->_request->getPost('location_id'),
                'batch_id' => $this->_request->getPost('batch_id'),
                'detail_id' => $this->_request->getPost('detail_id'),
                'placement_loc_type_id' => $this->_request->getPost('trans_type'),
                'user_id' => $this->_userid,
                'created_date' => date("Y-m-d"),
                'vvmstage' => $this->_request->getPost('vvm_stage'),
                'is_placed' => $is_placed
            );
            $placements->add();
        }

        $this->_redirect("iadmin/admin-tools/fix-stock-placement-qty?action=$is_placed&wh_id=$wh_id&item_id=$item_id");
    }

    public function mergeStockBatchAction() {
        $model_stock_batch = new Model_StockBatch();

        if ($this->_request->isPost()) {
            $batches = $this->_request->getPost('checkbatches');
            $merge_b_id = $this->_request->getPost('mergeinto');

            foreach ($batches as $update_id) {
                if ($update_id != $merge_b_id) {
                    $stock_batch_warehouse = $this->_em->getRepository("StockBatchWarehouses")->findBy(array("stockBatch" => $update_id));
                    if (count($stock_batch_warehouse) > 0) {
                        foreach ($stock_batch_warehouse as $stock_batch_wh) {
                            $stock_batch = $this->_em->getRepository("StockBatch")->find($merge_b_id);
                            $stock_batch_wh->setStockBatch($stock_batch);
                            $this->_em->persist($stock_batch_wh);
                        }
                        $this->_em->flush();
                    }

                    $del_stock_batch = $this->_em->getRepository("StockBatch")->find($update_id);
                    $this->_em->remove($del_stock_batch);
                    $this->_em->flush();
                }
            }
        }

        $result = $model_stock_batch->getDuplicateBatches();
        $this->view->result = $result;
    }

}
