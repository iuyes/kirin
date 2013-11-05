<?php
class Api_OrderController extends BaseController {
    public function listAction() {
        $dao = new OrderDao();
        $re = $dao->get(array(), 0, PHP_INT_MAX, "order_add_at DESC");
        $list = $re['list'];
        foreach ($list as $k => $v) {
            $list[$k]['send_time'] = date("m-d H:i", $v['send_time']);
        }
        echo json_encode(array(
            'errno' => 0,
            'list' => $list,
            )
        );
    }

    public function setStatusAction() {
        $order_id = $this->getParam($_REQUEST, 'order_id', 0);
        $order_status = $this->getParam($_REQUEST, 'order_status', 0);
        $dao = new OrderDao();
        $dao->update(array(
            'order_status' => $order_status
        ), "order_id", $order_id);
        echo json_encode(array(
            'errno' => 0,
            'error' => 'success'
        ));
    }

    public function detailAction() {
        $order_id = $this->getParam($_REQUEST, 'order_id', 0);
        $dao = new OrderDao();
        $re = $dao->get(array('order_id' => $order_id));
        if($re['total'] == 0) {
            echo json_encode(array(
                'errno' => 0,
                'user' => null,
                'list' => array(),
            ));
        } else {
            $order_info = $re['list'][0];
            $order_info['send_time'] = date("m-d H:i", $order_info['send_time']);
            $order_add_by = $order_info['order_add_by'];
            $dao_user = new UserDao();
            $re = $dao_user->get(array('user_id' => $order_add_by));
            $user_info = $re['list'][0];
             
            $dao_order_goods = new OrderGoodsDao();
            $re = $dao_order_goods->getGoodsOfOrder($order_id);
            $goods_list = $re;

            echo json_encode(array(
                'errno' => 0,
                'user' => $user_info,
                'order' => $order_info,
                'list' => $goods_list,
            ));
        }
    }
}
