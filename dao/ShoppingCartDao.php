<?php
class ShoppingCartDao extends DBTable {
	public $tb = 'shopping_cart';

    public function getMyGoods($goods_id_arr) {
        if(empty($goods_id_arr)) return array();
        $goods_id_str = implode(",", $goods_id_arr);
        $sql = "SELECT * FROM goods WHERE goods_id in ({$goods_id_str})" ;
        $list = $this->query($sql); 
        return $list;
    }

}
