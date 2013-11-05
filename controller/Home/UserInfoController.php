<?php
session_start();
class Home_UserInfoController extends Home_HomeController {
    public function indexAction(){
        $callback_url = URL::encode(array(), 'Home', 'UserInfo', 'index');
        $this->checkUser($callback_url);
        $user_id = $this->user['user_id']; 
        $dao = new DeliveryDao();
        $re = $dao->get(array('user_id' => $user_id, 'delivery_status' => 0));
        $delivery_list = $re['list'];

        $this->view->var['user_info'] = $this->user;
        $this->view->var['delivery_list'] = $delivery_list;
        $this->view->var['st'] = 'userinfo-index';
        $this->view->displayTpl();
    }

    public function doEditAction() {
        header('Content-Type: text/html');
        $callback_url = URL::encode(array(), 'Home', 'UserInfo', 'index');
        $this->checkUser($callback_url);

        //验证码验证
        $vet_code = strtolower($_SESSION['vet_code']);
        $_SESSION['vet_code'] = "";
        $form_vet_code = strtolower($_REQUEST['vet_code']);
        if($vet_code != $form_vet_code) {
            echo json_encode(array(
                'errno' => 0,
                'error' => '验证码错误'
            ));
            exit;
        }
        $row = array(
            'user_address' => $this->getParam($_REQUEST, 'user_address', ''),
            'user_phone' => $this->getParam($_REQUEST, 'user_phone', '')
        );
        $dao = new UserDao();
        $dao->update($row, 'user_id', $this->user['user_id']);
        echo json_encode(array(
            'errno' => 0,
            'error' => '修改成功'
        ));
    }

    public function loginAction() {
        //判断是否需要现实验证码
        $need = VetCode::need();
        $this->view->var['need_vet_code'] = $need;
        $this->view->var['callback'] = $this->getParam($_GET, '_t', URL::encode(array(), 'Home', 'Index', 'index'));
        $this->view->displayTpl();
    }

    public function doLoginAction() {
        header('Content-Type: text/html; charset: utf-8');
        //判断是否需要现实验证码
        $need = VetCode::need();
        if($need) {
            //需要验证码验证
            $vet_code = strtolower($_SESSION['vet_code']);
            $_SESSION['vet_code'] = "";
            $form_vet_code = strtolower($_REQUEST['vet_code']);
            if($vet_code != $form_vet_code) {
                VetCode::plusOne();
                echo json_encode(array(
                    'errno' => 1,
                    'error' => '验证码不正确',
                    'show_vet_code' => VetCode::need(),
                ));
                exit;
            }
        }

        //判断用户是否已经注册
        $dao = new UserDao();
        $re = $dao->get(array(
            'user_name' => $_REQUEST['uname'],
            'user_password' => $_REQUEST['passwd']
        ));
        if($re['total'] > 0) {
            if(array_key_exists('_t', $_REQUEST)) {
                $url = urldecode($_REQUEST['_t']);
            } else {
                $url = URL::encode(array(), 'Home', 'Index', 'index');
            }
            echo json_encode(array(
                'errno' => 0,
                'error' => '登陆成功',
                'url' => $url,
            ));
        } else {
            VetCode::plusOne();//登陆错误后需要将这个IP的错误登陆次数加一
            echo json_encode(array(
                'errno' => 1,
                'error' => '用户名或者密码不正确',
                'show_vet_code' => VetCode::need(), 
            ));
            exit;
        }

        //cookie中添加登陆记录
        setcookie('liangdianyikeuname', $_REQUEST['uname'], time() + 3600*24*30);
        setcookie('liangdianyikeverifycode', md5($_REQUEST['uname'].$_REQUEST['passwd'].'http://www.liangdianyike.com'), time() + 3600*24*30);
    }

    public function registerAction() {
        //判断是否需要现实验证码
        $need = VetCode::need();
        $this->view->var['need_vet_code'] = $need;
        $this->view->var['callback'] = $this->getParam($_GET, '_t', URL::encode(array(), 'Home', 'Index', 'index'));
        $this->view->displayTpl();
    }

