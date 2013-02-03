<?php
Light::importModel('post');
class PostController extends LController {
    public function listAction() {
        $postList = PostModel::model()->getList(0);
        $this->smarty->assign('postList', $postList);
        $this->smarty->display('index.tpl');
    }
}
?>