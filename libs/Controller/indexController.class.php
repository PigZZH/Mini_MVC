<?php

/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-11-10
 * Time: 13:22
 */
class indexController
{
    function index()
    {
        $newsobj = M('news');
        $data = $newsobj->get_news_list();
        //var_dump($data);
        $this->showabout();
        VIEW::assign(['data' => $data]);
        VIEW::display('index/index.html');
    }

    private function showabout()
    {

        $data = M('about')->aboutinfo();
        VIEW::assign(['about' => $data]);
    }

    function newsshow()
    {
        $data = M('news')->getnewsinfo($_GET['id']);

        $data['dateline'] = date('Y-m-d H:i:s', $data['dateline']);
        //var_dump($data);
        $this->showabout();
        VIEW::assign(['data' => $data]);
        VIEW::display('index/show.html');
    }
}