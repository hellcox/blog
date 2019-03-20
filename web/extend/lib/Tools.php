<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/24
 * Time: 5:23
 */

namespace lib;
class Tools
{
    public static function  pager($data,$str=''){
        return null;
    }

    public static function secondToDay($second){
        return date("Y-m-d H:i:s",$second);
    }
}