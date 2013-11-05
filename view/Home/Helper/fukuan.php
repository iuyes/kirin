<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>        
        <title>货到付款-两点一刻</title>
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
                        <font>货到付款</font>
                    </div>
                    <div class="border" style="width: 100%; min-height: 570px;">
                        <div class="help-jianjie">
                            本站目前只支持货到付款，敬请注意。
                        </div>
                        <h4 class="help-title">
                        1. 使用方式
                        </h4>
                        <div class="help-content">
                        本站目前只支持货到付款的支付方式。 <br />
                        1.1 当生成订单后，本站物流人员将会根据您的要求将订购的商品送达，请您按照订单金额做好准备，
                        以提高收货效率。当商品配送到您指定地址，请您核对、查收商品并完成支付，如果您在货物送达时无
                        故拒收货物，本站将相应扣减您的积分并降低您的信用级别。<br />
                        1.2 对于有货到付款拒收不良信用记录的用户，将取消您选择货到付款的资格。但可以通过非货到付款
                        方式购买，才可重新获得选择货到付款订单信用。
                        </div>
                        <h4 class="help-title">
                        2.温馨提示
                        </h4>
                        <div class="help-content">
                        签收时，请您仔细核对款项、务必作到货款两清，若事后发现款项错误，将无法再核实确认。
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
    </body>
</html>
