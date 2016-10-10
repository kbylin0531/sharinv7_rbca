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
//        SR_PATH_BASE.'/$readfile1',
//        SR_PATH_BASE.'/.gitignore',
//        '/home',
//        '/home/asus/workspace/Sharingan/Sharin/Test',
//        '/home/asus/workspace/Sharingan/README.md',
//        '/home/asus/workspace/Sharingan/',

        /**
         * cd Runtime/
         * sudo su
        302  touch r
        317  chmod o+r r
        304  touch w
        319  chmod o+w w
        305  touch a
        321  chmod o+rw a
        306  touch no
        最后看到的权限是：
        total 8
        drwxrw-r-- 2 asus asus 4096 10月 10 14:08 .
        drwxrwxr-x 9 asus asus 4096 10月 10 11:35 ..
        --w----r-- 1 root root    0 10月 10 14:08 r
        --w-----w- 1 root root    0 10月 10 14:08 w
        --w----rw- 1 root root    0 10月 10 14:08 a
        --w------- 1 root root    0 10月 10 14:08 no
         has的测试结果应该是
        参数二为 Storage::ACCESS_NO_CHECK： //不检查权限
        array (
            0 => 1,
            1 => 1,
            2 => 1,
            3 => 1,
        ),
        参数二为 Storage::READ_ACCESS： // 只检查读的权限
        array (
            0 => 1,
            1 => 0,
            2 => 1,
            3 => 0,
        ),
        参数二为 Storage::WRITE_ACCESS： //只检查写的权限
        array (
            0 => 0,
            1 => 1,
            2 => 1,
            3 => 0,
        ),
        参数二为 Storage::READ_ACCESS | Storage::WRITE_ACCESS： //检查是否同时拥有读写权限
        array (
            0 => 0,
            1 => 0,
            2 => 1,
            3 => 0,
        ),
         */
        SR_PATH_RUNTIME.'/r',
        SR_PATH_RUNTIME.'/w',
        SR_PATH_RUNTIME.'/a',
        SR_PATH_RUNTIME.'/no',
    ];
    $result['has'] = [];
    foreach ($files4readabletest as $file) {
        $result['has'][] = Storage::has($file,Storage::WRITE_ACCESS);
    }
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
//    $result['rmdir'] = [];
//    foreach ($files4writetest as $file) {
//        $result['rmdir'][] = Storage::unlink($file,true);
//    }



    \Sharin\dumpout($result);
}