<?php
/**
 * User: long
 * Date: 2019/3/18
 * Time: 17:03
 */

namespace app\index\controller;


use think\Controller;

class Tool extends Controller
{
    public function timestamp(){
        echo 1;
        return $this->fetch('timestamp');
    }
}