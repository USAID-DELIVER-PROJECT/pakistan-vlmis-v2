<?php

class Iadmin_ManageLocationsController extends App_Controller_Base {

    public function init() {
        parent::init();
    }

    public function indexAction() {

        $form = new Form_Iadmin_Locations();
        $locations = new Model_Locations();
        $params = array();

        if ($this->_request->isPost()) {
            if ($this->_request->getPost()) {
                $form_values = $this->_request->getPost();
                //  App_Controller_Functions::pr($form_values);
                $this->view->combos = $this->_request->getPost();
                $form->province_id->setValue($form_values['combo1']);
                $form->district_id->setValue($form_values['combo2']);
                $form->parent_id->setValue($form_values['combo3']);
                if (!empty($form_values['location_level'])) {
                    $params['location_level'] = $form_values['location_level'];
                }
                if (!empty($form_values['combo1'])) {
                    $params['combo1'] = $form_values['combo1'];
                }
                if (!empty($form_values['combo2'])) {
                    $params['combo2'] = $form_values['combo2'];
                }
                if (!empty($form_values['combo3'])) {
                    $params['combo3'] = $form_values['combo3'];
                }
                if (!empty($form_values['not_used'])) {
                    $params['used'] = $form_values['not_used'];
                }

                $sort = $this->_getParam("sort", "asc");
                $order = $this->_getParam("order", "location");
                $locations->form_values = $this->_request->getPost();
                // App_Controller_Functions::pr($this->_request->getPost());
                $result = $locations->getAllLocations($order, $sort);

                //Paginate the contest results
              //  $paginator = Zend_Paginator::factory($result);
              //  $page = $this->_getParam("page", 1);
              //  $counter = $this->_getParam("counter", 10);
              //  $paginator->setCurrentPageNumber((int) $page);
              //  $paginator->setItemCountPerPage((int) $counter);

                $this->view->delete_location = $form_values['not_used'];
                $this->view->form = $form;
                $this->view->paginator = $result;
                $this->view->sort = $sort;
                $this->view->order = $order;
            //    $this->view->counter = $counter;
                $this->view->pagination_params = $params;
            }
        } else {

            $locations->form_values = $this->_request->getParams();
            $params = $this->_request->getParams();
            $this->view->combos = $this->_request->getParams();
            $form->province_id->setValue($this->_getParam('combo1'));
            $form->district_id->setValue($this->_getParam('combo2'));
            $form->parent_id->setValue($this->_getParam('combo3'));
            $this->view->delete_location = $this->_getParam('used');
            $sort = $this->_getParam("sort", "asc");
            $order = $this->_getParam("order", "location");

            $result = $locations->getAllLocations($order, $sort);

            //Paginate the contest results
          //  $paginator = Zend_Paginator::factory($result);
           // $page = $this->_getParam("page", 1);
           // $counter = $this->_getParam("counter", 10);
           // $paginator->setCurrentPageNumber((int) $page);
           // $paginator->setItemCountPerPage((int) $counter);

            $this->view->form = $form;

            $this->view->paginator = $result;
            $this->view->sort = $sort;
            $this->view->order = $order;
          //  $this->view->counter = $counter;
            $this->view->pagination_params = $params;
        }
        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/locations_combos.js');
        $this->view->inlineScript()->appendFile($base_url . '/js/locations_add_combos.js');
        $this->view->headLink()->appendStylesheet($base_url . '/common/theme/scripts/plugins/tables/DataTables/media/css/DT_bootstrap.css');
    }

    public function ajaxEditAction() {
        $this->_helper->layout->setLayout("ajax");
        // $this->_helper->layout->disableLayout();
        $location_id = $this->_request->getParam('location_id', '');

        $locations = $this->_em->find('Locations', $location_id);
        $form = new Form_Iadmin_Locations();

        $form->location_name_update->setValue($locations->getLocationName());
        $form->location_id->setValue($location_id);
        $form->location_type->setValue($locations->getGeoLevel()->getPkId());
        $form->province_id_edit->setValue($locations->getProvince()->getPkId());
        if ($locations->getGeoLevel()->getPkId() != 3 && $locations->getGeoLevel()->getPkId() != 4) {
            $form->district_id_edit->setValue($locations->getDistrict()->getPkId());
        }

        $form->parent_id_edit->setValue($locations->getParent()->getPkId());

        $form->location_type_id_update_hidden->setValue($locations->getLocationType()->getPkId());
        $form->ccm_location_id_update->setValue($locations->getCcmLocationId());
        $this->view->form = $form;

        $base_url = Zend_Registry::get('baseurl');
        //   $this->view->inlineScript()->appendFile($base_url . '/js/edit_locations.js');
        $this->view->inlineScript()->appendFile($base_url . '/js/locations_edit_combos.js');
    }

