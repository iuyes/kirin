<?php
class Home_DetailController extends Home_HomeController {
    public function indexAction(){
        $this->checkArea();
        $this->check();//获取用户登陆信息 

        //获取商品信息
        $goods_id = $this->getParam($_REQUEST, 'goods_id', 0);
        //获取评论分页信息
        $mt_page = $this->getParam($_REQUEST, 'mt_page', 1);
        $mt_pagesize = $this->getParam($_REQUEST, 'mt_pagesize', 10);
        $mt_start = ($mt_page - 1) * $mt_pagesize;
        $mt_length = $mt_pagesize;

        //获取整体评分信息
        $dao = new CommentDao();
        $re = $dao->getEnsemble($goods_id);
        $this->view->var['ensemble_info'] = $re;

        //获取详细评论等级信息
        $score_type = $this->getParam($_REQUEST, 'score_type', CommentDao::ALL);
        $this->view->var['score_type'] = $score_type;

        $dao = new GoodsDao();
        $re = $dao->get(array('goods_id' => $goods_id));
        if($re['total'] == 0) {
            $this->goback('商品不存在', URL::encode(array(), 'Home', 'Index', 'index'));
            exit;
        }
        if($re['list'][0]['goods_status'] > 0){
            $this->goback('商品已经卖完，请选择其他物品', URL::encode(array(), 'Home', 'Index', 'index'));
        }
        $read_goods = $this->getParam($_COOKIE, 'read_goods', '');
        $read_goods = explode(',', $read_goods);
        $read_goods = array_slice($read_goods, 0, 9);
        foreach ($read_goods as $k => $v) {
            if($goods_id == $v || empty($v)) {
                unset($read_goods[$k]);
            }
        }
        array_unshift($read_goods, $goods_id);
        $read_goods = implode(',', $read_goods);
        setcookie('read_goods', $read_goods, time() + 3600*24*30*12*10);

        $goods_info = $re['list'][0];
        $this->view->var['goods_info'] = $re['list'][0];
        $goods_location = $re['list'][0]['goods_location'];
        $this->view->var['goods_location'] = $goods_location;
        //商品浏览增加一次
        $dao->update(array('goods_read_times' => $goods_info['goods_read_times'] + 1), 'goods_id', $goods_id);
        //获取所有商品的评论信息
        $dao = new CommentDao();
        $re = $dao->getAll($goods_id, $mt_start, $mt_pagesize, $score_type);
        $comment_list = $re['list'];
        $this->view->var['total_page'] = ceil($re['total'] / $mt_pagesize);
        $this->view->var['cur_page'] = $mt_page;;
        $this->view->var['comment_list'] = $comment_list;
        
        //获取当前位置
        $location = $this->getParam($_COOKIE, 'location', 0);
        $this->view->var['my_location'] = $location;
        $location_man_tmp = LocationConfig::getLocation($location);
        $this->view->var['my_location_man'] = $location_man_tmp['name'];
        //获取最近上架商品信息
        $dao = new GoodsDao();
        $re = $dao->get(array('goods_status' => 0, 'goods_location' => $location, 'goods_type' => $goods_info['goods_type']), 0, 7, 'goods_add_at desc');
        $new_goods = $re['list'];
        $this->view->var['new_goods'] = $new_goods;

        //判断用户是否已经评论了这个商品
        $has_comment = false;
        if(empty($this->user)) { //没有用户登陆
            $comment_able = false; 
        } else {
            $user_id = $this->user['user_id'];
            $dao = new CommentDao();
            $comment_able = $dao->hasComment($user_id, $goods_id);     
        }
        $this->view->var['comment_able'] = $comment_able;
 
        $shopping_cart = $this->getParam($_COOKIE, 'shopping_cart', "{}");
        $shopping_cart = json_decode($shopping_cart, true);
        $shopping_cart_number = count($shopping_cart);
        //foreach ($shopping_cart as $k => $v) {
        //    $shopping_cart_number += $v['number'];
        //}
        $this->view->var['shopping_cart_number'] = $shopping_cart_number;
        
        $this->view->displayTpl();
    }
}
