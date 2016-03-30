<?php

/**
 * StockDemandController
 *
 * 
 *
 * @subpackage Default
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */

/**
 * Controller for Click Paths
 */
class StockDemandController extends App_Controller_Base {
    
      public function requisitionAction() {
        $demand_master = new Model_DemandMaster();
        //$stock_batch = new Model_StockBatch();
        $demand_detail = new Model_DemandDetail();
// $warehouse_data = new Model_HfDataMaster();
        $form = new Form_StockRequisition();
        $form_values = array();
        $temp = array();
        $arr_data = array('requisition_number' => "",
            'stock_id' => "",
            'transaction_date' => date("d/m/Y"),
            'warehouse_name' => "",
            'success' => $this->_request->success
        );
        $form_values['transaction_type_id'] = 2;
        $form_values['adjustment_type'] = 2;
        $stock_id = "";
        $master_id = "";

// App_Controller_Functions::pr($form->getValues());
     
        $created_by = $this->_em->find('Users', $this->_userid);
        if (!empty($this->_request->hdn_stock_id)) {
            $stock_id = $this->_request->hdn_stock_id;
        }
        if (!empty($this->_request->hdn_master_id)) {
            $master_id = $this->_request->hdn_master_id;
        }

        if (!empty($this->_request->warehouse)) {
            $warehouse_id = $this->_request->warehouse;
        }

        if ($this->_request->isPost()) {

            if (!empty($master_id)) {
                $em = Zend_Registry::get('doctrine');
                $em->getConnection()->beginTransaction();
                try {

//Start update issue period
                    $array = $this->_request->getParams();
                    $demand_master->updateStockPeriod($master_id, $array);
//End update issue period

                    $requisition_number = $demand_master->updateDemandMasterTemp($master_id, $this->_request->comments);
                    $demand_detail->updateDemandDetailTemp($master_id);
//Save Data in warehouse_data table
//$warehouse_data->addReport($master_id, 2);

                    $this->view->msg = 'Stock has been issued successfully. Your voucher number is ';
                    $this->view->voucher = $requisition_number;
                    $this->view->master_id = $master_id;
                    $em->getConnection()->commit();
                    $this->redirect("/stock-demand/requisition");
                } catch (Exception $e) {
                    $em->getConnection()->rollback();
                    $em->close();
                    App_FileLogger::info($e);
                }
            } elseif ($form->isValid($this->_request->getPost())) {
                $em = Zend_Registry::get('doctrine');
                $em->getConnection()->beginTransaction();
                try {
                    $editissue = $this->_request->getPost('issueedit');
                    if ($editissue == "Yes") {
                        $d_id = $this->_request->getPost('detailid');
                        $obj_stock_detail = $em->getRepository("StockDetail")->find($d_id);
                        $old_batch_id = $obj_stock_detail->getStockBatch()->getPkId();

                        $data = $form->getValues();

                        $obj_stock_master = $obj_stock_detail->getStockMaster();
                        $master_update = false;

                        $arr_date = explode("/", $data['transaction_date']);
                        if (intval($arr_date[1]) . "-" . intval($arr_date[2]) != intval($obj_stock_detail->getStockMaster()->getTransactionDate()->format("m")) . "-" . intval($obj_stock_detail->getStockMaster()->getTransactionDate()->format("Y"))) {
                            $trans = $demand_master->getTransactionNumber(2, $data['transaction_date']);
                            $obj_stock_master->setTransactionNumber($trans['trans_no']);
                            $obj_stock_master->setTransactionCounter($trans['id']);
                            $master_update = true;
                        }

                        $obj_stock_master->setTransactionDate(new \DateTime(App_Controller_Functions::dateToDbFormat($data['transaction_date'])));

                        if (!empty($warehouse_id)) {
                            $to_wh = $em->getRepository("Warehouses")->find($warehouse_id);
                            $obj_stock_master->setToWarehouse($to_wh);
                            $master_update = true;
                        }

                        if ($master_update) {
                            $obj_stock_master->setModifiedBy($created_by);
                            $obj_stock_master->setModifiedDate(App_Tools_Time::now());
                            $em->persist($obj_stock_master);
                            $em->flush();
                        }

                        $qunty = str_replace(",", "", $data['quantity']);
                        $obj_stock_detail->setQuantity("-" . $qunty);
                        $vvms = $this->_em->getRepository("VvmStages")->find($data['vvm_stage']);
                        $obj_stock_detail->setVvmStage($vvms);
                        $stock_b = $em->getRepository("StockBatch")->find($data['number']);
                        $obj_stock_detail->setStockBatch($stock_b);
                        if (!empty($data['item_unit_id'])) {
                            $item_unit = $em->getRepository("ItemUnits")->find("2"); //$data['item_unit_id']);
                            $obj_stock_detail->setItemUnit($item_unit);
                        }
                        $obj_stock_detail->setModifiedBy($created_by);
                        $obj_stock_detail->setModifiedDate(App_Tools_Time::now());
                        $em->persist($obj_stock_detail);
                        $em->flush();

                        $current_date = explode("/", $data['transaction_date']);

                        $mm = $current_date[1];
                        $yy = $current_date[2];

                        $item_id = $data['item_id'];

                        $wh_id = $this->_identity->getWarehouseId();
                        $user_id = $this->_userid;

                        $query = "SELECT AdjustQty(" . $data['number'] . "," . $wh_id . ") FROM DUAL";
                        $str_sql = $em->getConnection()->prepare($query);
                        $str_sql->execute();

                        $query = "SELECT AdjustQty(" . $old_batch_id . "," . $wh_id . ") FROM DUAL";
                        $str_sql = $em->getConnection()->prepare($query);
                        $str_sql->execute();

                        $query = "SELECT REPUpdateData($mm,$yy,$item_id,$wh_id,$user_id) FROM DUAL";
                        $str_sql = $em->getConnection()->prepare($query);
                        $str_sql->execute();
                    } else {
                        $temp = $form->getValues();
                        $data = array_merge($temp, $form_values);
                        $data['warehouse'] = $warehouse_id;
                        if (empty($this->_request->requisition_number)) {
                             $stock_id = $demand_master->addDemandMaster($data);
                        }
                        if (isset($data['quantity']) && !empty($data['quantity'])) {
                            $qty = str_replace(",", "", $data['quantity']);
                        }
                        if (isset($data['available_quantity']) && !empty($data['available_quantity'])) {
                            $ava_qty = str_replace(",", "", $data['available_quantity']);
                        }
                        if ((int) $qty > (int) $ava_qty || (int) $qty == (int) $ava_qty) {
                            $data['quantity'] = $ava_qty;
                            $autorun = true;
                        }

                        list($batch_id) = explode("|", $this->_request->number);
                        $form_values['item_unit_id'] = $this->_request->item_unit_id;
                        $form_values['stock_master_id'] = $stock_id;
                        $form_values['stock_batch_id'] = $batch_id;
                        $data = array_merge($temp, $form_values);
                        $detail_id = $demand_detail->addDemandDetail($data);

//                        $stock_batch->adjustQuantityByWarehouse($batch_id);
//                        if ($autorun) {
//                            $stock_batch->autoRunningLEFOBatch($form->getValue('item_id'));
//                            $stock_batch->form_values['pk_id'] = $batch_id;
//                            $stock_batch->form_values['status'] = Model_StockBatch::FINISHED;
//                            $stock_batch->changeStatus();
//                        }
                    }
                    $em->getConnection()->commit();
                    $this->redirect("stock-demand/requisition?id=$stock_id");
                } catch (Exception $e) {
                    $em->getConnection()->rollback();
                    $em->close();
                    App_FileLogger::info($e);
                    if ($e->getMessage() == 'PLCD_QTY_GREATER_THAN_ISSUE_QTY') {
                        $this->view->status = false;
                        $this->view->msg = "Issue quantity should not greater than placed quantity!";
                        $this->redirect("stock-demand/requisition");
                    }
                }
            }

            $this->view->form = $form;
            $this->view->arr_data = $arr_data;

            if ($this->_request->type == 's') {
                $this->redirect("/stock/");
            }
        }



// Edit Issue Start
        if (!empty($this->_request->id) && !$this->_request->isPost()) {
            $demand_master->form_values = $form_values;
            
            $varid= $this->_request->id;
             $form->requisition_number->setValue($varid);
            $temp_stock = $demand_master->getDemandRequisitionDetails($varid);


            $demand_master->form_values['stock_master_id'] = $this->_request->id;
            //$temp_stock_list = $demand_master->getTempStocksListStockMasterId();
            if (!empty($temp_stock['stock_id'])) {
                $form->hdn_stock_id->setValue($temp_stock['pk_id']);
                $form->hdn_master_id->setValue($temp_stock['pk_id']);
            } elseif (!empty($stockid)) {
                $form->hdn_stock_id->setValue($stock_id);
                $form->hdn_master_id->setValue($stock_id);
            }
            if ($temp_stock) {

               
                $form->requisition_number->setValue($temp_stock[0]['demand_master_id']);
                //exit;
//                $form->transaction_date->setValue(date("d/m/Y h:i A", strtotime($temp_stock_list[0]['transaction_date'])));
                $form->warehouse_name->setValue($temp_stock[0]['to_warehouse_name']);
                $form->requisition_reference->setValue($temp_stock[0]['requisition_reference']);
                $form->suggested_date->setValue(date("d/m/Y h:i A", strtotime($temp_stock[0]['suggested_date'])));
                $form->item_id->setValue($temp_stock[0]['requisition_reference']);
                $form->activity_id->setValue($temp_stock[0]['stakeholder_activity_id']);
                $form->hdn_to_warehouse_id->setValue($temp_stock[0]['to_warehouse_id']);
//                $arr_data['warehouse_name'] = $temp_stock[0]['to_warehouse'];
//                $form->activity_id->setValue($temp_stock[0]['stakeholder_activity_id']);
//
                $form->hdn_stock_id->setValue($temp_stock[0]['demand_master_id']);
                $form->hdn_master_id->setValue($temp_stock[0]['demand_master_id']);
//                $arr_data['tempstocks'] = $temp_stock_list;
                //$form->makeFieldReadonly();
            } 
        }
// Edit Issue End



        $this->view->form = $form;

        $base_url = Zend_Registry::get('baseurl');
        switch ($this->_user_level) {
            case 1:
            case 2:
            case 3:
                $this->view->menu_type = 1;
                $this->view->inlineScript()->appendFile($base_url . '/js/all_level_combos.js');
                break;
            case 4:
            case 5:
            case 6:
                $this->view->menu_type = 2;
                $this->view->inlineScript()->appendFile($base_url . '/js/level_combos.js');
                break;
            default:
                break;
        }


        $this->view->arr_data = $temp_stock;
        $this->view->type = $this->_request->getParam("t", "issue");
        $this->view->wh_id = $this->_identity->getWarehouseId();

        $this->view->params = array("province" => $this->_identity->getProvinceId(), "district" => $this->_identity->getDistrictId());
        $this->view->role = $this->_identity->getRoleId();
    }

