<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>        
        <title>订单列表</title>
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
                        <font>订单管理</font>
                    </div>
                    <div class="border" style="width: 100%; min-height: 400px;">
                       <form class="search-form" style="margin: 0px;" action="<?php echo URL::encode(array(), 'Admin', 'Order', 'list')?>" method="get">
                            <input type="hidden" name="s" value="Admin-Order-list">
                            <div style="float: right;">
                                <div class="float-left">
                                    <select name="order_status">
                                        <option value=0 <?php if($order_status == 0){ echo 'selected';}?> >全部订单</option>
                                        <?php foreach(OrderStatusConfig::$config as $k => $v):?>
                                            <option value="<?php echo $k;?>" <?php if($order_status == $k){ echo 'selected';}?>><?php echo $v?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="float-left">
                                    <input type="text" name="order_id" placeholder="请输入订单号" value="<?php echo $order_id;?>">
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
                                    <td width="10%">订单号</td>
                                    <td width="30%">送货地址</td>
                                    <td width="15%">订单时间</td>
                                    <td width="10%">期望送达时间</td>
                                    <td width="15%">状态</td>
                                    <td width="20%">操作</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($list as $k => $order):?>
                                <tr>
                                    <td>
                                        <a href="<?php echo URL::encode(array('order_id' => $order['order_id']), 'Admin', 'Order', 'detail')?>"><?php echo $order['order_id']?></a></td>
                                    <td><?php echo $order['send_to_address']?></td>
                                    <td>
                                        <?php echo date("Y-m-d H:i:s", $order['order_add_at']);?>
                                    </td>
                                    <td><?php echo $order['send_time'] ? date("H:i", $order['send_time']) : '无'?></td>
                                    <td>
                                        <?php if($order['order_status'] == OrderStatusConfig::DELETE):?>
                                            <font color=red><?php echo OrderStatusConfig::getStatus($order['order_status'])?></font>
                                        <?php else:?>
                                            <?php echo OrderStatusConfig::getStatus($order['order_status'])?>
                                        <?php endif;?>
                                    </td>
                                    <td>
                                        <a href="<?php echo URL::encode(array('order_id' => $order['order_id'], 'order_status' => OrderStatusConfig::INIT), 'Admin', 'Order', 'setStatus')?>">
                                            <?php if($order['order_status'] == OrderStatusConfig::INIT):?>
                                                <font color=red>已下单</font>
                                            <?php else:?>
                                                    已下单
                                            <?php endif;?>
                                        </a>
                                        <a href="<?php echo URL::encode(array('order_id' => $order['order_id'], 'order_status' => OrderStatusConfig::SENDING), 'Admin', 'Order', 'setStatus')?>">
                                            <?php if($order['order_status'] == OrderStatusConfig::SENDING):?>
                                                <font color=red>配送中</font> 
                                            <?php else:?>
                                                配送中
                                            <?php endif;?>
                                        </a>
                                        <a href="<?php echo URL::encode(array('order_id' => $order['order_id'], 'order_status' => OrderStatusConfig::FINISH), 'Admin', 'Order', 'setStatus')?>">
                                            <?php if($order['order_status'] == OrderStatusConfig::FINISH):?>
                                                <font color=red>已完成</font> 
                                            <?php else:?> 
                                                已完成
                                            <?php endif;?>
                                        </a>
                                        <a href="<?php echo URL::encode(array('order_id' => $order['order_id'], 'order_status' => OrderStatusConfig::DELETE), 'Admin', 'Order', 'setStatus')?>">
                                            <?php if($order['order_status'] == OrderStatusConfig::DELETE):?>
                                                <font color=red>已删除</font>
                                            <?php else:?>
                                                已删除
                                            <?php endif;?>
                                        </a>
                                    </td>
                                </tr>   
                                <?php endforeach;?>
                            </tbody>
                        </table>
                        <div class="page">
                            <ul>
                                <?php for($i = 1; $i <= ceil($total/$pagesize); $i++):?>
                                    <li class="<?php if($i == $page) { echo 'page_active';}?>">
                                        <a href="<?php echo URL::encode(array('page' => $i, 'pagesize' => $pagesize, 'order_status' => $order_status, 'order_id' => $order_id), 'Admin', 'Order', 'list')?>"><?php echo $i;?></a>
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
