<?php
class Admin_CommendIndexController extends Admin_AdminController {
    public function __construct() {
        $this->check();
    }

    public function indexAction(){
        $location = $this->getParam($_GET, 'location', 0);
        $this->view->var['location'] = $location;
        
        $dao = new CommendIndexDao();
        $goods_list_of_commend = $dao->getCommendGoods(4, $location);
        $this->view->var['goods_list_of_commend'] = $goods_list_of_commend;

        $dao = new GoodsDao();
        $re = $dao->get(array('goods_location' => $location, 'goods_status' => 0));
        $this->view->var['goods_list'] = $re['list'];
        $this->view->var['ctg_b'] = 'commendindex';
        $this->view->var['ctg_s'] = 'index';

        $this->view->displayTpl();
    }

    public function addAction() {
        $_file = $_FILES['cii_img'];
        $file_path = UploadHelper::rawupload($_file);
        $goods_id = $this->getParam($_REQUEST, 'goods_id', 0);

        $dao = new CommendIndexDao();
        $dao->add(array(
            'cii_goods_id' => $goods_id,
            'cii_img' => $file_path,
            'cii_add_at' => time()
        ));

        header('Location: ' . URL::encode(array(), 'Admin', 'CommendIndex', 'index'));
    }

    public function deleteAction() {
        $cii_id = $this->getParam($_REQUEST, 'cii_id', 0);
        $dao = new CommendIndexDao();
        $dao->simple_delete('cii_id', $cii_id);

        header('Location: ' . URL::encode(array(), 'Admin', 'CommendIndex', 'index'));
    }
}
