<?php
class Home_SearchController extends Home_HomeController {
    
    public function searchAction(){
        $this->checkArea();
        $location = $this->getParam($_COOKIE, 'location', 0);
        
        $search_key = $this->getParam($_REQUEST, 'search_key', '');
        $type = $this->getParam($_REQUEST, 'type', 0);
        $page = $this->getParam($_REQUEST, 'page', 1);
        $pagesize = $this->getParam($_REQUEST, 'pagesize', 15);
        $start = ($page - 1) * $pagesize;
        $length = $pagesize;
        
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
        
        $dao = new GoodsDao();
        $re = $dao->search('goods_name', $search_key, $type, $start, $length, $sort, $location);
        $tmp = LocationConfig::getLocation($location);
        $this->view->var['location_man'] = $tmp['name'];
        $this->view->var['type_man'] = $type == 1 ? '蔬菜' : '水果';
        $this->view->var['list'] = $re['list'];
        $this->view->var['search_key'] = $search_key;
        $this->view->var['type'] = $type;
        $this->view->var['page'] = $page;
        $this->view->var['total'] = $re['total'];
        $this->view->var['total_page'] = ceil($re['total'] / 15);

        $this->view->displayTpl();
    }
}
