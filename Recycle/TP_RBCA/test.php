<?php
/**
 * Created by PhpStorm.
 * User: linzh
 * Date: 2016/10/11
 * Time: 21:12
 */

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',false);

// 定义应用目录
define('APP_PATH','./App/');

// 定义缓存目录
define('RUNTIME_PATH','./Runtime/');

// 定义模板文件默认目录
define('TMPL_PATH','./tpl/');

// 定义oss的url
define('OSS_URL','');

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单
