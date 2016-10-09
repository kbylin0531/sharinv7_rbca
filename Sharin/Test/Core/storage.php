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

    //test has
    $result['has'] = [];
    foreach ($files4readabletest as $file) {
        $result['has'][] = Storage::has($file);
    }

    //test size
    $result['size'] = [];
    foreach ($files4readabletest as $file) {
        $result['size'][] = Storage::size($file);
    }

    //test mtime
    $result['mtime'] = [];
    foreach ($files4readabletest as $file) {
        $result['mtime'][] = Storage::mtime($file);
    }

    $result['read'] = [];
    foreach ($files4readabletest as $file) {
        $result['read'][] = Storage::read($file);
    }


    \Sharin\dumpout($result);
}