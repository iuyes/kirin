<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>       
        <title><?php echo $goods_info['goods_name']?>_<?php echo $my_location_man?>_蔬菜水果，送货上门_两点一刻，您身边的蔬菜水果网上超市</title>
        <meta name="keywords" content="<?php echo $goods_info['goods_name']?>配送，蔬菜配送，水果配送，有机蔬菜，有机水果，外卖配送，两点一刻，美食专家">
        <meta name="description" content="两点一刻(www.liangdianyike.com)主要为大家配送蔬菜和水果，站内所有蔬菜和水果送货上门，目前支持的商圈为：<?php foreach(LocationConfig::$config as $v) { echo $v['name'].' ';}?>" />
    </head>

    <body>
        <?php $this->includeTpl('Public', 'Header', 'nav');?>
        <?php $this->includeTpl('Public', 'Header', 'search');?>
        <?php $this->includeTpl('Public', 'Header', 'menu');?>
        <!--div class="s_width center level">
           <strong class="level-one"><?php if($goods_info['goods_type'] == 1) { echo "蔬菜";} else {echo "水果";}?></strong>>
           <font class="level-three"><a href=""><?php echo $goods_info['goods_name']?></a></font> 
        </div-->
        <div class="s_width center level">
            <div class="float-left l-menu">
                <div class="block" style="width: 200px; margin-top: 10px;">
                    <div class="block-header">
                        新品上市
                    </div>
                    <div class="block-body">
                        <?php foreach($new_goods as $k => $goods):?>
                        <div class="new-cai">
                            <div class="new-cai-img">
                                <a title="<?php echo "{$my_location_man}_{$goods['goods_name']}";?>" target=_blank href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index');?>">
                                    <img alt="<?php echo "{$my_location_man}_{$goods['goods_name']}";?>" src="<?php echo $goods['goods_img_60x60']?>" width=100% height=100%>
                                </a>
                            </div>
                            <div class="new-cai-a">
                                <a title="<?php echo "{$my_location_man}_{$goods['goods_name']}";?>" target=_blank href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index');?>"><?php echo $goods['goods_name']?></a><br />
                                <a title="<?php echo "{$my_location_man}_{$goods['goods_name']}";?>" target=_blank href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index')?>">￥<?php echo $goods['goods_price']?>/<?php echo $goods['goods_price_weight']?>g</a><br />
                                <img alt="<?php echo "{$my_location_man}_{$goods['goods_name']}";?>" src="<?php echo StarHelper::getStar($goods['goods_score'])?>">
                            </div>
                            <div style="clear: both"></div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <div class="float-left detail r-menu">
                <div>
                    <div class="title">
                        <?php echo $goods_info['goods_name'];?>
                    </div>
                    <div class="detail-msg">
                        <div class="detail-img float-left">
                            <img id="jrg" src="<?php echo $goods_info['goods_img_300x300']?>" width="300px" height="300px">
                        </div>
                        <div class="float-left detail-info">
                            <?php if($goods_info['goods_promotion'] < 100):?>
                                <s class="d-zk"><?php echo $goods_info['goods_promotion']/10?>折</s>
                            <?php endif;?>
                            <form id="add" method="post" action="<?php echo URL::encode(array(), 'Home', 'ShoppingCart', 'doAdd')?>">
                                <input type="hidden" name="goods_id" value="<?php echo $goods_info['goods_id']?>" />
                                <div class="detail-item">名称：<?php echo $goods_info['goods_name']?></div>
                                <div class="detail-item">
                                    价格：<font class="price">￥<?php echo $goods_info['goods_price']?>/<?php echo $goods_info['goods_price_weight']?>g</font>
                                </div>
                                <div class="detail-item">配送：本站配送</div>
                                <div class="detail-item">评价：<img src="<?php echo StarHelper::getStar($goods_info['goods_score'])?>"></div>
                                <div class="detail-item">
                                    每份重量：
                                    <input id="t_min_weight" type="hidden" value="<?php echo $goods_info['goods_weight_min']?>">
                                    <input id="t_max_weight" type="hidden" value="<?php echo $goods_info['goods_weight_max']?>">
                                    <font style=""><?php echo $goods_info['goods_weight_min']/1000?>kg</font>
                                    &nbsp;~&nbsp;
                                    <font style=""><?php echo $goods_info['goods_weight_max']/1000?>kg</font>
                                        <?php if(false):?>
                                        &nbsp;&nbsp;[
                                        <?php echo $goods_info['goods_weight_min']/500?>斤 
                                        ~ 
                                        <?php echo $goods_info['goods_weight_max']/500?>斤
                                        ]
                                    <?php endif;?>
                               </div>
                               <div class="detail-item">
                                    购买重量：
                                    <font id="r_min_weight" style="color: red; font-weight: bold;"><?php echo $goods_info['goods_weight_min']/1000?>kg</font>
                                    到
                                    <font id="r_max_weight" style="color: red; font-weight: bold;"><?php echo $goods_info['goods_weight_max']/1000?>kg</font>
                               </div>
                                <div class="detail-item">
                                    <font>购买数量:</font>
                                    <button class="number-minus" onclick="weight_minus(); return false;" style="line-height: 16px;">-</button>
                                    <input name="number" sign="number" class="number-show" type="text" value="1" readonly="true" style="line-height: 16px;"/>
                                    <button class="number-add" onclick="weight_add(); return false;" style="line-height: 16px;">+</button>
                                    <font>&nbsp;&nbsp;份</font>
                                    <?php if(false):?>
                                        [
                                        <font id="r2_min_weight"><?php echo $goods_info['goods_weight_min']/500?>斤</font>
                                        到
                                        <font id="r2_max_weight"><?php echo $goods_info['goods_weight_max']/500?>斤</font>
                                        ]
                                    <?php endif;?>
                                </div>
                                <?php if($goods_location == $my_location):?>
                                <div class="detail-button">
                                    <!--a id="jrg" href="javascript:void()" onclick="$('#add').submit()">加入购物车</a-->
                                    <a id="jrg2" href="javascript:void()" onclick="add_into_shopping_cart()">加入购物车</a>
                                    <a href="<?php echo URL::encode(array('goods_id' => $goods_info['goods_id']), 'Home', 'Collect', 'doAdd')?>">收藏</a>
                                    <a href="http://www.douguo.com/search/recipe/<?php echo urlencode($goods_info['goods_name'])?>" target=_blank>查看食谱</a>
                                </div>
                                <?php else: ?>
                                <div style="margin-top: 10px; line-height: 30px; height: 30px;">
                                    商品配送商圈:<font style="color: red; font-weight: bold; font-size: 14px;"><?php echo LocationConfig::$config[$goods_location]['name'];?></font><br />
                                    我的商圈:<font style="color: red; font-weight: bold; font-size: 14px;"><?php $re = LocationConfig::getLocation($my_location); echo $re['name'];?></font>，<a href="<?php echo URL::encode(array(), 'Home', 'ChooseArea', 'index')?>" style="font-weight: bold; color: green;">点击这里</a>可以更改我的商圈
                                </div>
                                <?php endif;?>
                            </form>
                        </div>
                    </div>
                    <div style="clear: both"></div>
                </div>
                <div>
                    <div class="block-dotted">
                        <div class="comment-title">
                            商品综合评价
                        </div>
                        <div class="comment-body">
                            <div class="comment-grade float-left comment-height">
                                <?php echo round($ensemble_info['avg_score'], 2) * 100?>%
                            </div>
                            <div class="comment-grade-detail float-left comment-height">
                                <ul class="percentage">
                                    <li>
                                        <dt>
                                            好评(<?php echo round($ensemble_info['good'], 2) * 100?>%)
                                        </dt>
                                        <dd>
                                            <div style="width: <?php echo round($ensemble_info['good'], 2) * 100?>%;"></div>
                                        </dd>
                                        <div style="clear: both"></div>
                                    </li>
                                    <li>
                                        <dt>
                                            中评(<?php echo round($ensemble_info['nomal'], 2) * 100?>%)
                                        </dt>
                                        <dd>
                                            <div style="width: <?php echo round($ensemble_info['nomal'], 2) * 100?>%;"></div>
                                        </dd>
                                        <div style="clear: both"></div>
                                    </li>

                                    <li>
                                        <dt>
                                            差评(<?php echo round($ensemble_info['bad'], 2) * 100?>%)
                                        </dt>
                                        <dd>
                                            <div style="width: <?php echo round($ensemble_info['bad'], 2) * 100?>%;"></div>
                                        </dd>
                                        <div style="clear: both"></div>
                                    </li>

                                </ul>
                            </div>
                            <!--div class="comment-deploy float-left comment-height">
                                <!--button class="fabiaopinglun">发表评论</button-->
                                <!--div class="detail-button">
                                    <a href="">发表评论</a>
                                </div>
                            </div-->
                            <div style="clear: both"></div>
                        </div>
                    </div>
                    <?php if($comment_able):?>
                        <div class="block-dotted" style="margin-top: 20px;">
                            <form id="cmt" action="<?php echo URL::encode(array('t' => time()), 'Home', 'Comment', 'doAdd');?>" method="post">
                                <input type="hidden" name="goods_id" value="<?php echo $goods_info['goods_id']?>">
                                <div style="margin-bottom: 15px; margin-top: 10px;">
                                    综合评分:
                                    <select name="comment_score" style="width: 200px; background-color: white; border: solid 1px #cccccc;">
                                        <option value="1">1分</option>
                                        <option value="2">2分</option>
                                        <option value="3">3分</option>
                                        <option value="4" selected>4分</option>
                                        <option value="5">5分</option>
                                    </select>
                                </div>
                                <textarea name="comment_content" class="comment_content"></textarea>
                                <div class="detail-button" style="margin-top: 10px;"> 
                                    <a style="float: right;" onclick="$('#cmt').submit()" href="#">发表评论</a> 
                                </div>
                                <div style="clear: both"></div>
                            </form>
                        </div>
                    <?php endif;?>
                    <div class="block-dotted comment" style="border-top: 0px; min-height: 100px;">
                        <div class="mt">
                            <ul class="mt-menu">
                                <li class="<?php if($score_type == CommentDao::ALL) { echo 'mt-active';}?>">
                                    <a class="mt-menu-title" href="<?php echo URL::encode(array('goods_id' => $goods_info['goods_id'], 'score_type' => CommentDao::ALL), 'Home', 'Detail', 'index')?>">全部评论</a>
                                </li>
                                <li class="<?php if($score_type == CommentDao::GOOD) { echo 'mt-active';}?>">
                                    <a class="mt-menu-title" href="<?php echo URL::encode(array('goods_id' => $goods_info['goods_id'], 'score_type' => CommentDao::GOOD), 'Home', 'Detail', 'index')?>">好评</a>
                                </li>
                                <li class="<?php if($score_type == CommentDao::NOMAL) { echo 'mt-active';}?>">
                                    <a class="mt-menu-title" href="<?php echo URL::encode(array('goods_id' => $goods_info['goods_id'], 'score_type' => CommentDao::NOMAL), 'Home', 'Detail', 'index')?>">中评</a>
                                </li>
                                <li class="<?php if($score_type == CommentDao::BAD) { echo 'mt-active';}?>">
                                    <a class="mt-menu-title" href="<?php echo URL::encode(array('goods_id' => $goods_info['goods_id'], 'score_type' => CommentDao::BAD), 'Home', 'Detail', 'index')?>">差评</a>
                                </li>
                                <div style="clear: both"></div>
                            </ul>
                        </div>
                        <?php if(count($comment_list) == 0):?>
                            <font style="color: red; font-size: 12px;">暂时没有评论</font>
                        <?php endif;?>
                        <?php foreach($comment_list as $k => $comment):?>
                            <div class="comment-item">
                                <div class="comment-left">
                                    <div class="comment-left-pic">
                                        <img src="static/img/63.gif"/>
                                    </div>
                                    <div class="comment-left-name">
                                        <a href="javascript:void(0)"><?php echo $comment['user_name'] ? $comment['user_name'] : '匿名用户'?></a>
                                    </div>
                                </div>
                                <div class="comment-right">
                                    <div class="comment-right-body">
                                        <div class="comment-right-body-item">
                                            <font class="crbi-title">评分:</font>
                                            <img src="<?php echo StarHelper::getStar($comment['comment_score'])?>">
                                        </div>
                                        <div class="comment-right-body-item">
                                            <font class="crbi-title">心得:</font>
                                            <font><?php echo htmlspecialchars($comment['comment_content'])?></font>
                                        </div>
                                        <div class="comment-right-body-item">
                                            <font class="crbi-title">日期:</font>
                                            <?php echo date('Y-m-d H:i:s', $comment['comment_at'])?>
                                        </div>
                                    </div>
                                </div>
                                <div style="clear: both"></div>
                            </div>
                        <?php endforeach;?>
                    </div>
                    <div class="center page">
                        <ul>
                            <?php for($i = 1; $i <= $total_page; $i ++):?>
                                <li class="<?php if($cur_page == $i) { echo 'page_active';}?>">
                                    <a href="<?php echo URL::encode(array('goods_id' => $goods_info['goods_id'], 'score_type' => $score_type, 'mt_page' => $i), 'Home', 'Detail', 'index')?>"><?php echo $i;?></a>
                                </li>
                            <?php endfor;?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
        <a href="<?php echo URL::encode(array(), 'Home', 'ShoppingCart', 'index')?>" class="sc2">
            <s class="sc2_number">
                <!--font><?php echo $shopping_cart_number;?></font-->
                <font>+</font>
            </s>
        </a>
        <img id="amt" style="display: none;" src="<?php echo $goods_info['goods_img_300x300']?>" width="300px" height="300px">
    </body>
</html>
