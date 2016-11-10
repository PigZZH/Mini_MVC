<?php

/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-11-08
 * Time: 15:20
 */
class adminController
{
    public $auth = '';

    public function __construct()
    {
        session_start();

        //判断当前是否已经登录 ->auth model
        $authobj = M('auth');
        $this->auth = $authobj->getauth();
        //如果不是登录页面 并且没有登录,就跳到登录页
        if (empty($this->auth) && (PC::$method != 'login')) {
            $this->showmessage('请在登陆后操作!', 'admin.php?controller=admin&method=login');
        }

    }

    private function showmessage($info, $url)
    {
        echo "<script>alert('$info');window.location.href='$url'</script>";
        exit;
    }

    function login()
    {
        if ($_POST) {
            //登录处理
            //登录处理业务逻辑放在admin auth
            //admin同表名的模型:从数据库里取用户信息
            //auth模型:进行用户信息的核对
            //把一些列的登录处理操作拆分到新的方法里去
            $this->checklogin();
        } else {
            VIEW::display('admin/login.html');
        }
    }

    //主页

    function checklogin()
    {
        $authobj = M('auth');
        if ($authobj->loginsubmit()) {
            $this->showmessage('登录成功!', 'admin.php?controller=admin&method=index');
        } else {
            $this->showmessage('登录失败!', 'admin.php?controller=admin&method=login');
        }
    }

    public function index()
    {
        $newsobj = M('news');
        $newsnum = $newsobj->count();
        VIEW::assign(array('newsnum' => $newsnum));
        VIEW::display('admin/index.html');
    }

    //新闻列表

    public function logout()
    {
        $authobj = M('auth');
        $authobj->logout();
        $this->showmessage('退出成功!', 'admin.php?controller=admin&method=login');
    }

    //添加新闻

    function newslist()
    {
        $newsobj = M('news');
        $data = $newsobj->findAll_orderby_dateline();
        VIEW::assign(array('data' => $data));
        VIEW::display('admin/newslist.html');
    }

    public function newsadd()
    {
        //判断有没有post
        //如果没有就显示界面
        if (empty($_POST)) {
            if (isset($_GET['id'])) {
                $data = M('news')->getnewsinfo($_GET['id']);
            } else {
                $data = array();
            }
            VIEW::assign(array('data' => $data));
            VIEW::display('admin/newsadd.html');
        } else {//添加处理
            //print_r($_POST);
            $result = M('news')->newssubmit($_POST);
            $this->newssubmit($result);
            //判断result 来做出相应的提示
        }
    }

    private function newssubmit($result)
    {
        if ($result == 0) {
            $this->showmessage('操作失败请填写完整数据', 'admin.php?controller=admin&method=newsadd&id=' . $_POST['id']);
        }
        if ($result == 1) {
            $this->showmessage('添加新闻成功', 'admin.php?controller=admin&method=newslist');
        } else {
            $this->showmessage('修改成功', 'admin.php?controller=admin&method=newslist');
        }
    }

    function newsdel()
    {
        if (intval($_GET['id'])) {
            $newsobj = M('news');
            $newsobj->del_by_id(intval($_GET['id']));
            $this->showmessage('删除成功!', 'admin.php?controller=admin&method=newslist');
        }
    }

}