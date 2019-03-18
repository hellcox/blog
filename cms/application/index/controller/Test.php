<?php

namespace app\index\controller;




use lib\ApiResponse;

class Test extends BaseController
{

    public function test()
    {
        ApiResponse::success();
        dump("test");
    }
}
