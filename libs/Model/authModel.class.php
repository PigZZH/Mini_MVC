<?php

/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-11-08
 * Time: 16:36
 */
class authModel
{
    private $auth = '';//当前管理员的信息

    public function __construct()
    {
        if (isset($_SESSION['auth']) && (!empty($_SESSION['auth']))) {
            $this->auth = $_SESSION['auth'];
        }
    }


    public function loginsubmit()
    {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            return false;
        }
        $username = $_POST['username'];
        $password = $_POST['password'];
        // 用户的验证操作 -> 拆分成另外一个方法写,减少方法的代码量
        if ($this->auth = $this->checkuser($username, $password)) {
            $_SESSION['auth'] = $this->auth;
            return true;
        } else {
            return false;
        }


    }

    private function checkuser($username, $password)
    {
        $adminobj = M('admin');//实例化模型
        $auth = $adminobj->findOne_by_username($username);
        if (!empty($auth) && $auth['password'] == $password) {
            return $auth;
        } else {
            return false;
        }
    }

    function logout()
    {
        unset($_SESSION['auth']);
        $this->auth = '';

    }

    public function getauth()
    {
        return $this->auth;
    }

}