    public function addAction() {

        if ($this->_request->isPost()) {
            if ($this->_request->getPost()) {
                $form_values = $this->_request->getPost();

                $locations = new Locations();
                if ($form_values['location_level_add'] == 3) {

                    $parentId = $form_values['combo1_add'];
                }
                if ($form_values['location_level_add'] == 4) {

                    $parentId = $form_values['combo1_add'];
                }
                if ($form_values['location_level_add'] == 5) {

                    $parentId = $form_values['combo2_add'];
                }
                if ($form_values['location_level_add'] == 6) {

                    $parentId = $form_values['combo3_add'];
                }
                $province_id = $this->_em->find('Locations', $form_values['combo1_add']);
                $locations->setProvince($province_id);
                $locations->setLocationName($form_values['location_name_add']);
                $geo_level_id = $this->_em->find('GeoLevels', $form_values['location_level_add']);
                $locations->setGeoLevel($geo_level_id);
                $location_types = $this->_em->find('LocationTypes', $form_values['location_type_id']);
                $locations->setLocationType($location_types);
                $parent_id = $this->_em->find('Locations', $parentId);
                $locations->setParent($parent_id);
                if ($form_values['location_level_add'] == 5 || $form_values['location_level_add'] == 6) {
                    $district_id = $this->_em->find('Locations', $form_values['combo2_add']);
                    $locations->setDistrict($district_id);
                }
                $locations->setCcmLocationId($form_values['ccm_location_id']);
                $this->_em->persist($locations);
                $this->_em->flush();
            }
        }
        $this->_redirect("/iadmin/manage-locations");
    }

    public function updateAction() {

        if ($this->_request->isPost()) {
            if ($this->_request->getPost()) {
                $form_values = $this->_request->getPost();

                $locations = $this->_em->find('Locations', $form_values['location_id']);
                if ($form_values['location_level_edit'] == 3 || $form_values['location_level_edit'] == 4) {

                    $parentId = $form_values['combo1_edit'];
                }
                if ($form_values['location_level_edit'] == 5) {

                    $parentId = $form_values['combo2_edit'];
                }
                if ($form_values['location_level_edit'] == 6) {

                    $parentId = $form_values['combo3_edit'];
                }
                $province_id = $this->_em->find('Locations', $form_values['combo1_edit']);
                $locations->setProvince($province_id);
                $locations->setLocationName($form_values['location_name_update']);
                $geo_level_id = $this->_em->find('GeoLevels', $form_values['location_level_edit']);
                $locations->setGeoLevel($geo_level_id);
               // $Location_types = $this->_em->find('LocationTypes', $form_values['location_type_id_update']);
              //  $locations->setLocationType($Location_types);
                $parent_id = $this->_em->find('Locations', $parentId);
                $locations->setParent($parent_id);
                if ($form_values['location_level_edit'] == 5 || $form_values['location_level_edit'] == 6) {
                    $district_id = $this->_em->find('Locations', $form_values['combo2_edit']);
                    $locations->setDistrict($district_id);
                }

                $locations->setCcmLocationId($form_values['ccm_location_id_update']);
                $this->_em->persist($locations);
                $this->_em->flush();
            }
        }
        $this->_redirect("/iadmin/manage-locations");
    }

    public function checkLocationAction() {
        $this->_helper->layout->disableLayout();
        //$this->_helper->viewRenderer->setNoRender(TRUE);


        $form_values = $this->_request->getPost();

        $locations = new Model_Locations();
        $locations->form_values = $form_values;
        $result = $locations->checkLocation();
        $this->view->result = $result;
    }

    public function checkLocationUpdateAction() {
        $this->_helper->layout->disableLayout();
        //$this->_helper->viewRenderer->setNoRender(TRUE);


        $form_values = $this->_request->getPost();

        $locations = new Model_Locations();
        $locations->form_values = $form_values;
        $result = $locations->checkLocationUpdate();
        $this->view->result = $result;
    }

    public function getLocationTypesAction() {
        $this->_helper->layout->disableLayout();

        $geo_level_id = $this->_request->geo_level_id;
        $location = new Model_Locations();
        $location->form_values = $geo_level_id;
        $result = $location->getLocationType();
        $this->view->data = $result;
    }

    public function checkCcmLocationAction() {
        $this->_helper->layout->disableLayout();

        $form_values = $this->_request->getPost();
        $location = new Model_Locations();
        $location->form_values = $form_values;
        $result = $location->checkCcmLocationId();
        $this->view->result = $result;
    }

