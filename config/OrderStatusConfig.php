<?php
class OrderStatusConfig {
	const INIT = 1;     //订单刚刚建立
    const SENDING = 2;  //订单配送中
    const FINISH = 3;   //订单配送完成
    const DELETE = 100; //订单删除
    public static $config = array(
	    self::INIT => '已下单',
        self::SENDING => '配送中',
        self::FINISH => '订单完成',
        self::DELETE => '订单已删除'
    );

    public static function getStatus($id) {
        if(array_key_exists($id, self::$config)) {
            return self::$config[$id];
        } else {
            return '未知状态';
        }
    }
}
