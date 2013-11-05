<?php
class Admin_UserController extends Admin_AdminController {
    public function __construct() {
        $this->check();
    }
    
    public function listAction(){
        $dao = new UserDao();
        $page = $this->getPage();
        $pagesize = $this->getPageSize();
        $start = $this->getStart();
        $length = $this->getLength();
        $re = $dao->get(array(), $start, $length, 'user_add_at DESC');
        $list = $re['list'];
        $total = $re['total'];

        $this->view->var['page'] = $page;
        $this->view->var['pagesize'] = $pagesize;
        $this->view->var['start'] = $start;
        $this->view->var['length'] = $length;
        $this->view->var['total'] = $total;
        $this->view->var['list'] = $list;
        
        $this->view->var['ctg_b'] = 'user';
        $this->view->var['ctg_s'] = 'list';
        
        $this->view->displayTpl();
    }

    public function wloginAction() {
        $uname = $this->getParam($_REQUEST, 'uname', '');
        $dao = new UserDao();
        $re = $dao->get(array(
            'user_name' => $uname
        ));
        if($re['total'] == 0) {
            $this->goback('查无此人');
            exit;
        }

        $user = $re['list'][0];

        setcookie('liangdianyikeuname_backup', $_COOKIE['liangdianyikeuname'], time() + 3600*24);
        setcookie('liangdianyikeverifycode_backup', $_COOKIE['liangdianyikeverifycode'], time() + 3600*24);
        setcookie('liangdianyikeuname', $user['user_name'], time() + 3600*24*30);
        setcookie('liangdianyikeverifycode', md5($user['user_name'].$user['user_passwd'].'http://www.liangdianyike.com'), time() + 3600*24*30);
        
        header('Location: ' .  URL::encode(array(), 'Home', 'Index', 'index'));
    }
}
