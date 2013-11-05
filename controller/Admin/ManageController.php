<?php
require_once "common/img2thumb.php";

class Admin_ManageController extends Admin_AdminController {
    public function __construct() {
        $this->check();
    }

    public function indexAction(){
        $this->view->displayTpl();
    }

    public function addAction() {
        $this->view->var['ctg_b'] = 'goods';
        $this->view->var['ctg_s'] = 'add';
        
        $this->view->displayTpl();
    }

    public function doAddAction() {
        session_start();
        //验证码验证
        $vet_code = strtolower($_SESSION['vet_code']); 
        $form_vet_code = strtolower($_REQUEST['vet_code']);
        if($vet_code != $form_vet_code) {
            echo json_encode(
                array(
                    'errno' => 1,
                    'error' => '验证码不正确'
                )
            );
            exit;
        }
        //保存商品信息至数据库
        $goods_img = UploadHelper::upload($_FILES['goods_img']);
        $row = array(
            'goods_location' => $_REQUEST['goods_location'],
            'goods_name' => $_REQUEST['goods_name'],
            'goods_ad' => $_REQUEST['goods_ad'],
            'goods_category' => implode(',', $_REQUEST['goods_category']),
            'goods_type' => $_REQUEST['goods_type'],
            'goods_promotion' => $_REQUEST['goods_promotion'],
            'goods_price' => $_REQUEST['goods_price'],
            'goods_price_weight' => $_REQUEST['goods_price_weight'],
            'goods_weight_min' => $_REQUEST['goods_weight_min'],
            'goods_weight_max' => $_REQUEST['goods_weight_max'],
            'goods_img' => $goods_img['img'],
            'goods_img_60x60' => $goods_img['img_60x60'],
            'goods_img_220x220' => $goods_img['img_220x220'],
            'goods_img_300x300' => $goods_img['img_300x300'],
            'goods_add_by' => $this->user['user_id'],
            'goods_add_at' => time(),
            'goods_read_times' => $_REQUEST['goods_read_times'],
            'goods_sale_times' => $_REQUEST['goods_sale_times'],
        );
        $dao = new GoodsDao();
        $dao->add($row);
        echo json_encode(
            array(
                'errno' => 0,
                'error' => '货物添加成功'
            )
        );
    }

    public function listAction() {
        $location = $this->getParam($_REQUEST, 'location', 1);
        $page = $this->getParam($_REQUEST, 'page',  1);
        $pagesize = $this->getParam($_REQUEST, 'pagesize', 15);
        $goods_name = $this->getParam($_REQUEST, 'goods_name', '');
        $start = max(($page - 1)*$pagesize, 0);
        $length = max($pagesize, 1);

        $dao = new GoodsDao();
        //$re = $dao->get(array('goods_status' => 0), $start, $length, 'goods_add_at desc');
        $re = $dao->searchAll('goods_name', $goods_name, $start, $length, 'goods_add_at desc', $location);
        $this->view->var['list'] = $re['list'];
        $this->view->var['total'] = $re['total'];
        $this->view->var['page'] = $page;
        $this->view->var['pagesize'] = $pagesize;
        $this->view->var['search_value'] = $goods_name;
        $this->view->var['location'] = $location;
        
        $this->view->var['ctg_b'] = 'goods';
        $this->view->var['ctg_s'] = 'list';

        $this->view->displayTpl();
    }

    public function recycleAction() {
        $start = $this->getStart();
        $length = $this->getLength();
        $dao = new GoodsDao();
        $re = $dao->getRecycleList($start, $length);
        $this->view->var['list'] = $re['list'];
        $this->view->var['page'] = $this->getPage();
        $this->view->var['pagesize'] = $this->getPageSize();
        $this->view->var['total'] = $re['total'];
        
        $this->view->var['ctg_b'] = 'goods';
        $this->view->var['ctg_s'] = 'recycle';
        
        $this->view->displayTpl();
    }

    public function doDeleteAction() {
        $goods_id = $_REQUEST['goods_id'];
        $dao = new GoodsDao();
        $dao->update(array('goods_status' => time()), 'goods_id', $goods_id);
        header('Location: ' . URL::encode(array(), 'Admin', 'Manage', 'list'));
    }

    public function editAction() {
        $goods_id = $_REQUEST['goods_id'];
        $dao = new GoodsDao();
        $re = $dao->get(array('goods_id' => $goods_id));
        $goods_info = $re['list'][0];

        $this->view->var['goods_info'] = $goods_info;
        $this->view->displayTpl();
    }

    public function doEditAction() {
        session_start();
        //验证码验证
        $vet_code = strtolower($_SESSION['vet_code']); 
        $form_vet_code = strtolower($_REQUEST['vet_code']);
        if($vet_code != $form_vet_code) {
            echo json_encode(
                array(
                    'errno' => 1,
                    'error' => '验证码不正确'
                )
            );
            exit;
        }
        
        if(!array_key_exists("goods_img", $_FILES) || $_FILES['goods_img']['error'] > 0) {
            $row = array(
                'goods_name' => $_REQUEST['goods_name'],
                'goods_ad' => $_REQUEST['goods_ad'],
                'goods_category' => implode(',', $_REQUEST['goods_category']),
                'goods_type' => $_REQUEST['goods_type'],
                'goods_promotion' => $_REQUEST['goods_promotion'],
                'goods_price' => $_REQUEST['goods_price'],
                'goods_price_weight' => $_REQUEST['goods_price_weight'],
                'goods_weight_min' => $_REQUEST['goods_weight_min'],
                'goods_weight_max' => $_REQUEST['goods_weight_max'],
                'goods_edit_at' => time(),
                'goods_read_times' => $_REQUEST['goods_read_times'],
                'goods_sale_times' => $_REQUEST['goods_sale_times'],

            );
        } else {
            //保存商品信息至数据库
            $goods_img = UploadHelper::upload($_FILES['goods_img']);
            $row = array(
                'goods_name' => $_REQUEST['goods_name'],
                'goods_ad' => $_REQUEST['goods_ad'],
                'goods_category' => implode(',', $_REQUEST['goods_category']),
                'goods_type' => $_REQUEST['goods_type'],
                'goods_promotion' => $_REQUEST['goods_promotion'],
                'goods_price' => $_REQUEST['goods_price'],
                'goods_price_weight' => $_REQUEST['goods_price_weight'],
                'goods_weight_min' => $_REQUEST['goods_weight_min'],
                'goods_weight_max' => $_REQUEST['goods_weight_max'],
                'goods_img' => $goods_img['img'],
                'goods_img_220x220' => $goods_img['img_220x220'],
                'goods_img_300x300' => $goods_img['img_300x300'],
                'goods_img_60x60' => $goods_img['img_60x60'],
                'goods_edit_at' => time(),
                'goods_read_times' => $_REQUEST['goods_read_times'],
                'goods_sale_times' => $_REQUEST['goods_sale_times'],
            );
        }
        
        $dao = new GoodsDao();
        $dao->update($row, 'goods_id', $_REQUEST['goods_id']);

        echo json_encode(array(
            'errno' => 0,
            'error' => "编辑成功"
        ));
        
    }

    public function recoverAction() {
        $goods_id = $_REQUEST['goods_id'];
        $row = array('goods_status' => 0);
        $dao = new GoodsDao();
        $dao->update($row, 'goods_id', $goods_id);
        header('Location: ' . URL::encode(array(), 'Admin', 'Manage', 'list'));
    }
}
