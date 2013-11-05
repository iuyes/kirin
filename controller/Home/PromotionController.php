<?php
class Home_PromotionController extends Home_HomeController {
    public function indexAction(){
        $this->checkArea();
        $location = $this->getParam($_COOKIE, 'location', 0);
        header('Location: ' . URL::encode(array('search_key' => '', 'sort_type' => 'cx', 'sort' => 'down', 'location' => $location), 'Home', 'Search', 'search'));
    }
}
