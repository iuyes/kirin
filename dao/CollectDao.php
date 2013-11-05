<?php
class CollectDao extends DBTable {
	public $tb = 'collect';

    public function getByUserId($user_id, $start, $length) {
        $user_id = (int)$user_id;
        $start = (int)$start;
        $length = (int)$length;

        $sql = "SELECT * FROM collect 
                LEFT JOIN goods ON collect.goods_id = goods.goods_id
                WHERE collect.user_id = {$user_id}";
        $list = $this->query($sql);

        $sql = "SELECT COUNT(*) AS total FROM collect WHERE collect.user_id = {$user_id}";
        $re = $this->query($sql);
        $total = $re[0]['total'];

        return array(
            'total' => $total,
            'list' =>$list
        );
    }

    /**
     * delete 
     * 这个函数需要传入一个参数$cdt,这个cdt是一个数组，如果您要使用这个函数，cdt中必须包含user_id和goods_id
     * @param array $cdt 
     * @access public
     * @return void
     */
    public function delete(array $cdt) {
        $user_id = (int)$cdt['user_id'];
        $goods_id = (int)$cdt['goods_id'];
        $sql = "DELETE FROM collect WHERE user_id = {$user_id} AND goods_id = {$goods_id}";
        return $this->query($sql);
    }

    public function deleteByUserId($user_id) {
        $sql = "DELETE FROM collect WHERE user_id = {$user_id}";
        return $this->query($sql);     
    }
}
