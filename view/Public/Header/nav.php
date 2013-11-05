<?php
if(array_key_exists('liangdianyikeuname', $_COOKIE)) {
    $uname = $_COOKIE['liangdianyikeuname'];
} else {
    $uname = "";
}
?>
<script language="javascript">
$(document).ready(function(){
    //$('img').corner("5px");
});
</script>
<div class="nav">
    <div class="s_width center">
        <div class="float-left">
            <a href="<?php echo URL::encode();?>">首页</a>
            <?php if(isset($_COOKIE['location'])):?>
                <a href="<?php echo URL::encode(array(), 'Home', 'Index', 'index')?>" style="color: #EC8800"><?php $tmp = LocationConfig::getLocation(array_key_exists('location', $_COOKIE) ? $_COOKIE['location'] : 0); echo $tmp['name']?></a>
            <?php endif;?>
            <a href="<?php echo URL::encode(array(), 'Home', 'ChooseArea', 'index')?>">[切换商圈]</a>
            <a href="javascript:void(0)" onclick="alert('请按 Ctrl＋D 收藏')">收藏本站</a>
        </div>
        <div>
            <?php if($uname):?>
                <font style="font-size: 13px; color: #666666;">您好,</font>
                <a href="index.php?s=Home-UserInfo-index" style="color: #EC8800"><?php echo $uname;?></a>
                <font style="font-size: 13px; color: #666666;">!</font>
                <?php if(in_array($uname, AdminConfig::$config)):?>
                    <a href="<?php echo URL::encode(array(), 'Admin', 'Index', 'index')?>">管理</a>
                <?php endif;?>
                <a href="index.php?s=Home-Collect-index">我的收藏</a>
                <a href="index.php?s=Home-Order-myOrder">我的订单</a>
                <a href="index.php?s=Home-ShoppingCart-index">购物车</a>
            <?php else:?>
                <a href="index.php?s=Home-UserInfo-login">登录</a>
                <a href="index.php?s=Home-UserInfo-register">注册</a>
            <?php endif;?>
            <?php if($uname):?> 
                <a href="<?php echo URL::encode(array(), 'Home', 'UserInfo', 'doLogout')?>">退出</a>
            <?php else:?>
                
            <?php endif;?>
        </div>
    </div>
</div>
