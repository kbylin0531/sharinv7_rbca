<?php

namespace {


    use Sharin\Configger;
    use Sharin\Core\Storage;

    include __DIR__.'/../tester.module';




    $result = [];

    //检查初始化
    $result[] = Configger::class;

    //NICE
//    $result[] = Configger::loadInner(Storage::class);
//    $result[] = Configger::loadOuter(Storage::class);
//    $result[] = Configger::load(Storage::class);
//    F:/home/asus/workspace/Sharingan/Sharin/Test/configer.php << L:60 >>
//    [Parameter-0]
//array (
//    0 => 'Sharin\\Configger',
//    1 =>
//        array (
//            'BASE_ON_DRIVER' => false,
//            'BASED_DRIVER_INDEX' => '',
//            'DRIVER_CLASS_LIST' =>
//                array (
//                ),
//            'DRIVER_CONFIG_LIST' =>
//                array (
//                ),
//            'READ_LIMIT_ON' => true,
//            'WRITE_LIMIT_ON' => true,
//            'READABLE_SCOPE' => '/home/asus/workspace/Sharingan',
//            'WRITABLE_SCOPE' =>
//                array (
//                    0 => '/home/asus/workspace/Sharingan/Runtime',
//                    1 => '/home/asus/workspace/Sharingan/Data/Runtime',
//                ),
//        ),
//    2 =>
//        array (
//            'WRITABLE_SCOPE' =>
//                array (
//                    0 => '/home/asus/workspace/Sharingan/Runtime',
//                    1 => '/home/asus/workspace/Sharingan/Public/rt/',
//                ),
//        ),
//    3 =>
//        array (
//            'BASE_ON_DRIVER' => false,
//            'BASED_DRIVER_INDEX' => '',
//            'DRIVER_CLASS_LIST' =>
//                array (
//                ),
//            'DRIVER_CONFIG_LIST' =>
//                array (
//                ),
//            'READ_LIMIT_ON' => true,
//            'WRITE_LIMIT_ON' => true,
//            'READABLE_SCOPE' => '/home/asus/workspace/Sharingan',
//            'WRITABLE_SCOPE' =>
//                array (
//                    0 => '/home/asus/workspace/Sharingan/Runtime',
//                    1 => '/home/asus/workspace/Sharingan/Data/Runtime',
//                    2 => '/home/asus/workspace/Sharingan/Public/rt/',
//                ),
//        ),
//)


    //NICE
//    $result[] = Configger::read('hello.man',['hello.man']);
//    $result[] = Configger::write('hello.man',['hello world']);
//    $result[] = Configger::read('hello.man',['hello.man']);
    //运行结果如下
//    asus@asus:~/workspace/Sharingan/Sharin/Test$ php configer.php
//F:/home/asus/workspace/Sharingan/Sharin/Test/configer.php << L:29 >>
//    [Parameter-0]
//array (
//    0 => 'Sharin\\Configger',
//    1 =>
//        array (
//            0 => 'hello.man',
//        ),
//    2 => true,
//    3 =>
//        array (
//            0 => 'hello world',
//        ),
//)
//asus@asus:~/workspace/Sharingan/Sharin/Test$ php configer.php
//F:/home/asus/workspace/Sharingan/Sharin/Test/configer.php << L:29 >>
//    [Parameter-0]
//array (
//    0 => 'Sharin\\Configger',
//    1 =>
//        array (
//            0 => 'hello world',
//        ),
//    2 => true,
//    3 =>
//        array (
//            0 => 'hello world',
//        ),
//)
    //NICE
//    Configger::initialize([
//        'USE_LITE'          => false,
//    ]);
//    F:/home/asus/workspace/Sharingan/Sharin/Core/bundle.inc << L:851 >>
//    [Parameter-0]
//array (
//)
    //NICE : 外部配置和内置配置合并 并且 下面的配置数组正确地写到了文件中
    Configger::initialize([
        'USE_LITE'          => true,
    ]);
//    F:/home/asus/workspace/Sharingan/Sharin/Core/bundle.inc << L:851 >>
//    [Parameter-0]
//array (
//    'Sharin\\Core\\Storage' =>
//        array (
//            'BASE_ON_DRIVER' => false,
//            'BASED_DRIVER_INDEX' => '',
//            'DRIVER_CLASS_LIST' =>
//                array (
//                ),
//            'DRIVER_CONFIG_LIST' =>
//                array (
//                ),
//            'READ_LIMIT_ON' => true,
//            'WRITE_LIMIT_ON' => true,
//            'READABLE_SCOPE' => '/home/asus/workspace/Sharingan',
//            'WRITABLE_SCOPE' =>
//                array (
//                    0 => '/home/asus/workspace/Sharingan/Runtime',
//                    1 => '/home/asus/workspace/Sharingan/Data/Runtime',
//                    2 => '/home/asus/workspace/Sharingan/Public/rt/',
//                ),
//        ),
//    'Sharin\\Core\\Cache' =>
//        array (
//            'BASE_ON_DRIVER' => true,
//            'BASED_DRIVER_INDEX' => 0,
//            'DRIVER_CLASS_LIST' =>
//                array (
//                    0 => 'Sharin\\Core\\Cache\\File',
//                    1 => 'Sharin\\Core\\Cache\\Memcache',
//                ),
//            'DRIVER_CONFIG_LIST' =>
//                array (
//                    0 =>
//                        array (
//                            'expire' => 0,
//                            'cache_subdir' => false,
//                            'path_level' => 1,
//                            'prefix' => '',
//                            'length' => 0,
//                            'data_compress' => false,
//                            'path' => '/home/asus/workspace/Sharingan/Runtime/cache/file/',
//                        ),
//                    1 =>
//                        array (
//                            'host' => 'localhost',
//                            'port' => 11211,
//                            'expire' => 0,
//                            'prefix' => '',
//                            'timeout' => 1000,
//                            'persistent' => true,
//                            'length' => 0,
//                        ),
//                ),
//            'DEFAULT_CACHE_EXPIRE' => 300,
//        ),
//)



    \Sharin\dumpout($result);
}
