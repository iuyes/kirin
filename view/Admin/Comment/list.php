<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>        
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
                       <form class="search-form" style="margin: 0px;" action="<?php echo URL::encode(array(), 'Admin', 'Comment', 'list')?>">
                            <div style="float: right;">
                                <div class="float-left">
                                    <input name="goods_id" type="text" value="" placeholder="商品ID">
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
                                    <td width="10%">商品ID</td>
                                    <td width="15%">商品名称</td>
                                    <td width="20%">上架时间</td>
                                    <td width="10%">评论人</td>
                                    <td width="35%">评论</td>
                                    <td width="10%">操作</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($list as $k => $v):?>
                                <tr>
                                    <td><?php echo $v['comment_id'];?></td>
                                    <td><?php echo $v['goods_name']?></td>
                                    <td>
                                        <?php echo date('Y-m-d H:i:s', $v['comment_at'])?>
                                    </td>
                                    <td>
                                        <?php echo $v['user_name'];?>
                                    </td>
                                    <td><?php echo $v['comment_content']?></td>
                                    <td>
                                        <a href="<?php echo URL::encode(array('comment_id' => $v['comment_id']), 'Admin', 'Comment', 'delete');?>" onclick="return confirm('确定需要删除?')">删除</a>
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
