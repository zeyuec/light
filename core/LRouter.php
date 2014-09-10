<?php
  /**
   * Router Class
   * @author zeyuec
   * @since 2013-01-27
   */
class LRouter {
    // print log to website
    private function log($str) {
        if ('debug' === Light::DIST_LEVEl) {
            echo '<p>[Router] '.$str.'</p>';
        }
    }

    // remove the last '/' (example: localhost/abc/ will redirect to localhost/abc)
    private function redirectDirectoryRequest() {
        $request = $_SERVER['REQUEST_URI'];
        $this->log('request_uri: '.$request);
        if ($request != '/' && $request[strlen($request)-1] == '/') {
            header("Location: ".rtrim($request, '/'));
        }
    }

    // redirect to root
    public static function redirectToRoot() {
        header("Location: ".Light::WEB_ROOT);
    }

    // start 
    public function run() {
        $this->redirectDirectoryRequest();                   // treat a directory as a file
        $uri = $this->parsePathInfo($_SERVER['PATH_INFO']);  // parse path info to uri
        $this->redirect($uri);                               // redirect to controller
    }
    
    // parse path info from _SERVER to URI
    private function parsePathInfo($pathInfo) {
        $this->log('path info: '.$pathInfo);
        if ('/index.php' == $pathInfo || '' == $pathInfo || !isset($pathInfo) || empty($pathInfo)) {
            $this->log('web root');
            $uri = $this->createURI();
        } else {
            $pathArr = explode('/', rtrim(ltrim($pathInfo, '/'), '/'));
            $countPathArr = count($pathArr);
            if ($countPathArr < 2 || $countPathArr % 2 == 1) {
                $this->log('params count error');
                $this->redirectToRoot();
            } else {
                $params = array();
                for ($i=2; $i<$countPathArr; $i+=2) {
                    $params[$pathArr[$i]] = $pathArr[$i+1];
                }
                $uri = $this->createURI($pathArr[0], $pathArr[1], $params);
            }
        }
        return $uri;
    }

    // why not URL but URI, see http://www.w3.org/TR/uri-clarification
    private function createURI($controllerName = '', $actionName = '', $params = array()) {
        return array(
            'controller' => $controllerName == '' ? Light::DEFAULT_CONTROLLER : $controllerName,
            'action' => $actionName == '' ? Light::DEFAULT_ACTION : $actionName,
            'params' => $params,
            );
    }

    // redirect to the right controller and action
    public function redirect($uri) {
        $controllerName = ucfirst($uri['controller']).'Controller';
        $actionName = ucfirst($uri['action']).'Action';
        $controllerFile = CONTROLLER_DIR.$controllerName.'.php';

        $this->log('redirect to '.$controllerName.' '.$actionName);
        $this->log('controller file path: '.$controllerFile);
        
        $params = $uri['params'];
        if (file_exists($controllerFile)) {
            $this->log('controller file exists');

            require_once(__DIR__.'/../core/LController.php');
            require_once(__DIR__.'/../core/LModel.php');
            require_once($controllerFile);
            
            $controllerObj = new $controllerName();
            if (!method_exists($controllerObj, $actionName)) {
                $this->log('controller doesn\'t have this actoin');
                $this->redirectToRoot();
            } else {
                foreach ($params as $key=>$value) {
                    $_GET[$key] = $value;
                }
                $controllerObj->$actionName();
            }
        } else {
            $this->log('controller file doesn\'t exist');
            $this->redirectToRoot();
        }
    }

}
?>
