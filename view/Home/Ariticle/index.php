<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>        
        <title><?php echo $ariticle['ariticle_title']?></title>
        <style type="text/css">
            .backToTop {
                display: none;
                width: 42px;
                height: 42px;
                line-height: 42;
                padding: 5px 0;
                /*background-color: #000;
                color: #fff;*/
                background: url(static/img/go-to-top.png) no-repeat; 
                font-size: 12px;
                text-align: center;
                position: fixed;
                _position: absolute;
                right: 10px;
                bottom: 30px;
                _bottom: "auto";
                cursor: pointer;
                opacity: .3;
                filter: Alpha(opacity=30);
            }

            .backToTop:hover {
                opacity: 1;
                filter: Alpha(opacity=100);
            }
        </style>
        <script language="javascript" type="text/javascript">
            function aaa() {
                var $backToTopTxt = "返回顶部", $backToTopEle = $('<div class="backToTop"></div>').appendTo($("body"))
                    .text($backToTopTxt).attr("title", $backToTopTxt).click(function() {
                        $("html, body").animate({ scrollTop: 0 }, 700);
                }), $backToTopFun = function() {
                    var st = $(document).scrollTop(), winh = $(window).height();
                    (st > 0)? $backToTopEle.show(): $backToTopEle.hide();
                    //IE6下的定位
                    if (!window.XMLHttpRequest) {
                        $backToTopEle.css("top", st + winh - 166);
                    }
                };
                $(window).bind("scroll", $backToTopFun);
                $(function() { $backToTopFun(); });
            }
            $(document).ready(function(){aaa();});
        </script>   
    </head>

    <body>
        <?php $this->includeTpl('Public', 'Header', 'nav');?>
        <?php $this->includeTpl('Public', 'Header', 'search');?>
        <?php $this->includeTpl('Public', 'Header', 'menu');?>
        <div class="s_width center ad2">
            <a href="">
                <img src="static/img/ad2.jpg">
            </a>
        </div>
        <div class="s_width center">
            <div class="atc">
                <div class="atc_content">
                    <div class="atc_title"><?php echo $ariticle['ariticle_title']?></div>
                    <div class="atc_title2">发表日期:<?php echo date("Y-m-d H:i", $ariticle['ariticle_add_at'])?></div>
                    <div class="atc_detail">
                        <?php echo stripslashes($ariticle['ariticle_content'])?>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="atc_ad">
                <div class="atc_ad_content">
                    <div>
                        <div class="bt">资讯</div>
                        <ul class="bc">
                            <?php foreach ($zx_list as $ariticle):?>
                            <li>
                                <a href="<?php echo URL::encode(array('ariticle_id' => $ariticle['ariticle_id']), 'Home', 'Ariticle', 'index')?>">
                                    <?php echo stripslashes($ariticle['ariticle_title'])?>
                                </a>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <div>
                        <div class="bt">活动</div>
                        <ul class="bc">
                            <?php foreach ($hd_list as $ariticle):?>
                            <li>
                                <a href="<?php echo URL::encode(array('ariticle_id' => $ariticle['ariticle_id']), 'Home', 'Ariticle', 'index')?>">
                                    <?php echo $ariticle['ariticle_title']?>
                                </a>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
    </body>
</html>
