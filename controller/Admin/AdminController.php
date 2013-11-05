<?php 
class Admin_AdminController extends BaseController {
    protected $user = array();

    public function check() {
        if(array_key_exists('liangdianyikeuname', $_COOKIE)) {
            $uname = $_COOKIE['liangdianyikeuname'];
        } else {
            $uname = "";
        }

        if(!in_array($uname, AdminConfig::$config)) {
            $this->goback('权限不足', URL::encode(array(), 'Home', 'Index', 'index'));
        }

        $dao = new UserDao();
        $re = $dao->get(array('user_name' => $uname));
        $user_info = $re['list'][0];
        $this->user = $user_info;
    }
}
