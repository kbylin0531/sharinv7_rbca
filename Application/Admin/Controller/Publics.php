<?php
/**
 * Created by PhpStorm.
 * User: lnzhv
 * Date: 7/25/16
 * Time: 6:16 PM
 */

namespace Application\Admin\Controller;
use Application\Admin\Model\MemberModel;
use Sharin\Core\Logger;
use Sharin\Library\Controller;

class Publics extends Controller{

    public function register(){
        $this->display();
    }

    public function login($username='',$passwd='',$remember=false){
        $error = '';
        if(SR_IS_POST){
            if(!$username or !$passwd){
                $error = '用户名或者密码不能为空';
            }else{
                $model = new MemberModel();
                $result = $model->login($username,$passwd,$remember);
                if($result){
                    $this->redirect('/Admin/Index/index');
                }else{
                    Logger::record([$model->error(),$username,$passwd,'login failed']);
                }
                $error = $model->error();
            }
        }
        $this->assign('error',$error);
        $this->display();
    }
    public function lockScreen(){
        $this->display();
    }

    public function show404(){
        $this->display('404');
    }

    public function show500(){
        $this->display('500');
    }

    /**
     * 注销登录
     */
    public function logout(){
        (new MemberModel())->logout();
        $this->redirect('/Admin/Publics/login');
    }

}