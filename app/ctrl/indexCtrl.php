<?php

/**
 * Created by PhpStorm.
 * User: student
 * Date: 2016/12/20
 * Time: 17:47
 */
namespace app\ctrl;

use app\model\cModel;
use app\model\guestbookModel;
use core\lib\model;

class indexCtrl extends \core\imooc
{
    //所有留言
    public function index(){

        $model = new guestbookModel();
        $list = $model->all();
        $this->assign('list',$list);
        $this->display('index.html');
    }

    //添加留言
    public function add(){
        $this->display('add.html');
    }

    //查看详情
    public function detail(){
        $model = new guestbookModel();
        $data = $model->getOne(get('id'));
        $this->assign('data',$data);
        $this->display('detail.html');
    }

    //删除留言
    public function del(){
        $model = new guestbookModel();
        $ret = $model->delOne(get('id'));
        if($ret){
            jump('/');
        } else{
            p('error:'.$ret);
        }
    }

    //保存留言
    public function save(){
        $data['title'] = post('title');
        $data['content'] = post('content');
        $data['createtime'] = time();
        $model = new guestbookModel();
        $ret = $model->addOne($data);
        if($ret){
            jump('/');
        } else{
            p('error:'.$ret);
        }
    }


}
