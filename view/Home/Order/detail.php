<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>       
        <title>订单详情－两点一刻</title>
    </head>

    <body>
        <?php $this->includeTpl('Public', 'Header', 'nav');?>
        <?php $this->includeTpl('Public', 'Header', 'search');?>
        <?php $this->includeTpl('Public', 'Header', 'menu');?>
        <div class="s_width center level">
            <div class="float-left l-menu">
                <?php $this->includeTpl('Public', 'Header', 'userinfomenu');?>
            </div>
            <div class="float-left detail r-menu">
                <div>
                    <div class="title userinfo-title">
                        <font>订单详情(<?php echo $order_id;?>)</font>
                    </div>
                    <div class="border" style="width: 100%; min-height: 400px;">
                        <table class="cart-table" border="0" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <td width="15%">名称</td>
                                    <td width="15%">价格</td>
                                    <td width="20%">重量范围</td>
                                    <td width="10%">购买份数</td>
                                    <td width="10%">操作</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($goods_list as $goods):?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index')?>">
                                                <?php echo $goods['goods_name']?>
                                            </a>
                                        </td>
                                        <td><?php echo $goods['goods_price']?>元/<?php echo $goods['goods_price_weight']?>g</td>
                                        <td><?php echo $goods['goods_weight_min']?>g~<?php echo $goods['goods_weight_max']?>g</td>
                                        <td><?php echo $goods['number']?></td>
                                        <td>   
                                            <?php if($order_info['order_status'] != OrderStatusConfig::FINISH):?>
                                                <font color=gray>订单未完成</font> 
                                            <?php else: ?> 
                                                <?php if($goods['have_comment']):?>
                                                    <font color=gray>已评论</font>
                                                <?php else:?>
                                                    <a href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index')?>">
                                                        去评论
                                                    </a>
                                                <?php endif;?>
                                            <?php endif;?>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                        <div class="text-align-right" style="font-size: 13px; margin-top: 20px; margin-right: 30px;">
                            预计花费:<font style="color: red; font-size: 13px; font-weight: bold;"><?php echo round($min_price, 2);?></font> 到<font style="color: red; font-weight: bold; font-size: 13px;"> <?php echo round($max_price, 2)?></font>
                        </div>
                    </div>
                </div>
            </div>
            <div style="clear: both;"></div>
        </div>
        <div style="clear: both;"></div>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
    </body>
</html>
