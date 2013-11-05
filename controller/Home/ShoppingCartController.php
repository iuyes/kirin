<?php
class Home_ShoppingCartController extends Home_HomeController {
    public function indexAction(){
        $shopping_cart = $this->getParam($_COOKIE, 'shopping_cart', "{}");
        $shopping_cart = json_decode(str_replace("\\\"", "\"", $shopping_cart), true);
        $dao = new ShoppingCartDao();
        $list = $dao->getMyGoods(array_keys($shopping_cart));
        /**
         * 这个价格不包含配送费 
         */
        $total_price_min = 0;
        $total_price_max = 0;
        foreach($list as $k => $v) {
            $number = $shopping_cart[$v['goods_id']]['number'];
            $list[$k]['number'] = $number;
            $total_price_min += $v['goods_weight_min']/$v['goods_price_weight']*$v['goods_price']*$number;
            $total_price_max += $v['goods_weight_max']/$v['goods_price_weight']*$v['goods_price']*$number;
        }
        $this->view->var['list'] = $list;
        $this->view->var['user_info'] = $this->user;
        $this->view->var['total_price_min'] = sprintf("%.2f", $total_price_min);
        $this->view->var['total_price_max'] = sprintf("%.2f", $total_price_max);
        $this->view->displayTpl();
    }

    public function doAddAction() {
        $callback_url = URL::encode(array('goods_id' => $_REQUEST['goods_id']), 'Home', 'Detail', 'index');
        $this->checkUser($callback_url);

        $goods_id = $this->getParam($_REQUEST, 'goods_id', 0);
        if($goods_id == 0) {
            $this->goback('物品不存在');
            exit;
        }
        $number = $this->getParam($_REQUEST, 'number', 0);
        if($number == 0) {
            $this->goback('重量不能为0');
            exit;
        }

        $user_id = $this->user['user_id'];

        $dao = new ShoppingCartDao();
        $re = $dao->add(array(
            'goods_id' => $goods_id,
            'number' => $number,
            'user_id' => $user_id,
            'sc_at' => time()
        ));

        //商品的购买次数加1
        $dao = new GoodsDao();
        $re = $dao->get(array('goods_id' => $goods_id));
        $goods_info = $re['list'][0];
        $dao->update(array('goods_sale_times' => $goods_info['goods_sale_times'] + 1), 'goods_id', $goods_id);
        header('Location: ' . URL::encode(array(), 'Home', 'ShoppingCart', 'index'));
    }

    public function updateNumberAction() {
        $sc_id = $this->getParam($_REQUEST, 'sc_id', 0);
        $number = $this->getParam($_REQUEST, 'number', 0);

        $dao = new ShoppingCartDao();
        $dao->update(array('number' => $number), 'sc_id', $sc_id);
        echo json_encode(array(
            'errno' => 0,
            'error' => 'success'
        ));
    }

    public function doDeleteAction() {
        $sc_id = $this->getParam($_REQUEST, 'sc_id', 0);
        $dao = new ShoppingCartDao();
        $dao->simple_delete('sc_id', $sc_id);
        header('Location: ' . URL::encode(array(), 'Home', 'ShoppingCart', 'index'));
    }
}
