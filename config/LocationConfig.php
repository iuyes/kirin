<?php
class LocationConfig {
    
    public static $config = array(
	    1 => array(
            'name' => '回龙观',
            'url' => 'static/img/huilongguan.png'
            ),

    );

    public static function getLocation($id) {
        if(array_key_exists($id, self::$config)) {
            return self::$config[$id];
        } else {
            return array(
                'name' => '未知区域',
                'url' => ''
            );
        }
    }
}
