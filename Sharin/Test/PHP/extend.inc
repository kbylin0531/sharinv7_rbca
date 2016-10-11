<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 16-10-9
 * Time: 上午10:34
 */
namespace hellophp {

    class A {


        protected static $name = 'A';

        public static function getName(){
            if(null === static::$name){
                static::$name = strtolower(str_replace('\\','.',trim(static::class,'\\')));
            }
            return static::$name;
        }

        public static function setName($name){
            return static::$name = $name;
        }

    }

    class B extends A{

        protected static $name = 'B';
    }

    class C extends A{

//        protected static $name = 'C';
    }


    var_dump([
        A::getName(),
        B::getName(),
        C::getName(),

        B::setName('BB'),
        C::setName('CC'),

        A::getName(),
        B::getName(),
        C::getName(),
    ]);
}

/**
 *   注意到是否覆盖属性对结果有着不同的影响
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 */