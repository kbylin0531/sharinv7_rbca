<?php
namespace {

    use Sharin\ClassLoader;

    //访问控制
    if(PHP_SAPI !== 'cli' and !in_array($_SERVER['REMOTE_ADDR'],[
            '192.168.100.1',
            '127.0.0.1'
        ])){
        die('Access deny!');
    }
    include __DIR__.'/Common/constant.inc';
    include SR_PATH_FRAMEWORK.'/Common/debug_suit.inc';
    include SR_PATH_FRAMEWORK.'/Core/bundle.inc';

    ClassLoader::register();


}