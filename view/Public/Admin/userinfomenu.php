<style type="text/css">
.item_slt {
    background: #F7F7F7;
    font-weight: bold;
}
</style>
<script language="javascript">
$(document).ready(function(){
    $('.block-header').css('cursor', 'pointer');
});
function show_item(obj) {
    $(obj).siblings().toggle();
}
</script>
<div class="block" style="width: 200px;">
    <div class="block-header" onclick="show_item(this)">
        蔬菜水果
    </div>
    <div class="block-body <?php if($ctg_b != 'goods'){ echo 'hide';}?>">
        <div class="block-body-info">
            <div class="<?php if("{$ctg_b}-{$ctg_s}" == 'goods-add'){ echo 'item_slt';}?>">
                <a href="index.php?s=Admin-Manage-add">添加</a>
            </div>
            <div class="<?php if("{$ctg_b}-{$ctg_s}" == 'goods-list'){ echo 'item_slt';}?>">
                <a href="index.php?s=Admin-Manage-list">查询</a>
            </div>
            <div class="<?php if("{$ctg_b}-{$ctg_s}" == 'goods-recycle'){ echo 'item_slt';}?>">
                <a href="index.php?s=Admin-Manage-recycle">回收站</a>
            </div>
        </div>

    </div>
</div>
<div class="block" style="width: 200px;">
    <div class="block-header" onclick="show_item(this)">
        订单管理
    </div>
    <div class="block-body <?php if($ctg_b != 'order'){ echo 'hide';}?>">
        <div class="block-body-info">
            <div  class="<?php if("{$ctg_b}-{$ctg_s}" == 'order-list'){ echo 'item_slt';}?>">
                <a href="index.php?s=Admin-Order-list">查询</a>
            </div>
            <!--div>
                <a href="index.php?s=Admin-Order-recycle">回收站</a>
            </div-->
        </div>
    </div>
</div>
<div class="block" style="width: 200px;">
    <div class="block-header" onclick="show_item(this)">
        用户管理
    </div>
    <div class="block-body <?php if($ctg_b != 'user'){ echo 'hide';}?>">
        <div class="block-body-info">
            <div class="<?php if("{$ctg_b}-{$ctg_s}" == 'user-list'){ echo 'item_slt';}?>">
                <a href="index.php?s=Admin-User-list">查询</a>
            </div>
            <!--div>
                <a href="index.php?s=Admin-Order-recycle">回收站</a>
            </div-->
        </div>
    </div>
