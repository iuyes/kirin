<?php
/**
 * 入口文件，本文件的功能如下：
 * 1. 初始化全局变量
 * 2. 完成自动加载设置
 * 3. 完成URL解析 URL的格式为 http://www.url.com/ct=Index/at=index/key=value/key2=value2
 */
//初始化全局变量
date_default_timezone_set('Etc/GMT-8');

//自动加载
set_include_path('.' . PATH_SEPARATOR . './lib/'
        . PATH_SEPARATOR . './lib/db/'
        . PATH_SEPARATOR . './lib/html/'
        . PATH_SEPARATOR . './lib/log/'
        . PATH_SEPARATOR . './controller/'
        . PATH_SEPARATOR . './model/'
        . PATH_SEPARATOR . './config/'
        . PATH_SEPARATOR . './dao/'
        . PATH_SEPARATOR . get_include_path());
spl_autoload_register();
function __autoload($class_name){
    $arr = explode('_', $class_name);
    $filename = implode('/', $arr).'.php';
    
    include_once $filename;
    
}
spl_autoload_register('__autoload');

//URL解析 
$re = URL::decode($_GET);
$kirin_m = $re['kirin_m'];
$kirin_c = $re['kirin_c'];
$kirin_a = $re['kirin_a'];
$kirin_p = $re['kirin_p'];

$_GET = array_merge($_GET, $kirin_p);
$_REQUEST = array_merge($_REQUEST, $kirin_p);

$o = $kirin_m.'_'.$kirin_c.'Controller';

$runner = new $o();
$runner->execute($kirin_m, $kirin_c, $kirin_a);
