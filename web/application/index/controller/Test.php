<?php

namespace app\index\controller;


use QC;

class Test extends Base
{

    public function test()
    {
        return $this->view('index');
    }

    /**
     * QQ授权登录
     */
    public function auth()
    {
        require_once "../extend/lib/QQAuth/qqConnectAPI.php";
        $qc = new QC();
        $qc->qq_login();
    }

    public function notify()
    {
        echo 1111;
        print_r($_SERVER);
    }
}
