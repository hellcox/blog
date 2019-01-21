<?php

namespace app\index\controller;


use app\index\model\User;
use think\Controller;
use think\Db;
use think\facade\Config;
use think\facade\Env;

class Article extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function add()
    {
        return $this->fetch();
    }
}
