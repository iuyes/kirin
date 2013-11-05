<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>        
        <title>列表</title>
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
                        <font>蔬菜水果</font>
                    </div>
                    <div class="border" style="width: 100%; min-height: 400px;">
                        <form action="<?php URL::encode(array(), 'Admin', 'ADImg', 'list')?>" method="get">
                            <input type="hidden" name="s" value="Admin-ADImg-list">
                            <select name="ad_img_location">
                                <option value="0">请选择</option>
                                <?php foreach (LocationConfig::$config as $k => $v):?>
                                    <option value="<?php echo $k;?>" <?php if($ad_img_location == $k) { echo 'selected';}?>><?php echo $v['name'];?></option>
                                <?php endforeach;?>
                            </select>
                            <select name="ad_img_type">
                                <option value="0">请选择</option>
                                <?php foreach (ADImgConfig::$ad_img_type as $k => $v):?>
                                    <option value="<?php echo $k;?>" <?php if($ad_img_type == $k) { echo 'selected';}?>><?php echo $v;?></option>
                                <?php endforeach;?>
                            </select>
                            <input type="submit" value="查询">
                        </form>
                        <table class="cart-table" border="0" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <td width="10%">ID</td>
                                    <td width="20%">位置</td>
                                    <td width="25%">广告语</td>
                                    <td width="15%">广告页面</td>
                                    <td width="15%">图片</td>
                                    <td width="15%">操作</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach($ad_img_list as $k => $ad_img):?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php $tmp = LocationConfig::getLocation($ad_img['ad_img_location']); echo $tmp['name'];?></td>
                                    <td><?php echo $ad_img['ad_img_des']?></td>
                                    <td><a href="<?php echo $ad_img['ad_img_url']?>">查看</a></td>
                                    <td><a target=__blank href="<?php echo $ad_img['ad_img_src']?>">查看</a></td>
                                    <td><a href="<?php echo URL::encode(array('ad_img_id' => $ad_img['ad_img_id']), 'Admin', 'ADImg', 'doDelete')?>">删除</a></td>
                                </tr>   
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
    </body>
</html>
