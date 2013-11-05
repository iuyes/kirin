<?php
class CommendDao extends DBTable {
	public $tb = 'commend';
    
    public function getCommendGoods($type, $number, $location) {
        $type = $this->realEscapeString($type);
        $number = $this->realEscapeString($number);
        $location = $this->realEscapeString($location);
        $sql = "SELECT * FROM commend LEFT JOIN goods ON commend.goods_id = goods.goods_id WHERE goods.goods_status = 0 AND commend.commend_type = {$type} AND goods_location = {$location} ORDER BY commend_at DESC LIMIT 0, {$number}";
        $re = $this->query($sql);
        if($re == false) {
            return array();
        } else {
            return $re;
        }
    }

}
