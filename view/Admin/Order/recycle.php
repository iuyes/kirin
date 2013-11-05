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
                       <form class="search-form" style="margin: 0px;">
                            <div style="float: right;">
                                <div class="float-left">
                                    <input type="text" value="订单号">
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
                                    <td width="55%">商品</td>
                                    <td width="15%">订单时间</td>
                                    <td width="20%">操作</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for($i=0; $i<10; $i++):?>
                                <tr>
                                    <td>
                                        <a href="index.php?s=Home-Detail-index">泸西白菜</a></td>
                                    <td>无敌大白菜</td>
                                    <td>
                                        2013-04-05 13:23
                                    </td>
                                    <td>
                                        <a href="">恢复</a>
                                        <a href="">详情</a>
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
