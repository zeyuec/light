<?php
  /**
   * Light Framework - config file
   * @author zeyuec
   * @since 2013-01-27
   */

// 0. dir
define('CONTROLLER_DIR', __DIR__.'/../controller/');
define('MODEL_DIR', __DIR__.'/../model/');
define('ERROR_404_FILE', __DIR__.'/../404.php');

define('PHP_MARKDOWN_DIR', __DIR__.'/../lib/phpmarkdown-1.0.1p/');
define('SMARTY_DIR', __DIR__.'/../lib/Smarty-3.1.13/libs/');
define('SMARTY_TEMPLATE', __DIR__.'/../template/');
define('SMARTY_RUNTIME_DIR', __DIR__.'/../runtime/smarty/');


// 1. config
class Light
{
    // website
    const WEB_ROOT = 'http://localhost';
    
    // default
    const DEFAULT_CONTROLLER = 'post';
    const DEFAULT_ACTION = 'list';

    // debug level: use this flag to determine log status
    const DIST_LEVEl = 'prod';


    // db
    const DB_HOST = '127.0.0.1';
    const DB_PORT = '3306';
    const DB_NAME = 'light';
    const DB_USER = 'root';
    const DB_PASS = '123456';

    // import model used in your Controller, ex: Light::importModel('test')
    public static function importModel($modelName) {
        $className = ucfirst($modelName).'Model';
        require_once(MODEL_DIR.$className.'.php');
    }
}
?>
