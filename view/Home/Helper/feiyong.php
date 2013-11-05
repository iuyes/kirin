<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>        
        <title>费用说明-两点一刻</title>
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
                        <font>费用说明</font>
                    </div>
                    <div class="border" style="width: 100%; min-height: 570px;">
                        <h4 class="help-title">
                        1. 起送价
                        </h4>
                        <div class="help-content">
                        本站的起送价为5元，如果您的订单不足5元，我们会加收2元的送货费,如果超过5元，物流费用为1元/单
                        </div>
                        <h4 class="help-title">
                        2.物流费用
                        </h4>
                        <div class="help-content">
                        我们会收取1元/单的物流费。
                        </div>
                        <h4 class="help-title">
                        3.电话下单
                        </h4>
                        <div class="help-content">
                        电话下单不收取电话服务费，物流配送费用同条目1或者条目2
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
    </body>
</html>
