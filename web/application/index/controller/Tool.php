<?php
/**
 * User: long
 * Date: 2019/3/18
 * Time: 17:03
 */

namespace app\index\controller;


use think\App;

class Tool extends Base
{

    public function __construct(App $app = null)
    {
        parent::__construct($app);
    }

    public function timestamp(){
        $now = time();
        $data['now'] = $now;
        $data['nowDate'] = date('Y-m-d H:i:s',$now);
        $this->assign('data',$data);
        return $this->view('tool/timestamp','tools');
    }
}