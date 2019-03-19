<?php
/**
 * User: long
 * Date: 2019/3/18
 * Time: 17:03
 */

namespace app\index\controller;


use lib\ApiResponse;
use think\App;

class Tool extends Base
{

    public function __construct(App $app = null)
    {
        parent::__construct($app);
    }

    /**
     * 时间戳首页
     * @return string
     * @throws \Exception
     */
    public function timestamp(){
        $now = time();
        $data['now'] = $now;
        $data['nowDate'] = date('Y-m-d H:i:s',$now);
        $this->assign('data',$data);
        return $this->view('tool/timestamp','tools');
    }

    /**
     * 时间日期转换
     */
    public function changeTime(){
        $type = $_REQUEST['type'];
        $value = $_REQUEST['value'];
        if($type==1){
            $target = date('Y-m-d H:i:s',intval($value));
            ApiResponse::success("success",$target);
        }

        if($type==2){
            $target = intval(strtotime($value));
            ApiResponse::success("success",$target);
        }
    }
}