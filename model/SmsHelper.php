<?php
class SmsHelper {
    public static function send($phone, $msg) {
        $url = "http://utf8.sms.webchinese.cn/?Uid=niujiaming&Key=这里是您的密码&smsMob={$phone}&smsText={$msg}";
        return HttpHelper::get($url);
    }
}
