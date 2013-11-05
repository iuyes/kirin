<?php
class URL {
    /**
     * 生成URL，生成的URL格式为http://www.url.com/s=Home-Index-index/key=value/key2=value2
     * @param array $param
     * @param string $action
     * @param string $method
     * @return string
     */
    public static function encode(array $param = array(), $module = 'Home', $controller='Index', $action='index'){
        //将位置信息添加到每一个URL中，这个主要是为了搜索引擎收录正常
        //存放位置的地方有3个，一个是param，一个是cookie，一个是request
        //如果param中有，意味这我想更新位置信息
        //param没有：以cookie中的位置信息为准，如果cookie没有的话就选用request中的位置信息
        if(!array_key_exists('location', $param)) {
            if(array_key_exists('location', $_COOKIE) && $_COOKIE['location'] != 0) {
                $param['location'] = $_COOKIE['location']; 
            } else {
                $param['location'] = array_key_exists('location', $_REQUEST) ? $_REQUEST['location'] : 0;
            }
        }
        if($module == 'Home') {
            switch ("{$controller}:{$action}"){
                case "Detail:index":
                    $goods_id = $param['goods_id'];
                    unset($param['goods_id']);
                    $location = $param['location'];
                    unset($param['location']);
                    $tmp_arr = array(); 
                    foreach ($param as $k => $v) {
                        $tmp_arr[] = "{$k}={$v}";
                    }
                    if(empty($tmp_arr)) {
                        return "{$goods_id}-{$location}.html";   
                    } else {
                        return "{$goods_id}-{$location}.html?" . implode('&', $tmp_arr); 
                    }
                    break;
            }
        }

        /*一般规则*/
        $arr = array_merge(array('s' => "{$module}-{$controller}-{$action}"), $param);
        $tmp_arr = array();
        foreach ($arr as $k => $v) {
            $tmp_arr[] = "{$k}={$v}";
        }
        return 'index.php?'.implode('&', $tmp_arr);
    }
    
    /**
     * 对encode生成的url的一种解析 其中uri为REQUEST_URI
     */
    public static function decode($_get){
        if(!isset($_get['s'])) {
            $s = 'Home-Index-index';
        } else {
            $s = $_get['s'];
        }
        
        $arr_s = explode('-', $s);
        if(count($arr_s) != 3) {
        	echo "Module-Controller-Action[{$s}] illegal";
        	exit;
        }
        return array(
        		'kirin_m' => $arr_s[0], //模块名
        		'kirin_c' => $arr_s[1], //Controller名
        		'kirin_a' => $arr_s[2], //Action名称
        		'kirin_p' => $_get //URL参数数组
        );
    }
}
