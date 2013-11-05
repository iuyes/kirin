<?php
class DBConfig {
    public static function getConfig(){
        /**/
        return array(
                'host' => '127.0.0.1',
                'port' => 3306,
                'uname' => 'root',
                'passwd' => '123456',
                'dbname' => 'kirin',
        );
        /*
        return array(
            'host' => 'hdm-090.hichina.com',
            'port' => '3306',
            'uname' => 'hdm0900649',
            'passwd' => 'niujiaming413897',
            'dbname' => 'hdm0900649_db'
        );
        /**/
    }
}
