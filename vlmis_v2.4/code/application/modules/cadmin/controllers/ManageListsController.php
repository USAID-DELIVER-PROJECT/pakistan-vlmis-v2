<?php

class Cadmin_ManageListsController extends App_Controller_Base {

    public function init() {
        parent::init();
    }

    public function indexAction() {
        $form = new Form_Cadmin_ListSearch();
        $form_add = new Form_Cadmin_List();
        $params = array();

        $list_detail = new Model_ListDetail();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $list_master = $form->getValue('list_master');
                $list_value = $form->getValue('list_value');

                if (!empty($list_master)) {
                    $params['listMaster'] = $list_master;
                }
                if (!empty($list_value)) {
                    $params['listValue'] = $list_value;
                }
            }
            $form->list_master->setValue($list_master);
            $form->list_value->setValue($list_value);
        } else {
            $list_master = $this->_getParam('list_master');
            $list_value = $this->_getParam('list_value');

            if (!empty($list_master)) {
                $params['listMaster'] = $list_master;
            }

            $form->list_master->setValue($list_master);
            if (!empty($list_value)) {
                $params['listValue'] = $list_value;
                $form->list_value->setValue($list_value);
            }
        }

        $sort = $this->_getParam("sort", "asc");
        $order = $this->_getParam("order", "list_value");
        $list_detail->form_values = $params;
        $result = $list_detail->getListDetail($order, $sort);

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
        $this->view->pagination_params = $params;
    }

    public function addAction() {

        $form = new Form_Cadmin_List;

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {

                $listValue = new ListDetail();
                $master_id = $this->_em->find('ListMaster', $form->list_master->getValue());
                $listValue->setListMaster($master_id);
                $listValue->setListValue($form->list_value->getValue());
                $listValue->setDescription($form->description->getValue());
                $user_id = $this->_em->find('Users', $this->_userid);
                $listValue->setCreatedBy($user_id);
                $listValue->setCreatedDate(new \DateTime());
                $this->_em->persist($listValue);
                $this->_em->flush();
            }
        }
        $this->_redirect("/cadmin/manage-lists");
    }

    public function updateAction() {
        $form = new Form_Cadmin_List;

        if ($this->_request->isPost()) {
            if ($this->_request->getPost()) {
$form_values = $this->_request->getPost();
                $list_id = $this->_em->find('ListDetail', $form_values['id']);
               

                $list_id->setListValue($form_values['list_value']);
                $list_id->setDescription($form_values['description']);

                $this->_em->persist($list_id);
                $this->_em->flush();
            }
        }

        $this->_redirect("/cadmin/manage-lists");
    }

    public function ajaxEditAction() {
        $this->_helper->layout->disableLayout();
        $item_id = $this->_request->getParam('user_id', '');

        $list = $this->_em->find('ListDetail', $item_id);

        $form = new Form_Cadmin_List();
        $form->addFields();
        $form->addHidden();

        $form->list_master->setValue($list->getListMaster()->getPkId());
        $form->id->setValue($list->getPkId());
        $form->list_value->setValue($list->getListValue());
        $form->description->setValue($list->getDescription());

        $this->view->form = $form;
    }

    public function deleteAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);

        $item_id = $this->_request->getParam('user_id', '');
        $list = $this->_em->find('ListDetail', $item_id);
        $this->_em->remove($list);

        return $this->_em->flush();
    }

}
