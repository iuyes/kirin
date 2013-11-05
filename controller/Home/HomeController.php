<?php 
class Home_HomeController extends BaseController {
    protected $user = array();

    public function execute($module, $controller, $action) {
        return parent::execute($module, $controller, $action);
    }

    protected function check() {
        if(array_key_exists('liangdianyikeuname', $_COOKIE)) {
            $uname = $_COOKIE['liangdianyikeuname'];
        } else {
            $uname = "";
        }

        $dao = new UserDao();
        $re = $dao->get(array('user_name' => $uname));
        if($re['total'] == 0){
            return false;
        } else {
            $this->user = $re['list'][0];
            return $this->user;
        }
    }

    /**
     * checkUser 
     * 判断用户是否登陆，如果登陆了，直接返回，如果没有登陆，跳转到登陆页面进行登陆 
     * @param mixed $callback 
     * @access public
     * @return void
     */
    public function checkUser($callback = false) {
        if($this->check()) {
           return true; 
        }
        
        if($callback == false) {
            $callback = URL::encode(array(), 'Home', 'Index', 'index');
        }
        $callback = urlencode($callback);
        $login_url = URL::encode(array('_t' => $callback), 'Home', 'UserInfo', 'login');
        header('Location: ' . $login_url);
        exit;
    }

    public function checkArea() {
        //判断url中有没有携带区域相关的参数
        $location = $this->getParam($_REQUEST, 'location', 0);
        $location = intval($location); //这一行代码主要是兼容之前的定位（之前用字符串）
        
        if($location != 0) { 
            $_COOKIE['location'] = $location;
            setcookie('location', $location, time() + 3600*24*30*12*10);
        } else {
            header('Location: ' .  URL::encode(array(), 'Home', 'ChooseArea', 'index'));
        }
        /**
        if($location == 0) {
            //判断url中有没有携带区域相关的参数
            $location = $this->getParam($_REQUEST, 'location', 0);
            $location = intval($location); //这一行代码主要是兼容之前的定位（之前用字符串）
            
            if($location != 0) {//更新cookie中的区域信息
                $_COOKIE['location'] = $location;
                setcookie('location', $location, time() + 3600*24*30*12*10);
                //header('Location: ' . URL::encode(array('location' => $location), 'Home', 'ChooseArea', 'choose'));
            } else { //都没有区域相关的信息，那么跳转到区域选择页面
                header('Location: ' . URL::encode(array(), 'Home', 'ChooseArea', 'index'));
                exit;
            }
        }
        **/
    }
}
