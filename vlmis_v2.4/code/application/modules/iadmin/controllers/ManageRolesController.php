<?php

class Iadmin_ManageRolesController extends App_Controller_Base {

    public function init() {
        parent::init();
    }

    public function indexAction() {
        $form = new Form_Iadmin_RoleSearch();
        $form_add = new Form_Iadmin_Roles();
        $params = array();

        $roles = new Model_Roles();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $role_name = $form->getValue('role_name');
                $description = $form->getValue('description');

                if (!empty($role_name)) {
                    $params['roleName'] = $role_name;
                }
                if (!empty($description)) {
                    $params['description'] = $description;
                }
            }
        } else {
            $role_name = $this->_getParam('role_name');
            $description = $this->_getParam('description');

            if (!empty($role_name)) {
                $params['roleName'] = $role_name;
                $form->role_name->setValue($role_name);
            }
            if (!empty($description)) {
                $params['description'] = $description;
                $form->description->setValue($description);
            }
        }

        $sort = $this->_getParam("sort", "asc");
        $order = $this->_getParam("order", "role_name");
        $roles->form_values = $params;
        $result = $roles->getRoles($order, $sort);

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
        $form = new Form_Iadmin_Roles();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $role = new Roles();
                $role->setRoleName($form->role_name->getValue());
                $role->setDescription($form->description->getValue());
                $category_id = $this->_em->find('ListDetail', $form->category_id->getValue());
                $role->setCategory($category_id);
                $role->setStatus($form->status->getValue());
                $user_id = $this->_em->find('Users', $this->_userid);
                $role->setCreatedBy($user_id);
                $role->setCreatedDate(new \DateTime(date("Y-m-d")));
                $role->setModifiedBy($user_id);
                $role->setModifiedDate(new \DateTime(date("Y-m-d")));
                $this->_em->persist($role);
                $this->_em->flush();
            }
        }
        $this->_redirect("/iadmin/manage-roles");
    }

    public function resourcesAction() {
        $form = new Form_Iadmin_RoleComboSearch();
        $form_add = new Form_Iadmin_RoleResource();
        $params = array();

        $rr = new Model_RoleResources();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $role_name = $form->getValue('role');
                $description = $form->getValue('description');

                if (!empty($role_name)) {
                    $params['role'] = $role_name;
                }
                if (!empty($description)) {
                    $params['description'] = $description;
                }
            }
        } else {
            $role_name = $this->_getParam('role', 1);
            $description = $this->_getParam('description');

            if (!empty($role_name)) {
                $params['role'] = $role_name;
                $form->role->setValue($role_name);
            }
            if (!empty($description)) {
                $params['description'] = $description;
                $form->description->setValue($description);
            }
        }

        $form_add->role->setValue($role_name);
        $form_add->getElement('role')->setAttrib("readonly", "true");
        $sort = $this->_getParam("sort", "asc");
        $order = $this->_getParam("order", "resource_name");
        $rr->form_values = $params;
        $result = $rr->getRoleResources($order, $sort);

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

    public function addResourceAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);

        $form = new Form_Iadmin_RoleResource();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $rr = new RoleResources();
                $role_id = $this->_em->find('Roles', $form->role->getValue());
                $rr->setRole($role_id);
                $resource_id = $this->_em->find('Resources', $form->resource->getValue());
                $rr->setResource($resource_id);
                $rr->setPermission($form->permission->getValue());
                $this->_em->persist($rr);
                $this->_em->flush();
            }
        }

        $this->_redirect("/iadmin/manage-roles/resources?role=" . $form->role->getValue());
    }

    public function ajaxEditAction() {
        $this->_helper->layout->setLayout("ajax");
        $role_id = $this->_request->getParam('role_id', '');

        $role = $this->_em->find('Roles', $role_id);
        $form = new Form_Iadmin_Roles();
        $form->addHidden();
        $form->getElement('role_name')->setAttrib("readonly", "true");

        $form->role_name->setValue($role->getRoleName());
        $form->description->setValue($role->getDescription());
        $form->category_id->setValue($role->getCategory()->getPkId());
        $form->status->setValue($role->getStatus());
        $form->id->setValue($role->getPkId());

        $this->view->form = $form;
    }

    public function updateAction() {
        $form = new Form_Iadmin_Roles();
        $form->addHidden();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $role_id = $form->id->getValue();
                $role = $this->_em->getRepository("Roles")->find($role_id);
                $role->setRoleName($form->role_name->getValue());
                $role->setDescription($form->description->getValue());
                $category_id = $this->_em->find('ListDetail', $form->category_id->getValue());
                $role->setCategory($category_id);
                $role->setStatus($form->status->getValue());
                $user_id = $this->_em->find('Users', $this->_userid);
                $role->setModifiedBy($user_id);
                $role->setModifiedDate(new \DateTime(date("Y-m-d")));
                $this->_em->persist($role);
                $this->_em->flush();
            }
        }
        $this->_redirect("/iadmin/manage-roles");
    }

    public function deleteAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);

        $role_id = $this->_request->getParam("role_id");
        $role = $this->_em->getRepository("Roles")->find($role_id);
        $this->_em->remove($role);

        return $this->_em->flush();
    }

    public function deleteRoleResourceAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);

        $rr_id = $this->_request->getParam("rr_id");

        $role_resource = $this->_em->getRepository("RoleResources")->find($rr_id);
        $this->_em->remove($role_resource);

        return $this->_em->flush();
    }

    public function checkRoleAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);

        $role_name = $this->_request->getParam('role_name');
        $roles = $this->_em->getRepository("Roles")->findBy(array("roleName" => $role_name));

        if (count($roles) > 0) {
            echo "false";
        } else {
            echo "true";
        }
    }

    public function checkRoleResourceAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);

        $resource_id = $this->_request->getParam('resource_id');
        $role_id = $this->_request->getParam('role_id');

        $rr = $this->_em->getRepository("RoleResources")->findBy(array("role" => $role_id, "resource" => $resource_id));

        if (count($rr) > 0) {
            echo "false";
        } else {
            echo "true";
        }
    }

    public function roleResourcesAction() {
        $form = new Form_Iadmin_RoleComboSearch();
        $form_add = new Form_Iadmin_RoleResource();
        $params = array();

        $rr = new Model_Resources();
        $roles = new Model_Roles();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $role_name = $form->getValue('role');
                $description = $form->getValue('description');
                $resource_name = $form->getValue('resource_name');
                $resource_type = $form->getValue('resource_type');

                if (!empty($role_name)) {
                    $params['role'] = $role_name;
                }
                if (!empty($description)) {
                    $params['description'] = $description;
                }
                if (!empty($resource_name)) {
                    $params['resourceName'] = $resource_name;
                }
                if (!empty($resource_type)) {
                    $params['resourceType'] = $resource_type;
                }
            }
        } else {
            $role_name = $this->_getParam('role', '');
            $description = $this->_getParam('description');
            $resource_name = $this->_getParam('resource_name');
            $resource_type = $this->_getParam('resource_type');

            if (!empty($role_name)) {
                $params['role'] = $role_name;
                $form->role->setValue($role_name);
            }
            if (!empty($description)) {
                $params['description'] = $description;
                $form->description->setValue($description);
            }
            if (!empty($resource_name)) {
                $params['resourceName'] = $resource_name;
                $form->resource_name->setValue($resource_name);
            }
            if (!empty($resource_type)) {
                $params['resourceType'] = $resource_type;
                $form->resource_type->setValue($resource_type);
            }
        }



      //App_Controller_Functions::pr($params);
        $rr->form_values = $params;
      //  var_dump($params);
        $result = $rr->getAllResources();

        $roles->form_values['role'] = $params['role'];
        $role_result = $roles->getAllRolesResources();

        $this->view->roles = $role_result;
        $this->view->form = $form;
        $this->view->form_add = $form_add;
        $this->view->paginator = $result;
        $this->view->pagination_params = $params;
    }

    public function ajaxAddRoleResourceAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);

        $rr_id = $this->_request->getParam("role_resource_id");
        $role_resource_id = explode("-", $rr_id);
        // echo $role_resource_id[0];
        // echo $role_resource_id[1];
        // exit;

        $rr = new RoleResources();
        $role_id = $this->_em->find('Roles', $role_resource_id[1]);
        $rr->setRole($role_id);
        $resource_id = $this->_em->find('Resources', $role_resource_id[0]);
        $rr->setResource($resource_id);
        $rr->setPermission('ALLOW');
        $this->_em->persist($rr);
        $this->_em->flush();
    }

    public function ajaxDeleteRoleResourceAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);

        $rr_id = $this->_request->getParam("role_resource_id");
        $role_r_id = explode("-", $rr_id);
        // echo $role_r_id[1];
        // echo $role_r_id[0];
        // exit;
        $role_resource_tbl = $this->_em->getRepository("RoleResources")->findBy(array('role' => $role_r_id[1], 'resource' => $role_r_id[0]));

        $role_resource = $this->_em->getRepository("RoleResources")->find($role_resource_tbl[0]->getPkId());
        $this->_em->remove($role_resource);

        return $this->_em->flush();
    }

}
