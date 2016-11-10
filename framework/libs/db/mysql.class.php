<?php

/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-11-08
 * Time: 13:01
 */
class mysql
{
    public static $conn = '';

    /**
     * 连接数据库
     *
     * @param string $dbhost 主机名
     * @param string $dbuser 用户名
     * @param string $dbpsw 密码
     * @param string $dbname 数据库名
     * @param string $dbcharset 字符集/编码
     * @return bool  连接成功或不成功
     **/
    function connect($config)
    {
        extract($config);
        $dbconn = mysqli_connect($dbhost, $dbuser, $dbpwd);
        if (!$dbconn) {
            $this->err(mysqli_error());
        }
        if (!mysqli_select_db($dbconn, $dbname)) {
            $this->err(mysqli_error($dbconn));
        }
        mysqli_set_charset($dbconn, $dbcharset);
        self::$conn = $dbconn;
    }

    /**
     * 报错函数
     *
     * @param $error
     */
    function err($error)
    {
        die('对不起,您的操作有误,错误原因为:' . $error);
    }

    /**
     * 查询出所有的结果
     * @param $query sql执行结果
     * @return array|string
     */
    function findAll($query)
    {
        while ($rs = mysqli_fetch_assoc($query)) {
            $list[] = $rs;
        }
        return isset($list) ? $list : '';
    }

    /**
     * 取出单条数据
     * @param $query
     * @return array|null
     */
    function findOne($query)
    {
        $rs = mysqli_fetch_assoc($query);
        return $rs;
    }

    function findResult($query, $row = 0, $field = 0)
    {
        $rs = mysql_result($query, $row, $field);
        return $rs;
    }

    /*
     *指定行的指定字段的值
     *
     *@param source $query sql语句通过mysql_query执行出的来的资源
     *return array   返回指定行的指定字段的值
     */

    function insert($table, $arr)
    {
        foreach ($arr as $key => $value) {
            $value = mysqli_real_escape_string(self::$conn, $value);
            $keyArr[] = "`" . $key . "`";
            $valueArr[] = "'" . $value . "'";
        }
        $keys = implode(",", $keyArr);
        $values = implode(",", $valueArr);
        $sql = "insert into " . $table . "(" . $keys . ") values(" . $values . ")";
        $this->query($sql);
        return mysqli_insert_id(self::$conn);
    }

//插入执行语句

    /**
     * 执行sql语句
     * @param $sql sql语句
     * @return bool|mysqli_result
     */
    function query($sql)
    {
        if (!($query = mysqli_query(self::$conn, $sql))) {
            $this->err($sql . "<br/>" . mysqli_error(self::$conn));
        } else {
            return $query;
        }
    }
//修改执行语句
    /*
     *修改函数
     *
     *@param string $table 表名
     *@param array $arr 修改数组（包含字段和值的一维数组）
     *@param string $where  条件
     */

    function update($table, $arr, $where)
    {
        //update 表名 set 字段=字段值 where ……
        foreach ($arr as $key => $value) {
            $value = mysqli_real_escape_string(self::$conn, $value);
            $keyAndvalueArr[] = "`" . $key . "`='" . $value . "'";
        }
        $keyAndvalues = implode(",", $keyAndvalueArr);
        $sql = "update " . $table . " set " . $keyAndvalues . " where " . $where;//修改操作 格式 update 表名 set 字段=值 where 条件
        $this->query($sql);
    }

    /**
     *删除函数
     *
     * @param string $table 表名
     * @param string $where 条件
     **/
    function del($table, $where)
    {
        $sql = "delete from " . $table . " where " . $where;//删除sql语句 格式：delete from 表名 where 条件
        $this->query($sql);
    }

}
