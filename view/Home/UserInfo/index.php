<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>        
        <title>基本信息－两点一刻</title>
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
                    <div class="border" style="width: 100%; ">
                        <table class="cart-table" cellspacing=0 border=0 cellpadding=0>
                            <thead>
                                <tr>
                                    <td width="10%">序号</td>
                                    <td width="40%">配送地址</td>
                                    <td width="20%">联系方式</td>
                                    <td width="15%">联系人</td>
                                    <td width="15%">操作</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($delivery_list as $k => $v):?>
                                    <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo "{$v['delivery_address']}";?></td>
                                        <td><?php echo "{$v['delivery_phone']}";?></td>
                                        <td><?php echo "{$v['delivery_name']}";?></td>
                                        <td>
                                            <a href="<?php echo URL::encode(array('delivery_id' => $v['delivery_id']), 'Home', 'Delivery', 'delete')?>">删除</a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                                <?php if(!count($delivery_list)):?>
                                    <tr>
                                        <td style="color: gray;">暂无</td>
                                        <td style="color: gray;">暂无</td>
                                        <td style="color: gray;">暂无</td>
                                        <td style="color: gray;">暂无</td>
                                        <td style="color: gray;">暂无</td>
                                    </tr>
                                <?php endif;?>
                            </tbody>
                        </table>
                        <form id="basic_info" method="post" action="<?php echo URL::encode(array(), 'Home', 'Delivery', 'doAdd')?>">
                            <div class="form-item">
                                <div class="form-label">
                                    收货地址：
                                </div>
                                <div class="form-input">
                                    <input type="text" name="delivery_address" value="">
                                    <font id="vet_code_error" style="color: red; margin-left: 5px;">*</font>
                                </div>
                                <div style="clear: both"></div>
                            </div>

                            <div class="form-item">
                                <div class="form-label">
                                    联系电话：
                                </div>
                                <div class="form-input">
                                    <input type="text" name="delivery_phone" value="">
                                    <font id="vet_code_error" style="color: red; margin-left: 5px;">*</font>
                                </div>
                                <div style="clear: both"></div>
                            </div>
                            
                            <div class="form-item">
                                <div class="form-label">
                                    联系人：
                                </div>
                                <div class="form-input">
                                    <input type="text" name="delivery_name" value="">
                                    <font id="vet_code_error" style="color: red; margin-left: 5px;">*</font>
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
                                    <button class="mybutton" style="width: 300px" onclick="delivery_add()">添加收获地址</button><br />
                                </div>
                            </div> 
                        </form>
                        <div style="clear:both"></div><br />
                    </div>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
    </body>
</html>
