<div class="menu s_width center">
    <ul>
        <li class="<?php if(!isset($menu_type) || ($menu_type == 0)){ echo "menu_active";}?>">
            <a href="<?php echo URL::encode(array('type' => 1), 'Home', 'Index', 'index')?>">首页</a>
            <s class="menu_pt"></s>
            <div class="clear"></div>
        </li>   
        <li class="<?php if($menu_type == 1){ echo "menu_active";}?>">
            <a href="<?php echo URL::encode(array('type' => 1), 'Home', 'Index', 'category')?>">蔬菜</a>
            <s class="menu_pt"></s>
            <div class="clear"></div>
        </li>
        <li class="<?php if($menu_type == 2){ echo "menu_active";}?>">
            <a href="<?php echo URL::encode(array('type' => 2), 'Home', 'Index', 'category')?>">水果</a>
            <s class="menu_pt"></s>
            <div class="clear"></div>
        </li>
        <li class="<?php if($menu_type == 3){ echo "menu_active";}?>">
            <a href="<?php echo URL::encode(array(), 'Home', 'Promotion', 'index')?>">促销</a>
            <s class="menu_pt"></s>
            <div class="clear"></div>
        </li>
        <li class="<?php if($menu_type == 4){ echo "menu_active";}?>">
            <a href="<?php echo URL::encode(array(), 'Home', 'Company', 'index')?>">企业订购</a>
        </li>
        <div style="clear: both;"></div>
    </ul>
</div>
