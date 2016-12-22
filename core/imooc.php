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

    static public function run() {
        $route = new \core\lib\route();
        $ctrlClass = $route->ctrl;
        $action = $route->action;
        $ctrlFile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';

        if(is_file($ctrlFile)){
            include $ctrlFile;
            p(MODULE.'ctrl/'.$ctrlClass.'Ctrl()');
            new MODULE.'ctrl/'.$ctrlClass.'Ctrl()';
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
}