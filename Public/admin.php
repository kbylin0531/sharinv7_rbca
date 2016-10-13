<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
require __DIR__.'/../Sharin/web.inc';
// 应用入口文件
const ENTRY_FILE = 'admin.php';
const INSTALL_PATH = SR_PATH_BASE.'/Public/install';
// 检测是否是新安装
if(is_dir(INSTALL_PATH) && !file_exists(INSTALL_PATH.'/install.lock')){
    // 组装安装url
    $url=$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/install/index.php';
    // 使用http://域名方式访问；避免./Public/install 路径方式的兼容性和其他出错问题
    header("Location:http://$url");
    die;
}
// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',true);

// 定义应用目录
define('APP_PATH',SR_PATH_BASE.'/Admin/');

// 定义缓存目录
define('RUNTIME_PATH',SR_PATH_RUNTIME.'/');

// 定义模板文件默认目录
define('TMPL_PATH',APP_PATH.'tpl/');

// 定义oss的url
define('OSS_URL','');

// 引入ThinkPHP入口文件
require SR_PATH_BASE.'/Vendor/ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单


