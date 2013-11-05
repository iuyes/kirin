<?php
class Home_CompanyController extends Home_HomeController {
    
    public function indexAction() {
        $this->view->var['menu_type'] = 4;
        $dao = new ADImgDao();
        $re = $dao->get(array(
            'ad_img_status' => 0, 
            'ad_img_location' => $this->getParam($_GET, 'location', 0),
            'ad_img_type' => ADImgConfig::COMPANY
        ), 0, 1, 'ad_img_add_at desc');

        $this->view->var['ad_img'] = $re['list'][0];
        $this->view->displayTpl();
    }
}
