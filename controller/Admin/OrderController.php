<?php
class Admin_OrderController extends Admin_AdminController {
    public function __construct() {
        $this->check();
    }

    public function indexAction(){
        $this->view->displayTpl();
    }

    public function listAction() {
        $page = $this->getParam($_REQUEST, 'page', 1);
        $pagesize = $this->getParam($_REQUEST, 'pagesize', 15);
        $order_id = $this->getParam($_REQUEST, 'order_id', 0);
        $order_id = intval($order_id);
        $start = max(($page - 1) * $pagesize, 0);
        $length = max($pagesize, 1);
        $order_status = $this->getParam($_REQUEST, 'order_status', 0);
        $cdt = array();//查询条件
        if($order_status == 0) {
            $cdt = array();
        } else {
            $cdt = array(
                'order_status' => $order_status
            ); 
        }
        if($order_id != 0) {
            $cdt['order_id'] = $order_id;
        }
        $dao = new OrderDao();
        $re = $dao->get($cdt, $start, $length, 'order_add_at DESC');
        
        $this->view->var['list'] = $re['list'];
        $this->view->var['total'] = $re['total'];
        $this->view->var['page'] = $page;
        $this->view->var['pagesize'] = $pagesize;
        $this->view->var['order_status'] = $order_status;
        $this->view->var['order_id'] = $order_id == 0 ? '' : $order_id;
        
        $this->view->var['ctg_b'] = 'order';
        $this->view->var['ctg_s'] = 'list';
        
        $this->view->displayTpl();
    }

    public function setStatusAction() {
        $order_id = $this->getParam($_REQUEST, 'order_id', 0);
        $order_status = $this->getParam($_REQUEST, 'order_status', 0);
        $dao = new OrderDao();
        $dao->update(
            array(
                'order_status' => $order_status
            ), 
            'order_id', $order_id);
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }

    public function detailAction() {
        $order_id = $this->getParam($_REQUEST, 'order_id', 0);
        $dao = new OrderGoodsDao();
        $order_list = $dao->getGoodsOfOrder($order_id);
        $this->view->var['goods_list'] = $order_list;
        
        $dao = new OrderDao();
        $order_info = $dao->get(array('order_id' => $order_id));
        $this->view->var['order_info'] = $order_info['list'][0];
        $this->view->displayTpl();
    }

    public function recycleAction() {
        $this->view->displayTpl();
    }
}
