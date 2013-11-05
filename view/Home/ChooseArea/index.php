<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>        
        <title>商圈选择－两点一刻，您身边的蔬菜水果网上超市</title>
        <meta name="keywords" content="蔬菜水果配送，蔬菜配送，水果配送，有机蔬菜，有机水果，外卖配送，两点一刻，美食专家">
        <meta name="description" content="两点一刻(www.liangdianyike.com)主要为大家配送蔬菜和水果，站内所有蔬菜和水果送货上门，目前支持的商圈为：<?php foreach(LocationConfig::$config as $v) { echo $v['name'].' ';}?>" />
        <meta property="qc:admins" content="1030600027641167411611356375" />
        <style type="text/css">
        .ca-bj {
            background: url('static/img/rbj.jpg') repeat-x;;
        }

        .ct {
            min-height: 500px;
            vertical-align: middle;
        }

        .vtmd {
            padding-top: 150px;
        }

        .cttt {
            width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .location-item {
            border: 1px solid #E7E7E7; 
            padding: 3px; 
            width: 160px;
            margin-left: 5px;
            margin-right: 5px;
            margin-top: 10px;
        }

        .location-item * {
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            color: #333333;
        }
        </style>
    </head>

    <body class="ca-bj">
        <?php $this->includeTpl('Public', 'Header', 'nav');?>
        <div class="ct s_width center">
            <div class="text-align-center vtmd">
                <!--div>
                    <img src="static/img/logo.png"/>
                </div-->
                <div class="cttt">
                    <?php foreach (LocationConfig::$config as $k => $v): ?>
                    <div class="location-item float-left">
                        <a title="<?php echo $v['name']?>" href="<?php echo URL::encode(array('location' => $k), 'Home', 'Index', 'index')?>">
                            <img alt="<?php echo $v['name']?>" src="<?php echo $v['url'];?>">
                        </a>
                        <div style="margin-top: 5px;">
                            <a title="<?php echo $v['name']?>" href="<?php echo URL::encode(array('location' => $k), 'Home', 'Index', 'index')?>">
                                <?php echo $v['name'];?>
                            </a>
                        </div>
                    </div>
                    <?php endforeach;?>
                    <div class="location-item float-left">
                        <a href="javascript:void(0)">
                            <img src="static/img/more.png" width="152px" height="86px">
                        </a>
                        <div style="margin-top: 5px;">
                            <a href="javascript:void(0)">
                                 更多商圈建设中...
                            </a>
                        </div>
                    </div>

                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
    </body>
</html>
