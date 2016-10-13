<?php
/**
 * Created by PhpStorm.
 * User: zheng
 * Date: 16-10-11
 * Time: 下午12:54
 */
class TestController extends SController {

    public function actionIndex($code='dasdadada')
    {
        if(($data = Tempper::get($code,false)) === false){
            $data = ['this is data'];
            echo "\n获取并设置缓存\n";
            Tempper::set($code,$data);
        }else{
            echo "\n直接读取自缓存\n";
            $data = Tempper::get($code,false);
        }
        dump($data);
    }
//    public function actionTest(){
//        echo 'ytest';
//    }

}