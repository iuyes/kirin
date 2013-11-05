<?php
class Home_OrderController extends Home_HomeController {
    public function indexAction(){
        $this->view->displayTpl();
    }

    public function detailAction() {
        $callback_url = URL::encode(array('order_id' => $_REQUEST['order_id']), 'Home', 'Order', 'detail');
        $this->checkUser($callback_url);//跳转倒订单详细页面

        $dao = new OrderDao();
        $re = $dao->get(array('order_add_by' => $this->user['user_id']), 0, PHP_INT_MAX);
        $this->view->var['order_list'] = $re['list'];

        $order_id = $this->getParam($_REQUEST, 'order_id', 0);
        $tmp = $dao->get(array('order_id' => $order_id));
        $order_info = $tmp['list'][0];

        //判断这个order是不是我的
        $my_order_arr = array();
        foreach($re['list'] as $v) {
            $my_order_arr[] = $v['order_id'];
        }
        if(!in_array($order_id, $my_order_arr)) {
            $this->goback('您只能操作自己的订单。');
            exit;
        }

        //获取order详细信息
        $order_goods_dao = new OrderGoodsDao();
        $goods_list = $order_goods_dao->getGoodsOfOrder($order_id);

        $min_price = 0;
        $max_price = 0;
        foreach ($goods_list as $goods) {
            $min_price = $min_price + $goods['number'] * ($goods['goods_weight_min'] / $goods['goods_price_weight']) * $goods['goods_price'];
            $max_price = $max_price + $goods['number'] * ($goods['goods_weight_max'] / $goods['goods_price_weight']) * $goods['goods_price'];
        }
        $this->view->var['min_price'] = $min_price + FeeConfig::DELIVERY;
        $this->view->var['max_price'] = $max_price + FeeConfig::DELIVERY;
        $this->view->var['order_id'] = $order_id;
        $this->view->var['order_info'] = $order_info;
        $this->view->var['goods_list'] = $goods_list;
        $this->view->var['st'] = 'order-myorder';
        $this->view->displayTpl();
    }

    public function myOrderAction() {
        $callback_url = URL::encode(array(), 'Home', 'Order', 'myOrder');
        $this->checkUser($callback_url);
        
        $start = $this->getStart();
        $length = $this->getLength();
        $dao = new OrderDao();
        $re = $dao->get(array('order_add_by' => $this->user['user_id']), $start, $length, 'order_id DESC');
        $this->view->var['order_list'] = $re['list'];
        $this->view->var['user_info'] = $this->user;
        $this->view->var['st'] = 'order-myorder';
        $this->view->var['page'] = $this->getPage();
        $this->view->var['pagesize'] = $this->getPageSize();
        $this->view->var['total'] = $re['total'];
        $this->view->displayTpl();
    }

    public function getPhoneOf($type = 0) {
        $dao = new PreparePhoneDao();
        $location = $_COOKIE['location'];
        $re = $dao->get(array(
            'location' => $location,
            'type' => 0,
        ));
        if($re['total'] == 0) {
            $this->goback('订单过多，请稍后提交..');
            exit;
        }
        return $re['list'][0]['phone'];
    }

    public function generateAction() {
        $callback_url = URL::encode(array(), 'Home', 'ShoppingCart', 'index');
        $this->checkUser($callback_url);//跳转到购物车首页

        $user_id = $this->user['user_id'];
        $shopping_goods = $this->getParam($_COOKIE, 'shopping_cart', '{}');
        $json_goods = json_decode(str_replace("\\\"", "\"", $shopping_goods), true);
        /**
         * 获取我的历史配送地址 
         */
        $delivery_dao = new DeliveryDao();
        $re = $delivery_dao->get(array('user_id' => $user_id, 'delivery_status' => 0), 0, PHP_INT_MAX, 'delivery_add_at DESC');
        $delivery_list = $re['list'];
        $this->view->var['delivery_list'] = $delivery_list;

        $dao = new ShoppingCartDao();
        $list = $dao->getMyGoods(array_keys($json_goods));
        /**
         * 计算花费 
         */
        $total_price_min = 0;
        $total_price_max = 0;
        foreach($list as $k => $v) {
            $number = $json_goods[$v['goods_id']]['number'];
            $list[$k]['number'] = $number;
            $v['number'] = $number;
            $total_price_min += $v['goods_weight_min']/$v['goods_price_weight']*$v['goods_price']*$v['number'];
            $total_price_max += $v['goods_weight_max']/$v['goods_price_weight']*$v['goods_price']*$v['number'];
        }   
        $total_price_min += FeeConfig::DELIVERY;
        $total_price_max += FeeConfig::DELIVERY; 
        
        $this->view->var['list'] = $list;
        $this->view->var['user_info'] = $this->user;
        $this->view->var['total_price_min'] = sprintf("%.2f", $total_price_min);
        $this->view->var['total_price_max'] = sprintf("%.2f", $total_price_max);
        $this->view->displayTpl();
    }

