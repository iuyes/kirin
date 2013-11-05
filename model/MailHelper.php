<?php
class MailHelper {
    public static function send($to, $title, $content) {
        $from = "admin@liangdianyike.com";
        $headers = "From: $from";
        mail($to,$title,$content,$headers);
    }
}
