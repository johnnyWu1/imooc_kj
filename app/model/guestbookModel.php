<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 2016/12/24
 * Time: 14:40
 */

namespace app\model;


use core\lib\model;

class guestbookModel extends model {

    public $table = 'guestbook';
    public function  all(){
        $ret = $this->select($this->table,'*');
        return $ret;
    }

    public function addOne(){

    }


    public function getOne($id){
        return $this->get($this->table,'*',[
           'id'=>$id
        ]);
    }

    public function setOne($id, $data)
    {
        return $this->update($this->table,$data,[
            'id'=>$id
        ]);
    }

    public function delOne($id)
    {
        return $this->delete($this->table,[ 'id'=>$id]);
    }

}