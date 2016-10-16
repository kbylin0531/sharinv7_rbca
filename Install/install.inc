<?php
/**
 * 安装数据库
 */
$data=&$_POST;
// 连接数据库
$link=@new mysqli("{$data['DB_HOST']}:{$data['DB_PORT']}",$data['DB_USER'],$data['DB_PWD']);
// 获取错误信息
$error=$link->connect_error;
if (!is_null($error)) {
    // 转义防止和alert中的引号冲突
    $error=addslashes($error);
    die("<script>alert('数据库链接失败:$error');history.go(-1)</script>");
}
// 设置字符集
$link->query("SET NAMES 'utf8'");
$link->server_info>5.0 or die("<script>alert('请将您的mysql升级到5.0以上');history.go(-1)</script>");
// 创建数据库并选中
if(!$link->select_db($data['DB_NAME'])){
    $create_sql='CREATE DATABASE IF NOT EXISTS '.$data['DB_NAME'].' DEFAULT CHARACTER SET utf8;';
    $link->query($create_sql) or die('创建数据库失败');
    $link->select_db($data['DB_NAME']);
}
// 导入sql数据并创建表
$bjyadmin_str=file_get_contents(SR_PATH_BASE.'/Install/bjyadmin.sql');
$sql_array=preg_split("/;[\r\n]+/", str_replace('bjyadmin_',$data['DB_PREFIX'],$bjyadmin_str));
foreach ($sql_array as $k => $v) {
    if (!empty($v)) {
        $link->query($v);
    }
}
$link->close();
$db_str=<<<endline
<?php
return array(
//*************************************数据库设置*************************************
    'DB_TYPE'               =>  'mysqli',                 // 数据库类型
    'DB_HOST'               =>  '{$data['DB_HOST']}',     // 服务器地址
    'DB_NAME'               =>  '{$data['DB_NAME']}',     // 数据库名
    'DB_USER'               =>  '{$data['DB_USER']}',     // 用户名
    'DB_PWD'                =>  '{$data['DB_PWD']}',      // 密码
    'DB_PORT'               =>  '{$data['DB_PORT']}',     // 端口
    'DB_PREFIX'             =>  '{$data['DB_PREFIX']}',   // 数据库表前缀
);
endline;
// 创建数据库链接配置文件
file_put_contents(SR_PATH_APP.'/Admin/Common/Conf/db.php', $db_str);