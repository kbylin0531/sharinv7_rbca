<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 16-10-9
 * Time: 上午10:34
 */
namespace hellophp {

    class A {


        public static $name = null;


        public static function getName(){
            if(null === static::$name){
                static::$name = strtolower(str_replace('\\','.',trim(static::class,'\\')));
            }
            return static::$name;
        }

    }

    class B extends A{

        public static $name = 'bbbb';

    }

    class C extends A{

    }


    var_dump([
        A::getName(),
        B::getName(),
        C::getName(),
    ]);
}