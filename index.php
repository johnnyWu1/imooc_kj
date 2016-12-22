<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 2016/12/20
 * Time: 11:02
 */

define('IMOOC', realpath('./'));
define('CORE',IMOOC.'/core');
define('APP',IMOOC.'/core/app');
define('MODULE','app');

define('DEBUG',true);

if(DEBUG) {
    ini_set('display_error','On');
}else{
    ini_set('display_error','Off');
}

include CORE.'/common/function.php';
include CORE.'/imooc.php';

spl_autoload_register('\core\imooc::load');

\core\imooc::run();
