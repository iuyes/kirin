<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>        
        <title><?php echo $type_man?>_<?php echo $location_man?>_送货上门-两点一刻，您身边的生活服务专家</title>
        <meta name="keywords" content="蔬菜水果配送，蔬菜配送，水果配送，有机蔬菜，有机水果，外卖配送，两点一刻，美食专家">
        <meta name="description" content="两点一刻(www.liangdianyike.com)主要为大家配送蔬菜和水果，站内所有蔬菜和水果送货上门，目前支持的商圈为：<?php foreach(LocationConfig::$config as $v) { echo $v['name'].' ';}?>" />
    </head>

    <body>
        <?php $this->includeTpl('Public', 'Header', 'nav');?>
        <?php $this->includeTpl('Public', 'Header', 'search');?>
        <?php $this->includeTpl('Public', 'Header', 'menu');?>
        <div class="s_width center">
        </div>
        <div class="s_width center bp" style="border: 1px solid #F7F7F7; min-height: 300px;">
            <div class="float-left" style="width:20%">
                <div class="block" style="margin-top: 5px;">
                    <div class="block-header">
                        蔬菜类
                    </div>
                    <div class="block-body">
                        <div class="ctgout">
                        <a class="ctg" href="<?php echo URL::encode(array('goods_category' => 0, 'type' => CategoryConfig::VEGETABLE), 'Home', 'Index', 'category')?>">所有</a>
                        <?php foreach (CategoryConfig::$category[CategoryConfig::VEGETABLE] as $k => $v): ?>
                            <a class="ctg" href="<?php echo URL::encode(array('goods_category' => $k, 'type' => CategoryConfig::VEGETABLE), 'Home', 'Index', 'category')?>"><?php echo $v;?></a>
                        <?php endforeach;?>
                        <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="block" style="margin-top: 5px;">
                    <div class="block-header">
                        水果类
                    </div>
                    <div class="block-body">
                        <div class="ctgout">
                        <a class="ctg" href="<?php echo URL::encode(array('goods_category' => 0, 'type' => CategoryConfig::FRUIT), 'Home', 'Index', 'category')?>">所有</a>
                        <?php foreach (CategoryConfig::$category[CategoryConfig::FRUIT] as $k => $v): ?>
                            <a class="ctg" href="<?php echo URL::encode(array('goods_category' => $k, 'type' => CategoryConfig::FRUIT), 'Home', 'Index', 'category')?>"><?php echo $v;?></a>
                        <?php endforeach;?>
                        <div class="clear"></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="float-left" style="width: 80%;">
                <!--
                <?php if(empty($list)):?>
                    <div style="width: 300px; margin-left: auto; margin-right: auto; margin-top: 100px;">
                        <div style="color: #E13335; font-weight: bold;">
                            您好查找的商品不存在，建议您<br /><br />
                        </div>
                        <div style="color: #3E3E3E; font-size: 13px;">
                            1. 请更改查询关键词，如“大白菜”改成“白菜”<br /><br />
                            2. 请检查您的输入是否有误<br /><br />
                            3. 进入个人信息，给我们报告BUG
                        </div>
                    </div>
                    <?php $list = array();?>
                <?php endif;?>
                <?php foreach($list as $k => $goods):?>
                    <div class="item">
                        <div class="item-border">
                        <div class="item-pic">
                            <a target=_blank href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index')?>">
                                <img src="<?php echo $goods['goods_img_220x220']?>" width="100%" height="100%"/>
                            </a>
                        </div>
                        <div class="item-link">
                            <a target=_blank href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index')?>"><?php echo $goods['goods_name']?></a>
                            <br />
                            <a target=_blank href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index')?>">
                                <font class="price2">￥<?php echo sprintf("%0.2f", $goods['goods_price'])?></font>/<?php echo $goods['goods_price_weight']?>g</a>
                        </div>
                        </div>
                    </div>
                <?php endforeach;?>
                    <div style="clear: both"></div>
                </div>
                <div class="s_width center page">
                    <ul>
                        <?php for($i = 1; $i <= $total_page; $i++): ?>
                            <li class="<?php if($i == $page) { echo 'page_active';}?>">
                                <a href="<?php echo URL::encode(array('type' => $type, 'page' => $i), 'Home', 'Index', 'category')?>"><?php echo $i;?></a>
                            </li>
                        <?php endfor;?>
                    </ul>
                </div>
                <div style="clear: both;"></div>
                -->
                <div style="margin-left: 30px;">
                    <div class="px">
                        <ul class="pxi float-left">
                            <li class="pxi-li" style="border: 0px; padding-right: 10px;">排序：</li>
                            <?php if($sort_type == 'jg'):?>
                                <?php if($sort == 'down'):?>
                                <li class="pxi-li down-s">
                                    <a href="<?php echo URL::encode(array('search_key' => $search_key, 'sort_type' => 'jg', 'sort' => 'up'), 'Home', 'Search', 'search')?>">价格</a>
                                </li>
                                <?php else:?>
                                <li class="pxi-li up-s">
                                    <a href="<?php echo URL::encode(array('search_key' => $search_key, 'sort_type' => 'jg', 'sort' => 'down'), 'Home', 'Search', 'search')?>">价格</a>
                                </li>
                                <?php endif;?>
                            <?php else:?>
                                <li class="pxi-li down">
                                    <a href="<?php echo URL::encode(array('search_key' => $search_key, 'sort_type' => 'jg', 'sort' => 'down'), 'Home', 'Search', 'search')?>">价格</a>
                                </li>
                            <?php endif;?>
                            <?php if($sort_type == 'cx'):?>
                                <?php if($sort == 'down'):?>
                                    <li class="pxi-li down-s">
                                        <a href="<?php echo URL::encode(array('search_key' => $search_key, 'sort_type' => 'cx', 'sort' => 'up'), 'Home', 'Search', 'search')?>">促销</a>
                                    </li>
                                <?php else:?>   
                                    <li class="pxi-li up-s">
                                        <a href="<?php echo URL::encode(array('search_key' => $search_key, 'sort_type' => 'cx', 'sort' => 'down'), 'Home', 'Search', 'search')?>">促销</a>
                                    </li>
                                <?php endif;?>
                            <?php else:?>
                                <li class="pxi-li down">
                                    <a href="<?php echo URL::encode(array('search_key' => $search_key, 'sort_type' => 'cx', 'sort' => 'down'), 'Home', 'Search', 'search')?>">促销</a>
                                </li>
                            <?php endif;?>
                            <?php if($sort_type == 'sj'):?>
                                <?php if($sort == 'down'):?>
                                    <li class="pxi-li down-s">
                                        <a href="<?php echo URL::encode(array('search_key' => $search_key, 'sort_type' => 'sj', 'sort' => 'up'), 'Home', 'Search', 'search')?>">上架时间</a>
                                    </li>
                                <?php else:?>
                                    <li class="pxi-li up-s">
                                        <a href="<?php echo URL::encode(array('search_key' => $search_key, 'sort_type' => 'sj', 'sort' => 'down'), 'Home', 'Search', 'search')?>">上架时间</a>
                                    </li>
                                <?php endif;?>
                            <?php else:?>
                                <li class="pxi-li down">
                                    <a href="<?php echo URL::encode(array('search_key' => $search_key, 'sort_type' => 'sj', 'sort' => 'down'), 'Home', 'Search', 'search')?>">上架时间</a>
                                </li>
                            <?php endif;?>
                            <?php if($sort_type == 'll'):?>
                                <?php if($sort == 'down'):?>
                                <li class="pxi-li down-s"><a href="<?php echo URL::encode(array('search_key' => $search_key, 'sort_type' => 'll', 'sort' => 'up'), 'Home', 'Search', 'search')?>">浏览次数</a></li>
                                <?php else:?>
                                <li class="pxi-li up-s"><a href="<?php echo URL::encode(array('search_key' => $search_key, 'sort_type' => 'll', 'sort' => 'down'), 'Home', 'Search', 'search')?>">浏览次数</a></li>
                                <?php endif;?>
                            <?php else:?>
                                <li class="pxi-li down"><a href="<?php echo URL::encode(array('search_key' => $search_key, 'sort_type' => 'll', 'sort' => 'down'), 'Home', 'Search', 'search')?>">浏览次数</a></li>
                            <?php endif;?>
                            <?php if($sort_type == 'xs'):?>
                                <?php if($sort == 'down'):?>
                                <li class="pxi-li down-s"><a href="<?php echo URL::encode(array('search_key' => $search_key, 'sort_type' => 'xs', 'sort' => 'up'), 'Home', 'Search', 'search')?>">销售量</a></li>
                                <?php else:?>
                                <li class="pxi-li up-s"><a href="<?php echo URL::encode(array('search_key' => $search_key, 'sort_type' => 'xs', 'sort' => 'down'), 'Home', 'Search', 'search')?>">销售量</a></li>
                                <?php endif;?>
                            <?php else:?>
                                <li class="pxi-li down"><a href="<?php echo URL::encode(array('search_key' => $search_key, 'sort_type' => 'xs', 'sort' => 'down'), 'Home', 'Search', 'search')?>">销售量</a></li>
                            <?php endif;?>
                        </ul>
                        <?php if($total_page):?>
                            <ul class="float-left page-beauty">
                                <?php if($page <= 1):?>
                                    <li><a href="javascript:void(0)"><img src="static/img/last-page.jpg"></a></li>
                                <?php else:?>
                                    <li><a href="<?php echo URL::encode(array('type' => $type, 'page' => $page - 1, 'search_key' => $search_key), 'Home', 'Search', 'search');?>"><img src="static/img/last-page.jpg"></a></li>
                                <?php endif;?>
                                <li><font><?php echo $page;?></font>/<?php echo $total_page;?></li>
                                <?php if($page >= $total_page):?>                
                                    <li><a href="javascript:void(0)"><img src="static/img/next-page.jpg"></a></li>
                                <?php else:?>
                                    <li><a href="<?php echo URL::encode(array('type' => $type, 'page' => $page + 1, 'search_key' => $search_key), 'Home', 'Search', 'search');?>"><img src="static/img/next-page.jpg"></a></li>
                                <?php endif;?>
                            </ul>
                        <?php endif;?>
                        <div class="clear"></div>
                    </div>
                    
                    <div style="margin-top: 10px;"></div>
                    <?php if(empty($list)):?>
                        <div style="width: 300px; margin-left: auto; margin-right: auto; margin-top: 100px;">
                            <div style="color: #E13335; font-weight: bold;">
                                您好查找的商品不存在，建议您<br /><br />
                            </div>
                            <div style="color: #3E3E3E; font-size: 13px;">
                                1. 请更改查询关键词，如“大白菜”改成“白菜”<br /><br />
                                2. 请检查您的输入是否有误<br /><br />
                                3. 进入个人信息，给我们报告BUG
                            </div>
                        </div>
                        <?php $list = array();?>
                    <?php endif;?>
                    <?php foreach($list as $k => $goods):?>
                        <div class="item">
                            <div class="item-border" style="border: 0px;">
                            <div class="item-pic">
                                <a class="zka" title="<?php echo "{$location_man}_{$goods['goods_name']}";?>" target=_blank href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index')?>">
                                    <img alt="<?php echo "{$location_man}_{$goods['goods_name']}";?>" src="<?php echo $goods['goods_img_220x220']?>" width="100%" height="100%"/>
                                    <?php if($goods['goods_promotion'] < 100):?>
                                        <span class="zkimg"><s class="zk"><?php echo $goods['goods_promotion']/10?></s><font class="zkk">折</font></span>
                                    <?php endif;?>
                                </a>
                            </div>
                            <div style="border-bottom: 2px solid #E7E7E7; margin-left: 10px;"></div>
                            <div class="item-link">
                                <a title="<?php echo "{$location_man}_{$goods['goods_name']}";?>" target=_blank href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index')?>"><?php echo $goods['goods_name']?></a>
                                <br />
                                <font class="adword"><?php echo $goods['goods_ad']?></font>
                                <br />
                                <a title="<?php echo "{$location_man}_{$goods['goods_name']}";?>" target=_blank href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index')?>">
                                    <font class="price2">￥<?php echo sprintf("%0.2f", $goods['goods_price'])?></font>/<?php echo $goods['goods_price_weight']?>g
                                </a>
                                <br />
                                <?php if($sort_type == 'sj'):?><font style="color: #666666;">上架日期：<?php echo date("Y-m-d", $goods['goods_add_at'])?></font><?php endif;?>
                                <?php if($sort_type == 'll'):?><font style="color: #666666;">浏览次数：<?php echo $goods['goods_read_times']?></font><?php endif;?>
                                <?php if($sort_type == 'xs'):?><font style="color: #666666;">售出：<?php echo $goods['goods_sale_times']?></font><?php endif;?>
                            </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                    <div style="clear: both"></div>
                </div>
            </div>
            <div class="s_width center page">
                <ul>
                    <?php for($i = 1; $i <= $total_page; $i++): ?>
                        <li class="<?php if($i == $page) { echo 'page_active';}?>">
                            <a href="<?php echo URL::encode(array('type' => $type, 'sort_type' => $sort_type, 'sort' => $sort, 'page' => $i, 'search_key' => $search_key), 'Home', 'Search', 'search')?>"><?php echo $i;?></a>
                        </li>
                    <?php endfor;?>
                </ul>
            </div>
            <div style="clear: both;"></div>
            </div>
            <div class="clear"></div>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
    </body>
</html>
