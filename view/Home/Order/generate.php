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
        <form action="index.php?s=Home-Order-doGenerate" method="post">
            <input type="hidden" name="s" value="Home-Order-doGenerate">
            <div class="s_width center border cart">
                <div style="padding-top: 20px;">
                    <div class="float-left" style="width: 50%"><img src="static/img/logo.png" height="70px"></div>
                    <div class="float-left" style="text-align: right; width: 50%; padding-top: 0px;">
                        <ul style="list-style-type: none; padding-top: 26px; padding-left: 0px; background: url(static/img/step2.png) no-repeat; width: 480px;">
                            <li style="float: left; width: 160px; text-align: center; font-size: 12px;">我的购物车</li>
                            <li style="float: left; width: 160px; text-align: center; color: #7ABD54; font-size: 12px;">填写核对订单信息</li>
                            <li style="float: left; width: 160px; text-align: center; font-size: 12px;">成功提交订单</li>
                            <div style="clear: both"></div>
                        </ul>
                    </div>
                    <div style="clear: both"></div>
                </div>
                <br />
                <br />
                <br />
                <h2 style="_margin-top: 20px; _margin-left: 20px;">收货地址</h2>
                <div style="margin-left: 20px;">
                    <table class="address-to-send">
                        <?php $i = 1; foreach($delivery_list as $k => $v):?>
                            <tr>
                                <td>
                                    <input value="<?php echo $v['delivery_id'];?>" type="radio" name="delivery_id" <?php if($i == 1){ echo "checked";}?> style="margin: 0px;" onfocus="$('#add_address_html').hide()">
                                </td>
                                <td>
                                    <font><?php echo "{$v['delivery_address']}-{$v['delivery_phone']}-{$v['delivery_name']}"?></font>
                                    <a href="<?php echo URL::encode(array('delivery_id' => $v['delivery_id']), 'Home', 'Delivery', 'delete')?>" style="font-size: 13px; text-decoration: none; margin-left: 20px;">删除</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach;?>
                        <tr>
                            <td><input id="nd_add" <?php if(empty($delivery_list)) { echo "checked";}?> type="radio" name="delivery_id" value="0" style="margin: 0px;" onfocus="$('#add_address_html').show()"></td>
                            <td>使用新地址</td>
                        </tr>
                        <tr id="add_address_html" style="<?php if(empty($delivery_list)) { echo "";} else { echo 'display:none';}?>">
                            <td></td>
                            <td>
                            <div class="form-input"><font style="width: 70px; display:inline-block;">收货地址：</font><input type="text" name="delivery_address" value="" style="height: 25px; width: 400px;" placeholder="回龙观xxx小区xxx号楼xxx单元xxx"></div><br /><br />
                            <div class="form-input"><font style="width: 70px; display:inline-block;">联系电话：</font><input type="text" name="delivery_phone" value="" style="height: 25px; width: 400px;" placeholder="186xxxxxxxx"></div><br /><br />
                            <div class="form-input"><font style="width: 70px; display:inline-block;">联系人：</font><input type="text" name="delivery_name" value="" style="height: 25px; width: 400px;" placeholder="王某某"></div><br />
                            </td>
                        </tr>
                    </table>
                </div><br />
                <div style="border-top: 1px solid #E0E0E0">&nbsp;</div>
                <h2 style="_margin-top: 20px; _margin-left: 20px;">收货时间</h2>
                <div style="margin-left: 20px;">
                    <div style="width: 100%; height: 40px; line-height: 40px; vertical-align: middle;">
                        <div style="font-size: 13px;">
                            预期收货时间：
                            <select name="send_time" style="font-size: 13px;">
                                <option value=0>立即配送</option>
                                <?php 
                                $dt = date("Y-m-d", time());
                                $t = strtotime($dt." 08:00:00");
                                for(; $t <= strtotime($dt." 20:00:00"); $t += 30*60):
                                ?>
                                    <?php if($t - 20*60 < time()){ continue;}?>
                                    <option value="<?php echo $t?>"><?php echo date("H:i", $t)?></option>
                                <?php endfor;?>
                            </select>
                            <font color=gray>配送时间: 09:00~20:00</font>
                        </div>
                    </div>
                </div><br />
                <div style="border-top: 1px solid #E0E0E0">&nbsp;</div>
                <h2 style="_margin-top: 20px; _margin-left: 20px;">商品清单</h2>
                <div style="margin-left: 20px;">
                    <div class="shopping-cart" style="min-height: 100px;">
                        <table class="cart-table" border="0" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <td width="20%" class="tb-name">商品</td>
                                    <td width="10%">价格</td>
                                    <td width="15%">预计购买重量</td>
                                    <td width="15%">预计花费</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($list as $k => $v):?>
                                    <tr>
                                        <td class="tb-name">
                                            <a href="<?php echo URL::encode(array('goods_id' => $v['goods_id']), 'Home', 'Detail', 'index')?>"><?php echo $v['goods_name']?></a></td>
                                        <td><?php echo $v['goods_price']?>元/<?php echo $v['goods_price_weight']?>g</td>
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
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div><br /><br />
                <div style="text-align: right;"><font color=gray style="font-size: 13px; margin-right: 20px;">具体花费需要依据实物重量计算，请参考购物小票</font></div>
                <div style="border-top: 1px solid #E0E0E0">&nbsp;</div><br />
                <div class="text-align-right" style="padding-right: 50px;">
                    <font style="color: #666666; margin-right: 20px; font-size: 13px; font-size: 14px; font-weight: bold;">
                        配送费:<font color=red>￥<?php echo sprintf("%0.2f", FeeConfig::DELIVERY)?></font>
                    </font>
                    <font style="color: #333333; font-size: 14px; color: #666666; font-weight: bold; margin-right: 20px;">
                        预计花费:<font style="font-weight: bold; color: red;">￥<?php echo $total_price_min;?></font>
                        ~<font style="font-weight: bold; color: red;">￥<?php echo $total_price_max;?></font>
                    </font>
                    <!--万恶的IE，浪费我钱-->
                    <button class="button" style="_margin-left: 10px;" onclick="submit(); return false;">生成订单</button>
                </div>
                <br />
            </div>
        </form>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
    </body>
</html>
