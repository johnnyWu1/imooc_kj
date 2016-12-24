<?php

/**
 * Created by PhpStorm.
 * User: student
 * Date: 2016/12/20
 * Time: 17:47
 */
namespace app\ctrl;

use app\model\cModel;
use core\lib\model;

class indexCtrl extends \core\imooc
{
    public function index() {
//        p('it is index');
        $model = new cModel();
//        $sql = "select * from t1";
//        $ret = $model->query($sql);
//        p($ret->fetchAll());
        $data = $model->getOne(2);
        $this->assign('data',$data);
        $this->display('index.html');
    }


    public function test() {
//        p('it is index');
        $this->assign('data',['name'=>'test']);
        $this->display('test.html');
    }


}
