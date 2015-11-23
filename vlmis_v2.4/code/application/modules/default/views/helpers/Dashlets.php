<?php

class Zend_View_Helper_Dashlets extends Zend_View_Helper_Abstract {

    public function dashlets($dashboard_id = null, $role_id = null) {

        $html = '';
        $base_url = Zend_Registry::get("baseurl");

        if(empty($role_id)){
            $auth = App_Auth::getInstance();
            $role_id = $auth->getRoleId();
        }

        $role_resource = new Model_RoleResources();
        $role_resource->form_values = array('type_id' => 4, 'role_id' => $role_id, 'parent_id' => $dashboard_id);
        $dashlets = $role_resource->getRoleResourcesByTypeByParent();

        $count = 1;
        foreach ($dashlets as $row) {
            if($row->getResource()->getLevel() == 2){
                $class = "col-md-12";
            } else {
                $class = "col-md-6";
            }
            $html .= '<div class="'.$class.'">
                    <div data-toggle="collapse-widget" class="widget">
                        <div class="widget-head">
                            <h4 class="heading glyphicons cargo"><i></i>' . $row->getResource()->getDescription() . '</h4>
                        </div>
                        <div class="widget-body dashlets" id="' . $row->getResource()->getPkId() . '" href="' . $row->getResource()->getResourceName() . '">
                            <center><img src="' . $base_url . '/images/ajax-loader.gif"/></center>
                        </div>
                    </div>
                </div>';
            /*if ($count % 2 == 0) {
                $html .= '</div><br/><div class="row">';
            }
            if($row->getResource()->getLevel() == 1){
               $count++; 
            } */           
        }

        return $html;
    }

}

?>