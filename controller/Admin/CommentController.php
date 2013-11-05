<?php
class Admin_CommentController extends Admin_AdminController {
    public function __construct() {
        $this->check();
    }

    public function indexAction(){
        $this->view->displayTpl();
    }

    public function listAction() {
        $goods_id = $this->getParam($_REQUEST, 'goods_id', 0);
        $dao = new CommentDao();
        $re = $dao->getAll($goods_id, 0, PHP_INT_MAX);
        $this->view->var['list'] = $re['list'];
        $this->view->displayTpl();
    }

    public function deleteAction() {
        $comment_id = $this->getParam($_REQUEST, 'comment_id', 0);
        $dao = new CommentDao();
        $dao->simple_delete('comment_id', $comment_id);
        header('Location: ' . URL::encode(array(), 'Admin', 'Comment', 'list'));
    }

    public function recycleAction() {
        $this->view->displayTpl();
    }
}
