<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>        
        <title>回收站</title>
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
                        <font>蔬菜水果</font>
                    </div>
                    <div class="border" style="width: 100%; min-height: 400px;">
                       <!--form class="search-form" style="margin: 0px;">
                            <div style="float: right;">
                                <div class="float-left">
                                    <input type="text" value="香蕉">
                                </div>
                                <div class="float-left">
                                    <input type="submit" value="搜索">
                                </div>
                                <div style="clear: both"></div>
                            </div> 
                        </form-->
                        <table class="cart-table" border="0" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <td width="35%">商品</td>
                                    <td width="15%">价格</td>
                                    <td width="15%">每份重量范围</td>
                                    <td width="15%">图片</td>
                                    <td width="20%">操作</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($list as $k => $goods):?>
                                <tr>
                                    <td>
                                        <?php echo $goods['goods_name'];?>
                                    </td>
                                    <td>
                                        <?php echo $goods['goods_price'];?>元/
                                        <?php echo $goods['goods_price_weight']?>g
                                    </td>
                                    <td>
                                        <?php echo $goods['goods_weight_min']?>g~
                                        <?php echo $goods['goods_weight_max']?>g
                                    </td>
                                    <td>
                                        <a target="_blank" href="<?php echo $goods['goods_img'];?>">查看</a>
                                    </td>
                                    <td>
                                        <a href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Admin', 'Manage', 'edit')?>">编辑</a>
                                        <a href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Admin', 'Manage', 'recover')?>">恢复</a>
                                    </td>
                                </tr>   
                                <?php endforeach;?>
                            </tbody>
                        </table>
                        <div class="page">
                            <ul>
                                <?php for($i=1; $i<=ceil($total/$pagesize); $i++):?>
                                    <li class="<?php if($i == $page){ echo 'page_active';}?>">
                                        <a href=""><?php echo $i;?></a>
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
