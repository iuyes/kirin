<?php
class GoodsDao extends DBTable {
	public $tb = 'goods';

    public function getRecycleList($start, $length) {
        $start = $this->realEscapeString($start);
        $length = $this->realEscapeString($length);

        $sql = "SELECT * FROM {$this->tb} WHERE goods_status > 0 LIMIT {$start}, {$length}";
        $list = $this->query($sql);
        $sql = "SELECT COUNT(*) AS total FROM {$this->tb} WHERE goods_status > 0";
        $re = $this->query($sql);
        $total = $re[0]['total'];

        return array(
            'total' => $total,
            'list' => $list
        );
    }

    public function search($key, $value, $goods_type, $start = 0 , $length = 15, $orderby = 'goods_add_at desc', $location = 0) {
        $key = $this->realEscapeString($key);
        $value = $this->realEscapeString($value);
        $goods_type = (int)$goods_type;
        $start = (int)$start;
        $length = (int)$length;
        $location = intval($location);
        $orderby = $this->realEscapeString($orderby);

        if($goods_type == 0) {
            $goods_type_sql = "";
        } else {
            $goods_type_sql = "`goods_type` = {$goods_type} AND";
        }
        $sql = "SELECT * FROM {$this->tb} WHERE `{$key}` LIKE \"%{$value}%\" AND {$goods_type_sql} goods_status = 0 AND goods_location = {$location} ORDER BY {$orderby} LIMIT {$start}, {$length}";
        $list = $this->query($sql);

        $sql = "SELECT COUNT(*) AS total FROM {$this->tb} WHERE `{$key}` LIKE \"%{$value}%\" AND {$goods_type_sql} goods_status = 0 AND goods_location = {$location}";
        $re = $this->query($sql);

        return array(
            'total' => $re[0]['total'],
            'list' => $list
        );
    }

    public function searchAll($key, $value, $start = 0 , $length = 15, $orderby = 'goods_add_at desc', $location = 0) {
        $key = $this->realEscapeString($key);
        $value = $this->realEscapeString($value);
        $start = (int)$start;
        $length = (int)$length;
        $orderby = $this->realEscapeString($orderby);
        $location = intval($location);

        $sql = "SELECT * FROM {$this->tb} WHERE `{$key}` LIKE \"%{$value}%\" AND goods_status = 0 AND goods_location = {$location} ORDER BY {$orderby} LIMIT {$start}, {$length}";
        $list = $this->query($sql);
        
        $sql = "SELECT COUNT(*) AS total FROM {$this->tb} WHERE `{$key}` LIKE \"%{$value}%\" AND goods_status = 0 AND goods_location = {$location}";
        $re = $this->query($sql);

        return array(
            'total' => $re[0]['total'],
            'list' => $list
        );
    }
    
    /**
     * 获取上市新品
     * @return multitype:
     */
    public function getGoodsOfNew() {
    	$sql = "SELECT * FROM {$this->tb} WHERE goods_status = 0 AND goods_type = 1 ORDER BY goods_add_at limit 0, 2";
    	$goods_of_fruit = $this->query($sql);
    	$sql = "SELECT * FROM {$this->tb} WHERE goods_status = 0 AND goods_type = 2 ORDER BY goods_add_at limit 0, 3";
    	$goods_of_vegetables = $this->query($sql);
    	return array_merge($goods_of_fruit, $goods_of_vegetables);
    }

    /**
     * 获取本周推荐
     * @return multitype:
     */
    public function getGoodsOfCommend() {
    	$sql = "SELECT * FROM {$this->tb} WHERE goods_status = 0 AND goods_type = 1 ORDER BY goods_add_at limit 2, 2";
    	$goods_of_fruit = $this->query($sql);
    	$sql = "SELECT * FROM {$this->tb} WHERE goods_status = 0 AND goods_type = 2 ORDER BY goods_add_at limit 3, 3";
    	$goods_of_vegetables = $this->query($sql);
    	return array_merge($goods_of_fruit, $goods_of_vegetables);
    }
    
    /**
     * 获取本周推荐
     * @return multitype:
     */
    public function getGoodsOfHot() {
    	$sql = "SELECT * FROM {$this->tb} WHERE goods_status = 0 AND goods_type = 1 ORDER BY goods_add_at limit 4, 2";
    	$goods_of_fruit = $this->query($sql);
    	$sql = "SELECT * FROM {$this->tb} WHERE goods_status = 0 AND goods_type = 2 ORDER BY goods_add_at limit 6, 3";
    	$goods_of_vegetables = $this->query($sql);
    	return array_merge($goods_of_fruit, $goods_of_vegetables);
    }

    public function getGoodsByCategory($location, $goods_type, $goods_category, $goods_sort_by, $start, $length) {
        if($goods_category == 0) {
            $category_sql = '';
        } else {
            $category_sql = "AND find_in_set('{$goods_category}', goods_category)";
        }
        $sql = "SELECT * FROM {$this->tb} 
                WHERE 
                    goods_status = 0 
                AND 
                    goods_location = '{$location}' 
                AND 
                    goods_type = '{$goods_type}'
                {$category_sql}
                ORDER BY
                    {$goods_sort_by}
                LIMIT {$start}, {$length}";
        $list = $this->query($sql);
        $sql = "SELECT count(*) as total FROM {$this->tb} 
                WHERE 
                    goods_status = 0 
                AND 
                    goods_location = '{$location}' 
                AND 
                    goods_type = '{$goods_type}'
                {$category_sql}
                ";
        $re = $this->query($sql);
        $total = $re[0]['total'];

        return array(
            'list' => $list,
            'total' => $total
        );

    }
    
}
