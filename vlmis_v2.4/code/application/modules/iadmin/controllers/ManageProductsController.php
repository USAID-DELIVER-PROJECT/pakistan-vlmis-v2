<?php

class Iadmin_ManageProductsController extends App_Controller_Base {

    public function init() {
        parent::init();
    }

    public function productsAction() {
        $form = new Form_Iadmin_Products();

        $item_pack_size = new Model_ItemPackSizes();
        $params = array();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $item_name = $form->getValue('item_name');
                $item_category = $form->getValue('item_category');
                $item_unit = $form->getValue('item_unit');
                $item = $form->getValue('item');
                if (!empty($item_name)) {
                    $item_pack_size->form_values['item_name'] = $item_name;
                    $params['item_name'] = $item_name;
                }
                if (!empty($item_category)) {
                    $item_pack_size->form_values['item_category'] = $item_category;
                    $params['item_category'] = $item_category;
                }
                if (!empty($item_unit)) {
                    $item_pack_size->form_values['item_unit'] = $item_unit;
                    $params['item_unit'] = $item_unit;
                }
                if (!empty($item)) {
                    $item_pack_size->form_values['item'] = $item;
                    $params['item'] = $item_unit;
                }
            }
            $form->item_name->setValue($item_name);
            $form->item_category->setValue($item_category);
            $form->item_unit->setValue($item_unit);
            $form->item->setValue($item);
        }

        $sort = $this->_getParam("sort", "asc");
        $order = $this->_getParam("order", "stakeholder");
        $item_pack_size->form_values = $this->_request->getParams();
        $form->item_name->setValue($this->_getParam('item_name'));
        $form->item_category->setValue($this->_getParam('item_category'));
        $form->item_unit->setValue($this->_getParam('item_unit'));
        $form->item->setValue($this->_getParam('item'));

        $result = $item_pack_size->getAllProducts();

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
        $this->view->pagination_params = $params;
    }

    public function itemCategoriesAction() {
        $form = new Form_Iadmin_Products();

        $item_category = new Model_ItemCategories();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $item_category_name = $form->getValue('item_category_name');

                if (!empty($item_category_name)) {
                    $item_category->form_values['item_category_name'] = $item_category_name;
                }
            }
            $form->item_category_name->setValue($item_category_name);
        }

        $sort = $this->_getParam("sort", "asc");
        $order = $this->_getParam("order", "stakeholder");

        $result = $item_category->getItemCategories();

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

    public function itemUnitsAction() {
        $form = new Form_Iadmin_Products();

        $item_units = new Model_ItemUnits();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $item_unit_name = $form->getValue('item_unit_name');

                if (!empty($item_unit_name)) {
                    $item_units->form_values['item_unit_name'] = $item_unit_name;
                }
            }
            $form->item_unit_name->setValue($item_unit_name);
        }

        $sort = $this->_getParam("sort", "asc");
        $order = $this->_getParam("order", "stakeholder");

        $result = $item_units->getItemUnits();

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

    public function itemAction() {
        $form = new Form_Iadmin_Products();

        $items = new Model_Items();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $item_description = $form->getValue('item_description');

                if (!empty($item_description)) {
                    $items->form_values['item_description'] = $item_description;
                }
            }
            $form->item_description->setValue($item_description);
        }

        $sort = $this->_getParam("sort", "asc");
        $order = $this->_getParam("order", "stakeholder");

        $result = $items->getAllItems();

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

    public function addProductAction() {
        $form = new Form_Iadmin_Products();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {

                $item_pack_size = new ItemPackSizes();
                $item_pack_size->setItemName($form->item_name->getValue());
                $item_pack_size->setDescription($form->description->getValue());
                $item_pack_size->setListRank($form->list_rank->getValue());
                $item_unit = $this->_em->getRepository('ItemUnits')->find($form->item_unit->getValue());
                $item_pack_size->setItemUnit($item_unit);
                $items = $this->_em->getRepository('Items')->find($form->item->getValue());
                $item_pack_size->setItem($items);

                $item_category = $this->_em->getRepository('ItemCategories')->find($form->item_category->getValue());
                $item_pack_size->setItemCategory($item_category);
                if ($form->item_category->getValue() == '1') {

                    $item_pack_size->setNumberOfDoses($form->number_of_doses->getValue());
                }

                $this->_em->persist($item_pack_size);
                $this->_em->flush();
            }
        }
        $this->_redirect("/iadmin/manage-products/products");
    }

    public function addItemCategoryAction() {
        $form = new Form_Iadmin_Products();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {

                $item_category = new ItemCategories();
                $item_category->setItemCategoryName($form->item_category_name->getValue());
                $createdBy = $this->_em->getRepository('Users')->find($this->_userid);
                $item_category->setCreatedBy($createdBy);
                $modifiedBy = $this->_em->getRepository('Users')->find($this->_userid);
                $item_category->setModifiedBy($modifiedBy);
                $this->_em->persist($item_category);
                $this->_em->flush();
            }
        }
        $this->_redirect("/iadmin/manage-products/item-categories");
    }

    public function updateItemCategoryAction() {
        $form = new Form_Iadmin_Products();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $form_values = $this->_request->getPost();
                $item_category = $this->_em->getRepository("ItemCategories")->find($form_values['item_category_id']);

                $item_category->setItemCategoryName($form_values['item_category_name']);

                $modifiedBy = $this->_em->getRepository('Users')->find($this->_userid);
                $item_category->setModifiedBy($modifiedBy);
                $this->_em->persist($item_category);
                $this->_em->flush();
            }
        }
        $this->_redirect("/iadmin/manage-products/item-categories");
    }

