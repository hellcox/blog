<?php

namespace app\index\controller;


use app\index\model\User;
use think\Controller;
use think\Db;
use think\facade\Config;
use think\facade\Env;

class Index extends Controller
{

    /**
     * 首页
     * @return mixed
     */
    public function index()
    {
        return $this->fetch('home');
    }

    /**
     * 测试方法
     */
    public function test()
    {
        echo "test";
        echo "<br><a href='" . url('/') . "'>home</a>";
    }

    /**
     * 最新列表
     */
    public function latest()
    {
        echo 1;
    }

    /**
     * 详情
     * @return mixed
     */
    public function detail()
    {
        return $this->fetch();
    }
}