    public function requisitionActionTemp() {
        $form = new Form_StockRequisition();
        $this->view->form = $form;

        $demand_master = new Model_DemandMaster();
        $demand_detail = new Model_DemandDetail();

        $temp_req_list = null;
        $form_values = array();

        if (!empty($this->_request->hdn_stock_id)) {
            $stock_id = $this->_request->hdn_stock_id;
        }
        if (!empty($this->_request->hdn_master_id)) {
            $master_id = $this->_request->hdn_master_id;
        }

        if (!empty($this->_request->period)) {
            $requisition_period = $this->_request->period;
        }
        $created_by = $this->_em->find('Users', $this->_userid);

        if ($this->_request->isPost()) {

            $form_values = $form->getValues();

            if (!empty($master_id)) {
                $em = Zend_Registry::get('doctrine');
                $em->getConnection()->beginTransaction();
                try {
                    $transaction_number = $demand_master->updateDemandMasterTemp($master_id, $this->_request->comments);
                    $demand_detail->updateDemandDetailTemp($master_id);
                } catch (Exception $e) {
                    $em->getConnection()->rollback();
                    $em->close();
                    App_FileLogger::info($e);
                }
            } elseif ($form->isValid($this->_request->getPost())) {
                $em = Zend_Registry::get('doctrine');
                $em->getConnection()->beginTransaction();
                try {
                    //Add DemandMaster
                    if (empty($this->_request->transaction_number)) {
                        //$stock_id = $demand_master->addDemandMaster($data);
                    }
                    $detail_id = $demand_detail->addDemandDetail($data);
                } catch (Exception $e) {
                    $em->getConnection()->rollback();
                    $em->close();
                    App_FileLogger::info($e);
                }
            }
















            $demand_master->form_values = $form_values;
            $temp_req = $demand_master->getTempRequisition();
            if ($temp_req) {
                $arr_data = array_merge($arr_data, $temp_req);
            }
            $temp_req_list = $demand_master->getTempRequisitionList();
            if ($temp_req_list) {
                $form->transaction_number->setValue($temp_req_list[0]['transaction_number']);
                $form->transaction_date->setValue(date("d/m/Y h:i A", strtotime($temp_req_list[0]['transaction_date'])));
                $form->warehouse_name->setValue($temp_req_list[0]['to_warehouse']);
                $form->transaction_reference->setValue($temp_req_list[0]['transaction_reference']);
                $form->hdn_to_warehouse_id->setValue($temp_req_list[0]['to_warehouse_id']);
                $arr_data['warehouse_name'] = $temp_req_list[0]['to_warehouse'];
                $form->activity_id->setValue($temp_req_list[0]['activity_id']);

                $arr_data['tempstocks'] = $temp_req_list;
                $form->makeFieldReadonly();
            } else {
                $form->transaction_date->setValue(date("d/m/Y h:i A"));
            }

            if (!empty($temp_req['stock_id'])) {
                $form->hdn_stock_id->setValue($temp_req['stock_id']);
                $form->hdn_master_id->setValue($temp_req['stock_id']);
            } elseif (!empty($stockid)) {
                $form->hdn_stock_id->setValue($stock_id);
                $form->hdn_master_id->setValue($stock_id);
            }


            $em = Zend_Registry::get('doctrine');
            $em->getConnection()->beginTransaction();
            try {
                $period_arr = explode('-', $requisition_period);
                $from_date = $period_arr['0'];
                $to_date = $period_arr['1'];
                $form_data = $this->_request->getParams();
                $demand_master->form_values = $form_data;

                $requisition_number = $demand_master->getRequisitionNumber($from_date, $to_date);

                // Add Demand Master
                $obj_demand_master = new DemandMaster();

                $obj_demand_master->setFromDate(new \DateTime(App_Controller_Functions::dateToDbFormat($from_date)));
                $obj_demand_master->setToDate(new \DateTime(App_Controller_Functions::dateToDbFormat($to_date)));
                $obj_demand_master->setSuggestedDate(new \DateTime(App_Controller_Functions::dateToDbFormat($form_data['suggested_date'])));

                $obj_demand_master->setRequisitionNumber($requisition_number['req_no']);
                $obj_demand_master->setRequisitionCounter($requisition_number['id']);
                $obj_demand_master->setRequisitionReference($form_data['requisition_reference']);
                $trans_type = $this->_em->getRepository("TransactionTypes")->find(18);
                $obj_demand_master->setTransactionType($trans_type);
                $obj_demand_master->setDraft(1);
                $obj_demand_master->setStatus(0);
                $from_wh = $this->_em->getRepository("Warehouses")->find($this->_identity->getWarehouseId());
                $obj_demand_master->setFromWarehouse($from_wh);
                $to_wh = $this->_em->getRepository("Warehouses")->find(159);
                $obj_demand_master->setToWarehouse($to_wh);

                $obj_demand_master->setCreatedBy($created_by);
                $obj_demand_master->setCreatedDate(App_Tools_Time::now());
                $obj_demand_master->setModifiedBy($created_by);
                $obj_demand_master->setModifiedDate(App_Tools_Time::now());
                $em->persist($obj_demand_master);
                $em->flush();

                // Add Demand Detail
                $obj_demand_detail = new DemandDetail();

                $obj_demand_detail->setDemandQuantity($form_data['quantity']);
                $obj_demand_detail->setDemandMaster($obj_demand_master);
                $product = $this->_em->getRepository("ItemPackSizes")->find($form_data['item_id']);
                $obj_demand_detail->setProduct($product);
                $obj_demand_detail->setPairProductId($form_data['usage']);
                $obj_demand_detail->setDraft(1);
                $obj_demand_detail->setCreatedBy($created_by);
                $obj_demand_detail->setCreatedDate(App_Tools_Time::now());
                $obj_demand_detail->setModifiedBy($created_by);
                $obj_demand_detail->setModifiedDate(App_Tools_Time::now());
                $em->persist($obj_demand_detail);
                $em->flush();


                $em->getConnection()->commit();
            } catch (Exception $e) {
                $em->getConnection()->rollback();
                $em->close();
                App_FileLogger::info($e);
            }
        }

        $this->view->temp_list = $temp_req_list;
        $form->warehouse_name->setValue("Federal Vaccine Store");
    }

    public function ajaxGetProductPairByProductAction() {
        $this->_helper->layout->disableLayout();

        if (isset($this->_request->item_id) && !empty($this->_request->item_id)) {

            $item_pairs_logic = new Model_ItemPairsLogic();
            $item_pairs_logic->form_values['item_id'] = $this->_request->item_id;

            $item_pairs = $item_pairs_logic->getProductPairByProduct();
            $this->view->result = $item_pairs;
        }
    }
    
    public function approvalAction() {
        $form = new Form_Approval();
        
        $items =  new Model_ItemPackSizes();
        $products = $items->getAllProducts();
                
        $this->view->form = $form;
        $this->view->products = $products;
        
    }

}
