<?php
/**
 * VetCode 
 * 
 * @version 1.0
 * @copyright 2011 - 2013 BaiDu
 * @author niujiaming<niujiaming@baidu.com> 
 * @license liangdianyike
 */
class VetCode {
    /**
     * need 
     * 判断是否需要显示验证码 
     * @static
     * @access public
     * @return void
     */
    public static function need() {
        $ip = HttpHelper::getIP();
        $dao = new VCClientDao();
        $re = $dao->get(array('vc_client_ip' => $ip, 'vc_client_add_at' => date('Ymd', time())));
        if($re['total'] > 0 && $re['list'][0]['vc_client_times'] >= 5) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * plusOne 
     * 给某个IP增加错误登陆或者注册的次数 
     * @access public
     * @return void
     */
    public static function plusOne() {
        $ip = HttpHelper::getIP();
        $dao = new VCClientDao();
        $re = $dao->get(array('vc_client_ip' => $ip, 'vc_client_add_at' => date('Ymd', time())));
        if($re['total'] > 0 && $re['list'][0]['vc_client_times'] > 0) { //今天曾经错误登陆或者注册
            $vc_client_times = $re['list'][0]['vc_client_times'] + 1;
            $vc_client_id = $re['list'][0]['vc_client_id'];
            //更新错误次数
            $dao->update(array('vc_client_times' => $vc_client_times), 'vc_client_id', $vc_client_id);
        } else { //本次是第一次错误登陆或者注册
            $arr = array(
                'vc_client_ip' => $ip,
                'vc_client_times' => 1,
                'vc_client_add_at' => date('Ymd', time()),
            );    
            $dao->add($arr);
        }
    }
}
