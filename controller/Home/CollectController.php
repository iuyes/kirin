<?php
class Home_CollectController extends Home_HomeController {
    
    public function indexAction(){
        $callback_url = URL::encode(array(), 'Home', 'Collect', 'index');
        $this->checkUser($callback_url);//跳转到收藏的首页
        
        $user_id = $this->user['user_id'];
        $dao = new CollectDao();
        $re = $dao->getByUserId($user_id, 0, PHP_INT_MAX);
        
        $this->view->var['list'] = $re['list'];
        $this->view->displayTpl();
    }

    public function doAddAction() {
        $callback_url = URL::encode(array('goods_id' => $_GET['goods_id']), 'Home', 'Detail', 'index');
        $this->checkUser($callback_url);//跳转到物品详细信息页
        
        $goods_id = $this->getParam($_REQUEST, 'goods_id', 0);
        $user_id = $this->user['user_id'];

        $dao = new CollectDao();
        //判断是否已经收藏
        $row = array(
            'user_id' => $user_id,
            'goods_id' => $goods_id
        );
        $re = $dao->get($row); 
        if($re['total'] > 0) {
           $collect_id = $re['list'][0]['collect_at'];
           $dao->update(array('collect_at' => time()), 'collect_id', $collect_id);
        } else {
            $row = array(
                'user_id' => $user_id,
                'goods_id' => $goods_id,
                'collect_at' => time(),
            );
            $dao = new CollectDao();
            $dao->add($row);
        }
        header('Location: ' .  URL::encode(array(), 'Home', 'Collect', 'index'));
    }

    public function doDeleteAction() {
        $callback_url = URL::encode(array(), 'Home', 'Collect', 'index');
        $this->checkUser($callback_url);//跳转到收藏的首页

        $goods_id = $this->getParam($_REQUEST, 'goods_id', 0);
        $user_id = $this->user['user_id'];
        $dao = new CollectDao();
        $dao->delete(array('user_id' => $user_id, 'goods_id' => $goods_id));
        header('Location: ' .  URL::encode(array(), 'Home', 'Collect', 'index'));
    }

    public function clearAllAction() {
        $callback_url = URL::encode(array(), 'Home', 'Collect', 'index');
        $this->checkUser($callback_url);//跳转倒收藏首页

        $user_id = $this->user['user_id'];
        $dao = new CollectDao();
        $dao->deleteByUserId($user_id);
        header('Location: ' .  URL::encode(array(), 'Home', 'Collect', 'index'));
    }
}
