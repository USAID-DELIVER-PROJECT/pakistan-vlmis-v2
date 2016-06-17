<?php

/**
 * ClickPathsController
 *
 * 
 *
 * @subpackage Default
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */

/**
 * This Controller Manages Click Paths
 */
class ClickPathsController extends App_Controller_Base {

    public function saveUserPathAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);

        // Save path code here
    }

    /**
     * Get user path statistics
     */
    public function userPathAction() {

        $user_click_paths = new Model_UserClickPaths();

        $daily_users_count = $user_click_paths->getDailyActiveUsers();
        $weekly_users_count = $user_click_paths->getWeeklyActiveUsers();
        $monthly_users_count = $user_click_paths->getMonthlyActiveUsers();

        $user_page_count = $user_click_paths->getPageCountForActiveRoles();
        
        if($this->_request->isPost()){
            $from_date = $this->_request->getPost('date_from');
            $from_to = $this->_request->getPost('date_to');
        } else {
            $from_date = '01/01/'.date("Y");
            $from_to = date("d/m/Y");
        }
        
        $user_click_paths->form_values = array(
            'role_id' => 1,
            'date_from' => $from_date,
            'date_to' => $from_to
        );
        $pages_for_role = $user_click_paths->getPagesForRole();

        $this->view->daily_users_count = $daily_users_count;
        $this->view->weekly_users_count = $weekly_users_count;
        $this->view->monthly_users_count = $monthly_users_count;

        $this->view->user_page_count = $user_page_count;
        $this->view->pages_for_role = $pages_for_role;
        
        $this->view->date_from = $from_date;
        $this->view->date_to = $from_to;
        $this->view->role_name = $this->_identity->getRoleName(1);
        // Generating XML for chart 
        $xmlstore = "<chart exportEnabled='1' exportAction='Download' caption=' Page count per role' subcaption='' exportFileName=' " . date('Y-m-d H:i:s') . "' yAxisName='Percentage' numberSuffix=''  formatNumberScale='0' >";
        foreach ($user_page_count as $row) {
            $param = $row['role_id'];
            $param2 = $row['description'];
            $xmlstore .= "<set label='" . $row['description'] . "'  value='" . $row['page_count'] . "'  link=\"JavaScript:showData('$param|$param2');\" />";
            //$xmlstore .= "<set label='Received' value='$received' link=\"JavaScript:showData('$param|1');\" />";
        }
        $xmlstore .="</chart>";
        $this->view->xmlstore = $xmlstore;

        // Generating XML for chart 
        $xmlstore2 = "<chart exportEnabled='1' exportAction='Download' caption=' Pages for Admin' subcaption='' exportFileName=' " . date('Y-m-d H:i:s') . "' yAxisName='Percentage' numberSuffix=''  formatNumberScale='0' >";
        foreach ($pages_for_role as $row2) {
            $page_description = $row2['page_description'];
            $page_description =  str_replace("&nbsp;","",$page_description);
            $page_description =  str_replace("&","&#38;",$page_description);
            $page_description =  str_replace("--","",$page_description);
            $xmlstore2 .= "<set label='$page_description'  value='" . $row2['page_count'] . "' />";
        }
        $xmlstore2 .="</chart>";
        $this->view->xmlstore2 = $xmlstore2;
    }

    public function ajaxUserPathAction() {
        $this->_helper->layout->disableLayout();
        
        $param_arr = explode('|', $this->_request->getParam('param'));
        $role_id = $param_arr[0];
        $role_description = $param_arr[1];
        $from_date = $this->_request->getParam('from');
        $from_to = $this->_request->getParam('to');

        $user_click_paths = new Model_UserClickPaths();
        $user_click_paths->form_values = array(
            'role_id' => $role_id,
            'date_from' => $from_date,
            'date_to' => $from_to
        );
        $pages_for_role = $user_click_paths->getPagesForRole();

        // Generating XML for chart 
        $xmlstore2 = "<chart exportEnabled='1' exportAction='Download' caption=' Pages for $role_description ' subcaption='' exportFileName=' " . date('Y-m-d H:i:s') . "' yAxisName='Percentage' numberSuffix=''  formatNumberScale='0' >";
        foreach ($pages_for_role as $row2) {
            $page_description = $row2['page_description'];
            $page_description =  str_replace("&nbsp;","",$page_description);
            $page_description =  str_replace("&","&#38;",$page_description);
            $page_description =  str_replace("--","",$page_description);
            $xmlstore2 .= "<set label='$page_description'  value='" . $row2['page_count'] . "' />";
        }
        $xmlstore2 .="</chart>";
        $this->view->xmlstore2 = $xmlstore2;
        $this->view->role_name = $this->_identity->getRoleName($role_id);
    }

}
