<?php

namespace {


    use Sharin\Test\ComponentTest;

    include __DIR__.'/../tester.module';

    $result = [];

    $result[] = class_exists('Sharin\\Test\\ComponentTest');


    echo "\n___________________________________________________________________________________________\n";
    ComponentTest::getStaticDriver()->dump();
    ComponentTest::instance(1)->dump();
    ComponentTest::dump();

    echo "\n___________________________________________________________________________________________\n";
    \Sharin\dumpout($result);
}