    /**
     * deliveryInfo 
     * 如果用户新添加地址，就将配送信息保存到数据库中，否则从数据库中获取用户的配送信息
     * 返回结果为用户需要配送的用户信息
     * 这一个过程必须在checkUser之后执行
     * @access public
     * @return void
     */
    public function deliveryInfo() {
        $delivery_id = $this->getParam($_REQUEST, 'delivery_id', 0);
        $delivery_dao = new DeliveryDao();
        if($delivery_id == 0) {
            //添加地址到数据库中
            $user_id = $this->user['user_id'];
            $delivery_address = $this->getParam($_REQUEST, 'delivery_address', '');
            $delivery_phone = $this->getParam($_REQUEST, 'delivery_phone', '');
            $delivery_name = $this->getParam($_REQUEST, 'delivery_name', '');
            $row = array(
                'user_id' => $user_id,
                'delivery_address' => $delivery_address,
                'delivery_phone' => $delivery_phone,
                'delivery_name' => $delivery_name,
                'delivery_status' => 0,
                'delivery_add_at' => time()
            );
            $delivery_dao->add($row);
            return $row;
        } else {
            //获取用户的配送信息
            $re = $delivery_dao->get(array(
                'delivery_id' => $delivery_id,
            ));
            return $re['list'][0];
        }
    }

    public function doGenerateAction() {
        $callback_url = URL::encode(array(), 'Home', 'ShoppingCart', 'index');
        $this->checkUser($callback_url);
        $delivery_info = $this->deliveryInfo(); 
        
        $shopping_goods = $this->getParam($_COOKIE, 'shopping_cart', '{}');
        $json_goods = json_decode(str_replace("\\\"", "\"", $shopping_goods), true);

        //获取需要生成订单的货物
        $dao = new ShoppingCartDao();
        $goods_list = $dao->getMyGoods(array_keys($json_goods));
        if(count($goods_list) == 0) {
            $this->goback('购物车没有货品');
            exit;
        }

        $send_time = $this->getParam($_REQUEST, 'send_time', 0);
        if($send_time == 0) { $send_time = time();}

        $str_send_time = date('H:i', $send_time);

        $sms_msg = "请配送：\n";//发送到合作商和快递专员的短信内容

        $dao = new OrderDao();
        $dao->add(array(
            'order_add_by' => $this->user['user_id'],
            'order_add_at' => time(),
            'order_status' => OrderStatusConfig::INIT,
            'send_to_address' => $delivery_info['delivery_address'],
            'send_to_phone' => $delivery_info['delivery_phone'],
            'send_to_name' => $delivery_info['delivery_name'],
            'send_time' => $send_time
        ));
        $id = $dao->insertId();
        $dao = new OrderGoodsDao();
        foreach($goods_list as $k => $v) {
            $number = $json_goods[$v['goods_id']]['number'];
            $v['number'] = $number;
            $list[$k]['number'] = $number;
            $dao->add(array(
                'order_id' => $id,
                //'goods_info' => json_encode($v),
                'goods_id' => $v['goods_id'],
                'number' => intval($v['number'])
            ));
            $tmp_price = $v['goods_price'];
            $tmp_weight_min = $v['goods_weight_min'] * $v['number'];
            $tmp_weight_max = $v['goods_weight_max'] * $v['number'];

            $sms_msg .= "{$v['goods_name']} 单价:{$tmp_price} 重量:{$tmp_weight_min}~{$tmp_weight_max}g\n";
        }

        $user_name = $delivery_info['delivery_name'];
        $user_phone = $delivery_info['delivery_phone'];
        $user_address = $delivery_info['delivery_address'];
        $sms_msg .= "送达时间:{$str_send_time} 收货人:{$user_name} 电话:{$user_phone} 地址:{$user_address}";
        $phone_list = implode(',', PhoneConfig::$config);
        $re = SmsHelper::send($phone_list, urlencode($sms_msg));
        if(intval($re) < 1) {
            MailHelper::send('niujiaming0819@163.com', '订单号'.$id.'调用短信接口失败', $sms_msg);
        }
        $dao = new ShoppingCartDao();
        $dao->simple_delete('user_id', $this->user['user_id']);
        setcookie('shopping_cart', '', time() - 1);
        header('Location: ' . URL::encode(array(), 'Home', 'Order', 'myOrder'));
    }
}
