<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 2016/12/22
 * Time: 20:41
 */

namespace core\lib;


class model extends \medoo
{
    public function __construct($dsn=null, $username=null, $passwd=null, $options=null)
    {
//        $temp = conf::getAll('database');
//        $dsn = $dsn || isset($temp['DSN']) ? $temp['DSN'] : 'mysql:host=localhost;dbname=test';
//        $username = $username || isset($temp['USERNAME']) ? $temp['USERNAME'] : 'root';
//        $passwd = $passwd || isset($temp['PASSWD']) ? $temp['PASSWD'] : '123456';
//        $options = $options || isset($temp['OPTIONS']) ? $temp['OPTIONS'] : array();
//        try {
//            parent::__construct($dsn, $username, $passwd, $options);
//        } catch (\PDOException $e) {
//            p($e->getMessage());
//        }
        $options = conf::getAll('database');
        parent::__construct($options);
    }

}