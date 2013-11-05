<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>     
        <title>签字验收-两点一刻</title>
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
                        <font>签字验收</font>
                    </div>
                    <div class="border" style="width: 100%; min-height: 570px;">
                        <div class="help-jianjie">
                        为保证您的服务体验，避免因商家高峰期忙碌造成的失误给您造成不便，本站物流专员会与
                        您核对订单并要求您签字签收，请您配合物流专员的签字验收工作。
                        </div>
                        <div class="help-content">
                        1. 接收订单时一定核对订单商品的数量及商品是否正确；<br /> 
                        2. 确认无误之后，请您在服务反馈表上签字验收； <br />
                        3. 签完字表示您已经确认收到了正确的订单； <br />
                        4. 特别注意：本站对已确认签字的订单，但后来又反馈出错的订单不承担任何损失，感谢您的理解。 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
    </body>
</html>
