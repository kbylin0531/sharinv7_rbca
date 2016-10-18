<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 16-10-18
 * Time: 下午2:22
 */

namespace Application\Test\Controller;


class MemberModel {

    protected $model = null;
    public function __construct()
    {
        $this->model = new \Application\Admin\Model\MemberModel();
    }

    public function lists(){
        $list = [];
        $list['0'] = $this->model->lists(0);
        $list['1'] = $this->model->lists(1);
        $list['default'] = $this->model->lists();
        \Sharin\dumpout($list);
    }

    public function add(){
        $this->model->email = '1797290103@qq.com';
        $this->model->nickname = 'Baishou';
        $this->model->passwd = md5(sha1('123456'));
        $this->model->profile = '';
        $this->model->sex = 1;
        $this->model->status = 1;

        $result = $this->model->add();
    }


}