<?php

class DocsController extends App_Controller_Base {

    public function init() {
        parent::init();
    }

    public function projectDocAction() {

        $this->_helper->layout->setLayout('doc');

        $users = new Model_Users();
        $main_categories_list = $users->getDocMainCategories();
        $this->view->main_categories_list = $main_categories_list;
    }

    /**
     * Logs download activity of Documentation User
     */
    public function ajaxDocUserLogAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);

        if ($this->_request->isPost()) {
            $form_values = $this->_request->getParams();

            $user = new Model_Users();

            //Get user id
            $u_id = $this->_userid;
            //Get document id
            $user->form_values['url'] = $form_values['url'];
            $doc_data = $user->getDocId();
            $doc_id = $doc_data[0]['pk_id'];
            //Get client ip
            $ip = $this->_request->getServer('REMOTE_ADDR');

            //Save doc user log
            $user->form_values['uid'] = $u_id;
            $user->form_values['docid'] = $doc_id;
            $user->form_values['ip'] = $ip;
            $user->docUserLog();
        }
    }

    public function docUserLogAction() {
        //$this->_helper->layout->setLayout('main');
        $users = new Model_Users();
        $doc_user_log = $users->getDocUserLog();
        $this->view->result = $doc_user_log;
    }

}
