<!-- 顶部广告 -->
<script language="javascript" type="text/javascript">
function adnav_show() {
    if(typeof($.cookie('index_ad_have_show')) == 'undefined') {
        $('#ad-nav').slideDown(1000);
        $.cookie('index_ad_have_show', 'yes', { expires: 1});
    }
}

function adnav_close() {
    $.cookie('index_ad', 'close', { expires: 1});
    $('#ad-nav').hide();
}

$(function(){
    adnav_show();
});
</script>
<?php
    $dao = new ADImgDao();
    $location = array_key_exists('location', $_COOKIE) ? $_COOKIE['location'] : 0;
    $re = $dao->get(array('ad_img_type' => ADImgConfig::INDEX_TOP, 'ad_img_location' => $location, 'ad_img_status' => 0), 0, 1, 'ad_img_add_at desc');
    $ad_index_top = $re['total'] ? $re['list'][0] : array();
?>
<?php if($ad_index_top && !array_key_exists("index_ad", $_COOKIE)):?>
    <div id="ad-nav" class="center s_width ad-nav" style="overflow: hidden; <?php if(array_key_exists('index_ad_have_show', $_COOKIE)) { echo 'display: block;';}?>">
        <a href="<?php echo $ad_index_top['ad_img_url']?>" target=__blank><img src="<?php echo $ad_index_top['ad_img_src']?>" style="border: 0px;"></a>
        <s class="close" onclick="adnav_close()"></s>
    </div>
<?php endif;?>
<div class="s_width center search">
    <div class="float-left logo">
        <a href="<?php echo URL::encode()?>">
            <img style="height: 65px;" src="static/img/logo.png">
        </a>
    </div>
    <div class="float-left search">
        <form method="get" action="<?php echo URL::encode(array(), 'Home', 'Search', 'search')?>" class="search-form">
            <input type="hidden" name="s" value="Home-Search-search">
            <input type="hidden" name="location" value="<?php echo array_key_exists('location', $_COOKIE) ? $_COOKIE['location'] : 0;?>">
            <div>
                <div class="float-left">
                    <input class="input-text" name="search_key" type="text" value="<?php if(empty($search_key)) { echo '西瓜';} else { echo $search_key;}?>">
                </div>
                <div class="float-left">
                    <input class="input-submit" type="submit" value="搜索">
                </div>
                <div style="clear: both"></div>
            </div>
            <div class="hot-search" style='*margin-left: 40px;'>
                <font>
                    热门搜索:
                </font>
                <a href="<?php echo URL::encode(array('search_key' => '苹果'), 'Home', 'Search', 'search')?>">苹果</a>
                <a href="<?php echo URL::encode(array('search_key' => '桃'), 'Home', 'Search', 'search')?>">桃</a>
                <a href="<?php echo URL::encode(array('search_key' => '火龙果'), 'Home', 'Search', 'search')?>">火龙果</a>
                <a href="<?php echo URL::encode(array('search_key' => '李子'), 'Home', 'Search', 'search')?>">李子</a>
                <a href="<?php echo URL::encode(array('search_key' => '西红柿'), 'Home', 'Search', 'search')?>">西红柿</a>
                <a href="<?php echo URL::encode(array('search_key' => '黄瓜'), 'Home', 'Search', 'search')?>">黄瓜</a>
                <a href="<?php echo URL::encode(array('search_key' => '茄子'), 'Home', 'Search', 'search')?>">茄子</a>
                <a href="<?php echo URL::encode(array('search_key' => '油菜'), 'Home', 'Search', 'search')?>">油菜</a>
            </div>
        </form>
    </div>
    <div class="float-left cust">
        <img src="static/img/brand.gif">
        <!--
        <div class="float-left">
            <a href="<?php echo URL::encode(array(), 'Home', 'UserInfo', 'index')?>">个人中心</a>
        </div>
        <div class="float-left">
            <a href="<?php echo URL::encode(array(), 'Home', 'ShoppingCart', 'index')?>">购物车</a>
        </div>
        -->
    </div>
    <div style="clear: both"></div>
</div>
