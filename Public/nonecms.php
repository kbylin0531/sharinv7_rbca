<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2015 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]
require __DIR__.'/../../Sharin/web.module';
// 定义应用目录
define('APP_PATH', SR_PATH_BASE . '/NoneCMS/');
if(!file_exists(APP_PATH.'database.php')){
	header('Content-Type:text/html;charset=UTF-8');
    exit('请先安装本程序！运行public目录下，install文件夹下index.php即可安装！');
}
// 加载框架引导文件
require SR_PATH_BASE . '/Vendor/thinkphp/start.php';


