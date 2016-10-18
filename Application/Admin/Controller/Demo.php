<?php

/**
 * Created by PhpStorm.
 * User: asus
 * Date: 16-10-17
 * Time: 下午12:58
 */
namespace Application\Admin\Controller;
use Sharin\Library\Controller;

class Demo extends Controller {


    //UI
    public function aa(){$this->display();}

    //ELEMENT
    public function element_card(){
        $this->display();
    }
    public function elements_lists(){
        $this->display();
    }
    public function elements_overlay(){
        $this->display();
    }
    public function elements_ribbons(){
        $this->display();
    }
    public function elements_rteps(){
        $this->display();
    }



}