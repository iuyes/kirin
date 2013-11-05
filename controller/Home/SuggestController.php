<?php
class Home_SuggestController extends BaseController {

    public function suggestAction() {
        $this->view->var['st'] = 'suggest-suggest';
        $this->view->displayTpl();
    }

    public function doSuggestAction() {
        $suggest = $this->getParam($_REQUEST, 'suggest', 'none');
        MailHelper::send("niujiaming0819@163.com", '建议', $suggest);
        $this->goback('我们会尽快处理您的建议，谢谢。', URL::encode(array(), 'Home', 'UserInfo', 'index'));
    }
}
