<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>        
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
                        <form id="add_goods" method="post" action="<?php echo URL::encode(array(), 'Admin', 'ADImg', 'doAdd')?>" enctype="multipart/form-data">
                            <input type="hidden" name="s" value="Admin-ADImg-doAdd">
                            <div class="form-item">
                                <div class="form-label">
                                    区域：
                                </div>
                                <div class="form-input">
                                    <?php foreach(LocationConfig::$config as $k => $v):?>
                                        <input type="radio" name="ad_img_location" value="<?php echo $k;?>"><?php echo $v['name'];?>
                                    <?php endforeach;?>
                                </div>
                                <div style="clear: both"></div>
                            </div>
                            <div class="form-item">
                                <div class="form-label">
                                    广告类型：
                                </div>
                                <div class="form-input">
                                    <select name="ad_img_type">
                                        <?php foreach(ADImgConfig::$ad_img_type as $k => $v):?>
                                            <option value="<?php echo $k;?>"><?php echo $v;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div style="clear: both"></div>
                            </div>
                            <div class="form-item">
                                <div class="form-label">
                                    广告语：
                                </div>
                                <div class="form-input">
                                    <input type="text" name="ad_img_des" value="">
                                </div>
                                <div style="clear: both"></div>
                            </div>
                            <div class="form-item">
                                <div class="form-label">
                                    广告页面：
                                </div>
                                <div class="form-input">
                                    <input type="text" name="ad_img_url" value="">
                                </div>
                                <div style="clear: both"></div>
                            </div>
                            <div class="form-item">
                                <div class="form-label">
                                    图片：
                                </div>
                                <div class="form-input">
                                    <input type="file" name="ad_img" value="">
                                </div>
                                <div style="clear: both"></div>
                            </div>
                            <div class="form-item text-align-right">
                                <div class="form-label">
                                </div>
                                <div class="form-input">
                                    <button class="mybutton" style="width: 100px" onclick="submit()">添加</button>
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
