<?php

/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-11-08
 * Time: 16:21
 */
class adminModel
{
    //定义表名
    public $_table = 'admin';

    //获取用户信息
    function findOne_by_username($username)
    {
        $sql = 'select * from ' . $this->_table . ' where username="' . $username . '"';
        return DB::findOne($sql);
    }
}