<?php
class CommendConfig {
	const LEFT = 1;     
    const RIGHT = 2;  
    const NEWGOODS = 3;
    const WEEKLY = 4;
    const HOT = 5;
    const VEGETABLE = 6;
    const FRUIT = 7;
    const LDYK_TUIJIAN = 8;
    const VEGETABLE_WORD = 9;
    const FRUIT_WORD = 10;
    public static $config = array(
        self::LEFT => '左侧推荐',
        self::RIGHT => '明星产品',
        self::NEWGOODS => '新品推荐',
        self::WEEKLY => '本周推荐',
        self::HOT => '热门推荐',
        self::VEGETABLE => '蔬菜推荐',
        self::VEGETABLE_WORD => '蔬菜文字推荐',
        self::FRUIT => '水果推荐',
        self::FRUIT_WORD => '水果文字推荐',
        self::LDYK_TUIJIAN => '两点一刻推荐',
    );

    public static function getStatus($id) {
        if(array_key_exists($id, self::$config)) {
            return self::$config[$id];
        } else {
            return '未知状态';
        }
    }
}
