<?php

namespace app\index\controller;

use lib\ApiResponse;
use think\Controller;
use think\Session;

class Test extends Controller
{
    public function test()
    {
        dump("test");
        dump(session_save_path());
    }
}