    public function doRegisterAction() {
        $callback = $this->getParam($_REQUEST, '_t', URL::encode(array(), 'Home', 'Index', 'index'));
        //判断是否需要现实验证码
        $need = VetCode::need();
        if($need) {
            $vet_code = strtolower($_SESSION['vet_code']);
            $_SESSION['vet_code'] = "";
            $form_vet_code = strtolower($_REQUEST['vet_code']);
            if($vet_code != $form_vet_code) {
                echo json_encode(
                    array(
                        'errno' => 1,
                        'error' => '验证码不正确',
                        'show_vet_code' => VetCode::need(),
                    )
                );
                exit;
            }
        }
        
        $dao = new UserDao();
        //判断用户是否已经注册
        $user_name = $_REQUEST['uname'];
		$re = $dao->get(array('user_name' => $user_name));
		if($re['total'] > 0) {
			VetCode::plusOne();
            echo json_encode(
                array(
                    'errno' => 1,
                    'error' => '用户已经注册，请更换用户名',
                    'show_vet_code' => VetCode::need(),
                )
            );
            exit;			
		}
        /**
         * 注册过程中，不需要让用户提供地址和收货电话 
         */
        $row = array(
            'user_name'     => $_REQUEST['uname'],
            'user_password'   => $_REQUEST['passwd'],
            'user_add_at'   => time()
        );

        $re = $dao->add($row);

        if($re) {
            echo json_encode(array(
                'errno' => 0,
                'error' => '注册成功',
                'url' => URL::encode(array('_t' => $callback), 'Home', 'UserInfo', 'login')
            ));
            exit;
        } else {
            VetCode::plusOne();
            echo json_encode(array(
                'errno' => 1,
                'error' => '系统错误，请稍后重试',
                'show_vet_code' => VetCode::need(),
            ));
            exit;
        }
    }

    public function doLogoutAction() {
        setcookie('liangdianyikeuname', '', time()-1);
        setcookie('liangdianyikeverifycode', '', time()-1);

        $liangdianyikeuname_backup = $this->getParam($_COOKIE, 'liangdianyikeuname_backup', '');
        $liangdianyikeverifycode_backup = $this->getParam($_COOKIE, 'liangdianyikeverifycode_backup', '');
        
        if(!empty($liangdianyikeuname_backup)) {
            setcookie('liangdianyikeuname', $liangdianyikeuname_backup, time() + 3600*24*30);
            setcookie('liangdianyikeverifycode', $liangdianyikeverifycode_backup, time() + 3600*24*30);
            setcookie('liangdianyikeuname_backup', '', time() - 1);
            setcookie('liangdianyikeverifycode_backup', '', time() - 1);
        }
        header('Location: ' . URL::encode(array(), 'Home', 'Index', 'index'));
    }

    public function passwdEditAction() {
        $callback_url = URL::encode(array(), 'Home', 'UserInfo', 'passwdEdit');
        $this->checkUser($callback_url);

        $this->view->var['st'] = 'userinfo-editpasswd';
        $this->view->displayTpl();
    }

    public function doEditPasswordAction() {
        $callback_url = URL::encode(array(), 'Home', 'UserInfo', 'passwdEdit');
        $this->checkUser($callback_url);
        
        $vet_code = strtolower($_SESSION['vet_code']);
        $_SESSION['vet_code'] = "";
        $form_vet_code = strtolower($_REQUEST['vet_code']);
        if($vet_code != $form_vet_code) {
            echo json_encode(
                array(
                    'errno' => 1,
                    'error' => '验证码不正确'
                )
            );
            exit;
        }
        
        $prepassword = $this->getParam($_REQUEST, 'prepasswd', '');
        $passwd = $this->getParam($_REQUEST, 'passwd', '000000');
        $passwd2 = $this->getParam($_REQUEST, 'passwd2', '000000');
        if($passwd != $passwd2) {
            echo json_encode(array(
                'errno' => 1,
                'error' => '两次密码不一致'
            ));
            exit;
        }
        if($prepassword != $this->user['user_password']) {
            echo json_encode(array(
                'errno' => 1,
                'error' => '原密码不正确'
            ));
            exit;
        }

        $dao = new UserDao();
        $dao->update(array(
            'user_password' => $passwd,
        ), 'user_id', $this->user['user_id']);

        echo json_encode(array(
            'errno' => 0,
            'error' => '修改成功 '
        ));
    }
}
