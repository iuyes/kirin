<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>       
        <title>推荐管理</title>
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
                        <font><?php echo CommendConfig::getStatus($type);?></font>
                    </div>
                    <form method="get" action="index.php">
                        <input type="hidden" name="s" value="Admin-Commend-list">
                        <input type="hidden" name="type" value="<?php echo $type?>">
                        <select name="location">
                            <option value=0>请选择</option>
                            <?php foreach(LocationConfig::$config as $k => $v):?>
                                <option value="<?php echo $k?>" <?php if($k == $location) { echo 'selected';}?>><?php echo $v['name']?>
                            <?php endforeach;?>
                        </select>
                        <input type="submit" value="搜索">
                    </form>

                    <div class="border" style="width: 100%; min-height: 400px;">
                        <table class="cart-table" border="0" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <td width="25%">商品</td>
                                    <td width="10%">类型</td>
                                    <td width="15%">价格</td>
                                    <td width="15%">重量范围</td>
                                    <td width="15%">图片</td>
                                    <td width="20%">操作</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($goods_list as $k => $goods):?>
                                <tr>
                                    <td>
                                        <a href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index')?>"><?php echo $goods['goods_name']?></a>
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
                                        <a onclick="return confirm('确定需要删除?')" href="<?php echo URL::encode(array('commend_id' => $goods['commend_id'], 'type' => $type), 'Admin', 'Commend', 'delete')?>">删除</a>
                                    </td>
                                </tr>   
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
    </body>
</html>
