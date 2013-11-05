<?php
class Admin_CommendController extends Admin_AdminController {
    public function __construct() {
        $this->check();
    }

    public function setAction() {
        $type = $this->getParam($_REQUEST, 'type', 0);
        $goods_id = $this->getParam($_REQUEST, 'goods_id', 0);
        $location = $this->getParam($_REQUEST, 'location', 0);
        if($type * $goods_id == 0) {
            $this->goback('参数错误');
            exit;
        }

        $dao = new CommendDao();
        $dao->add(array(
            'commend_type' => $type,
            'goods_id' => $goods_id,
            'commend_at' => time()
        ));

        $this->goback('设置成功');
        //header('Location: ' . URL::encode(array('type' => $type, 'location' => $location), 'Admin', 'Commend', 'list'));
    }

    public function listAction() {
        $type = $this->getParam($_GET, 'type', 0);
        $location = $this->getParam($_GET, 'location', 0);
        if($type == 0 ){
            $this->goback('参数错误');
            exit;
        }
        switch ($type) {
            case CommendConfig::LEFT:
                $number = 4;
                break;
            case CommendConfig::RIGHT:
                $number = 6;
                break;
            case CommendConfig::VEGETABLE:
            case CommendConfig::FRUIT:
                $number = 12;
                break;
            case CommendConfig::VEGETABLE_WORD:
            case CommendConfig::FRUIT_WORD:
                $number = 4;
                break;
            default:
                $number = 5;
        }
        $dao = new CommendDao();
        $re = $dao->getCommendGoods($type, $number, $location);
        $this->view->var['type'] = $type;
        $this->view->var['location'] = $location;
        $this->view->var['goods_list'] = $re;
        
        switch ($type) {
            case CommendConfig::LEFT:
                $this->view->var['ctg_b'] = 'commend';
                $this->view->var['ctg_s'] = 'left';
                break;
            case CommendConfig::RIGHT:
                $this->view->var['ctg_b'] = 'commend';
                $this->view->var['ctg_s'] = 'right';
                break;
            case CommendConfig::NEWGOODS:
                $this->view->var['ctg_b'] = 'commend';
                $this->view->var['ctg_s'] = 'xinpin';
                break;
            case CommendConfig::WEEKLY:
                $this->view->var['ctg_b'] = 'commend';
                $this->view->var['ctg_s'] = 'benzhou';
                break;
            case CommendConfig::HOT:
                $this->view->var['ctg_b'] = 'commend';
                $this->view->var['ctg_s'] = 'chaozhi';
                break;
            case CommendConfig::LDYK_TUIJIAN:
                $this->view->var['ctg_b'] = 'commend';
                $this->view->var['ctg_s'] = 'ldyktj';
                break;
            case CommendConfig::VEGETABLE:
                $this->view->var['ctg_b'] = 'commend';
                $this->view->var['ctg_s'] = 'shucai';
                break;
            case CommendConfig::VEGETABLE_WORD:
                $this->view->var['ctg_b'] = 'commend';
                $this->view->var['ctg_s'] = 'shucai-word';
                break;
            case CommendConfig::FRUIT:
                $this->view->var['ctg_b'] = 'commend';
                $this->view->var['ctg_s'] = 'shuiguo';
                break;
            case CommendConfig::FRUIT_WORD:
                $this->view->var['ctg_b'] = 'commend';
                $this->view->var['ctg_s'] = 'shuiguo-word';
                break;
        }
        
        $this->view->displayTpl();
    }

    public function deleteAction() {
        $commend_id = $this->getParam($_REQUEST, 'commend_id', 0);
        if($commend_id == 0) {
            $this->goback('参数错误');
            exit;
        }

        $dao = new CommendDao();
        $dao->simple_delete('commend_id', $commend_id);

        $type = $this->getParam($_REQUEST, 'type', 0);
        header('Location: ' . URL::encode(array('type' => $type), 'Admin', 'Commend', 'list'));
    }
}
