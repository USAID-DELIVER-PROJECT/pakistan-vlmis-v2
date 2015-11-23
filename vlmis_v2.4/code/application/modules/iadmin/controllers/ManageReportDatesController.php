<?php

class Iadmin_ManageReportDatesController extends App_Controller_Base {

    public function init() {
        parent::init();
    }

    public function addReportDatesAction() {

        $form = new Form_Iadmin_UpdateCluster;

        $user = new Model_Users();

        if ($this->_request->isPost()) {

            $form_values = $this->_request->getPost();

            if ($form_values['search'] == 'search') {
                $warehouses = new Model_Warehouses();
                $warehouses->form_values = $form_values;

                $form->province->setValue($form_values['province']);
                $form->province_hidden->setValue($form_values['province']);
                $form->district_hidden->setValue($form_values['district']);
                $form->user_hidden->setValue($form_values['user']);
                $warehouse_data = $warehouses->getAllWarehousesReportDate();

                $this->view->data = $warehouse_data;
            } else {
                $form_values_submit = $this->_request->getPost();
                if (($form_values_submit['check']) != "") {
                    foreach ($form_values_submit['check'] as $warehouse_id) {

                        $warehouses_db = $this->_em->getRepository('Warehouses')->find($warehouse_id);
                        if (($form_values_submit['from_edit']) != "") {
                            $warehouses_db->setFromEdit(new \DateTime(App_Controller_Functions::dateToDbFormat($form_values_submit['from_edit'])));
                        }
                        if (($form_values_submit['starting_on']) != "") {
                            $warehouses_db->setStartingOn(new \DateTime(App_Controller_Functions::dateToDbFormat($form_values_submit['starting_on'])));
                        }
                        if (($form_values_submit['working_uptil']) != "") {
                            $warehouses_db->setWorkingUptill(new \DateTime(App_Controller_Functions::dateToDbFormat($form_values_submit['working_uptil'])));
                        }
                    }

                    $this->_em->persist($warehouses_db);
                    $this->_em->flush();
                }
            }
        }

        $this->view->form = $form;
    }

}
