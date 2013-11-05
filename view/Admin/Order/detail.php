<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>        
        <title>订单详情</title>
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
                        <font>订单详情</font>
                    </div>
                    <div class="text-align-right">
                        <a href="<?php echo $_SERVER['HTTP_REFERER']?>" style="color: #333333; color: blue; text-decoration: none; font-size: 13px">返回</a>
                    </div>
                    <div class="border" style="width: 100%; min-height: 400px;">
                        <table class="cart-table" border="0" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <td width="40%">名称</td>
                                    <td width="20%">价格</td>
                                    <td width="20%">重量范围</td>
                                    <td width="20%">购买份数</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($goods_list as $k => $goods):?>
                                <tr>
                                    <td><?php echo $goods['goods_name']?></td>
                                    <td><?php echo $goods['goods_price']?></td>
                                    <td><?php echo $goods['goods_weight_min']?>g~<?php echo $goods['goods_weight_max']?>g</td>
                                    <td><?php echo $goods['number']?></td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                        <div style="padding-top: 30px; padding-left: 30px;">
                        送货地址：<?php echo $order_info['send_to_address']?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
    </body>
</html>
