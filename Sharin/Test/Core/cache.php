<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 16-10-9
 * Time: 上午8:58
 */
namespace {

    use Sharin\Core\Cache;

    include __DIR__.'/../../tester.module';


    $result = [];


    $result[] = Cache::set('key01','this is key 01');
    $result[] = Cache::get('key01');


    if($data = Cache::get('key02')){
        $result[] = $data;
        $result[] = "从缓存中加载";
    }else{
        Cache::set('key02','this is key 02',3);
        $result[] = "缓存中不存在或者已经过期";
    }



    \Sharin\dumpout($result);
}