</div>
<div class="block" style="width: 200px;">
    <div class="block-header" onclick="show_item(this)">
        推荐管理
    </div>
    <div class="block-body <?php if($ctg_b != 'commend'){ echo 'hide';}?>">
        <div class="block-body-info">
            <div class="<?php if("{$ctg_b}-{$ctg_s}" == 'commend-left'){ echo 'item_slt';}?>">
                <a href="<?php echo URL::encode(array('type' => CommendConfig::LEFT), 'Admin', 'Commend', 'list')?>">左侧推荐</a>
            </div>
            <div class="<?php if("{$ctg_b}-{$ctg_s}" == 'commend-right'){ echo 'item_slt';}?>">
                <a href="<?php echo URL::encode(array('type' => CommendConfig::RIGHT), 'Admin', 'Commend', 'list')?>">明星产品</a>
            </div>
            <div class="<?php if("{$ctg_b}-{$ctg_s}" == 'commend-xinpin'){ echo 'item_slt';}?>">
                <a href="<?php echo URL::encode(array('type' => CommendConfig::NEWGOODS), 'Admin', 'Commend', 'list')?>">新品上市</a>
            </div>
            <div class="<?php if("{$ctg_b}-{$ctg_s}" == 'commend-benzhou'){ echo 'item_slt';}?>">
                <a href="<?php echo URL::encode(array('type' => CommendConfig::WEEKLY), 'Admin', 'Commend', 'list')?>">本周推荐</a>
            </div>
            <div class="<?php if("{$ctg_b}-{$ctg_s}" == 'commend-chaozhi'){ echo 'item_slt';}?>">
                <a href="<?php echo URL::encode(array('type' => CommendConfig::HOT), 'Admin', 'Commend', 'list')?>">超值热购</a>
            </div>
            <div class="<?php if("{$ctg_b}-{$ctg_s}" == 'commend-ldyktj'){ echo 'item_slt';}?>">
                <a href="<?php echo URL::encode(array('type' => CommendConfig::LDYK_TUIJIAN), 'Admin', 'Commend', 'list')?>">两点一刻推荐</a>
            </div>
            <div class="<?php if("{$ctg_b}-{$ctg_s}" == 'commend-shucai'){ echo 'item_slt';}?>">
                <a href="<?php echo URL::encode(array('type' => CommendConfig::VEGETABLE), 'Admin', 'Commend', 'list')?>">蔬菜推荐</a>
            </div>
            <div class="<?php if("{$ctg_b}-{$ctg_s}" == 'commend-shucai-word'){ echo 'item_slt';}?>">
                <a href="<?php echo URL::encode(array('type' => CommendConfig::VEGETABLE_WORD), 'Admin', 'Commend', 'list')?>">蔬菜文字推荐</a>
            </div>
            <div class="<?php if("{$ctg_b}-{$ctg_s}" == 'commend-shuiguo'){ echo 'item_slt';}?>">
                <a href="<?php echo URL::encode(array('type' => CommendConfig::FRUIT), 'Admin', 'Commend', 'list')?>">水果推荐</a>
            </div>
            <div class="<?php if("{$ctg_b}-{$ctg_s}" == 'commend-shuiguo-word'){ echo 'item_slt';}?>">
                <a href="<?php echo URL::encode(array('type' => CommendConfig::FRUIT_WORD), 'Admin', 'Commend', 'list')?>">水果文字推荐</a>
            </div>
        </div>
    </div>
</div>

<!--div class="block" style="width: 200px;">
    <div class="block-header">
        评论管理
    </div>
    <div class="block-body">
        <div class="block-body-info">
            <div>
                <a href="index.php?s=Admin-Comment-list">查询</a>
            </div>
        </div>
    </div>
</div-->
<div class="block" style="width: 200px;">
    <div class="block-header" onclick="show_item(this)">
        活动咨询
    </div>
    <div class="block-body <?php if($ctg_b != 'ariticle'){ echo 'hide';}?>">
        <div class="block-body-info">
            <div class="<?php if("{$ctg_b}-{$ctg_s}" == 'ariticle-index'){ echo 'item_slt';}?>">
                <a href="<?php echo URL::encode(array(), 'Admin', 'Ariticle', 'index')?>">文章列表</a>
            </div>
            <div class="<?php if("{$ctg_b}-{$ctg_s}" == 'ariticle-publish'){ echo 'item_slt';}?>">
                <a href="<?php echo URL::encode(array(), 'Admin', 'Ariticle', 'publish')?>">发表文章</a>
            </div>
        </div>
    </div>
</div>
<div class="block" style="width: 200px;">
    <div class="block-header" onclick="show_item(this)">
        广告管理
    </div>
    <div class="block-body <?php if($ctg_b != 'adimg'){ echo 'hide';}?>">
        <div class="block-body-info">
            <div class="<?php if("{$ctg_b}-{$ctg_s}" == 'adimg-add'){ echo 'item_slt';}?>">
                <a href="<?php echo URL::encode(array(), 'Admin', 'ADImg', 'add')?>">添加图片广告</a>
            </div>
            <div class="<?php if("{$ctg_b}-{$ctg_s}" == 'adimg-list'){ echo 'item_slt';}?>">
                <a href="<?php echo URL::encode(array(), 'Admin', 'ADImg', 'list')?>">查看图片广告</a>
            </div>

        </div>
    </div>
</div>

