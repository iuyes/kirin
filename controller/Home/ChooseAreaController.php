<?php 
class Home_ChooseAreaController extends Home_HomeController {
    protected $user = array();

    public function indexAction() {
        $this->view->displayTpl();
    }

    public function chooseAction() {
        $location = $this->getParam($_REQUEST, 'location', '0');
        if($location == 0) {
            $this->goback('定位失败');
            exit;
        }
        setcookie('location', $location, time() + 3600*24*30*12*10);
        header('Location: ' . URL::encode(array('location' => $location), 'Home', 'Index', 'index'));
    }
}
