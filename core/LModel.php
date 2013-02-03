<?php
  /**
   * Base Model 
   * @author chenzeyue
   * @since 2013-01-27
   */
class LModel {
    private static $_models = array();

    public function getPdo() {
        $dsn = 'mysql:host='.Light::DB_HOST.';port='.Light::DB_PORT.';dbname='.Light::DB_NAME;
        $db = new PDO($dsn, Light::DB_USER, Light::DB_PASS);
        $db->query('SET NAMES UTF8');
        return $db;
    }

    public static function model($className=__CLASS__) {
        if (isset(self::$_models[$className]))
            return self::$_models[$className];
        else {
            $model = self::$_models[$className]=new $className(null);
            return $model;
        }
    }
    
}

