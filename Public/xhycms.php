<?php
/**
 * @copyright   Copyright (c) 2014-2016 xyhcms.com All rights reserved.
 * @license     http://www.xyhcms.com/help/1.html
 * @link        http://www.xyhcms.com
 * @author      gosea <gosea199@gmail.com>
 */
require __DIR__.'/../Sharin/web.module';

define('APP_DEBUG', true); //是否调试//部署阶段注释或者设为false
define('APP_PATH', SR_PATH_BASE.'/CMS/'); //项目路径
define('THINK_PATH', SR_PATH_BASE.'/Vendor/ThinkPHP/');

//判断是否安装
if (!is_file(APP_PATH . 'Common/Conf/db.php')) {
	header('Location:Install/index.php');
	exit();
}

require THINK_PATH . 'ThinkPHP.php'; //加载ThinkPHP框架
