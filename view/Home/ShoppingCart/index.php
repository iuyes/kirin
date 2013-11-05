<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>   
        <title>购物车－两点一刻</title>
    </head>

    <body>
        <?php $this->includeTpl('Public', 'Header', 'nav');?>
        <?php //$this->includeTpl('Public', 'Header', 'search');?>
        <?php //$this->includeTpl('Public', 'Header', 'menu');?>
        
        <div class="s_width center border cart" style="border-top: 0px;">
            <div style="padding-top: 20px;">
                <div class="float-left" style="width: 50%"><img src="static/img/logo.png" height="70px"></div>
                <div class="float-left" style="text-align: right; width: 50%; padding-top: 0px;">
                    <ul style="list-style-type: none; padding-top: 26px; padding-left: 0px; background: url(static/img/step1.png) no-repeat; width: 480px;">
                        <li style="float: left; width: 160px; text-align: center; color: #7ABD54; font-size: 12px;">我的购物车</li>
                        <li style="float: left; width: 160px; text-align: center; font-size: 12px;">填写核对订单信息</li>
                        <li style="float: left; width: 160px; text-align: center; font-size: 12px;">成功提交订单</li>
                        <div style="clear: both"></div>
                    </ul>
                </div>
                <div style="clear: both"></div>
            </div>
            <br />
            <br />
            <h2 style="_margin-top: 20px; _margin-left: 20px;">我的购物车</h2>
            <div class="shopping-cart" style="min-height: 50px;">
                <table class="cart-table" border="0" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <td width="20%" class="tb-name">商品</td>
                            <td width="10%">价格</td>
                            <td width="15%">每份重量</td>
                            <td></td>
                            <td width="15%">数量(/份)</td>
                            <td></td>
                            <td width="15%">预计购买重量</td>
                            <td width="15%">预计花费</td>
                            <td width="10%">操作</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($list as $k => $v):?>
                            <tr id="tr_<?php echo $v['goods_id'];?>">
                                <td class="tb-name">
                                    <a href="<?php echo URL::encode(array('goods_id' => $v['goods_id']), 'Home', 'Detail', 'index')?>"><?php echo $v['goods_name']?></a></td>
                                <td><?php echo $v['goods_price']?>元/<?php echo $v['goods_price_weight']?>g</td>
                                <td><?php echo $v['goods_weight_min']/1000?>kg~<?php echo $v['goods_weight_max']/1000;?>kg</td>
                                <td>x</td>
                                <td>
                                    <!--button class="number-minus" onclick="weight_minus_by_id('number-<?php echo $k;?>', <?php echo $v['sc_id']?>);" style="line-height: 16px;">-</button-->
                                    <button class="number-minus" onclick="delete_one_of_goods(<?php echo $v['goods_id']?>)" style="line-height: 16px;">-</button>
                                    <input id="number-<?php echo $k;?>" class="number-show" type="text" value="<?php echo round($v['number'], 1)?>" readonly="true" style="line-height: 16px;"/>
                                    <!--button class="number-add" onclick="weight_add_by_id('number-<?php echo $k?>', <?php echo $v['sc_id']?>);" style="line-height: 16px;">+</button-->
                                    <button class="number-add" onclick="add_one_of_goods(<?php echo $v['goods_id']?>)" style="line-height: 16px;">+</button>
                                </td>
                                <td>=</td>
                                <td><?php echo $v['goods_weight_min']/1000 * round($v['number'], 1)?>kg~<?php echo $v['goods_weight_max'] / 1000 * round($v['number'], 1);?>kg</td>
                                <td>
                                    ￥
                                    <?php $tmp = $v['goods_weight_min'] * round($v['number'], 1) / $v['goods_price_weight'] * $v['goods_price']?>
                                    <?php echo sprintf("%0.2f", $tmp)?>
                                    ~
                                    ￥
                                    <?php $tmp = $v['goods_weight_max'] * round($v['number'], 1) / $v['goods_price_weight'] * $v['goods_price']?>
                                    <?php echo sprintf("%0.2f", $tmp)?>
                                </td>
                                <td>
                                    <!--a href="<?php echo URL::encode(array('sc_id' => $v['sc_id']), 'Home', 'ShoppingCart', 'doDelete')?>" onclick="return confirm('确定需要删除?')">删除</a-->
                                    <a href="javascript:void()" onclick="delete_goods_in_shopping_cart(<?php echo $v['goods_id'];?>, 'tr_<?php echo $v['goods_id'];?>')">删除</a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <br />
            <br />
            <br />
            <div style="text-align: right; margin-right: 40px;">
                <font style="color: #333333; margin-left: 40px; font-size: 13px;">
                    预计花费：&nbsp;&nbsp;&nbsp;<font style="font-weight: bold; color: red;">￥<?php echo $total_price_min;?></font>
                    ~<font style="font-weight: bold; color: red;">￥<?php echo $total_price_max;?></font>
                </font>
            </div> 
            <br />
            <br />
            <div class="text-align-right" style="padding-right: 50px;">
                <button class="light-button" onclick="window.location.href='<?php echo $_SERVER['HTTP_REFERER']?>'">继续购物</button>
                <button class="button" style="_margin-left: 10px;" onclick="init_order(<?php echo count($list) ? 'true' : 'false'?>)">去结算</button>
            </div>
            <br />
        </div>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
    </body>
</html>
