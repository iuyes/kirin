<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>
        <title>我的收藏－两点一刻</title>
    </head>

    <body>
        <?php $this->includeTpl('Public', 'Header', 'nav');?>
        <?php $this->includeTpl('Public', 'Header', 'search');?>
        <?php $this->includeTpl('Public', 'Header', 'menu');?>
        <div class="s_width center border cart">
            <h2 style="_margin-left: 30px; _margin-top: 20px;">我的购物车</h2>
            <div class="shopping-cart">
                <table class="cart-table" border="0" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <td width="25%">商品</td>
                            <td width="10%">价格</td>
                            <td width="15%">每份重量</td>
                            <td width="20%">收藏时间</td>
                            <!--td width="10%">数量(/斤)</td-->
                            <td width="30%">操作</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($list as $k => $goods):?>
                            <tr>
                                <td>
                                    <a href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Detail', 'index')?>"><?php echo $goods['goods_name']?></a></td>
                                <td><?php echo $goods['goods_price'];?>元/<?php echo $goods['goods_price_weight']?>g</td>
                                <td>
                                    <?php echo $goods['goods_weight_min']?>g~<?php echo $goods['goods_weight_max']?>g
                                </td>
                                <!--td>
                                    <button class="number-minus">-</button>
                                    <input class="number-show" type="text" value="0"/>
                                    <button class="number-add">+</button>
                                </td-->
                                <td>
                                    <?php echo date('Y-m-d H:i:s', $goods['collect_at']);?>
                                </td>
                                <td>
                                    <a onclick="return confirm('确定需要删除?')" href="<?php echo URL::encode(array('goods_id' => $goods['goods_id']), 'Home', 'Collect', 'doDelete')?>">删除</a>
                                    <!--a href="">加入购物车</a-->
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <div class="text-align-right" style="padding-right: 50px;">
                <script language="javascript">
                function clearAll() {
                    if(confirm('确定需要删除所有的商品?')) {
                        window.location.href = '<?php echo URL::encode(array(), 'Home', 'Collect', 'clearAll')?>';
                    } else {
                        
                    }
                }
                </script>
                <button class="button" onclick="clearAll()">清空收藏</button>
                <!--button class="button" style="_margin-left: 10px;">全部购买</button-->
            </div>
        </div>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
    </body>
</html>
