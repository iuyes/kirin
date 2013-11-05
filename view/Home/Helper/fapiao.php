<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>        
        <title>发票制度-两点一刻</title>
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
                        <font>发票制度</font>
                    </div>
                    <div class="border" style="width: 100%; min-height: 570px;">
                        <h4 class="help-title">
                        1. 发票由谁提供
                        </h4>
                        <div class="help-content">
                        发票由我们的合作方提供，我们只是负责蔬菜和水果的配送。
                        </div>
                        <h4 class="help-title">
                        2. 发票金额
                        </h4>
                        <div class="help-content">
                        发票中的面值只包括蔬菜和水果的价格，不包含配送费用。
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
    </body>
</html>
