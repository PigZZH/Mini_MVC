<?php

/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-11-10
 * Time: 14:26
 */
class aboutModel
{
    function aboutinfo()
    {
        return file_get_contents('data/about.txt');
    }
}