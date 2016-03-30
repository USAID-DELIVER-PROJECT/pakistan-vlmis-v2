<?php

/**
 * Iadmin_ManageStakeholdersController
 *
 * 
 *
 *     Logistics Management Information System for Vaccines
 * @subpackage Iadmin
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */

/**
 *  Controller for Iadmin Manage Stakeholders
 */
class Iadmin_ManageStakeholdersController extends App_Controller_Base {

    /**
     * Stakeholders
     */
    public function stakeholdersAction() {
        $form = new Form_Iadmin_Stakeholders();

        $stakeholder = new Model_Stakeholders();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $stakeholder_name = $form->getValue('stakeholder_name');
                $geo_level = $form->getValue('geo_level');
                $sector = $form->getValue('sector');
                $activity = $form->getValue('activity');
                if (!empty($stakeholder_name)) {
                    $stakeholder->form_values['stakeholderName'] = $stakeholder_name;
                }
                if (!empty($geo_level)) {
                    $stakeholder->form_values['geo_level'] = $geo_level;
                }
                if (!empty($sector)) {
                    $stakeholder->form_values['sector'] = $sector;
                }
                if (!empty($activity)) {
                    $stakeholder->form_values['activity'] = $activity;
                }
            }
            $form->stakeholder_name->setValue($stakeholder_name);
            $form->geo_level->setValue($geo_level);
            $form->sector->setValue($sector);
            $form->activity->setValue($activity);
        }

        $sort = $this->_getParam("sort", "asc");
        $order = $this->_getParam("order", "stakeholder");

        $result = $stakeholder->getStakeholders();

        //Paginate the contest results
        $paginator = Zend_Paginator::factory($result);
        $page = $this->_getParam("page", 1);
        $counter = $this->_getParam("counter", 10);
        $paginator->setCurrentPageNumber((int) $page);
        $paginator->setItemCountPerPage((int) $counter);

        $this->view->form = $form;

        $this->view->paginator = $paginator;
        $this->view->sort = $sort;
        $this->view->order = $order;
        $this->view->counter = $counter;
    }

    /**
     * Office
     */
    public function officeAction() {
        $form = new Form_Iadmin_Office();

        $stakeholder = new Model_Stakeholders();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $stakeholder_id = $form->getValue('stakeholder');
                $geo_level = $form->getValue('geo_level');
                $office = $form->getValue('office');

                if (!empty($stakeholder)) {
                    $stakeholder->form_values['stakeholder'] = $stakeholder_id;
                }
                if (!empty($geo_level)) {
                    $stakeholder->form_values['geo_level'] = $geo_level;
                }
                if (!empty($office)) {
                    $stakeholder->form_values['office'] = $office;
                }
            }
            $form->stakeholder->setValue($stakeholder_id);
            $form->geo_level->setValue($geo_level);
            $form->office->setValue($office);
        }

        $sort = $this->_getParam("sort", "asc");
        $order = $this->_getParam("order", "stakeholder");

        $result = $stakeholder->getOffices();

        //Paginate the contest results
        $paginator = Zend_Paginator::factory($result);
        $page = $this->_getParam("page", 1);
        $counter = $this->_getParam("counter", 10);
        $paginator->setCurrentPageNumber((int) $page);
        $paginator->setItemCountPerPage((int) $counter);

        $this->view->form = $form;

        $this->view->paginator = $paginator;
        $this->view->sort = $sort;
        $this->view->order = $order;
        $this->view->counter = $counter;
    }

    /**
     * Manufacturer
     */
    public function manufacturerAction() {
        $form = new Form_Iadmin_Manufacturer();

        $stakeholder = new Model_Stakeholders();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $manufacturer = $form->getValue('manufacturer');
                $sector = $form->getValue('sector');
                if (!empty($manufacturer)) {
                    $stakeholder->form_values['manufacturer'] = $manufacturer;
                }
                if (!empty($sector)) {
                    $stakeholder->form_values['sector'] = $sector;
                }
            }
            $form->manufacturer->setValue($manufacturer);
            $form->sector->setValue($sector);
        }

        $sort = $this->_getParam("sort", "asc");
        $order = $this->_getParam("order", "stakeholder");

        $result = $stakeholder->getManufacturers();

        //Paginate the contest results
        $paginator = Zend_Paginator::factory($result);
        $page = $this->_getParam("page", 1);
        $counter = $this->_getParam("counter", 10);
        $paginator->setCurrentPageNumber((int) $page);
        $paginator->setItemCountPerPage((int) $counter);

        $this->view->form = $form;

        $this->view->paginator = $paginator;
        $this->view->sort = $sort;
        $this->view->order = $order;
        $this->view->counter = $counter;
    }

    /**
     * Stakeholder Activities
     */
    public function stakeholderActivitiesAction() {
        $form = new Form_Iadmin_Stakeholders();

        $stakeholder = new Model_Stakeholders();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $stakeholder_activity = $form->getValue('stakeholder_activity');

                if (!empty($stakeholder_activity)) {
                    $stakeholder->form_values['stakeholder_activity'] = $stakeholder_activity;
                }
            }
            $form->stakeholder_activity->setValue($stakeholder_activity);
        }

        $sort = $this->_getParam("sort", "asc");
        $order = $this->_getParam("order", "stakeholder");

        $result = $stakeholder->getStakeholderActivities();

        //Paginate the contest results
        $paginator = Zend_Paginator::factory($result);
        $page = $this->_getParam("page", 1);
        $counter = $this->_getParam("counter", 10);
        $paginator->setCurrentPageNumber((int) $page);
        $paginator->setItemCountPerPage((int) $counter);

        $this->view->form = $form;

        $this->view->paginator = $paginator;
        $this->view->sort = $sort;
        $this->view->order = $order;
        $this->view->counter = $counter;
    }

    /**
     * Stakeholder Types
     */
    public function stakeholderTypesAction() {
        $form = new Form_Iadmin_Stakeholders();

        $stakeholder = new Model_Stakeholders();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $stakeholder_type = $form->getValue('stakeholder_type');

                if (!empty($stakeholder_type)) {
                    $stakeholder->form_values['stakeholder_type'] = $stakeholder_type;
                }
            }
            $form->stakeholder_type->setValue($stakeholder_type);
        }

        $sort = $this->_getParam("sort", "asc");
        $order = $this->_getParam("order", "stakeholder");

        $result = $stakeholder->getStakeholderTypes();

        //Paginate the contest results
        $paginator = Zend_Paginator::factory($result);
        $page = $this->_getParam("page", 1);
        $counter = $this->_getParam("counter", 10);
        $paginator->setCurrentPageNumber((int) $page);
        $paginator->setItemCountPerPage((int) $counter);

        $this->view->form = $form;

        $this->view->paginator = $paginator;
        $this->view->sort = $sort;
        $this->view->order = $order;
        $this->view->counter = $counter;
    }

    /**
     * Stakeholder Sectors
     */
    public function stakeholderSectorsAction() {
        $form = new Form_Iadmin_Stakeholders();

        $stakeholder = new Model_Stakeholders();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $stakeholder_sector = $form->getValue('stakeholder_sector');

                if (!empty($stakeholder_sector)) {
                    $stakeholder->form_values['stakeholder_sector'] = $stakeholder_sector;
                }
            }
            $form->stakeholder_sector->setValue($stakeholder_sector);
        }

        $sort = $this->_getParam("sort", "asc");
        $order = $this->_getParam("order", "stakeholder");

        $result = $stakeholder->getStakeholderSectors();

        //Paginate the contest results
        $paginator = Zend_Paginator::factory($result);
        $page = $this->_getParam("page", 1);
        $counter = $this->_getParam("counter", 10);
        $paginator->setCurrentPageNumber((int) $page);
        $paginator->setItemCountPerPage((int) $counter);

        $this->view->form = $form;

        $this->view->paginator = $paginator;
        $this->view->sort = $sort;
        $this->view->order = $order;
        $this->view->counter = $counter;
    }

    /**
     * Add Stakeholder
     */
    public function addStakeholderAction() {
        $form = new Form_Iadmin_Stakeholders();

        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {

            $stakeholder = new Stakeholders();
            $stakeholder->setStakeholderName($form->stakeholder_name->getValue());
            $stakeholder->setListRank('1');
            $parent_id = $this->_em->getRepository('Stakeholders')->find($form->geo_level->getValue());
            $stakeholder->setParent($parent_id);
            $geo_level_id = $this->_em->getRepository('GeoLevels')->find($form->geo_level->getValue());
            $stakeholder->setGeoLevel($geo_level_id);

            $stakeholder_sector = $this->_em->getRepository('StakeholderSectors')->find($form->sector->getValue());
            $stakeholder->setStakeholderSector($stakeholder_sector);
            $stakeholder_type = $this->_em->getRepository('StakeholderTypes')->find('1');
            $stakeholder->setStakeholderType($stakeholder_type);
            $stakeholder_activity = $this->_em->getRepository('StakeholderActivities')->find($form->activity->getValue());
            $stakeholder->setStakeholderActivity($stakeholder_activity);

            $created_by = $this->_em->find('Users', $this->_user_id);
            $stakeholder->setCreatedBy($created_by);
            $stakeholder->setCreatedDate(App_Tools_Time::now());
            $stakeholder->setModifiedBy($created_by);
            $stakeholder->setModifiedDate(App_Tools_Time::now());
            $this->_em->persist($stakeholder);
            $this->_em->flush();
        }
        $this->_redirect("/iadmin/manage-stakeholders/stakeholders");
    }

    /**
     * Add Office
     */
    public function addOfficeAction() {
        $form = new Form_Iadmin_Office();

        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {

            $stakeholder = new Stakeholders();
            $main_stk = $this->_em->getRepository("Stakeholders")->find($form->stakeholder->getValue());

            $stakeholder->setStakeholderName($form->office->getValue());
            $stakeholder->setListRank('1');
            $parent_id = $this->_em->getRepository('Stakeholders')->find($form->geo_level->getValue());
            $stakeholder->setParent($parent_id);
            $geo_level_id = $this->_em->getRepository('GeoLevels')->find($form->geo_level->getValue());
            $stakeholder->setGeoLevel($geo_level_id);

            $stakeholder_sector = $this->_em->getRepository('StakeholderSectors')->find($main_stk->getStakeholderSector()->getPkId());
            $stakeholder->setStakeholderSector($stakeholder_sector);
            $stakeholder_type = $this->_em->getRepository('StakeholderTypes')->find('1');
            $stakeholder->setStakeholderType($stakeholder_type);

            $stakeholder_activity = $this->_em->getRepository('StakeholderActivities')->find($main_stk->getStakeholderActivity()->getPkId());
            $stakeholder->setStakeholderActivity($stakeholder_activity);
            $main_stakeholder = $this->_em->getRepository('Stakeholders')->find($form->stakeholder->getValue());
            $stakeholder->setMainStakeholder($main_stakeholder);

            $created_by = $this->_em->find('Users', $this->_user_id);
            $stakeholder->setCreatedBy($created_by);
            $stakeholder->setCreatedDate(App_Tools_Time::now());
            $stakeholder->setModifiedBy($created_by);
            $stakeholder->setModifiedDate(App_Tools_Time::now());
            $this->_em->persist($stakeholder);
            $this->_em->flush();
        }
        $this->_redirect("/iadmin/manage-stakeholders/office");
    }

    /**
     * Add Manufacturer
     */
    public function addManufacturerAction() {
        $form = new Form_Iadmin_Manufacturer();

        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {

            $stakeholder = new Stakeholders();
            $stakeholder->setStakeholderName($form->manufacturer->getValue());
            $stakeholder->setListRank('1');
            $parent_id = $this->_em->getRepository('Stakeholders')->find('1');
            $stakeholder->setParent($parent_id);
            $geo_level_id = $this->_em->getRepository('GeoLevels')->find('1');
            $stakeholder->setGeoLevel($geo_level_id);

            $stakeholder_sector = $this->_em->getRepository('StakeholderSectors')->find($form->sector->getValue());
            $stakeholder->setStakeholderSector($stakeholder_sector);
            $stakeholder_type = $this->_em->getRepository('StakeholderTypes')->find(Model_Stakeholders::TYPE_MANUFACTURER);
            $stakeholder->setStakeholderType($stakeholder_type);
            $stakeholder_activity = $this->_em->getRepository('StakeholderActivities')->find('1');
            $stakeholder->setStakeholderActivity($stakeholder_activity);
            $main_stakeholder = $this->_em->getRepository('Stakeholders')->find(1);
            $stakeholder->setMainStakeholder($main_stakeholder);
            $created_by = $this->_em->find('Users', $this->_user_id);
            $stakeholder->setCreatedBy($created_by);
            $stakeholder->setCreatedDate(App_Tools_Time::now());
            $stakeholder->setModifiedBy($created_by);
            $stakeholder->setModifiedDate(App_Tools_Time::now());
            $this->_em->persist($stakeholder);
            $this->_em->flush();
        }
        $this->_redirect("/iadmin/manage-stakeholders/manufacturer");
    }

    /**
     * Add Stakeholder Activity
     */
    public function addStakeholderActivityAction() {
        $form = new Form_Iadmin_Stakeholders();

        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {

            $stakeholder_activity = new StakeholderActivities();
            $stakeholder_activity->setActivity($form->stakeholder_activity->getValue());

            $created_by = $this->_em->find('Users', $this->_user_id);
            $stakeholder_activity->setCreatedBy($created_by);
            $stakeholder_activity->setCreatedDate(App_Tools_Time::now());
            $stakeholder_activity->setModifiedBy($created_by);
            $stakeholder_activity->setModifiedDate(App_Tools_Time::now());
            $this->_em->persist($stakeholder_activity);
            $this->_em->flush();
        }
        $this->_redirect("/iadmin/manage-stakeholders/stakeholder-activities");
    }

    /**
     * Add Stakeholder Type
     */
    public function addStakeholderTypeAction() {
        $form = new Form_Iadmin_Stakeholders();

        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {

            $stakeholder_types = new StakeholderTypes();
            $stakeholder_types->setStakeholderTypeName($form->stakeholder_type->getValue());
            $createdBy = $this->_em->getRepository('Users')->find($this->_userid);
            $stakeholder_types->setCreatedBy($createdBy);
            $stakeholder_types->setModifiedBy($createdBy);
            $stakeholder_types->setCreatedDate(App_Tools_Time::now());
            $stakeholder_types->setModifiedDate(App_Tools_Time::now());
            $this->_em->persist($stakeholder_types);
            $this->_em->flush();
        }
        $this->_redirect("/iadmin/manage-stakeholders/stakeholder-types");
    }

    /**
     * Add Stakeholder Sector
     */
    public function addStakeholderSectorAction() {
        $form = new Form_Iadmin_Stakeholders();

        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {

            $stakeholder_sectors = new StakeholderSectors();
            $stakeholder_sectors->setStakeholderSectorName($form->stakeholder_sector->getValue());
            $createdBy = $this->_em->getRepository('Users')->find($this->_userid);
            $stakeholder_sectors->setCreatedBy($createdBy);
            $stakeholder_sectors->setModifiedBy($createdBy);
            $stakeholder_sectors->setCreatedDate(App_Tools_Time::now());
            $stakeholder_sectors->setModifiedDate(App_Tools_Time::now());
            $this->_em->persist($stakeholder_sectors);
            $this->_em->flush();
        }
        $this->_redirect("/iadmin/manage-stakeholders/stakeholder-sectors");
    }

    /**
     * ajaxStakeholderEdit
     */
    public function ajaxStakeholderEditAction() {
        $this->_helper->layout->disableLayout();

        $stakeholder = $this->_em->find('Stakeholders', $this->_request->getParam('stakeholder_id'));
        $form = new Form_Iadmin_Stakeholders();
        $form->stakeholder_name->setValue($stakeholder->getStakeholderName());
        $form->sector->setValue($stakeholder->getStakeholderType()->getPkId());
        $form->geo_level->setValue($stakeholder->getGeoLevel()->getPkId());
        $form->activity->setValue($stakeholder->getStakeholderActivity()->getPkId());
        $form->stakeholder_id->setValue($stakeholder->getPkId());
        $this->view->form = $form;
    }

    /**
     * ajaxOfficeEdit
     */
    public function ajaxOfficeEditAction() {
        $this->_helper->layout->disableLayout();
        $stakeholder = $this->_em->find('Stakeholders', $this->_request->getParam('stakeholder_id'));
        $form = new Form_Iadmin_Office();
        $form->stakeholder->setValue($stakeholder->getMainStakeholder()->getPkId());

        $form->geo_level->setValue($stakeholder->getGeoLevel()->getPkId());
        $form->office->setValue($stakeholder->getStakeholderName());
        $form->stakeholder_id->setValue($stakeholder->getPkId());
        $this->view->form = $form;
    }

    /**
     * ajaxManufacturerEdit
     */
    public function ajaxManufacturerEditAction() {
        $this->_helper->layout->disableLayout();
        $stakeholder = $this->_em->find('Stakeholders', $this->_request->getParam('stakeholder_id'));
        $form = new Form_Iadmin_Manufacturer();
        $form->manufacturer->setValue($stakeholder->getStakeholderName());

        $form->sector->setValue($stakeholder->getStakeholderSector()->getPkId());
        $form->stakeholder_id->setValue($stakeholder->getPkId());
        $this->view->form = $form;
    }

    /**
     * ajaxStakeholderActivityEdit
     */
    public function ajaxStakeholderActivityEditAction() {
        $this->_helper->layout->disableLayout();
        $stakeholder = $this->_em->find('StakeholderActivities', $this->_request->getParam('stakeholder_activity_id'));
        $form = new Form_Iadmin_Stakeholders();
        $form->stakeholder_activity->setValue($stakeholder->getActivity());

        $form->stakeholder_activity_id->setValue($stakeholder->getPkId());
        $this->view->form = $form;
    }

    /**
     * ajaxStakeholderTypeEdit
     */
    public function ajaxStakeholderTypeEditAction() {
        $this->_helper->layout->disableLayout();
        $stakeholder = $this->_em->find('StakeholderTypes', $this->_request->getParam('stakeholder_type_id'));
        $form = new Form_Iadmin_Stakeholders();
        $form->stakeholder_type->setValue($stakeholder->getStakeholderTypeName());

        $form->stakeholder_type_id->setValue($stakeholder->getPkId());
        $this->view->form = $form;
    }

    /**
     * ajaxStakeholderSectorEdit
     */
    public function ajaxStakeholderSectorEditAction() {
        $this->_helper->layout->disableLayout();
        $stakeholder = $this->_em->find('StakeholderSectors', $this->_request->getParam('stakeholder_sector_id'));
        $form = new Form_Iadmin_Stakeholders();
        $form->stakeholder_sector->setValue($stakeholder->getStakeholderSectorName());

        $form->stakeholder_sector_id->setValue($stakeholder->getPkId());
        $this->view->form = $form;
    }

    /**
     * ajaxChangeStatus
     */
    public function ajaxChangeStatusAction() {
        $this->_helper->layout->disableLayout();
        $row = $this->_em->getRepository("CcmAssetTypes")->find($this->_request->getParam('id'));
        if ($this->_request->getParam('ajaxaction') == 'active') {
            $row->setStatus('1');
        } else if ($this->_request->getParam('ajaxaction') == 'deactive') {
            $row->setStatus('0');
        }

        $created_by = $this->_em->find('Users', $this->_user_id);
        $row->setModifiedBy($created_by);
        $row->setModifiedDate(App_Tools_Time::now());
        $this->_em->persist($row);
        $this->_em->flush();
        $this->view->ajaxaction = $this->_request->getParam('ajaxaction');
    }

    /**
     * Update Stakeholder
     */
    public function updateStakeholderAction() {
        if ($this->_request->getPost()) {
            $form_values = $this->_request->getPost();
            $stakeholder = $this->_em->getRepository("Stakeholders")->find($form_values['stakeholder_id']);
            $stakeholder->setStakeholderName($form_values['stakeholder_name']);
            $stakeholder->setListRank('1');
            $parent_id = $this->_em->getRepository('Stakeholders')->find($form_values['geo_level']);
            $stakeholder->setParent($parent_id);
            $geo_level_id = $this->_em->getRepository('GeoLevels')->find($form_values['geo_level']);
            $stakeholder->setGeoLevel($geo_level_id);

            $stakeholder_sector = $this->_em->getRepository('StakeholderSectors')->find($form_values['sector']);
            $stakeholder->setStakeholderSector($stakeholder_sector);
            $stakeholder_type = $this->_em->getRepository('StakeholderTypes')->find('1');
            $stakeholder->setStakeholderType($stakeholder_type);
            $stakeholder_activity = $this->_em->getRepository('StakeholderActivities')->find($form_values['activity']);
            $stakeholder->setStakeholderActivity($stakeholder_activity);

            $created_by = $this->_em->find('Users', $this->_user_id);
            $stakeholder->setModifiedBy($created_by);
            $stakeholder->setModifiedDate(App_Tools_Time::now());
            $this->_em->persist($stakeholder);
            $this->_em->flush();
        }
        $this->_redirect("/iadmin/manage-stakeholders/stakeholders");
    }

    /**
     * Update Stakeholder Activity
     */
    public function updateStakeholderActivityAction() {
        if ($this->_request->getPost()) {
            $form_values = $this->_request->getPost();
            $stakeholder_activity = $this->_em->getRepository("StakeholderActivities")->find($form_values['stakeholder_activity_id']);

            $stakeholder_activity->setActivity($form_values['stakeholder_activity']);

            $created_by = $this->_em->find('Users', $this->_user_id);
            $stakeholder_activity->setModifiedBy($created_by);
            $stakeholder_activity->setModifiedDate(App_Tools_Time::now());
            $this->_em->persist($stakeholder_activity);
            $this->_em->flush();
        }
        $this->_redirect("/iadmin/manage-stakeholders/stakeholder-activities");
    }

    /**
     * Update Stakeholder Type
     */
    public function updateStakeholderTypeAction() {
        if ($this->_request->getPost()) {
            $form_values = $this->_request->getPost();
            $stakeholder_type = $this->_em->getRepository("StakeholderTypes")->find($form_values['stakeholder_type_id']);

            $stakeholder_type->setStakeholderTypeName($form_values['stakeholder_type']);
            $createdBy = $this->_em->getRepository('Users')->find($this->_userid);
            $stakeholder_type->setModifiedBy($createdBy);
            $stakeholder_type->setModifiedDate(App_Tools_Time::now());
            $this->_em->persist($stakeholder_type);
            $this->_em->flush();
        }
        $this->_redirect("/iadmin/manage-stakeholders/stakeholder-types");
    }

    /**
     * Update Stakeholder Sector
     */
    public function updateStakeholderSectorAction() {
        if ($this->_request->getPost()) {
            $form_values = $this->_request->getPost();
            $stakeholder_sector = $this->_em->getRepository("StakeholderSectors")->find($form_values['stakeholder_sector_id']);

            $stakeholder_sector->setStakeholderSectorName($form_values['stakeholder_sector']);
            $createdBy = $this->_em->getRepository('Users')->find($this->_userid);
            $stakeholder_sector->setModifiedBy($createdBy);
            $this->_em->persist($stakeholder_sector);
            $this->_em->flush();
        }
        $this->_redirect("/iadmin/manage-stakeholders/stakeholder-sectors");
    }

    /**
     * Update Office
     */
    public function updateOfficeAction() {
        if ($this->_request->getPost()) {
            $form_values = $this->_request->getPost();
            $stakeholder = $this->_em->getRepository("Stakeholders")->find($form_values['stakeholder_id']);
            $main_stk = $this->_em->getRepository("Stakeholders")->find($form_values['stakeholder']);

            $stakeholder->setStakeholderName($form_values['office']);
            $stakeholder->setListRank('1');
            $parent_id = $this->_em->getRepository('Stakeholders')->find($form_values['geo_level']);
            $stakeholder->setParent($parent_id);
            $geo_level_id = $this->_em->getRepository('GeoLevels')->find($form_values['geo_level']);
            $stakeholder->setGeoLevel($geo_level_id);

            $stakeholder_sector = $this->_em->getRepository('StakeholderSectors')->find($main_stk->getStakeholderSector()->getPkId());
            $stakeholder->setStakeholderSector($stakeholder_sector);
            $stakeholder_type = $this->_em->getRepository('StakeholderTypes')->find('1');
            $stakeholder->setStakeholderType($stakeholder_type);
            $stakeholder_activity = $this->_em->getRepository('StakeholderActivities')->find($main_stk->getStakeholderActivity()->getPkId());
            $stakeholder->setStakeholderActivity($stakeholder_activity);
            $main_stakeholder = $this->_em->getRepository('Stakeholders')->find($form_values['stakeholder']);
            $stakeholder->setMainStakeholder($main_stakeholder);

            $created_by = $this->_em->find('Users', $this->_user_id);
            $stakeholder->setModifiedBy($created_by);
            $stakeholder->setModifiedDate(App_Tools_Time::now());
            $this->_em->persist($stakeholder);
            $this->_em->flush();
        }
        $this->_redirect("/iadmin/manage-stakeholders/office");
    }

    /**
     * Update Manufacturer
     */
    public function updateManufacturerAction() {
        if ($this->_request->getPost()) {
            $form_values = $this->_request->getPost();
            $stakeholder = $this->_em->getRepository("Stakeholders")->find($form_values['stakeholder_id']);
            $stakeholder->setStakeholderName($form_values['manufacturer']);
            $stakeholder->setListRank('1');
            $parent_id = $this->_em->getRepository('Stakeholders')->find('1');
            $stakeholder->setParent($parent_id);
            $geo_level_id = $this->_em->getRepository('GeoLevels')->find('1');
            $stakeholder->setGeoLevel($geo_level_id);

            $stakeholder_sector = $this->_em->getRepository('StakeholderSectors')->find($form_values['sector']);
            $stakeholder->setStakeholderSector($stakeholder_sector);
            $stakeholder_type = $this->_em->getRepository('StakeholderTypes')->find(Model_Stakeholders::TYPE_MANUFACTURER);
            $stakeholder->setStakeholderType($stakeholder_type);
            $stakeholder_activity = $this->_em->getRepository('StakeholderActivities')->find('1');
            $stakeholder->setStakeholderActivity($stakeholder_activity);
            $main_stakeholder = $this->_em->getRepository('Stakeholders')->find(1);
            $stakeholder->setMainStakeholder($main_stakeholder);
            $created_by = $this->_em->find('Users', $this->_user_id);
            $stakeholder->setModifiedBy($created_by);
            $stakeholder->setModifiedDate(App_Tools_Time::now());
            $this->_em->persist($stakeholder);
            $this->_em->flush();
        }
        $this->_redirect("/iadmin/manage-stakeholders/manufacturer");
    }

    /**
     * Check Stakeholder
     */
    public function checkStakeholderAction() {

        $this->_helper->layout->disableLayout();
        $form_values = $this->_request->getPost();

        $stakeholders = new Model_Stakeholders();
        $stakeholders->form_values = $form_values;
        $result = $stakeholders->checkStakeholders();
        $this->view->result = $result;
    }

    /**
     * Check Office
     */
    public function checkOfficeAction() {

        $this->_helper->layout->disableLayout();
        $form_values = $this->_request->getPost();

        $stakeholders = new Model_Stakeholders();
        $stakeholders->form_values = $form_values;
        $result = $stakeholders->checkOffice();
        $this->view->result = $result;
    }

    /**
     * Check Manufacturer
     */
    public function checkManufacturerAction() {

        $this->_helper->layout->disableLayout();
        $form_values = $this->_request->getPost();

        $stakeholders = new Model_Stakeholders();
        $stakeholders->form_values = $form_values;
        $result = $stakeholders->checkManufacturerAdmin();
        $this->view->result = $result;
    }

    /**
     * Check Stakeholder Activity
     */
    public function checkStakeholderActivityAction() {
        $this->_helper->layout->disableLayout();
        $form_values = $this->_request->stakeholder_activity;

        $stakeholders = new Model_Stakeholders();
        $stakeholders->form_values = $form_values;
        $result = $stakeholders->checkStakeholderActivity();
        $this->view->result = $result;
    }

    /**
     * Check Stakeholder Activity
     */
    public function checkStakeholderTypeAction() {
        $this->_helper->layout->disableLayout();
        $form_values = $this->_request->stakeholder_type;

        $stakeholders = new Model_Stakeholders();
        $stakeholders->form_values = $form_values;
        $result = $stakeholders->checkStakeholderType();
        $this->view->result = $result;
    }

    /**
     * Check Stakeholder Sector
     */
    public function checkStakeholderSectorAction() {
        $this->_helper->layout->disableLayout();
        $form_values = $this->_request->stakeholder_sector;

        $stakeholders = new Model_Stakeholders();
        $stakeholders->form_values = $form_values;
        $result = $stakeholders->checkStakeholderSector();
        $this->view->result = $result;
    }

    /**
     * Stakeholder Items
     */
    public function stakeholderItemsAction() {

        $form = new Form_Iadmin_StakeholderItem;

        if ($this->_request->isPost()) {
            $form_values = $this->_request->getPost();

            $stakeholder_id = $form_values['stakeholder'];

            $stakeholders = new Model_Stakeholders();
            $stakeholder_item_id = $this->_em->getRepository("StakeholderItemPackSizes")->findBy(array('stakeholder' => $stakeholder_id));

            foreach ($stakeholder_item_id as $stakeholder_id_a) {
                $stk_id = $this->_em->find('StakeholderItemPackSizes', $stakeholder_id_a->getPkId());
                $this->_em->remove($stk_id);
                $this->_em->flush();
            }

            foreach ($form_values['items'] as $stakeholderItemId) {

                $stakeholder_items = new StakeholderItemPackSizes();
                $item_pack_size_id = $this->_em->find('ItemPackSizes', $stakeholderItemId);
                $stakeholder_items->setItemPackSize($item_pack_size_id);
                $stakeholders = $this->_em->find('Stakeholders', $stakeholder_id);

                $stakeholder_items->setStakeholder($stakeholders);

                $created_by = $this->_em->find('Users', $this->_user_id);
                $stakeholder_items->setModifiedBy($created_by);
                $stakeholder_items->setModifiedDate(App_Tools_Time::now());
                $this->_em->persist($stakeholder_items);
                $this->_em->flush();
            }
            $this->_redirect("/iadmin/manage-stakeholders/stakeholder-items?e=1");
        }

        $this->view->form = $form;
    }

    /**
     * ajaxGetItems
     */
    public function ajaxGetItemsAction() {
        $this->_helper->layout->setLayout("ajax");

        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/iadmin/manage-stakeholders/ajax-get-items.js');

        $this->view->inlineScript()->appendFile($base_url . '/js/jquery.multi-select.min.js');
        $this->view->headLink()->appendStylesheet($base_url . '/common/theme/css/select.css');
        $this->view->headLink()->appendStylesheet($base_url . '/common/theme/css/multiselect.css');

        $this->view->inlineScript()->appendFile($base_url . '/js/select2.min.js');
        if (isset($this->_request->stakeholder_id) && !empty($this->_request->stakeholder_id)) {

            $item_pack_sizes = new Model_ItemPackSizes();
            $item_pack_sizes->form_values['stakeholder_id'] = $this->_request->stakeholder_id;
            $array = $item_pack_sizes->getAllItemsForClusterByStakeholder();
            $this->view->data = $array;
        }

        $item_pack_sizes = new Model_ItemPackSizes();
        $array_1 = $item_pack_sizes->getAllItemsForCluster();
        $this->view->data_district = $array_1;
    }

}
