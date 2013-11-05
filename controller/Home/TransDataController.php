<?php 
class Home_TransDataController extends BaseController {
    protected $user = array();

    public function execute($module, $controller, $action) {
        return parent::execute($module, $controller, $action);
    }

    public function indexAction() {
        $dao_user = new UserDao();
        $dao_order = new OrderDao();
        $dao_delivery = new DeliveryDao();

        $re = $dao_user->get();
        $user_list = $re['list'];
        foreach ($user_list as $user) {
            //更新order表
            $row = array(
                'send_to_phone' => $user['user_phone'],
                'send_to_name' => $user['user_name']
            );
            $dao_order->update($row, 'order_add_by', $user['user_id']);

            //将配送信息插入到delivery表
            $row = array(
                'user_id' => $user['user_id'],
                'delivery_address' => $user['user_address'],
                'delivery_phone' => $user['user_phone'],
                'delivery_name' => $user['user_name'],
                'delivery_status' => 0,
                'delivery_add_at' =>  time()
            );
            $dao_delivery->add($row);
        }
    }
}
