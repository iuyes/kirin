<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>        
        <title><?php echo $location_man?>_蔬菜水果，送货上门_两点一刻，您身边的蔬菜水果网上超市</title>
        <link href="static/trans/trans.css" rel="stylesheet" type="text/css"></link>
        <script type="text/javascript" src="static/trans/trans.js"></script>
        <meta name="keywords" content="<?php echo $location_man?>蔬菜， <?php echo $location_man?>水果，蔬菜水果配送，蔬菜配送，水果配送，有机蔬菜，有机水果，外卖配送，两点一刻，美食专家">
        <meta name="description" content="两点一刻(www.liangdianyike.com)主要为大家配送蔬菜和水果，站内所有蔬菜和水果送货上门，目前支持的商圈为：<?php foreach(LocationConfig::$config as $v) { echo $v['name'].' ';}?>" />
        <style type="text/css">
            .backToTop {
                display: none;
                width: 30px;
                height: 60px;
                line-height: 42;
                padding: 5px 0;
                background-color: #000;
                color: #fff;
                background: url(static/img/go-to-top2.png) no-repeat; 
                font-size: 12px;
                text-align: center;
                position: fixed;
                _position: absolute;
                right: 10px;
                bottom: 30px;
                _bottom: "auto";
                cursor: pointer;
                opacity: .3;
                filter: Alpha(opacity=30);
            }

            .backToTop:hover {
                opacity: 1;
                filter: Alpha(opacity=100);
            }
        </style>
        <script language="javascript" type="text/javascript">
            function aaa() {
                var $backToTopTxt = "返回顶部", $backToTopEle = $('<div class="backToTop"></div>').appendTo($("body"))
                    .text($backToTopTxt).attr("title", $backToTopTxt).click(function() {
                        $("html, body").animate({ scrollTop: 0 }, 700);
                }), $backToTopFun = function() {
                    var st = $(document).scrollTop(), winh = $(window).height();
                    (st > 0)? $backToTopEle.show(): $backToTopEle.hide();
                    //IE6下的定位
                    if (!window.XMLHttpRequest) {
                        $backToTopEle.css("top", st + winh - 166);
                    }
                };
                $(window).bind("scroll", $backToTopFun);
                $(function() { $backToTopFun(); });
            }
            $(document).ready(function(){aaa();});
        </script>   
    </head>

    <body>
        <?php $this->includeTpl('Public', 'Header', 'nav');?>
        <?php $this->includeTpl('Public', 'Header', 'search');?>
        <?php $this->includeTpl('Public', 'Header', 'menu');?>
        <div class="s_width center" style="margin-top: 5px;">
        	<div class="float-left" style="width: 20%;">
				<div class="block" style="margin-right: 5px;">
                    <div class="block-body" style="padding: 0px; padding-left: 10px;">
                        <img src="static/img/hot.gif" class="hotimg-tj">
                        <?php foreach($goods_of_left as $goods):?>
                        <div class="new-cai ttthover">
                            <div class="new-cai-img corner">
                                <a title="<?php echo "{$location_man}_{$goods['goods_name']}";?>" href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home','Detail', 'index');?>" target="_blank">
                                    <img alt="<?php echo "{$location_man}_{$goods['goods_name']}";?>" src="<?php echo $goods['goods_img_60x60']?>" width=100% height=100%>
                                </a>
                            </div>
                            <div class="new-cai-a">
                                <a title="<?php echo "{$location_man}_{$goods['goods_name']}";?>" target=_blank href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index');?>"><?php echo $goods['goods_name']?></a><br />
                                <a title="<?php echo "{$location_man}_{$goods['goods_name']}";?>" target=_blank href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index')?>">
                                    <font class="price2">￥<?php echo sprintf("%0.2f", $goods['goods_price'], 2)?></font>/<?php echo $goods['goods_price_weight'];?>g</a><br />
                                <img alt="<?php echo "{$location_man}_{$goods['goods_name']}";?>" src="<?php echo StarHelper::getStar($goods['goods_score'])?>">
                            </div>
                            <div style="clear: both"></div>
                        </div>
                        <?php endforeach;?>
                    </div>
			    </div>
            </div>
            <div class="float-left" style="width: 60%; margin-left: 0px;">
                <div id="banner">
                    <div id="banner_bg"></div><!--标题背景-->
                    <div id="banner_info"></div><!--标题-->
                    <ul>
                        <?php $i = 1; foreach ($ad_img_carousel as $v):?>
                            <li class="<?php if($i == 1) { echo "on";}?>"><?php echo $i ++;?></li>
                        <?php endforeach;?>
                    </ul>
                    <div id="banner_list">
                        <?php foreach ($ad_img_carousel as $v):?>
                            <a target=_blank href="<?php echo $v['ad_img_url']?>">
                                <img src="<?php echo $v['ad_img_src']?>" title="<?php echo $v['ad_img_des']?>" alt="<?php echo $v['ad_img_des']?>"/>
                            </a>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <div class="float-left" style="width: 20%; _margin-left: -2px;">
                <div class="block hotright">
                    <div class="block-body" style="padding: 0px;">
                        <div class="tab-title">
                            <div class="tab-item tabactive" onmouseover="show_tab(this, 'tab-1')">最新活动</div>
                            <div class="tab-item"  onmouseover="show_tab(this, 'tab-2')">资讯</div>
                            <div style="clear: both"></div>
                        </div>
                        <div id="tab-1" class="tabcontent">
                            <ul class="huodong">
                                <?php foreach($hd_list as $hd):?>
                                    <li>
                                        <a href="<?php echo URL::encode(array('ariticle_id' => $hd['ariticle_id']), 'Home', 'Ariticle', 'index')?>">
                                            <?php echo $hd['ariticle_title']?>
                                        </a>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                        <div id="tab-2" class="tabcontent hide">
                            <ul class="huodong">
                                <?php foreach($zx_list as $zx):?>
                                    <li>
                                        <a href="<?php echo URL::encode(array('ariticle_id' => $zx['ariticle_id']), 'Home', 'Ariticle', 'index')?>">
                                            <?php echo $zx['ariticle_title']?>
                                        </a>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                        <script language="javascript">
                        function show_tab(obj, tabid) {
                            $('.tab-item').removeClass('tabactive');
                            $(obj).addClass('tabactive');
                            $('.tabcontent').hide();
                            $('#'+tabid).show();
                        }
                        </script>
                        <div>
                            <div class="mx-t">明星产品</div>
                            <div class="mx-b">
                                <?php foreach($goods_of_right as $goods):?>
                                    <div class="float-left">
                                        <a target=_blank href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home','Detail', 'index');?>" title="<?php echo $location_man . "_" . $goods['goods_name']?>">
                                            <img src="<?php echo $goods['goods_img_220x220']?>" height="70px">
                                        </a>
                                    </div>
                                <?php endforeach;?>
                                <div style="clear: both"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div style="clear: both"></div>
        </div>
        <div class="s_width center">
            <div class="float-left" style="width: 80%">
                <div class="hmborder">
                    <ul class="hm">
                        <li class="hmitem hlh" divid=1>新品上市</li>
                        <li class="hmitem" divid=2>本周推荐</li>
                        <li class="hmitem" divid=3>超值热购</li>
                    </ul>
                </div>
                <div>
                    <div id="hmitemdiv-1" class="hmitemdiv">
                        <?php foreach ($goods_of_new as $goods):?>
                            <div class="item2">
                                <div class="item-border">
                                <div class="item-pic">
                                    <a class="zka" title="<?php echo "{$location_man}_{$goods['goods_name']}";?>" target=_blank href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index');?>">
                                        <img alt="<?php echo "{$location_man}_{$goods['goods_name']}";?>" src="<?php echo $goods['goods_img_220x220']?>" width="100%" height="100%"/>
                                        <?php if($goods['goods_promotion'] < 100):?>
                                            <span class="zkimg"><s class="zk"><?php echo $goods['goods_promotion']/10?></s><font class="zkk">折</font></span>
                                        <?php endif;?>
                                    </a>
                                </div>
                                <div class="item-link">
                                    <a title="<?php echo "{$location_man}_{$goods['goods_name']}";?>" target=_blank href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index');?>"><?php echo $goods['goods_name']?></a>
                                    <br />
                                    <font class="adword"><?php echo $goods['goods_ad']?></font>
                                    <br />
                                    <a title="<?php echo "{$location_man}_{$goods['goods_name']}";?>" target=_blank href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index');?>">
                                        <font class="price2">￥<?php echo sprintf("%0.2f", $goods['goods_price'])?></font>/<?php echo $goods['goods_price_weight']?>g
                                    </a>
                                </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                        <div style="clear: both"></div>
                    </div>
                    <div id="hmitemdiv-2" class="hmitemdiv" style="display: none;">
                        <?php foreach ($goods_of_weekly as $goods):?>
                            <div class="item2">
                                <div class="item-border">
                                <div class="item-pic">
                                    <a class="zka" title="<?php echo "{$location_man}_{$goods['goods_name']}";?>" target=_blank href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index');?>">
                                        <img alt="<?php echo "{$location_man}_{$goods['goods_name']}";?>" src="<?php echo $goods['goods_img_220x220']?>" width="100%" height="100%"/>
                                        <?php if($goods['goods_promotion'] < 100):?>
                                            <span class="zkimg"><s class="zk"><?php echo $goods['goods_promotion']/10?></s><font class="zkk">折</font></span>
                                        <?php endif;?>
                                    </a>
                                </div>
                                <div class="item-link">
                                    <a title="<?php echo "{$location_man}_{$goods['goods_name']}";?>" target=_blank href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index');?>"><?php echo $goods['goods_name']?></a>
                                    <br />
                                    <font class="adword"><?php echo $goods['goods_ad']?></font>
                                    <br />
                                    <a title="<?php echo "{$location_man}_{$goods['goods_name']}";?>" target=_blank href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index');?>">
                                        <font class="price2">￥<?php echo sprintf("%0.2f", $goods['goods_price'])?></font>/<?php echo $goods['goods_price_weight']?>g</a>
                                </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                        <div style="clear: both"></div>
                    </div>
                    <div id="hmitemdiv-3" class="hmitemdiv" style="display: none;">
                        <?php foreach ($goods_of_hot as $goods):?>
                            <div class="item2">
                                <div class="item-border">
                                <div class="item-pic">
                                    <a class="zka" title="<?php echo "{$location_man}_{$goods['goods_name']}";?>" target=_blank href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index');?>">
                                        <img alt="<?php echo "{$location_man}_{$goods['goods_name']}";?>" src="<?php echo $goods['goods_img_220x220']?>" width="100%" height="100%"/>
                                        <?php if($goods['goods_promotion'] < 100):?>
                                            <span class="zkimg"><s class="zk"><?php echo $goods['goods_promotion']/10?></s><font class="zkk">折</font></span>
                                        <?php endif;?>
                                    </a>
                                </div>
                                <div class="item-link">
                                    <a title="<?php echo "{$location_man}_{$goods['goods_name']}";?>" target=_blank href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index');?>"><?php echo $goods['goods_name']?></a>
                                    <br />
                                    <font class="adword"><?php echo $goods['goods_ad']?></font>
                                    <br />
                                    <a title="<?php echo "{$location_man}_{$goods['goods_name']}";?>" target=_blank href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index');?>">
                                        <font class="price2">￥<?php echo sprintf("%0.2f", $goods['goods_price'])?></font>/<?php echo $goods['goods_price_weight']?>g</a>
                                </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                        <div style="clear: both"></div>
                    </div>
                </div>
            </div>
            <div style="float: left; width: 20%;">
                <div class="tj-b">
                     <div class="tj-t">
                        两点一刻推荐
                     </div>
                     <div>
                        <div class="tj-c">
                            <div class="midhot" style="margin-top: 5px; height: 252px;">
                                <div class="border-right">
                                    <?php $i = 1; foreach($goods_of_tuijian as $goods): ?>
                                        <div class="" style="margin-left: 5px; cursor: pointer;">
                                            <div class="hotcut <?php if($i == 1) { echo "hide";}?> hot_1" onMouseOver="toggleHot(this)">
                                                <div class="float-left numicon"><font class="nummark"><?php echo $i;?></font></div>
                                                <div class="float-left numicondes"><?php echo $goods['goods_name']?><font class="adword"><?php echo "-" . mb_substr($goods['goods_ad'], 0, 8, 'utf-8') . "..."?></font></div>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="hot_2 <?php if($i != 1) { echo "hide";}?>" onclick="window.open('<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index')?>')">
                                                <div class="float-left hotimg">
                                                    <a href="#">
                                                        <img src="<?php echo $goods['goods_img_60x60']?>" height="60px">
                                                        <s class="numicon2"><font class="nummark2"><?php echo $i;?></font></s>
                                                    </a>
                                                </div>
                                                <div class="float-left hotdes">
                                                    <div><a href="#"><?php echo $goods['goods_name']?></a></div>
                                                    <div><font class="adword"><?php echo mb_substr($goods['goods_ad'], 0, 6, 'utf-8') . "..."?></font></div>
                                                    <div>￥<font class="hotprice"><?php echo sprintf("%0.2f", $goods['goods_price'])?></font>/<?php echo $goods['goods_price_weight']?>g</div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    <?php $i++;?>
                                    <?php endforeach;?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                     </div>
                </div>
            </div>
            <div style="clear: both"></div>
        </div>
		<div class="s_width center">
			<div class="ctm">
				<div class="ctt">1F-蔬菜推荐</div>
                <ul class="cti">
                    <?php if(false):?>
                    <li class="ctihover">根茎类</li>
                    <li>绿叶类</li>
                    <li>特惠专区</li>
                    <?php endif;?>
                    <li></li>
                </ul>
                <ul class="ctimore">
                    <li><a href="<?php echo URL::encode(array('type' => 1), "Home", 'Index', 'category')?>">更多>></a></li>
                    <?php foreach ($goods_of_vegetable_word as $goods):?>
                    <li><a target=_blank href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index');?>"><?php echo $goods['goods_name']?></a></li>
                    <?php endforeach;?>
                </ul>
                <div style="clear: both;"></div>
			</div>
			<div>
				<?php foreach ($goods_of_vegetable as $goods):?>
					<div class="item3">
		                <div class="item-border">
		                <div class="item-pic">
		                    <a class="zka" title="<?php echo "{$location_man}_{$goods['goods_name']}";?>" target=_blank href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index');?>">
		                        <img alt="<?php echo "{$location_man}_{$goods['goods_name']}";?>" src="<?php echo $goods['goods_img_220x220']?>" width="100%" height="100%"/>
                                <?php if($goods['goods_promotion'] < 100):?>
                                        <span class="zkimg"><s class="zk"><?php echo $goods['goods_promotion']/10?></s><font class="zkk">折</font></span>
                                <?php endif;?>
		                    </a>
		                </div>
		                <div class="item-link">
		                    <a title="<?php echo "{$location_man}_{$goods['goods_name']}";?>" target=_blank href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index');?>"><?php echo $goods['goods_name']?></a>
		                    <br />
                            <font class="adword"><?php echo $goods['goods_ad']?></font>
                            <br />
                            <a title="<?php echo "{$location_man}_{$goods['goods_name']}";?>" target=_blank href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index');?>">
                                <font class="price2">￥<?php echo sprintf("%0.2f", $goods['goods_price'])?></font>/<?php echo $goods['goods_price_weight']?>g</a>
		                </div>
		                </div>
		            </div>
	            <?php endforeach;?>
	            <div style="clear: both"></div>
			</div>
		</div>
		<div class="s_width center">
			<div class="ctm">
			    <div class="ctt">2F-水果推荐</div>
                <ul class="cti">
                    <?php if(false):?>
                    <li class="ctihover">进口水果</li>
                    <li>国产水果</li>
                    <li>特惠专区</li>
                    <?php endif;?>
                    <li></li>
                </ul>
                <ul class="ctimore">
                    <li><a href="<?php echo URL::encode(array('type' => 2), 'Home', 'Index', 'category')?>">更多>></a></li>
                    <?php foreach ($goods_of_fruit_word as $goods):?>
                        <li><a target=_blank href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index');?>"><?php echo $goods['goods_name']?></a></li>
                    <?php endforeach;?>
                </ul>
                <div style="clear: both;"></div>

            </div>
			<div>
				<?php foreach ($goods_of_fruit as $goods):?>
					<div class="item3">
		                <div class="item-border">
		                <div class="item-pic">
		                    <a class="zka" title="<?php echo "{$location_man}_{$goods['goods_name']}";?>" target=_blank href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index');?>">
		                        <img alt="<?php echo "{$location_man}_{$goods['goods_name']}";?>" src="<?php echo $goods['goods_img_220x220']?>" width="100%" height="100%"/>
                                <?php if($goods['goods_promotion'] < 100):?>
                                    <span class="zkimg"><s class="zk"><?php echo $goods['goods_promotion']/10?></s><font class="zkk">折</font></span>
                                <?php endif;?>
		                    </a>
		                </div>
		                <div class="item-link">
		                    <a title="<?php echo "{$location_man}_{$goods['goods_name']}";?>" target=_blank href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index');?>"><?php echo $goods['goods_name']?></a>
		                    <br />
                            <font class="adword"><?php echo $goods['goods_ad']?></font>
                            <br />
                            <a title="<?php echo "{$location_man}_{$goods['goods_name']}";?>" target=_blank href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index');?>">
                                <font class="price2">￥<?php echo sprintf("%0.2f", $goods['goods_price'])?></font>/<?php echo $goods['goods_price_weight']?>g</a>
		                </div>
		                </div>
		            </div>
	            <?php endforeach;?>
	            <div style="clear: both"></div>
			</div>
		</div>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
    </body>
</html>