//    public function addItemUnitAction() {
//        $form = new Form_Iadmin_Products();
//
//        if ($this->_request->isPost()) {
//            if ($form->isValid($this->_request->getPost())) {
//
//                $item_units = new ItemUnits();
//                $item_units->setItemUnitName($form->item_unit_name->getValue());
//                $createdBy = $this->_em->getRepository('Users')->find($this->_userid);
//                $item_units->setCreatedBy($createdBy);
//                $modifiedBy = $this->_em->getRepository('Users')->find($this->_userid);
//                $item_units->setModifiedBy($modifiedBy);
//                $this->_em->persist($item_units);
//                $this->_em->flush();
//            }
//        }
//        $this->_redirect("/iadmin/manage-products/item-units");
//    }
//
//    public function updateItemUnitAction() {
//        $form = new Form_Iadmin_Products();
//
//        if ($this->_request->isPost()) {
//            if ($form->isValid($this->_request->getPost())) {
//                $form_values = $this->_request->getPost();
//                $item_units = $this->_em->getRepository("ItemUnits")->find($form_values['item_unit_id']);
//
//                $item_units->setItemUnitName($form_values['item_unit_name']);
//
//                $modifiedBy = $this->_em->getRepository('Users')->find($this->_userid);
//                $item_units->setModifiedBy($modifiedBy);
//                $this->_em->persist($item_units);
//                $this->_em->flush();
//            }
//        }
//        $this->_redirect("/iadmin/manage-products/item-units");
//    }
    public function addItemUnitAction() {
        $form = new Form_Iadmin_Products();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {

                $items = new ItemUnits();
                $items->setItemUnitName($form->item_unit_name->getValue());
                $items->setStatus('1');
                $createdBy = $this->_em->getRepository('Users')->find($this->_userid);
                $items->setCreatedBy($createdBy);
                $modifiedBy = $this->_em->getRepository('Users')->find($this->_userid);
                $items->setModifiedBy($modifiedBy);
                $this->_em->persist($items);
                $this->_em->flush();
            }
        }
        $this->_redirect("/iadmin/manage-products/item-units");
    }

    public function updateItemUnitAction() {
        $form = new Form_Iadmin_Products();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $form_values = $this->_request->getPost();
                $items = $this->_em->getRepository("ItemUnits")->find($form_values['item_unit_id']);

                $items->setItemUnitName($form->item_unit_name->getValue());

                $modifiedBy = $this->_em->getRepository('Users')->find($this->_userid);
                $items->setModifiedBy($modifiedBy);
                $this->_em->persist($items);
                $this->_em->flush();
            }
        }
        $this->_redirect("/iadmin/manage-products/item-units");
    }

    public function addItemAction() {
        $form = new Form_Iadmin_Products();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {

                $items = new Items();
                $items->setDescription($form->item_description->getValue());
                $createdBy = $this->_em->getRepository('Users')->find($this->_userid);
                $items->setCreatedBy($createdBy);
                $modifiedBy = $this->_em->getRepository('Users')->find($this->_userid);
                $items->setModifiedBy($modifiedBy);
                $this->_em->persist($items);
                $this->_em->flush();
            }
        }
        $this->_redirect("/iadmin/manage-products/item");
    }

    public function updateItemAction() {
        $form = new Form_Iadmin_Products();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $form_values = $this->_request->getPost();
                $items = $this->_em->getRepository("Items")->find($form_values['item_group_id']);

                $items->setDescription($form_values['item_description']);

                $modifiedBy = $this->_em->getRepository('Users')->find($this->_userid);
                $items->setModifiedBy($modifiedBy);
                $this->_em->persist($items);
                $this->_em->flush();
            }
        }
        $this->_redirect("/iadmin/manage-products/item");
    }

    public function ajaxProductEditAction() {
        $this->_helper->layout->setLayout("ajax");

        $item = $this->_em->find('ItemPackSizes', $this->_request->getParam('item_id'));
        $form = new Form_Iadmin_Products();
        $form->item_name->setValue($item->getItemName());
        $form->list_rank->setValue($item->getListRank());
        $form->item_unit->setValue($item->getItemUnit()->getPkId());
        $form->item_category->setValue($item->getItemCategory()->getPkId());
        $form->description->setValue($item->getDescription());
        $form->item->setValue($item->getItem()->getPkId());
        $form->item_id->setValue($item->getPkId());
        if ($item->getItemCategory()->getPkId() == 1 || $item->getItemCategory()->getPkId() == 4) {
            $form->number_of_doses->setValue($item->getNumberOfDoses());
        }
        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/iadmin/manage-products/ajax-products.js');
        $this->view->form = $form;
    }

    public function ajaxItemCategoriesEditAction() {
        $this->_helper->layout->disableLayout();
        $item_category = $this->_em->find('ItemCategories', $this->_request->getParam('item_category_id'));
        $form = new Form_Iadmin_Products();
        $form->item_category_name->setValue($item_category->getItemCategoryName());

        $form->item_category_id->setValue($item_category->getPkId());
        $this->view->form = $form;
    }

    public function ajaxItemUnitsEditAction() {
        $this->_helper->layout->disableLayout();
        $item_unit = $this->_em->find('ItemUnits', $this->_request->getParam('item_unit_id'));
        $form = new Form_Iadmin_Products();
        $form->item_unit_name->setValue($item_unit->getItemUnitName());

        $form->item_unit_id->setValue($item_unit->getPkId());
        $this->view->form = $form;
    }

    public function ajaxItemEditAction() {
        $this->_helper->layout->disableLayout();
        $item_group = $this->_em->find('Items', $this->_request->getParam('item_id'));
        $form = new Form_Iadmin_Products();
        $form->item_description->setValue($item_group->getDescription());

        $form->item_group_id->setValue($item_group->getPkId());
        $this->view->form = $form;
    }

    public function updateProductAction() {
        if ($this->_request->getPost()) {
            $form_values = $this->_request->getPost();
            $item_pack_size = $this->_em->getRepository("ItemPackSizes")->find($form_values['item_id']);
            $item_pack_size->setItemName($form_values['item_name']);
            $item_pack_size->setDescription($form_values['description']);
            $item_pack_size->setListRank($form_values['list_rank']);
            $item_unit = $this->_em->getRepository('ItemUnits')->find($form_values['item_unit']);
            $item_pack_size->setItemUnit($item_unit);
            $items = $this->_em->getRepository('Items')->find($form_values['item']);
            $item_pack_size->setItem($items);

            $item_category = $this->_em->getRepository('ItemCategories')->find($form_values['item_category']);
            $item_pack_size->setItemCategory($item_category);
            if ($form_values['item_category'] == '1') {
                $item_pack_size->setNumberOfDoses($form_values['number_of_doses']);
            }

            $this->_em->persist($item_pack_size);
            $this->_em->flush();
        }
        $this->_redirect("/iadmin/manage-products/products");
    }

    public function checkProductAction() {

        $this->_helper->layout->disableLayout();

        $form_values = $this->_request->getPost();

        $item_pack_sizes = new Model_ItemPackSizes();
        $item_pack_sizes->form_values = $form_values;
        $result = $item_pack_sizes->checkProducts();
        $this->view->result = $result;
    }

    public function checkItemAction() {

        $this->_helper->layout->disableLayout();

        $form_values = $this->_request->item_description;

        $items = new Model_Items();
        $items->form_values = $form_values;
        $result = $items->checkItem();
        $this->view->result = $result;
    }

    public function checkItemUnitAction() {

        $this->_helper->layout->disableLayout();

        $form_values = $this->_request->item_unit_name;

        $items = new Model_ItemUnits();
        $items->form_values = $form_values;
        $result = $items->checkItemUnit();
        $this->view->result = $result;
    }

    public function checkItemCategoryAction() {

        $this->_helper->layout->disableLayout();

        $form_values = $this->_request->item_category_name;

        $items = new Model_ItemCategories();
        $items->form_values = $form_values;
        $result = $items->checkItemCategory();
        $this->view->result = $result;
    }

    public function vvmTypeAction() {
        $form = new Form_Iadmin_VvmTypeSearch();
        $form_add = new Form_Iadmin_VvmTypeAdd();

        $vvm_type = new Model_VvmTypes();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                //App_Controller_Functions::pr($this->_request->getPost());
                $vvm_type_name = $form->getValue('vvm_type_name');
                $status = $form->getValue('status');

                if (!empty($vvm_type_name)) {
                    $vvm_type->form_values['vvmTypeName'] = $vvm_type_name;
                }
                if (!empty($status)) {
                    $vvm_type->form_values['status'] = $status;
                }
            }
            $form->vvm_type_name->setValue($vvm_type_name);
            $form->status->setValue($status);
        }

        $sort = $this->_getParam("sort", "asc");
        $order = $this->_getParam("order", "vvm_type_name");

        $result = $vvm_type->getAllVvmTypes($order, $sort);

        $paginator = false;

        if ($result != false) {
            //Paginate the contest results
            $paginator = Zend_Paginator::factory($result);
            $page = $this->_getParam("page", 1);
            $counter = $this->_getParam("counter", 10);
            $paginator->setCurrentPageNumber((int) $page);
            $paginator->setItemCountPerPage((int) $counter);
        }

        $this->view->form = $form;
        $this->view->form_add = $form_add;
        $this->view->paginator = $paginator;
        $this->view->sort = $sort;
        $this->view->order = $order;
        $this->view->counter = $counter;

        $base_url = Zend_Registry::get('baseurl');
        $this->view->inlineScript()->appendFile($base_url . '/js/all_level_combos.js');
    }

    public function addVvmTypeAction() {
        $form = new Form_Iadmin_VvmTypeAdd();

        if ($this->_request->isPost()) {
            if ($this->_request->getPost()) {

                $form_values = $this->_request->getPost();


                $vvm_type = new VvmTypes();
                $vvm_type->setVvmTypeName($form_values['vvm_type_name']);


                $item_pack = $this->_em->getRepository('ItemPackSizes')->find($form_values['item_pack_size_id']);
                $vvm_type->setItemPackSize($item_pack);


                $vvm_type->setStatus($form_values['status']);
                $created_by = $this->_em->find('Users', $this->_userid);
                $vvm_type->setCreatedBy($created_by);
                $vvm_type->setModifiedBy($created_by);
                $vvm_type->setCreatedDate(new \DateTime());
                $vvm_type->setModifiedDate(new \DateTime());
                $this->_em->persist($vvm_type);

                $this->_em->flush();
            }
        }
        $this->_redirect("/iadmin/manage-products/vvm-type?success=1");
    }

    public function ajaxEditAction() {
        $this->_helper->layout->disableLayout();
        $vvm_type_id = $this->_request->getParam('vvm_type_id', '');

        $vvmType = $this->_em->find('VvmTypes', $vvm_type_id);
        $form = new Form_Iadmin_VvmTypeAdd();

        $form->vvm_type_name->setValue($vvmType->getVvmTypeName());
        $form->item_pack_size_id->setValue($vvmType->getItemPackSize()->getPkId());

        $form->vvm_type_id->setValue($vvmType->getPkId());
        $this->view->form = $form;
    }

    public function updateVvmTypeAction() {

        if ($this->_request->getPost()) {
            $form_values = $this->_request->getPost();
            $vvmType = $this->_em->getRepository("VvmTypes")->find($form_values['vvm_type_id']);
            $vvmType->setVvmTypeName($form_values['vvm_type_name']);

            $item_pack = $this->_em->getRepository('ItemPackSizes')->find($form_values['item_pack_size_id']);
            $vvmType->setItemPackSize($item_pack);


            $created_by = $this->_em->find('Users', $this->_userid);
            $vvmType->setModifiedBy($created_by);
            $vvmType->setModifiedDate(new \DateTime());

            $this->_em->persist($vvmType);
            $this->_em->flush();
        }
        $this->_redirect("/iadmin/manage-products/vvm-type?success=2");
    }

    public function ajaxChangeStatusAction() {
        $this->_helper->layout->disableLayout();
        $row = $this->_em->getRepository("VvmTypes")->find($this->_request->getParam('id'));
        if ($this->_request->getParam('ajaxaction') == 'active') {
            $row->setStatus('1');
        } else if ($this->_request->getParam('ajaxaction') == 'deactive') {
            $row->setStatus('0');
        }
        $this->_em->persist($row);
        $this->_em->flush();
        $this->view->ajaxaction = $this->_request->getParam('ajaxaction');
    }

    public function transactionTypeAction() {
        $form = new Form_Iadmin_TransactionTypeSearch();
        $form_add = new Form_Iadmin_TransactionTypeAdd();

        $transaction_type = new Model_TransactionTypes();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                //App_Controller_Functions::pr($this->_request->getPost());
                $transaction_type_name = $form->getValue('transaction_type_name');
                $nature = $form->getValue('nature');

                if (!empty($transaction_type_name)) {
                    $transaction_type->form_values['transactionTypeName'] = $transaction_type_name;
                }
                if (!empty($nature)) {
                    $transaction_type->form_values['nature'] = $nature;
                }
            }
            $form->transaction_type_name->setValue($transaction_type_name);
            $form->nature->setValue($nature);
        }

        $sort = $this->_getParam("sort", "asc");
        $order = $this->_getParam("order", "transaction_type_name");

        $result = $transaction_type->getAllTransactionTypes($order, $sort);

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

    public function ajaxChangeStatusNatureAction() {
        $this->_helper->layout->disableLayout();
        $row = $this->_em->getRepository("TransactionTypes")->find($this->_request->getParam('idData'));
        if ($this->_request->getParam('ajaxactionnature') == 'positive') {
            $row->setNature('+');
        } else if ($this->_request->getParam('ajaxactionnature') == 'negative') {
            $row->setNature('-');
        }
        $this->_em->persist($row);
        $this->_em->flush();
        $this->view->ajaxactionnature = $this->_request->getParam('ajaxactionnature');
    }

    public function addTransactionTypeAction() {
        $form = new Form_Iadmin_TransactionTypeAdd();

        if ($this->_request->isPost()) {
            if ($this->_request->getPost()) {

                $form_values = $this->_request->getPost();

                $transaction_type = new TransactionTypes();
                $transaction_type->setTransactionTypeName($form_values['transaction_type_name']);


                $transaction_type->setNature($form_values['nature']);
                $transaction_type->setIsAdjustment($form_values['is_adjustment']);
                $transaction_type->setStatus($form_values['status']);
                $created_by = $this->_em->find('Users', $this->_userid);
                $transaction_type->setCreatedBy($created_by);
                $transaction_type->setCreatedDate(new \DateTime());
                $this->_em->persist($transaction_type);
                $transaction_type->setModifiedBy($created_by);

                $this->_em->flush();
            }
        }
        $this->_redirect("/iadmin/manage-products/transaction-type?success=1");
    }

    public function ajaxEditTranAction() {
        $this->_helper->layout->disableLayout();
        $transaction_type_id = $this->_request->getParam('transaction_type_id', '');

        $transactionType = $this->_em->find('TransactionTypes', $transaction_type_id);
        $form = new Form_Iadmin_TransactionTypeAdd();

        $form->transaction_type_name->setValue($transactionType->getTransactionTypeName());
        //echo $transactionType->getIsAdjustment();exit;
        $form->is_adjustment->setValue($transactionType->getIsAdjustment());

        $form->transaction_type_id->setValue($transactionType->getPkId());
        $this->view->form = $form;
    }

    public function updateTransactionTypeAction() {
        // exit(var_dump($this->_request->getPost()));
        if ($this->_request->getPost()) {
            $form_values = $this->_request->getPost();
            $transactionType = $this->_em->getRepository("TransactionTypes")->find($form_values['transaction_type_id']);
            $transactionType->setTransactionTypeName($form_values['transaction_type_name']);
            if ($form_values['is_adjustment'] == 1) {
                //  echo "one".$form_values['is_adjustment'];
                $transactionType->setIsAdjustment('1');
            } else {
                // echo "zero".$form_values['is_adjustment'];
                $transactionType->setIsAdjustment('2');
            }

            $created_by = $this->_em->find('Users', $this->_userid);
            $transactionType->setModifiedBy($created_by);
            $transactionType->setModifiedDate(new \DateTime());

            $this->_em->persist($transactionType);
            $this->_em->flush();
        }
        $this->_redirect("/iadmin/manage-products/transaction-type?success=2");
    }

    public function ajaxChangeStatusTranAction() {
        $this->_helper->layout->disableLayout();
        $row = $this->_em->getRepository("TransactionTypes")->find($this->_request->getParam('id'));
        if ($this->_request->getParam('ajaxaction') == 'active') {
            $row->setStatus('1');
        } else if ($this->_request->getParam('ajaxaction') == 'deactive') {
            $row->setStatus('0');
        }
        $this->_em->persist($row);
        $this->_em->flush();
        $this->view->ajaxaction = $this->_request->getParam('ajaxaction');
    }

    public function checkVvmTypesAction() {
        $this->_helper->layout->disableLayout();

        $form_values = $this->_request->getPost();
        $vvm_types = new Model_VvmTypes();
        $vvm_types->form_values = $form_values;
        $result = $vvm_types->checkVvmTypes();
        $this->view->result = $result;
    }

}
