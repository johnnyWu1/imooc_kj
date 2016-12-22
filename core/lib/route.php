<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 2016/12/20
 * Time: 11:22
 */


namespace core\lib;

class route
{

    public $ctrl;
    public $action;

    function __construct()
    {
        // xxx.com/index/index
        // xxx.com/index.php/index/index
        /**
         * 1. 隐藏index.php
         * 2. 获取URL 参数部分
         * 3. 返回对应控制器和方法
         */

        if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/') {
            // /index/index
            $path = $_SERVER['REQUEST_URI'];
            $pathArray = explode('/', trim($path, '/'));
            if (isset($pathArray[0])) {
                $this->ctrl = $pathArray[0];
                unset($pathArray[0]);
            }
            if (isset($pathArray[1])) {
                $this->action = $pathArray[1];
                unset($pathArray[1]);
            } else {
                $this->action = 'index';
            }
            // url多余部分转换成 GET

            $count = count($pathArray) + 2;
            $i = 2;
            while ($i < $count) {
                if(!isset($pathArray[$i +1])){
                    break;
                }
                $_GET[$pathArray[$i]] = $pathArray[$i + 1];
                $i = $i + 2;
            }


        } else {
            $this->ctr = 'index';
            $this->action = 'index';
        }
    }
}