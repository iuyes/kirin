<?php
class Home_CommentController extends Home_HomeController {
    public function doAddAction() {
        $callback_url = URL::encode(array('goods_id' => $_REQUEST['goods_id']), 'Home', 'Detail', 'index');
        $this->checkUser($callback_url);//跳转到物品详细信息页

        $goods_id = $this->getParam($_REQUEST, 'goods_id', 0);
        if($goods_id == 0) {
            $this->goback('评论不合法');
            exit;
        }
        $comment_score = $this->getParam($_REQUEST, 'comment_score', 3);
        $comment_content = $this->getParam($_REQUEST, 'comment_content', '');
        //添加新评论
        $row = array(
            'goods_id' => $goods_id,
            'comment_at' => time(),
            'comment_by' => $this->user['user_id'],
            'comment_content' => $comment_content,
            'comment_score' => $comment_score
        );
        $dao = new CommentDao();
        $dao->add($row);
        //计算总评论数
        $re = $dao->get(array('goods_id' => $goods_id), 0, PHP_INT_MAX);
        $cmt_num = $re['total'];
        //计算总得分
        $tmp = 0;
        foreach($re['list'] as $v) {
            $tmp = $tmp + floatval($v['comment_score']);
        }
        $goods_score = round($tmp/$cmt_num);
        $row = array(
            'goods_score' => $goods_score,
            'goods_total_comment' => $cmt_num
        );

        $dao = new GoodsDao();
        $dao->update($row, 'goods_id', $goods_id);

        //将OrderGoods表中相应的goods置为已经评论
        $dao = new CommentDao();
        $dao->setCommentMark($this->user['user_id'], $goods_id);
        header('Location: ' . URL::encode(array('goods_id' => $goods_id), 'Home', 'Detail', 'index'));
    }
}
