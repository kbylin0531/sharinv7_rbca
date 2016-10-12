<?php
//调试模式
const SR_DEBUG_MODE_ON = true;
//包含web模块
include '../Sharin/web.module';
//初始化
Sharin::register([
    'APP_NAME'  => 'Web',
]);
//开启应用
Sharin::start();