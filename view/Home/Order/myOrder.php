<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>
        <title>我的订单－两点一刻</title>
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
                        <font>我的订单</font>
                    </div>
                    <div class="border" style="width: 100%;">
                        <table class="cart-table" border="0" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <td width="15%">订单号</td>
                                    <td width="15%">收货人</td>
                                    <td width="20%">时间</td>
                                    <td width="10%">状态</td>
                                    <td width="10%">操作</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($order_list as $order):?>
                                    <tr>
                                        <td><?php echo $order['order_id']?></td>
                                        <td><?php echo $user_info['user_name']?></td>
                                        <td><?php echo date("Y-m-d H:i:s", $order['order_add_at'])?></td>
                                        <td>
                                            <?php if($order['order_status'] < OrderStatusConfig::FINISH):?>
                                                配送中
                                            <?php else:?>
                                                完成
                                            <?php endif;?>
                                        </td>
                                        <td>
                                            <a href="<?php echo URL::encode(array('order_id' => $order['order_id']), 'Home','Order', 'detail')?>">详细</a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                        <div class="page">
                            <ul>
                                <?php for($i=1; $i<=ceil($total/$pagesize); $i++):?>
                                    <li class="<?php if($page == $i) { echo 'page_active';}?>">
                                        <a href="<?php echo URL::encode(array('page'=>$i, 'pagesize'=>$pagesize), 'Home', 'Order', 'myOrder')?>"><?php echo $i;?></a>
                                    </li>
                                <?php endfor;?>
                            </ul>
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
