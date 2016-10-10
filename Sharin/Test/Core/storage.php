<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 16-10-9
 * Time: 下午2:50
 */
namespace {

    use Sharin\Core\Storage;

    include __DIR__.'/../../tester.module';


    $result = [];


    $files4readabletest = [
        SR_PATH_BASE.'/$readfile1',
        SR_PATH_BASE.'/.gitignore',
        '/home',
        '/home/asus/workspace/Sharingan/Sharin/Test',
        '/home/asus/workspace/Sharingan/README.md',
        '/home/asus/workspace/Sharingan/',
    ];
//    $result['has'] = [];
//    foreach ($files4readabletest as $file) {
//        $result['has'][] = Storage::has($file);
//    }
//
//    $result['size'] = [];
//    foreach ($files4readabletest as $file) {
//        $result['size'][] = Storage::size($file);
//    }
//
//    $result['mtime'] = [];
//    foreach ($files4readabletest as $file) {
//        $result['mtime'][] = Storage::mtime($file);
//    }
//
//    $result['read'] = [];
//    foreach ($files4readabletest as $file) {
//        $result['read'][] = Storage::read($file);
//    }
//
//    $result['readdir'] = [];
//    foreach ($files4readabletest as $file) {
//        $result['readdir'][] = Storage::readdir($file,true);
//    }


    $files4writetest = [
        SR_PATH_FRAMEWORK.'/Test/runtime',//在受保护的范围内
        SR_PATH_FRAMEWORK.'/Test/runtime/a.cache',//在受保护的范围内

        SR_PATH_BASE.'/Runtime',
        SR_PATH_BASE.'/Runtime/test',
        SR_PATH_BASE.'/Runtime/testdir',
        SR_PATH_BASE.'/Runtime/testdir2',

    ];
//    $result['mkdir'] = [];
//    foreach ($files4writetest as $file) {
//        $result['mkdir'][] = Storage::mkdir($file,0777);
//    }
//    $result['chmod'] = [];
//    foreach ($files4writetest as $file) {
//        $result['chmod'][] = Storage::chmod($file,0751);
//    }
//    $result['touch'] = [];
//    foreach ($files4writetest as $file) {
//        $result['touch'][] = Storage::touch($file,0,0);
//    }
//    $result['write'] = [];
//    foreach ($files4writetest as $file) {
//        $result['write'][] = Storage::write($file,"hello");
//    }
//    $result['append'] = [];
//    foreach ($files4writetest as $file) {
//        $result['append'][] = Storage::append($file,"hello");
//    }
    $result['rmdir'] = [];
    foreach ($files4writetest as $file) {
        $result['rmdir'][] = Storage::unlink($file,true);
    }



    \Sharin\dumpout($result);
}