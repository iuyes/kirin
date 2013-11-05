<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>       
        <title>两点一刻－注册</title>
    </head>

    <body>
        <?php $this->includeTpl('Public', 'Header', 'nav');?>
        <?php $this->includeTpl('Public', 'Header', 'search');?>
        <?php $this->includeTpl('Public', 'Header', 'menu');?>
        <div class="s_width center border" style="min-height: 390px;">
            <div class="float-left login-img" style="margin-left: 10px;">
                <img src="static/img/bj.jpg">
            </div>
            <form action="<?php echo URL::encode(array(), 'Home', 'UserInfo', 'doRegister');?>" method="post" class="float-left login-form" style="margin-top: 40px;" id="register">
                <input type="hidden" name="_t" value="<?php echo $callback;?>">
                <div class="form-item">
                    <div class="form-label">
                        用户名：
                    </div>
                    <div class="form-input">
                        <input class="ie6-input" type="text" value="" name="uname" autocomplete="on" placeholder="可包含大小写字母、数字">
                        <font id="uname_error" style="color: red; margin-left: 5px;">*</font>
                    </div>
                    <div style="clear: both"></div>
                </div>
                <div class="form-item">
                    <div class="form-label">
                        密码：
                    </div>
                    <div class="form-input">
                        <input class="ie6-input" type="password" value="" name="passwd" placeholder="可包含大小写字母、数字">
                        <font id="passwd_error" style="color: red; margin-left: 5px;">*</font>
                    </div>
                    <div style="clear: both"></div>
                </div>
                <div class="form-item">
                    <div class="form-label">
                        确认密码：
                    </div>
                    <div class="form-input">
                        <input class="ie6-input" type="password" value="" name="passwd2" placeholder="可包含大小写字母、数字">
                        <font id="passwd2_error" style="color: red; margin-left: 5px;">*</font>
                    </div>
                    <div style="clear: both"></div>
                </div>
                <div id="register_vet_code" class="form-item <?php if($need_vet_code){ echo 'show';} else { echo 'hide';}?>">
                    <div class="form-label">
                        验证码：
                    </div>
                    <div class="form-input">
                        <input type="text" value="" name="vet_code" style="width: 158px;" class="float-left ie6-input">
                        <img src="common/vet_code.php" class="float-left" id="t" onclick="reload_vet_code('t'); return false;">
                        <div class="float-left">
                            <a href="" class="vet" onclick="reload_vet_code('t'); return false;">看不清</a><br />
                            <a href="" class="vet" onclick="reload_vet_code('t'); return false;">换一张</a><br />
                        </div>
                        <font id="vet_code_error" style="color: red; margin-left: 5px;">*</font>
                    </div>
                    <div style="clear: both"></div>
                </div>
                <div class="form-item text-align-right">
                    <div class="form-label">
                    </div>
                    <div class="form-input">
                        <button class="mybutton" style="width: 300px" onclick="return register();">注册</button><br />
                        <a href="index.php?s=Home-UserInfo-login" style="color: #666666; text-decoration: none;">我有帐号，去登陆</a>
                    </div>
                </div>
            </form>
            <div style="clear: both"></div>
        </div>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
    </body>
</html>
