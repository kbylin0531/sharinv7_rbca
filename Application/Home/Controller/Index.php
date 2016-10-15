<?php
/**
 * Created by PhpStorm.
 * User: linzh
 * Date: 2016/10/11
 * Time: 20:12
 */
namespace Application\Home\Controller;
use Sharin\Library\Controller;

class Index extends Controller {

    public function index(){
        $this->assign('name','linzongho');
        $this->display();
        return 20;
    }

}