<?php

/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-11-08
 * Time: 19:14
 */
class newsModel
{
    public $_table = 'news';

    function count()
    {
        $sql = 'select count(*) as c from ' . $this->_table;
        return DB::findOne($sql);
    }

    //获取新闻信息
    public function getnewsinfo($id)
    {
        if (empty($id)) {
            return array();
        } else {
            $id = intval($id);
            $sql = 'select * from ' . $this->_table . ' where id = ' . $id;
            return DB::findOne($sql);
        }
    }

    function newssubmit($data)
    {
        extract($data);//通过extract获得 $id
        if (empty($title) || empty($content)) {
            return 0;
        }
        $data = array(
            'title' => $title,
            'content' => $content,
            'author' => $author,
            'fromto' => $from,
            'dateline' => time()
        );
        if ($_POST['id'] != '') {
            DB::update($this->_table, $data, 'id = ' . $id);
            return 2;
        } else {
            DB::insert($this->_table, $data);
            return 1;

        }
    }

    function del_by_id($id)
    {
        DB::del($this->_table, 'id = ' . $id);

    }

    function get_news_list()
    {
        $data = $this->findAll_orderby_dateline();
        //var_dump($data);
        foreach ($data as $k => $v) {
            $data[$k]['content'] = mb_substr(strip_tags($data[$k]['content']), 0, 200);//strip_tags除去标签的内容
            $data[$k]['dateline'] = date('Y-m-d H:i:s', $data[$k]['dateline']);
        }
        return $data;
    }

    //index 获取所有新闻

    function findAll_orderby_dateline()
    {
        $sql = 'select * from ' . $this->_table . ' order by dateline desc';
        return DB::findAll($sql);
    }
}
