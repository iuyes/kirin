<?php
class ADImgConfig {
    
    const INDEX_TOP = 1;
    const INDEX_CAROUSEL = 2;
    const COMPANY = 3;

    public static $ad_img_type = array(
        self::INDEX_TOP => '首页顶部广告',
        self::INDEX_CAROUSEL => '首页轮播广告',
        self::COMPANY => '企业订购',
    ); 

}
