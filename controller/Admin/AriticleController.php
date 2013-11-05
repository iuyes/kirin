<?php
class Admin_AriticleController extends Admin_AdminController {
    public function __construct() {
        $this->check();
    }

    public function indexAction() {
        $ariticle_type = $this->getParam($_REQUEST, 'ariticle_type', 1);
        $start = $this->getStart();
        $length = $this->getLength();
        $page = $this->getPage();
        $pagesize = $this->getPageSize();

        $dao = new AriticleDao();
        $re = $dao->get(array('ariticle_type' => $ariticle_type, 'ariticle_status' => 0), $start, $length, 'ariticle_add_at DESC');
        $ariticle_list = $re['list'];

        $this->view->var['ariticle_list'] = $ariticle_list;
        $this->view->var['ariticle_type'] = $ariticle_type;
        $this->view->var['page'] = $page;
        $this->view->var['pagesize'] = $pagesize;
        $this->view->var['total'] = $re['total'];
        $this->view->var['ctg_b'] = 'ariticle';
        $this->view->var['ctg_s'] = 'index';
        $this->view->displayTpl();
    }

    public function editAction() {
        $ariticle_id = $this->getParam($_REQUEST, 'ariticle_id', 0);
        $dao = new AriticleDao();
        $re = $dao->get(array('ariticle_id' => $ariticle_id));
        $this->view->var['ariticle'] = $re['list'][0];
        $this->view->var['ctg_b'] = 'ariticle';
        $this->view->var['ctg_s'] = 'edit';
        $this->view->displayTpl();
    }

    public function doEditAction() {
        $ariticle_id = $this->getParam($_REQUEST, 'ariticle_id', 0);
        $ariticle_title = $this->getParam($_REQUEST, 'ariticle_title', '');
        $ariticle_type = $this->getParam($_REQUEST, 'ariticle_type', 0);
        $ariticle_content = $this->getParam($_REQUEST, 'ariticle_content', '');
        
        if (empty($ariticle_title)) {
            $this->goBack('请填写文章标题');
            exit;
        } elseif (empty($ariticle_type)) {
            $this->goBack("请选择文章类型");
            exit;
        } elseif (empty($ariticle_content)) {
            $this->goBack('文章内容不能为空');
            exit;
        }

        $dao = new AriticleDao();
        $dao->update(array(
            'ariticle_title' => $ariticle_title,
            'ariticle_type' => $ariticle_type,
            'ariticle_content' => $ariticle_content,
            'ariticle_add_at' => time(), //更新意味着重新添加
            'ariticle_status' => 0,
        ), 'ariticle_id', $ariticle_id);

        header('Location: ' . URL::encode(array('ariticle_type' => $ariticle_type), 'Admin', 'Ariticle', 'index'));
    }

    public function publishAction(){
        $this->view->var['ctg_b'] = 'ariticle';
        $this->view->var['ctg_s'] = 'publish';

        $this->view->displayTpl();
    }

    public function doPublishAction() {
        $ariticle_title = $this->getParam($_REQUEST, 'ariticle_title', '');
        $ariticle_type = $this->getParam($_REQUEST, 'ariticle_type', 0);
        $ariticle_content = $this->getParam($_REQUEST, 'ariticle_content', '');
        
        if (empty($ariticle_title)) {
            $this->goBack('请填写文章标题');
            exit;
        } elseif (empty($ariticle_type)) {
            $this->goBack("请选择文章类型");
            exit;
        } elseif (empty($ariticle_content)) {
            $this->goBack('文章内容不能为空');
            exit;
        }

        $dao = new AriticleDao();
        $dao->add(array(
            'ariticle_title' => $ariticle_title,
            'ariticle_type' => $ariticle_type,
            'ariticle_content' => $ariticle_content,
            'ariticle_add_at' => time(),
            'ariticle_status' => 0,
        ));

        header('Location: ' . URL::encode(array('ariticle_type' => $ariticle_type), 'Admin', 'Ariticle', 'index'));
    }

    public function doDeleteAction() {
        $ariticle_id = $this->getParam($_REQUEST, 'ariticle_id', 0);
        $dao = new AriticleDao();
        $dao->simple_delete('ariticle_id', $ariticle_id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
