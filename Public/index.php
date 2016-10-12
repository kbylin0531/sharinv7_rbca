<?php
//调试模式
const SR_DEBUG_MODE_ON = false;
//包含web模块
include '../Sharin/web.module';
//初始化
Sharin::init([
    'APP_NAME'  => 'Web',
]);
//开启应用
Sharin::start();