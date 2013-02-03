-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2013 at 11:29 PM
-- Server version: 5.5.29-0ubuntu0.12.04.1
-- PHP Version: 5.3.10-1ubuntu3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `light`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `content`) VALUES
(1, '# LIGHT Framework\r\n@author zeyuec, 2013-02-03\r\n* * * \r\n\r\n**This is a really simple and light php mvc framework for myself.**\r\n\r\n## Structure\r\n1. Model: Using pdo for DB connection.\r\n2. View: Smarty.\r\n2. Controller: A Simple Router Class.\r\n\r\n## Breif Doc\r\n##### 1. index.php\r\n  All request must be redirected to this file. You can do it like this in nginx.\r\n \r\n    server {\r\n    listen   80; \r\n    server_name _;\r\n    root /home/zeyuec/www;\r\n    \r\n    location ~* ^.+\\.(ico|js|css|gif|jpg|jpeg|png|zip)$ {\r\n        access_log   off;\r\n        expires      0d;\r\n    }\r\n\r\n    location / {\r\n        index index.php index.html index.htm;\r\n        if (!-e $request_filename) {\r\n          rewrite ^/(.*)$ /index.php/$1 last;\r\n        }\r\n    }\r\n    \r\n    location ~ \\.php {\r\n        fastcgi_pass   127.0.0.1:9000;  \r\n        fastcgi_index  index.php;\r\n        fastcgi_param  PATH_INFO $fastcgi_script_name;\r\n        include        fastcgi_params;\r\n    } \r\n\r\n##### 2. core/Light.php\r\nConfig file. It also includes a static function for importing Model in Controller.\r\n\r\n##### 3. core/LRouter.php\r\nRouter Class which is used in **index.php**.\r\n\r\n##### 4. core/LController.php\r\nBase Controller. External libs are imported here.\r\n\r\n##### 5. core/LModel.php\r\nBase Model. Support Yii-style (ex: TestModel::model()->doSomthing()). You need to add a  function like this in every custom Model:\r\n\r\n    public static function model($className = __CLASS__) {\r\n        return parent::model($className);\r\n    }\r\n\r\n## How to Install\r\n1. **Download**: Download [Smarty](http://www.smarty.net/) and [phpmarkdown](http://michelf.ca/projects/php-markdown/). Put them into **lib/**.\r\n\r\n2. **Configuration**: Read **core/Light.php**, it''s too easy to understand;\r\n\r\n3. **Format**: "TestController.php", "TestModel.php" and "indexAction()" in Controller;\r\n\r\n4. **Notice**: Make sure your Smarty directories are writable.\r\n\r\n5. **Run Helloworld**: run **helloworld.sql** . It reads data from databse and write it out under markdown format.\r\n');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
