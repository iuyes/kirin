<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>       
        <title>业务流程-两点一刻</title>
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
                        <font>业务说明</font>
                    </div>
                    <div class="border" style="width: 100%; min-height: 570px;">
                        <div class="help-jianjie">
                        我们致力于为本地用户带来便捷的在线生活方式。本站与本地品牌商家建立合作，为用户提供30分钟内的
                        即时配送服务。配送范围包括蔬菜，水果等各种品类。
                        </div>
                        <h4 class="help-title">1.蔬菜</h4>
                        <div class="help-content">
                        本站与本地多家蔬菜厂商合作，为用户提供新鲜可口的蔬菜，希望为您的生活带来便利。
                        </div>
                        <h4 class="help-title">2.水果</h4>
                        <div class="help-content">
                        本站精挑细选了若干水果厂商，为您派送新鲜水果，水果的送货地址可以是小区，也可以是写字楼。
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
    </body>
</html>
