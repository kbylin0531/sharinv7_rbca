<?php
require __DIR__.'/../Sharin/web.module';
// change the following paths if necessary
define('YII_PATH_BASE',__DIR__.'/');
$yii=SR_PATH_BASE.'/Vendor/yii117/framework/yii.php';
$config=YII_PATH_BASE.'/config/main.php';
// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

function dump(){
    echo "<pre>";
    var_dump(func_get_args());
    echo "</pre>";
    die();
}

require_once($yii);
Yii::createWebApplication($config)->run();