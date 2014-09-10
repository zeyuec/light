<?php
  /**
   * Base Controller 
   * @author zeyuec
   * @since 2013-01-27
   */

// 0. import libs
require_once(SMARTY_DIR.'Smarty.class.php');
require_once(PHP_MARKDOWN_DIR.'/Michelf/MarkdownExtra.inc.php');

// 1. base controller
class LController {
    public $smarty;
    function __construct() {
        $this->initSmarty();
    }
    private function initSmarty() {
        $this->smarty = new Smarty();
        $this->smarty->assign('root', Light::WEB_ROOT);
        $this->smarty->setTemplateDir(SMARTY_TEMPLATE);
        $this->smarty->setCompileDir(SMARTY_RUNTIME_DIR.'compile/');
        $this->smarty->setConfigDir(SMARTY_RUNTIME_DIR.'config/');
        $this->smarty->setCacheDir(SMARTY_RUNTIME_DIR.'cache/');
    }
}
?>