<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>        
        <title>列表</title>
    </head>

    <body>
        <?php $this->includeTpl('Public', 'Header', 'nav');?>
        <div class="s_width center level">
            <div class="float-left" style="width: 19%;">
                <?php $this->includeTpl('Public', 'Admin', 'userinfomenu');?>
            </div>
            <div class="float-left detail" style="width: 81%;">
                <div>
                    <div class="title userinfo-title">
                        <font>蔬菜水果</font>
                    </div>
                    <div class="border" style="width: 100%; min-height: 400px;">
                       <form class="search-form" style="margin: 0px;" action="<?php echo URL::encode(array(), 'Admin', 'Manage', 'list')?>" method="get">
                            <div style="float: right;">
                                <input type="hidden" name="s" value="Admin-Manage-list">
                                <div class="float-left">
                                    <select name="location">
                                    <?php foreach(LocationConfig::$config as $k => $v):?>
                                        <option value="<?php echo $k;?>" <?php if($location == $k) { echo 'selected';}?>><?php echo $v['name']?></option>
                                    <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="float-left">
                                    <input type="text" value="<?php echo $search_value?>" placeholder="请输入物品名称" name="goods_name">
                                </div>
                                <div class="float-left">
                                    <input type="submit" value="搜索">
                                </div>
                                <div style="clear: both"></div>
                            </div> 
                        </form>
                        <table class="cart-table" border="0" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <td width="15%">商品</td>
                                    <td width="10%">区域</td>
                                    <td width="10%">类型</td>
                                    <td width="15%">价格</td>
                                    <td width="15%">重量范围</td>
                                    <td width="15%">图片</td>
                                    <td width="20%">操作</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($list as $k => $goods):?>
                                <tr>
                                    <td>
                                        <a href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index')?>"><?php echo $goods['goods_name']?></a>
                                    </td>
                                    <td>
                                        <?php $re = LocationConfig::getLocation($goods['goods_location']); echo $re['name'];?>
                                    </td>
                                    <td>
                                        <?php if($goods['goods_type'] == 1) { echo '蔬菜';} else { echo '水果';}?>
                                    </td>
                                    <td>
                                        <?php echo $goods['goods_price']?>元/
                                        <?php echo $goods['goods_price_weight'];?>g
                                    </td>
                                    <td>
                                        <?php echo $goods['goods_weight_min'];?>g~
                                        <?php echo $goods['goods_weight_max']?>g
                                    </td>
                                    <td>
                                        <a target="_blank" href="<?php echo $goods['goods_img']?>">查看</a>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" onmouseover="$('.popuplist').hide(); $(this).next().show()">操作</a>
                                        <div class="popuplist text-align-left" style="display: none; border: 1px solid #E13335;">
                                            <a onclick="return confirm('确定需要删除?')" href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Admin', 'Manage', 'doDelete')?>">删除</a>
                                            <a href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Admin', 'Manage', 'edit')?>">编辑</a>
                                            <a href="<?php echo URL::encode(array('goods_id' => $goods['goods_id'], 'type' => CommendConfig::LEFT, 'location' => $location), 'Admin', 'Commend', 'set')?>">左侧推荐</a>
                                            <a href="<?php echo URL::encode(array('goods_id' => $goods['goods_id'], 'type' => CommendConfig::RIGHT, 'location' => $location), 'Admin', 'Commend', 'set')?>">右侧推荐</a>
                                            <a href="<?php echo URL::encode(array('goods_id' => $goods['goods_id'], 'type' => CommendConfig::NEWGOODS, 'location' => $location), 'Admin', 'Commend', 'set')?>">设置新品</a>
                                            <a href="<?php echo URL::encode(array('goods_id' => $goods['goods_id'], 'type' => CommendConfig::WEEKLY, 'location' => $location), 'Admin', 'Commend', 'set')?>">本周推荐</a>
                                            <a href="<?php echo URL::encode(array('goods_id' => $goods['goods_id'], 'type' => CommendConfig::HOT, 'location' => $location), 'Admin', 'Commend', 'set')?>">超值热购</a>
                                            <a href="<?php echo URL::encode(array('goods_id' => $goods['goods_id'], 'type' => CommendConfig::LDYK_TUIJIAN, 'location' => $location), 'Admin', 'Commend', 'set')?>">两点一刻推荐</a>
                                            <a href="<?php echo URL::encode(array('goods_id' => $goods['goods_id'], 'type' => CommendConfig::VEGETABLE, 'location' => $location), 'Admin', 'Commend', 'set')?>">蔬菜推荐</a>
                                            <a href="<?php echo URL::encode(array('goods_id' => $goods['goods_id'], 'type' => CommendConfig::VEGETABLE_WORD, 'location' => $location), 'Admin', 'Commend', 'set')?>">蔬菜文字推荐</a>
                                            <a href="<?php echo URL::encode(array('goods_id' => $goods['goods_id'], 'type' => CommendConfig::FRUIT, 'location' => $location), 'Admin', 'Commend', 'set')?>">水果推荐</a>
                                            <a href="<?php echo URL::encode(array('goods_id' => $goods['goods_id'], 'type' => CommendConfig::FRUIT_WORD, 'location' => $location), 'Admin', 'Commend', 'set')?>">水果文字推荐</a>
                                        </div>
                                    </td>
                                </tr>   
                                <?php endforeach;?>
                            </tbody>
                        </table>
                        <div class="page">
                            <ul>
                                <?php for($i=1; $i<=ceil($total/$pagesize); $i++):?>
                                    <li class="<?php if($i == $page){ echo 'page_active';}?>">
                                        <a href="<?php echo URL::encode(array('page' => $i, 'pagesize' => $pagesize), 'Admin', 'Manage', 'list')?>"><?php echo $i;?></a>
                                    </li>
                                <?php endfor;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
    </body>
</html>
