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
* Controller for Click Paths
*/

class ClickPathsController extends App_Controller_Base {


    public function saveUserPathAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        
        // Save path code here
    }

}