    public function checkCcmLocationUpdateAction() {
        $this->_helper->layout->disableLayout();

        $form_values = $this->_request->getPost();
        $location = new Model_Locations();
        $location->form_values = $form_values;
        $result = $location->checkCcmLocationIdUpdate();
        $this->view->result = $result;
    }

    public function deleteAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);

        $location_id = $this->_request->getParam("location_id"); // call Ajax


        $locations = $this->_em->getRepository("Locations")->find($location_id);

        $this->_em->remove($locations);

        return $this->_em->flush();
    }
    
     public function locationTypeAction() {
        $form = new Form_Iadmin_LocationTypeSearch();
        $form_add = new Form_Iadmin_LocationTypeAdd();

        $location_type = new Model_LocationTypes();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                //App_Controller_Functions::pr($this->_request->getPost());
                $location_type_name = $form->getValue('location_type_name');
                $status = $form->getValue('status');

                if (!empty($location_type_name)) {
                    $location_type->form_values['locationTypeName'] = $location_type_name;
                }
                if (!empty($status)) {
                    $location_type->form_values['status'] = $status;
                }
            }
            $form->location_type_name->setValue($location_type_name);
            $form->status->setValue($status);
        }

        $sort = $this->_getParam("sort", "asc");
        $order = $this->_getParam("order", "location_type_name");

        $result = $location_type->getAllLocationTypes($order, $sort);

        //Paginate the contest results
        $paginator = Zend_Paginator::factory($result);
        $page = $this->_getParam("page", 1);
        $counter = $this->_getParam("counter", 10);
        $paginator->setCurrentPageNumber((int) $page);
        $paginator->setItemCountPerPage((int) $counter);

        $this->view->form = $form;
        $this->view->form_add = $form_add;
        $this->view->paginator = $paginator;
        $this->view->sort = $sort;
        $this->view->order = $order;
        $this->view->counter = $counter;

        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/all_level_combos.js');
    }
    
     public function ajaxChangeStatusAction() {
        $this->_helper->layout->disableLayout();
        $row = $this->_em->getRepository("LocationTypes")->find($this->_request->getParam('id'));
        if ($this->_request->getParam('ajaxaction') == 'active') {
            $row->setStatus('1');
        } else if ($this->_request->getParam('ajaxaction') == 'deactive') {
            $row->setStatus('0');
        }
        $this->_em->persist($row);
        $this->_em->flush();
        $this->view->ajaxaction = $this->_request->getParam('ajaxaction');
    }
    
     public function addLocationTypeAction() {
        $form = new Form_Iadmin_LocationTypeAdd();

        if ($this->_request->isPost()) {
            if ($this->_request->getPost()) {

                $form_values = $this->_request->getPost();


                $location_type = new LocationTypes();
                $location_type->setLocationTypeName($form_values['location_type_name']);


                $geo_level = $this->_em->getRepository('GeoLevels')->find($form_values['geo_level_id']);
                $location_type->setGeoLevel($geo_level);


                $location_type->setStatus($form_values['status']);
                $created_by = $this->_em->find('Users', $this->_userid);
                $location_type->setCreatedBy($created_by);
                $location_type->setCreatedDate(new \DateTime());
                $this->_em->persist($location_type);
                $location_type->setModifiedBy($created_by);

                $this->_em->flush();
            }
        }
        $this->_redirect("/iadmin/manage-locations/location-type?success=1");
    }
    
        public function ajaxEditLocTypeAction() {
        $this->_helper->layout->disableLayout();
        $location_type_id = $this->_request->getParam('location_type_id', '');

        $locationType = $this->_em->find('LocationTypes', $location_type_id);
        $form = new Form_Iadmin_LocationTypeAdd();

        $form->location_type_name->setValue($locationType->getLocationTypeName());
        $form->geo_level_id->setValue($locationType->getGeoLevel()->getPkId());

        $form->location_type_id->setValue($locationType->getPkId());
        $this->view->form = $form;
    }
    
     public function updateLocationTypeAction() {

        if ($this->_request->getPost()) {
            $form_values = $this->_request->getPost();
            $locationType = $this->_em->getRepository("LocationTypes")->find($form_values['location_type_id']);
            $locationType->setLocationTypeName($form_values['location_type_name']);

            $geo_level = $this->_em->getRepository('GeoLevels')->find($form_values['geo_level_id']);
            $locationType->setGeoLevel($geo_level);


            $created_by = $this->_em->find('Users', $this->_userid);
            $locationType->setModifiedBy($created_by);
            $locationType->setModifiedDate(new \DateTime());

            $this->_em->persist($locationType);
            $this->_em->flush();
        }
        $this->_redirect("/iadmin/manage-locations/location-type?success=2");
    }

}
