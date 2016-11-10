<?php
function C($name, $method)
{
    require_once('./libs/Controller/' . $name . 'Controller.class.php');
    //eval('$obj = new'.$name.'Controller();$obj->'.$method.'();');
    //eval 将字符串转换为php代码 (不安全)
    //$controller = $name.'Controller';
    //$obj = new $controller;
    //var_dump($obj);
    //$method1 = $method.'()';
    //echo $method1;
    //$obj -> show();
    //require_once './libs/Controller/testController.class.php';
    //$obj = new testController();
    //$obj ->show();
    eval('$obj = new ' . $name . 'Controller();$obj->' . $method . '();');
}

function M($name)
{
    /*require_once ('./lib/Model/'.$name.'Model.class.php');
    $model =$name.'Model';
    $obj = new $model();
    return $obj;*/
    require_once('/libs/Model/' . $name . 'Model.class.php');
    //$testModel = new testModel();
    eval('$obj = new ' . $name . 'Model();');
    return $obj;
}

function V($name)
{
    /*require_once ('./lib/View/'.$name.'View.class.php');
    $view =$name.'View';
    $obj = new $view();
    return $obj;*/
    require_once('/libs/View/' . $name . 'View.class.php');
    //$testView = new testView();
    eval('$obj = new ' . $name . 'View();');
    return $obj;
}

/**
 * @param $path 路径
 * @param $name 第三方的类名
 * @param array $params 类初始化时需要指定赋值的属性,格式为array(属性名1=>属性值1,是姓名2=>属性值2.....)
 */
function ORG($path, $name, $params = array())
{
    require_once './libs/ORG/' . $path . $name . '.class.php';
    $obj = new $name();
    if (!empty($params)) {
        foreach ($params as $key => $value) {
            $obj->$key = $value;
        }
    }
    return $obj;
}

function daddslashes($str)
{
    return (!get_magic_quotes_gpc()) ? addslashes($str) : $str;
}


