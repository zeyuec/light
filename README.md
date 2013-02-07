# LIGHT Framework
@author zeyuec, 2013-02-03
* * * 

**This is a really simple and light php mvc framework for myself.**

## Structure
1. Model: Using pdo for DB connection.
2. View: Smarty.
2. Controller: A Simple Router Class.

## Breif Doc
##### 1. index.php
  All request must be redirected to this file. You can do it like this in nginx.
 
    server {
    listen   80; 
    server_name _;
    root /home/zeyuec/www;
    
    location ~* ^.+\.(ico|js|css|gif|jpg|jpeg|png|zip)$ {
        access_log   off;
        expires      0d;
    }

    location / {
        index index.php index.html index.htm;
        if (!-e $request_filename) {
          rewrite ^/(.*)$ /index.php/$1 last;
        }
    }
    
    location ~ \.php {
        fastcgi_pass   127.0.0.1:9000;  
        fastcgi_index  index.php;
        fastcgi_param  PATH_INFO $fastcgi_script_name;
        include        fastcgi_params;
    } 

##### 2. core/Light.php
Config file. It also includes a static function for importing Model in Controller.

##### 3. core/LRouter.php
Router Class which is used in **index.php**.

##### 4. core/LController.php
Base Controller. External libs are imported here.

##### 5. core/LModel.php
Base Model. Support Yii-style (ex: TestModel::model()->doSomthing()). You need to add a  function like this in every custom Model:

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

## How to Install
1. **Download**: Download [Smarty](http://www.smarty.net/) and [phpmarkdown](http://michelf.ca/projects/php-markdown/). Put them into **lib/**.

2. **Configuration**: Read **core/Light.php**, it's too easy to understand;

3. **Format**: "TestController.php", "TestModel.php" and "indexAction()" in Controller;

4. **Notice**: Make sure your Smarty directories are writable.

5. **Run Helloworld**: Run **helloworld.sql** then visit your website, this demo will reads data from database and write it out under markdown format.


