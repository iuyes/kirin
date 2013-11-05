<?php
class OrderGoodsDao extends DBTable {
	public $tb = 'order_goods';

    public function getGoodsOfOrder($order_id) {
        $order_id = (int)$order_id;
        $sql = "SELECT * FROM goods LEFT JOIN order_goods ON goods.goods_id = order_goods.goods_id
                WHERE order_goods.order_id = {$order_id}";
        $re = $this->query($sql);
        $goods_arr = array();
        foreach($re as $v) {
            //$tmp = json_decode($v['goods_info'], true);
            //$tmp['have_comment'] = $v['have_comment'];
            $goods_arr[] = $v;
        }
        return $goods_arr;
    }
}
