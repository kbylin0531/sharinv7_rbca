<?php

/**
 * 非Composer模式注册SDK加载函数
 *
 * @author Anyon <zoujingli@qq.com>
 * @date 2016-08-21 11:26
 * @param string $clsnm
 */
spl_autoload_register(function($class) {
    if (0 === stripos($class, 'Wechat\\')) {
        $filename = __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
        if(is_file($filename)) include $filename;
    }
});