<?php
class Api_UserController extends BaseController {
    public function loginAction() {
        $username = $this->getParam($_GET, 'uname', '');
        $password = $this->getParam($_GET, 'password', '');
        $dao = new UserDao();
        $re = $dao->get(array(
            'user_name' => $username,
            'user_password' => $password,
        ));
        if($re['total'] <= 0) {
            echo json_encode(array(
                'errno' => 1,
                'name' => $username,
                'user_vet_code' => '',
            ));
        } else {
            echo json_encode(array(
                'errno' => 0,
                'name' => $username,
                'user_vet_code' => md5($username.$password.'http://www.liangdianyike.com'),
            ));
        }
    }
}
