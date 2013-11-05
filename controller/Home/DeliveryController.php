<?php
session_start();
class Home_DeliveryController extends Home_HomeController {
    public function indexAction(){
        $this->view->displayTpl();
    }

    public function doAddAction() {
        $callback_url = URL::encode(array(), 'Home', 'UserInfo', 'login');
        $this->checkUser($callback_url);

        //验证码验证
        $vet_code = strtolower($_SESSION['vet_code']);
        $_SESSION['vet_code'] = ""; 
        $form_vet_code = strtolower($_REQUEST['vet_code']);
        if($vet_code != $form_vet_code) {
            echo json_encode(array(
                'errno' => 1,
                'error' => '验证码错误'
            )); 
            exit;
        }

        $dao_delivery = new DeliveryDao();
        $dao_delivery->add(
            array(
                'user_id' => $this->user['user_id'],
                'delivery_address' => $this->getParam($_REQUEST, 'delivery_address', ''),
                'delivery_phone' => $this->getParam($_REQUEST, 'delivery_phone', ''),
                'delivery_name' => $this->getParam($_REQUEST, 'delivery_name', ''),
                'delivery_status' => 0, 
                'delivery_add_at' => time() 
            )
        );

        echo json_encode(array(
            'errno' => 0,
            'error' => '添加成功',
            'url' => $_SERVER['HTTP_REFERER']
        ));
    }

    public function deleteAction() {
        $this->check();
        $delivery_id = $this->getParam($_REQUEST, 'delivery_id', 0);
        $user_id = $this->user['user_id'];
        $dao = new DeliveryDao();
        $dao->update(array(
            'delivery_status' => time()
        ), 'delivery_id', $delivery_id);

        header('Location: ' .  $_SERVER['HTTP_REFERER']);
    }
}
