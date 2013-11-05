<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>        
        <title>密码修改－两点一刻</title>
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
                        <font>密码修改</font>
                    </div>
                    <div class="border" style="width: 100%; min-height: 400px;">
                        <form id="password" method="post" action="<?php echo URL::encode(array(), 'Home', 'UserInfo', 'doEditPassword')?>">
                            <div class="form-item">
                                <div class="form-label">
                                    原密码：
                                </div>
                                <div class="form-input">
                                    <input type="password" name="prepasswd" value="" autocomplete="off">
                                </div>
                                <div style="clear: both"></div>
                            </div>
                            <div class="form-item">
                                <div class="form-label">
                                    密码：
                                </div>
                                <div class="form-input">
                                    <input type="password" name="passwd" value="">
                                </div>
                                <div style="clear: both"></div>
                            </div>

                            <div class="form-item">
                                <div class="form-label">
                                    确认密码：
                                </div>
                                <div class="form-input">
                                    <input type="password" name="passwd2" value="">
                                </div>
                                <div style="clear: both"></div>
                            </div>
                            <div class="form-item">
                                <div class="form-label">
                                    验证码：
                                </div>
                                <div class="form-input">
                                    <input type="text" value="" name="vet_code" style="width: 158px;" class="float-left">
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
                                    <button class="mybutton" style="width: 300px" onclick="edit_password()">确认更改</button><br />
                                </div>
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
