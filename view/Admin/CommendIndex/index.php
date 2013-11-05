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
                        <font>首页推荐主图</font>
                    </div>
                    <form method="get" action="index.php">
                        <input type="hidden" name="s" value="Admin-CommendIndex-index">
                        <select name="location">
                            <option value=0>请选择</option>
                            <?php foreach(LocationConfig::$config as $k => $v):?>
                                <option value="<?php echo $k?>" <?php if($k == $location) { echo 'selected';}?>><?php echo $v['name']?>
                            <?php endforeach;?>
                        </select>
                        <input type="submit" value="搜索">
                    </form>
                    <form action="index.php?s=Admin-CommendIndex-add" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="s" value="Admin-CommendIndex-add">
                        <select name="goods_id">
                            <?php foreach ($goods_list as $k => $v):?>
                                <option value="<?php echo $v['goods_id']?>">[<?php echo $v['goods_id'];?>]<?php echo $v['goods_name']?>
                            <?php endforeach;?>
                        </select>
                        <input type="file" name="cii_img" value="">
                        <input type="submit" value="设置">
                    </form>
                    <div class="border" style="width: 100%; min-height: 400px;">
                        <table class="cart-table" border="0" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <td width="25%">商品</td>
                                    <td width="15%">图片</td>
                                    <td width="20%">操作</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($goods_list_of_commend as $goods):?>
                                    <tr>
                                        <td><?php echo $goods['goods_name'];?></td>
                                        <td><a target=_blank href="<?php echo $goods['cii_img'];?>">查看</a></td>
                                        <td><a href="<?php echo URL::encode(array('cii_id' => $goods['cii_id']), 'Admin', 'CommendIndex', 'delete')?>">删除</a></td>
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
