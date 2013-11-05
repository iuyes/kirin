<?php
class Admin_ADImgController extends Admin_AdminController {
    public function __construct() {
        $this->check();
    }

    public function addAction() {
        $this->view->var['ctg_b'] = 'adimg';
        $this->view->var['ctg_s'] = 'add';
        
        $this->view->displayTpl();
    }

    public function doAddAction() {
        $ad_img_location = $this->getParam($_POST, 'ad_img_location', 0);
        if(empty($ad_img_location)) {
            $this->goBack('请选择区域');
            exit;
        }
        $ad_img_type = $this->getParam($_POST, 'ad_img_type', 0);
        if(empty($ad_img_type)) {
            $this->goBack('请选择广告类型');
            exit;
        }
        $ad_img_des = $this->getParam($_POST, 'ad_img_des', '');
        if(empty($ad_img_des)) {
            $this->goBack('请添加广告描述');
            exit;
        }
        $ad_img_url = $this->getParam($_POST, 'ad_img_url', '');
        if(empty($ad_img_des)) {
            $this->goBack('请添加广告页面');
            exit;
        }

        if(empty($_FILES['ad_img']['name'])) {
            $this->goBack('请选择您要上传的图片');
            exit;
        }
        $img_src = UploadHelper::rawupload($_FILES['ad_img']);
    
        $dao = new ADImgDao();
        $dao->add(array(
            'ad_img_location' => $ad_img_location,
            'ad_img_type' => $ad_img_type,
            'ad_img_des' => $ad_img_des,
            'ad_img_src' => $img_src,
            'ad_img_url' => $ad_img_url,
            'ad_img_status' => 0,
            'ad_img_add_at' => time()
        ));

        header('Location: ' . URL::encode(array('ad_img_type' => $ad_img_type, 'ad_img_location' => $ad_img_location), 'Admin', 'ADImg', 'list'));
    }
    
    public function listAction() {
        $ad_img_location = $this->getParam($_GET, 'ad_img_location', 0);
        $ad_img_type = $this->getParam($_GET, 'ad_img_type', 0);

        $dao = new ADImgDao();
        $re = $dao->get(array('ad_img_location' => $ad_img_location, 'ad_img_type' => $ad_img_type), 0, PHP_INT_MAX, 'ad_img_add_at desc');
    
        $this->view->var['ad_img_location'] = $ad_img_location;
        $this->view->var['ad_img_type'] = $ad_img_type;
        $this->view->var['ad_img_list'] = $re['list'];
        $this->view->var['ctg_b'] = 'adimg';
        $this->view->var['ctg_s'] = 'list';

        $this->view->displayTpl();
    }

    public function doDeleteAction() {
        $ad_img_id = $this->getParam($_GET, 'ad_img_id', 0);
        $dao = new ADImgDao(); 
        $dao->simple_delete('ad_img_id', $ad_img_id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
