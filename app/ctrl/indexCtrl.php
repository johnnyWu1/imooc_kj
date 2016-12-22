<?php

/**
 * Created by PhpStorm.
 * User: student
 * Date: 2016/12/20
 * Time: 17:47
 */
namespace app\ctrl;

class indexCtrl extends \core\imooc
{
    public function index() {
//        p('it is index');
        $model = new \core\lib\model();
        $sql = "select * from t1";
        $ret = $model->query($sql);
//        p($ret->fetchAll());
        $this->assign('data',$ret->fetchAll());
        $this->display('index.html');

        dump($_SERVER);
    }


}
