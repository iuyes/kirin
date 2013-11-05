<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>        
        <title>编辑</title>
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
                    <div class="border" style="width: 100%;">
                        <form id="edit_goods" method="post" action="<?php echo URL::encode(array(), 'Admin', 'Manage', 'doEdit')?>" enctype="multipart/form-data">
                            <input type="hidden" name="goods_id" value="<?php echo $goods_info['goods_id']?>">
                            <div class="form-item">
                                <div class="form-label">
                                    区域：
                                </div>
                                <div class="form-input">
                                    <?php foreach(LocationConfig::$config as $k => $v):?>
                                    <input type="radio" name="goods_location" value="<?php echo $k;?>" <?php if($goods_info['goods_location'] == $k) { echo "checked";}?>><?php echo $v['name'];?>
                                    <?php endforeach;?>
                                </div>
                                <div style="clear: both"></div>
                            </div>
                            
                            <div class="form-item">
                                <div class="form-label">
                                    种类：
                                </div>
                                <div class="form-input">
                                    <input type="radio" name="goods_type" value="1" <?php if($goods_info['goods_type'] == 1) { echo "checked";}?>>蔬菜
                                    <input type="radio" name="goods_type" value="2" <?php if($goods_info['goods_type'] == 2) { echo "checked";}?>>水果
                                </div>
                                <div style="clear: both"></div>
                            </div>
                            <div class="form-item">
                                <div class="form-label">
                                    名称：
                                </div>
                                <div class="form-input">
                                    <input type="text" name="goods_name" value="<?php echo $goods_info['goods_name']?>">
                                </div>
                                <div style="clear: both"></div>
                            </div>
                            <div class="form-item">
                                <div class="form-label">
                                    广告语：
                                </div>
                                <div class="form-input">
                                    <input type="text" name="goods_ad" value="<?php echo $goods_info['goods_ad']?>">
                                </div>
                                <div style="clear: both"></div>
                            </div>
                            <div class="form-item">
                                <div class="form-label">
                                    分类：
                                </div>
                                <div class="form-input" style="width: 800px;">
                                    <?php $goods_category = explode(',', $goods_info['goods_category']);?>
                                    <div id="vegetable_category" class="<?php if($goods_info['goods_type'] != 1) { echo "hide";}?>">
                                        <?php $i=1; foreach(CategoryConfig::$category[1] as $k => $v):?>
                                            <div class="float-left" style="width: 30%;">
                                                <input type="checkbox" name="goods_category[]" <?php if(in_array($k, $goods_category)) { echo "checked";}?> value="<?php echo $k;?>"><?php echo $v;?>
                                            </div>
                                        <?php endforeach;?>
                                        <div class="clear"></div>
                                    </div>
                                    <div id="fruit_category" class="<?php if($goods_info['goods_type'] != 2) { echo "hide";}?>">
                                        <?php $i=1; foreach(CategoryConfig::$category[2] as $k => $v):?>
                                            <div class="float-left" style="width: 30%;">
                                                <input type="checkbox" name="goods_category[]" <?php if(in_array($k, $goods_category)) { echo "checked";}?> value="<?php echo $k;?>"><?php echo $v;?>
                                            </div>
                                        <?php endforeach;?>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div style="clear: both"></div>
                            </div>
                            <div class="form-item">
                                <div class="form-label">
                                    促销：
                                </div>
                                <div class="form-input">
                                    <select name="goods_promotion">
                                        <?php for($i=100; $i >=0; $i -= 5):?>
                                            <option value="<?php echo $i;?>" <?php if($goods_info['goods_promotion'] == $i) { echo "selected";}?>><?php echo sprintf("%0.1f", $i/10)?>折</option>
                                        <?php endfor;?>
                                    </select>
                                </div>
                                <div style="clear: both"></div>
                            </div>

                            <div class="form-item">
                                <div class="form-label">
                                    价格：
                                </div>
                                <div class="form-input">
                                    <input type="text" name="goods_price" value="<?php echo $goods_info['goods_price']?>" style="width: 100px;">
                                    <font style="font-weight: bold;">&nbsp;元/&nbsp;</font>
                                    <input type="text" name="goods_price_weight" value="<?php echo $goods_info['goods_price_weight']?>" style="width: 100px;">
                                    <font style="font-weight: bold;">&nbsp;g</font>
                                </div>
                                <div style="clear: both"></div>
                            </div>
                            <div class="form-item">
                                <div class="form-label">
                                    重量范围：
                                </div>
                                <div class="form-input">
                                    <input type="text" name="goods_weight_min" value="<?php echo $goods_info['goods_weight_min']?>" style="width: 100px;">
                                    <font style="font-weight: bold;">&nbsp;g~&nbsp;</font>
                                    <input type="text" name="goods_weight_max" value="<?php echo $goods_info['goods_weight_max']?>" style="width: 100px;">
                                    <font style="font-weight: bold;">&nbsp;g</font>
                                </div>
                                <div style="clear: both"></div>
                            </div>
                            <div class="form-item">
                                <div class="form-label">
                                    浏览次数：
                                </div>
                                <div class="form-input">
                                    <input type="text" name="goods_read_times" value="<?php echo $goods_info['goods_read_times'];?>">
                                </div>
                                <div style="clear: both"></div>
                            </div>
                            <div class="form-item">
                                <div class="form-label">
                                    购买次数：
                                </div>
                                <div class="form-input">
                                    <input type="text" name="goods_sale_times" value="<?php echo $goods_info['goods_sale_times']?>">
                                </div>
                                <div style="clear: both"></div>
                            </div>

                            <div class="form-item">
                                <div class="form-label">
                                    图片：
                                </div>
                                <div class="form-input">
                                    <input type="file" name="goods_img" value="">
                                    <a target="_blank" href="<?php echo $goods_info['goods_img']?>" style="font-size: 13px; color: red; text-decoration: none;">查看</a>
                                    <font style="font-size: 13px; color: #999999;">如果不许更改，则不用上传</font>
                                </div>
                                <div style="clear: both"></div>
                            </div>
                            <div class="form-item">
                                <div class="form-label">
                                    验证码：
                                </div>
                                <div class="form-input">
                                    <input type="text" value="" name="vet_code" style="width: 130px;" class="float-left">
                                    <img src="common/vet_code.php" class="float-left" id="t" onclick="reload_vet_code('t'); return false;">
                                    <div class="float-left">
                                        <a href="" class="vet" onclick="reload_vet_code('t'); return false;">看不清</a><br />
                                        <a href="" class="vet" onclick="reload_vet_code('t'); return false;">换一张</a><br />
                                    </div>
                                </div>
                                <div style="clear: both"></div>
                            </div>
                            <div class="form-item text-align-right">
                                <div class="form-label">
                                </div>
                                <div class="form-input">
                                    <button class="mybutton" style="width: 100px" onclick="editGoods()">更改</button> 
                                    <button class="mybutton" style="width: 100px">重填</button>
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
