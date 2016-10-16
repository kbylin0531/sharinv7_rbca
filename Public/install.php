<?php
/**
 * 安装向导
 */
header('Content-type:text/html;charset=utf-8');
require __DIR__ . '/../Sharin/web.inc';

const INSTALL_DIR = SR_PATH_BASE.'/Install/';
$lock_file = INSTALL_DIR.'install.lock';
// 检测是否安装过
if (is_file($lock_file)) {
    die('你已经安装过该系统，重新安装需要先删除./Install/install.lock 文件');
}
isset($_GET['c']) or $_GET['c'] = 'agreement';
switch ($_GET['c']) {
    // 同意协议页面
    case 'agreement':
        require INSTALL_DIR.'agreement.inc';
        break;
    // 检测环境页面
    case 'test':
        require INSTALL_DIR.'test.inc';
        break;
    // 创建数据库页面
    case 'create':
        require INSTALL_DIR.'create.inc';
        break;
    // 安装成功页面
    case 'success':
        // 判断是否为post
        if($_SERVER['REQUEST_METHOD']=='POST'){
            require INSTALL_DIR.'install.inc';
            @touch($lock_file);
            require INSTALL_DIR.'success.inc';
        }
        break;
    default:;
}