<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>        
        <script language="javascript">
            function show_ariticle(obj) {
                ariticle_type = $(obj).val();
                window.location.href = 'index.php?s=Admin-Ariticle-index&ariticle_type=' + ariticle_type;
            }
        </script>
        <style type="text/css">
        .ariticle {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        .ariticle_item {
            height: 40px;
            line-height: 40px;
            border-bottom: 1px dotted #E7E7E7;
            border-top: 1px dotted #E7E7E7;
        }

        .ariticle_title {
            float: left;
            width: 70%;
        }

        .ariticle_title a {
            color: #333333;
            text-decoration: none;
            font-size: 13px;
        }
        .ariticle_opt {
            float: left;
            width: 20%;
            text-align: right;
        }
        .ariticle_opt a {
            color: #666666;
            text-decoration: none;
            font-size: 13px;
        }
        </style>
    </head>

    <body>
        <?php $this->includeTpl('Public', 'Header', 'nav');?>
        <div class="s_width center level">
            <div class="float-left" style="width: 19%;">
                <?php $this->includeTpl('Public', 'Admin', 'userinfomenu');?>
            </div>
            <div class="float-left detail" style="width: 81%;">
                <div>
                    <div class="title userinfo-title">
                        <font>文章列表</font>
                    </div>
                    <div class="border" style="width: 100%; min-height: 400px;">
                        <select onchange="show_ariticle(this)">
                            <option value=1 <?php if($ariticle_type == 1) { echo "selected";}?>>资讯</option>
                            <option value=2 <?php if($ariticle_type == 2) { echo "selected";}?>>活动</option>
                        </select>
                        <ul class="ariticle">
                            <?php $i=1; foreach($ariticle_list as $ariticle):?>
                                <li class="ariticle_item">
                                    <div class="ariticle_title">
                                        <a href="<?php echo URL::encode(array('ariticle_id' => $ariticle['ariticle_id']), 'Home', 'Ariticle', 'index')?>"><font color=red><?php echo sprintf("%03d", $i++);?></font>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ariticle['ariticle_title']?></a>
                                    </div>
                                    <div class="ariticle_opt">
                                        <a href="<?php echo URL::encode(array('ariticle_id' => $ariticle['ariticle_id']), 'Admin', 'Ariticle', 'doDelete')?>">删除</a>
                                        <a href="<?php echo URL::encode(array('ariticle_id' => $ariticle['ariticle_id']), 'Admin', 'Ariticle', 'edit')?>">编辑</a>
                                    </div>
                                    <div class="clear"></div>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
    </body>
</html>
