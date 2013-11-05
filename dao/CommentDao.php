<?php
class CommentDao extends DBTable {
	public $tb = 'comment';
    const GOOD = 3;
    const NOMAL = 2;
    const BAD = 1;
    const ALL = 0;

    public function getAll($goods_id, $start, $length, $score_type = self::ALL) {
        $goods_id = (int)$goods_id;
        $start = (int)$start;
        $length = (int)$length;
        $score_type = (int)$score_type;

        if($score_type == self::GOOD) {
            $score_sql = "AND comment_score >= 4";
        } else if($score_type == self::BAD) {
            $score_sql = "AND comment_score <= 1";
        } else if($score_type == self::NOMAL){
            $score_sql = 'AND comment_score > 1 AND comment_score < 4';
        } else {
            $score_sql = '';
        }

        $sql = "SELECT * FROM comment 
                LEFT JOIN goods ON comment.goods_id = goods.goods_id 
                LEFT JOIN user ON comment.comment_by = user.user_id
                WHERE goods.goods_id = {$goods_id} {$score_sql} ORDER BY comment.comment_at DESC
                LIMIT {$start}, {$length}";
        $list = $this->query($sql);

        $sql = "SELECT COUNT(*) AS total FROM comment WHERE goods_id = {$goods_id} {$score_sql}";
        $re = $this->query($sql);
        $total = $re[0]['total'];

        return array(
            'total' => $total,
            'list' => $list
        );
    }

    public function getEnsemble($goods_id) {
        $goods_id = (int)$goods_id;
        //获取总评论数
        $sql = "SELECT COUNT(*) AS total FROM comment WHERE goods_id = {$goods_id}";
        $re = $this->query($sql);
        $total = $re[0]['total'];

        //获取总评分 
        $sql = "SELECT AVG(comment_score) as avg_score FROM comment WHERE goods_id = {$goods_id}";
        $re = $this->query($sql);
        $avg_score = $re[0]['avg_score'];
        if($avg_score == 0) {
            return array(
                'total' => $total,
                'avg_score' => 0,
                'good' => 0,
                'nomal' => 0,
                'bad' => 0
            );
        }

        //获取好评率
        $sql = "SELECT COUNT(*) AS total FROM comment WHERE goods_id = {$goods_id} AND comment_score >= 4";
        $re = $this->query($sql);
        $good_percentage = $re[0]['total'] / $total;

        //获取中评率
        $sql = "SELECT COUNT(*) AS total FROM comment WHERE goods_id = {$goods_id} AND comment_score >1 AND comment_score < 4";
        $re = $this->query($sql);
        $nomal_percentage = $re[0]['total'] / $total;

        //获取差评率
        $sql = "SELECT COUNT(*) AS total FROM comment WHERE goods_id = {$goods_id} AND comment_score <= 1";
        $re = $this->query($sql);
        $bad_percentage = $re[0]['total'] / $total;

        return array(
            'total' => $total,
            'avg_score' => $avg_score / 5, //百分比
            'good' => $good_percentage,  //百分比
            'nomal' => $nomal_percentage, //百分比
            'bad' => $bad_percentage //百分比
        );
    }

    public function hasComment($user_id, $goods_id) {
        $cdt = array(
            'order_add_by' => $user_id,
            'order_status' => OrderStatusConfig::FINISH
        );
        $dao = new OrderDao();
        $re = $dao->get($cdt);
        if($re['total'] <= 0) { //用户没有已经完成的订单
            return false;
        } else {
            $order_id_list = array();
            $order_list = $re['list'];
            if(empty($order_list)) { $order_list = array();}
            foreach ($order_list as $order) { //取出我所有的订单号
                $order_id_list[] = $order['order_id'];
            }

            //取出我所有买过的，并且没有评论的商品
            $sql = "SELECT * FROM order_goods WHERE order_id IN (" . implode(',', $order_id_list) .") AND have_comment = 0";
            $re = $this->query($sql);
            //检查这些商品里面有没有$goods_id
            foreach ($re as $v) {
                //$v = json_decode($v['goods_info'], true);
                if($v['goods_id'] == $goods_id) {
                    return true;
                }
            }

            return false;
            
        } 
    }

    //将用$user_id买过的商品$goods_id置为已经评论
    public function setCommentMark($user_id, $goods_id) {
        $cdt = array(
            'order_add_by' => $user_id,
            'order_status' => OrderStatusConfig::FINISH
        );
        $dao = new OrderDao();
        $re = $dao->get($cdt);
        if($re['total'] <= 0) { //用户没有已经完成的订单
            return true;
        } else {
            $order_id_list = array();
            $order_list = $re['list'];
            if(empty($order_list)) { $order_list = array();}
            foreach ($order_list as $order) { //取出我所有的订单号
                $order_id_list[] = $order['order_id'];
            }

            //取出我所有买过的，并且没有评论的商品
            $sql = "SELECT * FROM order_goods WHERE order_id IN (" . implode(',', $order_id_list) .") AND have_comment = 0";
            $re = $this->query($sql);
            //检查这些商品里面有没有$goods_id
            foreach ($re as $v) {
                $vv = json_decode($v['goods_info'], true);
                if($vv['goods_id'] == $goods_id) { //如果含有goods_id，就将这个goods置为已经评论
                    $sql = "UPDATE order_goods SET have_comment = 1 WHERE id = {$v['id']}";
                    return $this->query($sql);
                }
            }

            return true;
        } 
    }
}
