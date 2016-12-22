<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 2016/12/22
 * Time: 21:59
 */

namespace core\lib\drive\log;


class file
{
    private  $path;
    function __construct()
    {

        $this->path = \core\lib\conf::get('OPTION','log')['PATH'];
    }

    public function log($msg,$file = 'log'){
        /**
         * 1. 确定文件存储位置是否存在
         *      新建目录
         * 2. 写入日志
         */
        if(!is_dir($this->path)){
            mkdir($this->path,0777,true);
        }
        $msg = date('Y-m-d H:i:s')."    ".json_encode($msg);
        return file_put_contents($this->path.$file.'_'.date('Y_m_d_H').'.txt',$msg.PHP_EOL,FILE_APPEND);
    }
}