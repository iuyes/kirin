<div class="block" style="width: 200px;">
    <div class="block-header">
        账户信息
    </div>
    <div class="block-body">
        <div class="block-body-info">
            <div  class="<?php if(isset($st) && ($st == 'userinfo-index')) { echo 'item-active';}?>">
                <a href="index.php?s=Home-UserInfo-index">基本信息</a>
            </div>
            <div class="<?php if(isset($st) && ($st == 'userinfo-editpasswd')) { echo 'item-active';}?>">
                <a href="index.php?s=Home-UserInfo-passwdEdit">密码修改</a>
            </div>
        </div>

    </div>
</div>
<div class="block" style="width: 200px;">
    <div class="block-header">
        订单服务
    </div>
    <div class="block-body">
        <div class="block-body-info">
            <div class="<?php if(isset($st) && ($st == 'order-myorder')) { echo 'item-active';}?>">
                <a href="index.php?s=Home-Order-myOrder">我的订单</a>
            </div>
            <div class="<?php if(isset($st) && ($st == 'suggest-suggest')) { echo 'item-active';}?>">
                <a href="index.php?s=Home-Suggest-suggest">投诉建议</a>
            </div>
        </div>

    </div>
</div>
<div class="block" style="width: 200px;">
    <div class="block-header">
        购物车
    </div>
    <div class="block-body">
        <div class="block-body-info">
            <div>
                <a href="<?php echo URL::encode(array(), 'Home', 'ShoppingCart', 'index')?>">购物车</a>
            </div>
        </div>

    </div>
</div>

