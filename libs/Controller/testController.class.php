<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-11-05
 * Time: 19:01
 */
//控制器
class testController
{// 调用模型,调用视图,并且将模型产生的数据传给视图让视图去处理

    public function show()
    {
        global $view;
        //$testModle =  new testModle();
        $testModle = M('test');
        $data = $testModle->get();
        $view->assign('str', 'hahahah');
        $view->display('test.tpl');
    }
}
