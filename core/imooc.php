<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 2016/12/20
 * Time: 11:19
 */

namespace core;


class imooc {

    public static $classMap = array();
    private $data = array();

    static public function run() {
        \core\lib\log::init();
        $route = new \core\lib\route();
        $ctrlClass = $route->ctrl;
        $action = $route->action;
        $ctrlFile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
        $ctrlClass = '\\'.MODULE .'\\ctrl\\'.$ctrlClass.'Ctrl';
        if(is_file($ctrlFile)){
            include $ctrlFile;
            $ctrl = new $ctrlClass();
            $ctrl->$action();
            \core\lib\log::log('ctrl:'.$ctrlClass.'     '.'action:'.$action);
        } else {
            throw new \Exception('找不到控制器'.$ctrlClass);
        }
    }

    static public function load($class){
        //自动加载类库
        // new \core\route();
        // $class = '\core\route';
        // IMOOC.'/core/route.php';

        $class = str_replace('\\','/',$class);

        $file = IMOOC.'/'.$class.'.php';
        if(isset($classMap[$class])){
            return true;
        }
        if(is_file($file)){
            include($file);
            self::$classMap[$class] = true;
        }else{
            return false;
        }
    }

    public function assign($name, $value) {
        $this->data[$name] = $value;
    }

    public function display($file) {
        $file = APP. '/views/'.$file;
        if(is_file($file)){
            extract($this->data);
            include $file;
        }
    }

}