<?php
class Home_AriticleController extends Home_HomeController {
    public function indexAction(){
        $ariticle_id = $this->getParam($_REQUEST, 'ariticle_id', 0);
        $dao = new AriticleDao();
        $re = $dao->get(array('ariticle_id' => $ariticle_id, 'ariticle_status' => 0));
        if($re['total'] == 0) {
            $this->goBack('文章不存在或者已经被删除');
            exit;
        }
        $ariticle = $re['list'][0];
        $this->view->var['ariticle'] = $ariticle;

        $re = $dao->get(array('ariticle_type' => 1), 0, 15, 'ariticle_add_at DESC'); //获取咨询
        $this->view->var['zx_list'] = empty($re['list']) ? array() : $re['list'];

        $re = $dao->get(array('ariticle_type' => 2), 0, 15, 'ariticle_add_at DESC'); //获取活动
        $this->view->var['hd_list'] = empty($re['list']) ? array() : $re['list'];

        $this->view->displayTpl();
    }
}
