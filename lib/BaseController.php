<?php
class BaseController extends Controller {
    public $view = null;
    
    /**
     * @see Controller::execute()
     */
    public function execute($module, $controller, $action){
        $this->view = new View($module, $controller, $action);
        parent::execute($module, $controller, $action);
    }
    
    public function getParam($arr, $key, $default){
    	if(array_key_exists($key, $arr)) {
    		return $arr[$key];
    	} else {
    		return $default;
    	}
    }
    
    public function goBack($alert, $url = ''){
    	@header('Content-type: text/html; charset=utf-8');
    	if($url == ''){
    		echo "<script>alert('{$alert}');history.go(-1);</script>";
    	} else {
    		echo "<script>alert('{$alert}');window.location.href='{$url}'; </script>";		
    	}
    	exit;
    }

    public function getPage() {
        $page = $this->getParam($_REQUEST, 'page', 1);
        return max($page, 1);
    }

    public function getPageSize() {
        $pagesize = $this->getParam($_REQUEST, 'pagesize', 15);
        return max($pagesize, 1);
    }

    public function getStart() {
        $page = $this->getPage();
        return ($page - 1) * $this->getPageSize();
    }

    public function getLength() {
        return $this->getPageSize();
    }
}
