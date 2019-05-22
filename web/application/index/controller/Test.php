<?php

namespace app\index\controller;


class Test extends Base
{

    public function test()
    {
        return $this->view('index');
    }
}
