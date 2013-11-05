 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>        
        <title>投诉建议－两点一刻</title>
    </head>

    <body>
        <?php $this->includeTpl('Public', 'Header', 'nav');?>
        <?php $this->includeTpl('Public', 'Header', 'search');?>
        <?php $this->includeTpl('Public', 'Header', 'menu');?>
        <div class="s_width center level">
            <div class="float-left l-menu">
                <?php $this->includeTpl('Public', 'Header', 'userinfomenu');?>
            </div>
            <div class="float-left detail r-menu">
                <div>
                    <div class="title userinfo-title">
                        <font>账户信息</font>
                    </div>
                    <div class="border" style="width: 100%; min-height: 400px;">
                        <form method="post" action="<?php echo URL::encode(array(), 'Home', 'Suggest', 'doSuggest')?>">
                            <div class="form-item">
                                <textarea name="suggest" class="suggest text-align-left">谢谢您对我们的服务进行建议或者意见，我们会根据你的意见或者建议完善我们的服务。谢谢
                                </textarea>
                            </div>
                            <div class="form-item text-align-right">
                                <button class="mybutton" style="width: 100px" onclick="submit()">提交</button><br />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
    </body>
</html>
