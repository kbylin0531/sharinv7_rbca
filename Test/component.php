<?php

namespace {


    use Sharin\Test\ComponentTest;

    include __DIR__.'/../tester.module';
    $result = [];

    $result[] = class_exists('Sharin\\Test\\ComponentTest');


    echo "\n___________________________________________________________________________________________\n";
    $result[] = ComponentTest::convention();
//    ComponentTest::getStaticDriver()->dump();
//    ComponentTest::instance(1)->dump();
//    ComponentTest::dump();//使用默认的dump
    echo "\n___________________________________________________________________________________________\n";

    \Sharin\dumpout($result);
}


