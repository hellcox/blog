<?php

namespace app\index\controller;


use QC;
use think\facade\Session;

class Test extends Base
{

    public function test()
    {
        @Session::set('test','111');
        $a = Session::get('test');
        echo $a;
        echo '<pre>';
        var_dump($_SESSION);


       // return $this->view('index');
    }
}
