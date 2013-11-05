<?php
class Api_GoodsController extends BaseController {
    public function updatePriceAction() {
        $goods_list = $this->getParam($_REQUEST, 'goods_list', "");
        $goods_list = json_decode(str_replace("\\\"", "\"", $goods_list), true);
        $dao = new GoodsDao();
        foreach($goods_list as $goods) {
            $goods_price = $goods['goods_price'];
            $goods_price_weight = $goods['goods_price_weight'];
            $goods_id = $goods['goods_id'];

            $dao->update(array(
                "goods_price" => $goods_price,
                "goods_price_weight" => $goods_price_weight,
            ), "goods_id", $goods_id);
        }
        echo json_encode(array(
            "errno" => 0,
            "error" => "success"
        ));
    }
}
