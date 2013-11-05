<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>      
        <script type="text/javascript" charset="utf-8">
            window.UEDITOR_HOME_URL = "/static/ueditor/";
        </script>
        <script type="text/javascript" src="/static/ueditor/ueditor.config.js"></script> 
        <script type="text/javascript" src="/static/ueditor/ueditor.all.js"></script>
        <link href="static/css/editor.css" rel="stylesheet" type="text/css">
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
                        <font>文章发表</font>
                    </div>
                    <div class="border" style="width: 100%; min-height: 400px;">
                        <form action="<?php echo URL::encode(array(), 'Admin', 'Ariticle', 'doEdit')?>" method="post">
                            <input type="hidden" name="ariticle_id" value="<?php echo $ariticle['ariticle_id']?>">
                            <ul class="fi">
                                <li class="fi-t">标题</li>
                                <li class="fi-text"><input type="text" name="ariticle_title" value="<?php echo $ariticle['ariticle_title']?>" placeHolder="请输入文章标题"></li>
                                <div class="clear"></div>
                            </ul>
                            <ul class="fi">
                                <li class="fi-t">类型</li>
                                <li class="fi-radio"><input type="radio" name="ariticle_type" value=1 <?php if($ariticle['ariticle_type'] == 1) { echo "checked=checked";}?>></li>
                                <li class="fi-font"><font>资讯</font></li>
                                <li class="fi-radio"><input type="radio" name="ariticle_type" value=2 <?php if($ariticle['ariticle_type'] == 2) { echo "checked=checked";}?>></li>
                                <li class="fi-font"><font>活动</font></li>
                                <div class="clear"></div>
                            </ul>
                            <textarea name="ariticle_content" id="myEditor">
                                <?php echo stripslashes($ariticle['ariticle_content'])?>
                            </textarea> 
                            <script type="text/javascript">
                                var editor = new UE.ui.Editor();
                                editor.render("myEditor");
                            </script>
                            <br />
                            <input type="submit" value="发表" class="fi-button">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
    </body>
</html>
