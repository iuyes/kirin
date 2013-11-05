<?php
class Home_HelperController extends BaseController {
    public function gouwuAction(){
        $this->view->var['st'] = 'gouwu';
        $this->view->displayTpl();
    }

    public function yinsiAction() {
        $this->view->var['st'] = 'yinsi';
        $this->view->displayTpl();
    }
    
    public function yewuAction() {
        $this->view->var['st'] = 'yewu';
        $this->view->displayTpl();
    }
    
    public function peisongAction() {
        $this->view->var['st'] = 'peisong';
        $this->view->displayTpl();
    }

    public function qianziAction() {
        $this->view->var['st'] = 'qianzi';
        $this->view->displayTpl();
    }

    public function fukuanAction() {
        $this->view->var['st'] = 'fukuan';
        $this->view->displayTpl();
    }

    public function feiyongAction() {
        $this->view->var['st'] = 'feiyong';
        $this->view->displayTpl();
    }

    public function fapiaoAction() {
        $this->view->var['st'] = 'fapiao';
        $this->view->displayTpl();
    }
    
    public function jianjieAction() {
        $this->view->var['st'] = 'jianjie';
        $this->view->displayTpl();
    }

    public function jiaruAction() {
        $this->view->var['st'] = 'jiaru';
        $this->view->displayTpl();
    }

    public function lianjieAction() {
        $this->view->var['st'] = 'lianjie';
        $this->view->displayTpl();
    }

    public function wentiAction() {
        $this->view->var['st'] = 'wenti';
        $this->view->displayTpl();
    }

    public function kefuAction() {
        $this->view->var['st'] = 'kefu';
        $this->view->displayTpl();
    }

    public function dituAction() {
        $this->view->var['st'] = 'ditu';
        $this->view->displayTpl();
    }
}
