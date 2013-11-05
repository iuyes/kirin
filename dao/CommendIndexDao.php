<?php
class CommendIndexDao extends DBTable {
	public $tb = 'commend_in_index';
    
    public function getCommendGoods($number, $location) {
        $number = $this->realEscapeString($number);
        $location = $this->realEscapeString($location);
        $sql = "SELECT * FROM commend_in_index 
                LEFT JOIN goods 
                ON commend_in_index.cii_goods_id = goods.goods_id 
                WHERE goods.goods_status = 0 
                AND goods_location = {$location} 
                ORDER BY commend_in_index.cii_add_at DESC
                LIMIT 0, {$number}";
        $re = $this->query($sql);
        if($re == false) {
            return array();
        } else {
            return $re;
        }
    }

}
