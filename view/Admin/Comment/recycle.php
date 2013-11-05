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
                       <form class="search-form" style="margin: 0px;">
                            <div style="float: right;">
                                <div class="float-left">
                                    <input type="text" value="商品ID">
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
                                <?php for($i=0; $i<10; $i++):?>
                                <tr>
                                    <td>200004</td>
                                    <td>无敌大白菜</td>
                                    <td>
                                        2013-04-05 13:23
                                    </td>
                                    <td>niujiaming</td>
                                    <td>白菜挺好吃</td>
                                    <td>
                                    </td>
                                </tr>   
                                <?php endfor;?>
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
