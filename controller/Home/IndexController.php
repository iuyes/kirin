<?php
class Home_IndexController extends Home_HomeController {
    
    public function indexAction() {
        $this->checkArea();
        $location = $this->getParam($_COOKIE, 'location', 0);
        $tmp = LocationConfig::getLocation($location);
        $this->view->var['location_man'] = $tmp['name'];
    	
        $dao = new CommendDao();
        $tmp = $dao->getCommendGoods(CommendConfig::LEFT, 4, $location);
        $goods_of_left = $tmp;
        $this->view->var['goods_of_left'] = $goods_of_left;
        
        $tmp = $dao->getCommendGoods(CommendConfig::RIGHT, 6, $location);
        $goods_of_right = $tmp;
        $this->view->var['goods_of_right'] = $goods_of_right;

        $tmp = $dao->getCommendGoods(CommendConfig::NEWGOODS, 5, $location);
        $goods_of_new = $tmp;  
        $this->view->var['goods_of_new'] = $goods_of_new;

        $tmp = $dao->getCommendGoods(CommendConfig::WEEKLY, 5, $location);
        $goods_of_weekly = $tmp;      
        $this->view->var['goods_of_weekly'] = $goods_of_weekly;

        $tmp = $dao->getCommendGoods(CommendConfig::HOT, 5, $location);
        $goods_of_hot = $tmp;
        $this->view->var['goods_of_hot'] = $goods_of_hot;
        
        $tmp = $dao->getCommendGoods(CommendConfig::LDYK_TUIJIAN, 7, $location);
        $goods_of_tuijian = $tmp;
        $this->view->var['goods_of_tuijian'] = $goods_of_tuijian;

        $tmp = $dao->getCommendGoods(CommendConfig::VEGETABLE, 12, $location);
        $goods_of_vegetable = $tmp;      
        $this->view->var['goods_of_vegetable'] = $goods_of_vegetable;

        $tmp = $dao->getCommendGoods(CommendConfig::VEGETABLE_WORD, 4, $location);
        $goods_of_vegetable_word = $tmp;      
        $this->view->var['goods_of_vegetable_word'] = $goods_of_vegetable_word;
        
        $tmp = $dao->getCommendGoods(CommendConfig::FRUIT, 12, $location);
        $goods_of_fruit = $tmp;      
        $this->view->var['goods_of_fruit'] = $goods_of_fruit;
        
        $tmp = $dao->getCommendGoods(CommendConfig::FRUIT_WORD, 4, $location);
        $goods_of_fruit_word = $tmp;      
        $this->view->var['goods_of_fruit_word'] = $goods_of_fruit_word;
        
        $dao = new CommendIndexDao();
        $goods_commend_in_index = $dao->getCommendGoods(4, $location);
        $this->view->var['goods_commend_in_index'] = $goods_commend_in_index;
        
        //获取最新的两条资讯
        $dao = new AriticleDao();
        $re = $dao->get(array('ariticle_type' => 1), 0, 3, 'ariticle_add_at DESC');
        $this->view->var['zx_list'] = $re['list'];
        
        $re = $dao->get(array('ariticle_type' => 2), 0, 3, 'ariticle_add_at DESC');
        $this->view->var['hd_list'] = $re['list'];
        
        //获取顶部广告代码部分在Public/Header/search.php中
        //获取轮播广告
        $dao = new ADImgDao();
        $re = $dao->get(array('ad_img_status' => 0, 'ad_img_location' => $location, 'ad_img_type' => ADImgConfig::INDEX_CAROUSEL), 0, 5, 'ad_img_add_at desc');
        $this->view->var['ad_img_carousel'] = $re['list'];
        
        $this->view->var['menu_type'] = 0;

        $this->view->displayTpl();
    }
    
    public function categoryAction(){
        $this->checkArea();
        $location = $this->getParam($_COOKIE, 'location', 0);
        $dao = new GoodsDao();

        //获取我看过的商品
        $read_goods = $this->getParam($_COOKIE, 'read_goods', '');
        $read_goods = explode(',', $read_goods);
        $tmp_read_goods = array();
        foreach ($read_goods as $v) {
            if(empty($v)) continue;
            $tmp = $dao->get(array('goods_id' => $v));
            $tmp_read_goods[] = $tmp['list'][0];
        }
        $this->view->var['read_goods'] = $tmp_read_goods;

        //获取某个分类下的产品，并且按照相应的规则排序
        //获取分类
        $goods_category = $this->getParam($_REQUEST, 'goods_category', 0);
        $this->view->var['goods_category'] = $goods_category;
        
        $sort_type = $this->getParam($_REQUEST, 'sort_type', 'jg');
        $this->view->var['sort_type'] = $sort_type;
        
        $sort = $this->getParam($_REQUEST, 'sort', 'up');
        $this->view->var['sort'] = $sort;

        switch ($sort_type) {
            case 'jg':
                if($sort == 'up') { $sort = 'ASC';} else { $sort = 'DESC';}
                $sort = "goods_price {$sort}";
                break;
            case 'cx':
                if($sort == 'up') { $sort = 'DESC';} else { $sort = 'ASC';}
                $sort = "goods_promotion {$sort}";
                break;
            case 'sj':
                if($sort == 'up') { $sort = 'ASC';} else { $sort = 'DESC';}
                $sort = "goods_add_at {$sort}";
                break;
            case 'll':
                if($sort == 'up') { $sort = 'ASC';} else { $sort = 'DESC';}
                $sort = "goods_read_times {$sort}";
                break;
            case "xs":
                if($sort == 'up') { $sort = 'ASC';} else { $sort = 'DESC';}
                $sort = "goods_sale_times {$sort}";
                break;
        }

        $type = $this->getParam($_REQUEST, 'type', 0);
        $page = $this->getParam($_REQUEST, 'page', 1);
        $pagesize = $this->getParam($_REQUEST, 'pagesize', 15);
        $start = ($page - 1) * $pagesize;
        $length = $pagesize;
        $dao = new GoodsDao();
        //$re = $dao->get(array('goods_type' => $type, 'goods_location' => $location, 'goods_status' => 0), $start, $length, 'goods_add_at desc');
        $re = $dao->getGoodsByCategory($location, $type, $goods_category, $sort, $start, $length);
        $tmp = LocationConfig::getLocation($location);
        $this->view->var['location_man'] = $tmp['name'];
        $this->view->var['type_man'] = $type == 1 ? '蔬菜' : '水果';
        $this->view->var['list'] = $re['list'];
        $this->view->var['type'] = $type;
        $this->view->var['page'] = $page;
        $this->view->var['total'] = $re['total'];
        $this->view->var['total_page'] = ceil($re['total'] / 15);
        $this->view->var['menu_type'] = $type;

        $this->view->displayTpl();
    }
}
