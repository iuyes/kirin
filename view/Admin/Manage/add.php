<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>        
        <script type="text/javascript" src="static/jhtmlarea/scripts/jHtmlArea-0.7.5.min.js"></script>
        <link rel="Stylesheet" type="text/css" href="static/jhtmlarea/style/jHtmlArea.css" />
        <script type="text/javascript" src="static/jhtmlarea/scripts/jHtmlArea.ColorPickerMenu-0.7.0.js"></script>
        <link rel="Stylesheet" type="text/css" href="static/jhtmlarea/style/jHtmlArea.ColorPickerMenu.css" />
        <style type="text/css">
            div.jHtmlArea { border: solid 1px #ccc; }
        </style>
        <title>添加蔬菜水果</title>
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
                        <form id="add_goods" method="post" action="<?php echo URL::encode(array(), 'Admin', 'Manage', 'doAdd')?>" enctype="multipart/form-data">
                            <input type="hidden" name="s" value="Admin-Manage-doAdd">
                            <div class="form-item">
                                <div class="form-label">
                                    区域：
                                </div>
                                <div class="form-input">
                                    <?php foreach(LocationConfig::$config as $k => $v):?>
                                        <input type="radio" name="goods_location" value="<?php echo $k;?>"><?php echo $v['name'];?>
                                    <?php endforeach;?>
                                </div>
                                <div style="clear: both"></div>
                            </div>
                            <div class="form-item">
                                <div class="form-label">
                                    种类：
                                </div>
                                <div class="form-input">
                                    <input type="radio" name="goods_type" value="1" onclick="$('#vegetable_category').show(); $('#fruit_category').hide();">蔬菜
                                    <input type="radio" name="goods_type" value="2" onclick="$('#fruit_category').show(); $('#vegetable_category').hide();">水果
                                </div>
                                <div style="clear: both"></div>
                            </div>
                            <div class="form-item">
                                <div class="form-label">
                                    名称：
                                </div>
                                <div class="form-input">
                                    <input type="text" name="goods_name" value="">
                                </div>
                                <div style="clear: both"></div>
                            </div>
                            <div class="form-item">
                                <div class="form-label">
                                    广告语：
                                </div>
                                <div class="form-input">
                                    <input type="text" name="goods_ad" value="">
                                </div>
                                <div style="clear: both"></div>
                            </div>
                            <div class="form-item">
                                <div class="form-label">
                                    分类：
                                </div>
                                <div class="form-input" style="width: 800px;">
                                    <div id="vegetable_category" class="hide">
                                        <?php $i=1; foreach(CategoryConfig::$category[1] as $k => $v):?>
                                            <div class="float-left" style="width: 30%;">
                                                <input type="checkbox" name="goods_category[]" value="<?php echo $k;?>"><?php echo $v;?>
                                            </div>
                                        <?php endforeach;?>
                                        <div class="clear"></div>
                                    </div>
                                    <div id="fruit_category" class="hide">
                                        <?php $i=1; foreach(CategoryConfig::$category[2] as $k => $v):?>
                                            <div class="float-left" style="width: 30%;">
                                                <input type="checkbox" name="goods_category[]" value="<?php echo $k;?>"><?php echo $v;?>
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
                                            <option value="<?php echo $i;?>"><?php echo sprintf("%0.1f", $i/10)?>折</option>
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
                                    <input type="text" name="goods_price" value="" placeholder="例如： 3.5" style="width: 100px">
                                    <font style="font-weight: bold;">元&nbsp;/&nbsp;</font>
                                    <input type="text" name="goods_price_weight" value="" placeholder="例如： 500" style="width: 100px">
                                    <font style="font-weight: bold;">&nbsp;g&nbsp;</font>
                                </div>
                                <div style="clear: both"></div>
                            </div>
                            <div class="form-item">
                                <div class="form-label">
                                    每份重量范围：
                                </div>
                                <div class="form-input">
                                    <input type="text" name="goods_weight_min" value="" placeholder="例如： 500" style="width: 100px;">
                                    <font style="font-weight: bold;">g&nbsp;~</font>
                                    <input type="text" name="goods_weight_max" value="" placeholder="例如： 600" style="width: 100px;">
                                    <font style="font-weight: bold;">&nbsp;g&nbsp;</font>
                                </div>
                                <div style="clear: both"></div>
                            </div>
                            <div class="form-item">
                                <div class="form-label">
                                    初始浏览次数：
                                </div>
                                <div class="form-input">
                                    <input type="text" name="goods_read_times" value="<?php echo rand(400, 600)?>">
                                </div>
                                <div style="clear: both"></div>
                            </div>
                            <div class="form-item">
                                <div class="form-label">
                                    初始购买次数：
                                </div>
                                <div class="form-input">
                                    <input type="text" name="goods_sale_times" value="<?php echo rand(100, 200)?>">
                                </div>
                                <div style="clear: both"></div>
                            </div>
                            <div class="form-item">
                                <div class="form-label">
                                    图片：
                                </div>
                                <div class="form-input">
                                    <input type="file" name="goods_img" value="">
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
                                    <button class="mybutton" style="width: 100px" onclick="addGoods();">添加</button>
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
