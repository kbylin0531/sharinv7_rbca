<?php

/**
 * Created by PhpStorm.
 * User: asus
 * Date: 16-10-18
 * Time: 下午1:05
 */
namespace Application\System\Service;
use Sharin\Library\Cookie;
use Sharin\Library\Helper\Base64;
use Sharin\Library\Session;

class Member
{

    public static function hasLogin(){
        $status = Session::get(static::class);//return null if not set
        if(!$status){
            $cookie = Cookie::get(static::class);
            if($cookie){
                $usrinfo = unserialize(Base64::decrypt($cookie, static::class));
                Session::set(static::class, $usrinfo);
                return true;
            }
        }
        return $status?true:false;
    }




    /**
     * @param string $username
     * @param null $password
     * @param bool $remember
     * @return bool|string 返回的string代表着错误的信息，返回true表示登陆成功
     */
    public function doLogin($username,$password,$remember=false){
        $model = new UserModel();
        $usrinfo = $model->checkLogin($username,$password);
//        \PLite\dumpout($usrinfo);
        if(false === $usrinfo){
//            \PLite\dumpout($model->error());
            return $model->error();
        }

        //set session,browser must enable cookie
        if($remember){
            $sinfo = serialize($usrinfo);
            $cookie = Base64::encrypt($sinfo, self::$key);
            Cookie::set(self::$key, $cookie,7*24*3600);//一周的时间
        }
//        \PLite\dumpout($usrinfo);
        Session::set(self::$key, $usrinfo);
        return true;
    }


}