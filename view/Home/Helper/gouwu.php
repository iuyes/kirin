<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>      
        <title>购物指南-两点一刻</title>
    </head>

    <body>
        <?php $this->includeTpl('Public', 'Header', 'nav');?>
        <?php $this->includeTpl('Public', 'Header', 'search');?>
        <?php $this->includeTpl('Public', 'Header', 'menu');?>
        <div class="s_width center level">
            <div class="float-left l-menu">
                <?php $this->includeTpl('Public', 'Header', 'helpermenu');?>
            </div>
            <div class="float-left detail r-menu">
                <div>
                    <div class="title userinfo-title">
                        <font>购物指南</font>
                    </div>
                    <div class="border" style="width: 100%; min-height: 570px;">
                        <h4>1. 注册</h4>
                        <img src="static/img/helper/zhuce.png">
                        <h4>2. 登陆</h4>
                        <img src="static/img/helper/denglu.png">
                        <h4>3. 选择货物</h4>
                        <img src="static/img/helper/xuancai.png">
                        <h4>4. 提交订单</h4>
                        <img src="static/img/helper/shengcheng.png">

                    </div>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
    </body>
</html>
