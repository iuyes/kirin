<?php
class Admin_IndexController extends Admin_AdminController {
    public function __construct() {
        $this->check();
    }
    
    public function indexAction(){
        $this->view->displayTpl();
    }
}
