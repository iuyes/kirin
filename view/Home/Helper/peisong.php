<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>
        <title>配送相关-两点一刻</title>
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
                        <font>配送相关</font>
                    </div>
                    <div class="border" style="width: 100%; min-height: 570px;">
                        <h4 class="help-title">1.下单</h4>
                        <div class="help-content">
                        我们支持两种下单方式： 1）网络下单 2）电话下单<br />
                        网络下单: 网络下单需要0分钟<br />
                        电话下单: 电话下单需要5分钟左右
                        </div>
                        <h4 class="help-title">2.配送</h4>
                        <div class="help-content">
                        本站所有销售货物均有本站配送，本站会尽量缩短配送时间，目前配送时间平均为45分钟，我们建议您
                        尽量早点下单订菜或者定货，以免影响到您的吃饭时间。
                        </div>
                        <h4 class="help-title">3.配送范围</h4>
                        <div class="help-content">
                            <img src="static/img/map/huilongguan.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
    </body>
</html>
