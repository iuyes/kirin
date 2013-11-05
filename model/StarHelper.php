<?php
class StarHelper {
    public static function getStar($score) {
        $score = round($score);
        return "static/img/star-{$score}.png";
    }
}
