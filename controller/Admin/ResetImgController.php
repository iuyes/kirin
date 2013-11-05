<?php
require "common/img2thumb.php";
class Admin_ResetImgController extends Admin_AdminController {

    public function resetAction() {
        $dist = 'static/upload/'.date("Ymd", time());
        if(!is_dir($dist)) {
            mkdir($dist);
        }
        $dao = new GoodsDao();
        $re = $dao->get(array(), 0, PHP_INT_MAX);
        $list = $re['list'];
        $nummark = 1000;
        foreach ($list as $goods) {
            $goods_id = $goods['goods_id'];
            $img = $goods['goods_img']; //图片地址
            $tmp = explode('.', $img);
            $fix = end($tmp);
            $dist_name = time() . '-' . ($nummark ++) . '.' . $fix;
            $dist_full_path_60x60 = $dist . '/' . $dist_name; //缩略图地址
            img2thumb($img, $dist_full_path_60x60, 60, 60, 1);

            $dist_name = time() . '-' . ($nummark ++) . '.' . $fix;
            $dist_full_path_220x220 = $dist . '/' . $dist_name; //缩略图地址
            img2thumb($img, $dist_full_path_220x220, 220, 220, 1);
            
            $dist_name = time() . '-' . ($nummark ++) . '.' . $fix;
            $dist_full_path_300x300 = $dist . '/' . $dist_name; //缩略图地址
            img2thumb($img, $dist_full_path_300x300, 300, 300, 1);

            $arr = array(
                'goods_img_60x60' => $dist_full_path_60x60,
                'goods_img_220x220' => $dist_full_path_220x220,
                'goods_img_300x300' => $dist_full_path_300x300 
            );

            $dao->update($arr, 'goods_id', $goods_id);

        }
    }
}
