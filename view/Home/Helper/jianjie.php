<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>        
        <title>公司简介-两点一刻</title>
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
                        <font>公司简介</font>
                    </div>
                    <div class="border" style="width: 100%; min-height: 570px;">
                        <h4 class="help-title">
                        1. 公司简介
                        </h4>
                        <div class="help-content">
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;两点一刻有限公司创建于2013年，作为O2O模式的先行者，已获得著名投资机构投资。两点一刻（www.liangdianyike.com）是基于用户地理位置，并以用户为圆心，日常生活范围为半径的在线生活服务平台。通过两点一刻，用户能及时掌握所处位置周边的生活信息，享受便捷的线上和线下生活服务。</p>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;现已覆盖回龙观等商圈，预计2014年覆盖北京；现有蔬菜、水果等产品，为满足用户本地化生活需求，持续拓展更多的服务品类。自建有专业物流团队、呼叫中心、商务和技术团队。整合百余家餐饮商家资源和知名大型超市资源，并与超过50家本地商家建立良好的合作关系。</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
    </body>
</html>
