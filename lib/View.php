<?php
class View {
	
    public $var = array();
    protected $module = 'Home'; //默认模块名称
    protected $controller = 'Index'; //默认Controller名称
    protected $action = 'index'; //默认Action名称
    
    public function __construct($module, $controller, $action) {
    	
    	$this->module = $module;
    	$this->controller = $controller;
    	$this->action = $action;
    
    }
    
    public function displayTpl($module = null, $controller = null, $action = null){
    	
    	$module = $module == null ? $this->module : $module;
    	$controller = $controller == null ? $this->controller : $controller;
    	$controller = str_replace('_', '/', $controller);
    	$action = $action == null ? $this->action : $action;
    	
    	$tpl = "view/{$module}/{$controller}/{$action}.php";
        if(file_exists($tpl)){
            extract($this->var);
            require_once $tpl;
        } else {
            echo "file[{$tpl}] not exist.";
        }
    }
    
    public function includeTpl($module, $controller, $action){
    	$controller = str_replace('_', '/', $controller);
        $tpl = "view/{$module}/{$controller}/{$action}.php";
        if(file_exists($tpl)) {
        	extract($this->var);
            require_once $tpl;
        } else {
            echo "file[{$tpl}] not exist.";
        }
    }
}