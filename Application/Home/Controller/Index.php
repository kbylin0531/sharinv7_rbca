<?php
namespace Application\Home\Controller;
use Sharin\Library\Controller;

class Index extends Controller{

    public function index(){
        $this->assign('info',[
            'author'    => 'lin',
            'address'   => 'https://github.com/kbylin0531/sharinv7_rbca',
        ]);
        $this->display();
    }

}