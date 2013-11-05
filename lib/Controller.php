<?php
class Controller {
    /**
     * 默认的action
     */
    public function indexAction(){
        
    }
    
    /**
     * 确定用哪个类的哪个方法处理请求
     * @param string $module 模块名称
     * @param string $controller 控制器名称，不包含'Controller'
     * @param string $action 动作名称
     */
    public function execute($module, $controller, $action){
    	// 检查操作是否存在，暂时使用$this对象进行判断
    	$controller = "{$controller}Controller";
    	$action = "{$action}Action";
        if(method_exists($this, $action)){
            $this->$action();
        } else {
            echo "Module[{$module}] Controller[{$controller}] Action[{$action}] not exist.";
            exit;
        }
    }
}