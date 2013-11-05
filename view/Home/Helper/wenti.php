<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>        
        <title>常见问题-两点一刻</title>
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
                        <font>常见问题</font>
                    </div>
                    <div class="border" style="width: 100%; min-height: 570px;">
                        <h4 class="help-title">1.如何购物</h4>
                        <div class="help-content">
                            如何购物，请参见:<a href="<?php echo URL::encode(array(), 'Home', 'Helper', 'gouwu')?>">购物指南</a>
                        </div>
                        
                        <h4 class="help-title">2.是否可以开封验货？不满意是否可以拒收？</h4>
                        <div class="help-content">
                        您可以在快递员在场的时候打开包裹检查货物是否完整完好。
                        如果您对收到的货物不满意，您可以选择当场拒收整个包裹（不支持
                        部分拒收，如果需要退回部分商品，请在签收之后发起部分退货）
                        </div>
                        <h4 class="help-title">3.货到付款需要额外费用吗？</h4>
                        <div class="help-content">
                        不需要，与您正常使用普通快递一样收取快递费5元。
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
    </body>
</html>
