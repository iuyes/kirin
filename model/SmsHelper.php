<?php
class SmsHelper {
    public static function send($phone, $msg) {
        $url = "http://utf8.sms.webchinese.cn/?Uid=niujiaming&Key=be9cc4517738f3221fc6&smsMob={$phone}&smsText={$msg}";
        return HttpHelper::get($url);
    }
}
