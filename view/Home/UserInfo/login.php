<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>        
        <title>两点一刻-登陆</title>
    </head>

    <body>
        <?php $this->includeTpl('Public', 'Header', 'nav');?>
        <?php $this->includeTpl('Public', 'Header', 'search');?>
        <?php $this->includeTpl('Public', 'Header', 'menu');?>
        <div class="s_width center border" style="min-height: 390px;">
            <div class="float-left login-img" style="margin-left: 10px;">
                <img src="static/img/bj.jpg">
            </div>
            <form id="login" action="<?php echo URL::encode(array(), 'Home', 'UserInfo', 'doLogin')?>" method="post" class="float-left login-form">
                <input type="hidden" name="_t" value="<?php echo $callback;?>">
                <div class="form-item">
                    <div class="form-label">
                        用户名：
                    </div>
                    <div class="form-input">
                        <input class="ie6-input" type="text" value="" name="uname">
                    </div>
                    <div style="clear: both"></div>
                </div>
                <div class="form-item">
                    <div class="form-label">
                        密码：
                    </div>
                    <div class="form-input">
                        <input type="password" value="" name="passwd" class="float-left ie6-input">
                    </div>
                    <div style="clear: both"></div>
                </div>
                <div id="login_vet_code" class="form-item <?php if($need_vet_code){ echo 'show';} else { echo 'hide';}?>">
                    <div class="form-label">
                        验证码：
                    </div>
                    <div class="form-input">
                        <input type="text" value="" name="vet_code" style="width: 130px;" class="float-left ie6-input">
                        <img src="common/vet_code.php" id="t" onclick="reload_vet_code('t'); return false;" class="float-left" >
                        <div class="float-left">
                            <a href="" class="vet" onclick="reload_vet_code('t'); return false;">看不清</a><br />
                            <a href="" class="vet" onclick="reload_vet_code('t'); return false;">换一张</a><br />
                        </div>
                    </div>
                    <div style="clear: both"></div>
                </div>
                <div class="form-item text-align-center">
                    <button class="mybutton" onclick="login();">登录</button>
                    <button class="mybutton" onclick="window.location.href='<?php echo URL::encode(array('_t' => $callback), 'Home', 'UserInfo', 'register')?>'; return false;">注册</button>
                    <!--button class="mybutton" onclick="">忘记密码</button-->
                </div>
            </form>
            <div style="clear: both"></div>
        </div>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
    </body>
</html>
