<?php
/**
 * Created by PhpStorm.
 * User: linzh
 * Date: 2016/10/10
 * Time: 21:14
 */
namespace {


    use Sharin\Core\Lang;

    include __DIR__.'/../../tester.module';


    $result = [];

    $result[] = Lang::loadLang();



    \Sharin\dumpout($result);
}
